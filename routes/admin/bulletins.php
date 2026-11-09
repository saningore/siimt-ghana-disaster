<?php

use App\Http\Controllers\Admin\BulletinController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/bulletins', [BulletinController::class, 'index'])->name('bulletins');
});
