<?php

namespace Modules\Website\User\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Modules\Website\User\Entities\User;
use Modules\Website\User\Transformers\UserResource;

class AuthRepository implements AuthRepositoryInterface
{
    public function login($request)
    {
        if($request->filled('email')) {
            $credentials = $request->only(['email', 'password']);
            $item = User::query()->where('email', $request->email)->first();
        } else if($request->filled('phone')) {
            $credentials = $request->only(['phone', 'password']);
            $item = User::query()->where('phone', $request->phone)->first();
        }
        if (!$item->hasVerifiedEmail() && !$item->phone_verified_at) throw new \Exception('Your account is not verified yet.', 403);
        if (!$item['access_token'] = Auth::guard('client')->attempt($credentials, true)) throw new \Exception('The email or password you entered is invalid.', 401);
        return new UserResource($item);
    }

    public function register($request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $model = User::query()->create($data);
        if($request->filled('email')) event(new Registered($model)); 
        DB::commit();
        return 'Account created successfully - please verify your account, so you can login';
    }

    public function forgetPassword($request)
    {
        DB::beginTransaction();
        if($request->filled('email')) $item = User::query()->where('email', $request->email)->first();
        else if($request->filled('phone')) $item = User::query()->where('phone', $request->phone)->first();
        if (!$item->hasVerifiedEmail() && !$item->phone_verified_at) throw new \Exception('Your account is not verified yet.', 403);
        $code = randomStr();
        $item->update(['forget_password_code' => $code]);
        DB::commit();
        return $item;
    }

    public function resetPassword($request)
    {
        DB::beginTransaction();
        $item = User::query()->where('forget_password_code', $request->code)->first();
        $item->update([
            'password' => $request->password,
            'forget_password_code' => null
        ]);
        $item->access_token = Auth::guard('client')->attempt(['email' => $item->email, 'password' => $request->password], true);
        DB::commit();
        return new UserResource($item);
    }

    public function verifyPhone($request)
    {
        DB::beginTransaction();
        $item = User::query()->where('phone', $request->phone)->first();
        $item->update([
            'phone_verified_at' => Carbon::now()->toDateTimeString()
        ]);
        DB::commit();
        return 'your account verified successfully';
    }

    public function profile()
    {
        return new UserResource(auth('client')->user());
    }
}