<?php

use App\Http\Controllers\Admin\MissingQueueController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/missing', [MissingQueueController::class, 'index'])->name('missing');
    Route::post('/missing/{id}/approve', [MissingQueueController::class, 'approve'])->name('missing.approve');
    Route::post('/missing/{id}/reject', [MissingQueueController::class, 'reject'])->name('missing.reject');
});
