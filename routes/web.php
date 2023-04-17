<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use App\Http\Controllers\Employee\AuthController as EmployeeAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Customer routes
Route::group(['middleware' => 'auth:customer'], function () {
    Route::get('/', [CustomerAuthController::class, 'index'])->name('customer.dashboard');
    Route::get('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');
    Route::view('/email/verify', 'auth.verify-email')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('customer.dashboard');
    })->middleware('signed')->name('verification.verify');
});

// Customer guest routes
Route::group(['middleware' => 'guest:customer'], function () {
    Route::get('/login', [CustomerAuthController::class, 'login'])->name('customer.login');
    Route::post('/login', [CustomerAuthController::class, 'handleLogin']);
    Route::get('/register', [CustomerAuthController::class, 'register'])->name('customer.register');
    Route::post('/register', [CustomerAuthController::class, 'handleRegister']);
});

// Employee routes
Route::prefix('employee')->group(function () {
    Route::group(['middleware' => 'auth:employee'], function () {
        Route::get('/', [EmployeeAuthController::class, 'index'])->name('employee.dashboard');
        Route::get('/logout', [EmployeeAuthController::class, 'logout'])->name('employee.logout');
    });

    // Employee guest routes
    Route::group(['middleware' => 'guest:employee'], function () {
        Route::get('/login', [EmployeeAuthController::class, 'login'])->name('employee.login');
        Route::post('/login', [EmployeeAuthController::class, 'handleLogin']);
    });
});
