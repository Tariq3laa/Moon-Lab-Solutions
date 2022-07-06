<?php

namespace Modules\Website\User\Repositories;

interface AuthRepositoryInterface 
{
    public function login($request);
    public function register($request);
    public function verifyPhone($request);
    public function resetPassword($request);
    public function forgetPassword($request);
}