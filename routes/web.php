<?php

use App\Http\Controllers\PricingPeriodController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PricingPlanController;

Route::get('/', [PricingPlanController::class, 'index'])->name('home.index');
Route::get('/pricing-period/create/{id}', [PricingPeriodController::class, 'create'])->name('pricing_period.create');
