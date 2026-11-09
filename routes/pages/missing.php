<?php

use App\Http\Controllers\MissingController;
use App\Http\Controllers\MissingReportController;
use Illuminate\Support\Facades\Route;

Route::get('/missing', [MissingController::class, 'index'])->name('missing');
Route::get('/missing/report', [MissingReportController::class, 'create'])->name('missing.report');
Route::post('/missing/report', [MissingReportController::class, 'store'])->name('missing.report.store');
