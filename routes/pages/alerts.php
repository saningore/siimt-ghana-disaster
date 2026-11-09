<?php

use App\Http\Controllers\AlertsController;
use App\Http\Controllers\Api\AlertsApiController;
use Illuminate\Support\Facades\Route;

Route::get('/alerts', [AlertsController::class, 'index'])->name('alerts');
Route::get('/api/alerts', [AlertsApiController::class, 'index'])->name('api.alerts');
