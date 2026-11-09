<?php

use App\Http\Controllers\IncidentReportController;
use Illuminate\Support\Facades\Route;

Route::get('/incident/report', [IncidentReportController::class, 'create'])->name('incident.report');
Route::post('/incident/report', [IncidentReportController::class, 'store'])->name('incident.report.store');
