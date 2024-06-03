<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PricingPlanController;
use App\Http\Controllers\PricingPeriodController;

Route::get('/', function () {
    return view('home.index');
});

Route::get('login', [AuthController::class, 'getLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('register', [AuthController::class, 'getRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('auth.register');
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [PricingPlanController::class, 'dashboard'])->name('home.dashboard');
    Route::get('pricing-period/create/{id}', [PricingPeriodController::class, 'create'])->name('pricing_period.create');
    Route::post('pricing-period/store', [PricingPeriodController::class, 'store'])->name('pricing_period.store');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});
