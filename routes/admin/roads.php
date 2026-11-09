<?php

use App\Http\Controllers\Admin\RoadController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/roads', [RoadController::class, 'index'])->name('roads');
});
