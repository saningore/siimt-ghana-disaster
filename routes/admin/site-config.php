<?php

use App\Http\Controllers\Admin\SiteConfigController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/site-config', [SiteConfigController::class, 'edit'])->name('site-config');
    Route::post('/site-config', [SiteConfigController::class, 'update'])->name('site-config.store');
});
