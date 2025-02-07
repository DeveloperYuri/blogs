<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);

Route::get('login', [AuthController::class, 'login']);

Route::post('login', [AuthController::class, 'auth_login']);

Route::get('register', [AuthController::class, 'register']);

Route::get('verify/{token}', [AuthController::class, 'verify']);

Route::post('register', [AuthController::class, 'create_user']);

Route::get('forgot-password', [AuthController::class, 'forgot']);
Route::post('forgot-password', [AuthController::class, 'forgot_password']);

Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'post_reset']);

Route::get('logout', [AuthController::class, 'logout']);


Route::group(['middleware' => 'adminuser'], function () {
    Route::get('panel/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('panel/user/list', [UserController::class, 'user']);
});

                                                  
