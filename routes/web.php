<?php

use App\Http\Controllers\AdminPrototypeController;
use App\Http\Controllers\Api\AlertsApiController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/weather', [PageController::class, 'weather'])->name('weather');
Route::get('/alerts', [PageController::class, 'alerts'])->name('alerts');
Route::get('/api/alerts', [AlertsApiController::class, 'index'])->name('api.alerts');
Route::get('/news', [PageController::class, 'news'])->name('news');
Route::get('/news/{slug}', [PageController::class, 'newsShow'])->name('news.show');
Route::get('/roads', [PageController::class, 'roads'])->name('roads');
Route::get('/situation', [PageController::class, 'situation'])->name('situation');
Route::get('/missing', [PageController::class, 'missing'])->name('missing');
Route::get('/missing/report', [PageController::class, 'missingReport'])->name('missing.report');
Route::post('/missing/report', [FormController::class, 'storeMissing'])->name('missing.report.store');
Route::get('/incident/report', [PageController::class, 'incidentReport'])->name('incident.report');
Route::post('/incident/report', [FormController::class, 'storeIncident'])->name('incident.report.store');
Route::get('/rescue', [PageController::class, 'rescue'])->name('rescue');
Route::get('/relief', [PageController::class, 'relief'])->name('relief');
Route::get('/history', [PageController::class, 'history'])->name('history');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/data-sources', [PageController::class, 'dataSources'])->name('data-sources');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [FormController::class, 'storeContact'])->name('contact.store');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminPrototypeController::class, 'dashboard'])->name('dashboard');
    Route::get('/bulletins', [AdminPrototypeController::class, 'bulletins'])->name('bulletins');
    Route::get('/roads', [AdminPrototypeController::class, 'roads'])->name('roads');
    Route::get('/missing', [AdminPrototypeController::class, 'missingQueue'])->name('missing');
    Route::post('/missing/{id}/approve', [AdminPrototypeController::class, 'approveMissing'])->name('missing.approve');
    Route::post('/missing/{id}/reject', [AdminPrototypeController::class, 'rejectMissing'])->name('missing.reject');
    Route::get('/incidents', [AdminPrototypeController::class, 'incidentsQueue'])->name('incidents');
    Route::get('/site-config', [AdminPrototypeController::class, 'siteConfig'])->name('site-config');
    Route::post('/site-config', [AdminPrototypeController::class, 'updateSiteConfig'])->name('site-config.store');
});
