<?php

use Illuminate\Support\Facades\Route;
use Modules\Website\User\Http\Controllers\AuthController;

Route::group([
    'prefix' => 'website/user',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify-phone', [AuthController::class, 'verifyPhone']);
    Route::post('reset-password', [AuthController::class, 'resetPassword']);
    Route::post('forget-password', [AuthController::class, 'forgetPassword']);

    Route::group([
        'middleware' => 'auth:client'
    ], function () {
        Route::get('profile', [AuthController::class, 'profile']);
        Route::apiResource('articles', ArticleController::class)->except(['index', 'show']);
    });
});
