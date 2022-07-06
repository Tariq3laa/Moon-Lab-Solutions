<?php

namespace Modules\Website\User\Http\Controllers;

use Modules\Website\User\Services\AuthService;
use Modules\Website\User\Http\Requests\Auth\LoginRequest;
use Modules\Website\User\Http\Requests\Auth\RegisterRequest;
use Modules\Website\User\Http\Requests\Auth\verifyPhoneRequest;
use Modules\Website\User\Http\Requests\Auth\ResetPasswordRequest;
use Modules\Website\User\Http\Requests\Auth\ForgetPasswordRequest;

class AuthController
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        return $this->authService->login($request);
    }

    public function register(RegisterRequest $request)
    {
        return $this->authService->register($request);
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
        return $this->authService->forgetPassword($request);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        return $this->authService->resetPassword($request);
    }

    public function verifyPhone(verifyPhoneRequest $request)
    {
        return $this->authService->verifyPhone($request);
    }

    public function profile()
    {
        return $this->authService->profile();
    }
}
