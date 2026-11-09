<?php

use App\Http\Controllers\DataSourcesController;
use Illuminate\Support\Facades\Route;

Route::get('/data-sources', [DataSourcesController::class, 'index'])->name('data-sources');
