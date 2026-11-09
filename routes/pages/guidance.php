<?php

use App\Http\Controllers\GuidanceController;
use Illuminate\Support\Facades\Route;

Route::get('/rescue', [GuidanceController::class, 'rescue'])->name('rescue');
Route::get('/relief', [GuidanceController::class, 'relief'])->name('relief');
