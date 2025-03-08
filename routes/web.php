<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTAuthController;
use App\Http\Middleware\JwtMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/register', [JWTAuthController::class, 'register'])->name('register.post');
Route::post('/login', [JWTAuthController::class, 'login'])->name('login.post');

    Route::get('user', [JWTAuthController::class, 'getUser']);
    Route::post('logout', [JWTAuthController::class, 'logout'])->name("logout");


Route::get('/forgetpassword',function () {
    return view('auth.forget_password');
})->name('forgetpassword');
Route::post('/forgetpassword', [JWTAuthController::class, 'sendResetCode'])->name('password.email');

Route::get('/resetpassword',function () {
    return view('auth.reset_password');
})->name('resetpassword');
Route::post('/resetpassword', [JWTAuthController::class, 'resetPassword'])->name('reset.password');
