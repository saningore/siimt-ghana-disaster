<?php

use App\Http\Controllers\PrivacyController;
use Illuminate\Support\Facades\Route;

Route::get('/privacy', [PrivacyController::class, 'index'])->name('privacy');
