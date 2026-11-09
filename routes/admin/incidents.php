<?php

use App\Http\Controllers\Admin\IncidentQueueController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/incidents', [IncidentQueueController::class, 'index'])->name('incidents');
});
