<?php

use App\Http\Controllers\SituationController;
use Illuminate\Support\Facades\Route;

Route::get('/situation', [SituationController::class, 'index'])->name('situation');
