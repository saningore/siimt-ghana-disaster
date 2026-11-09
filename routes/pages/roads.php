<?php

use App\Http\Controllers\RoadsController;
use Illuminate\Support\Facades\Route;

Route::get('/roads', [RoadsController::class, 'index'])->name('roads');
