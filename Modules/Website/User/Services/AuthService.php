<?php

namespace Modules\Website\User\Services;

use Illuminate\Support\Facades\DB;
use Modules\Common\Jobs\SendEmail;
use Modules\Common\Http\Controllers\InitController;
use Modules\Website\User\Repositories\AuthRepository;

class AuthService extends InitController
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        parent::__construct();
        $this->authRepository = $authRepository;
    }

    public function login($request)
    {
        try {
            return $this->respondWithSuccess($this->authRepository->login($request));
        } catch (\Exception $e) {
            $code = getCode($e->getCode());
            $message = $e->getMessage();
            return jsonResponse($code, $message);
        }
    }

    public function register($request)
    {
        try {
            return $this->respondCreated([$this->authRepository->register($request)]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage());
        }
    }

    public function forgetPassword($request)
    {
        try {
            $item = $this->authRepository->forgetPassword($request);
            $email_data = [
                'template_path' => 'websiteUser::emails.auth.forget_password',
                'subject' => 'User Forget Password',
                'receiver_email' => $item->email,
                'name' => $item->name,
                'code' => $item->forget_password_code,
                'link' => env('FRONT_URL') . '/reset-password'
            ];
            SendEmail::dispatch($email_data);
            return $this->respondOk('Email Sent to your email');
        } catch (\Exception $e) {
            DB::rollBack();
            $code = getCode($e->getCode());
            $message = $e->getMessage();
            return jsonResponse($code, $message);
        }
    }

    public function resetPassword($request)
    {
        try {
            return $this->respondWithSuccess($this->authRepository->resetPassword($request));
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage());
        }
    }

    public function verifyPhone($request)
    {
        try {
            return $this->respondWithSuccess([$this->authRepository->verifyPhone($request)]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->respondError($e->getMessage());
        }
    }

    public function profile()
    {
        try {
            return $this->respondWithSuccess($this->authRepository->profile());
        } catch (\Exception $e) {
            return $this->respondError($e->getMessage());
        }
    }
}