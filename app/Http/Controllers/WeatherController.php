<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class WeatherController extends Controller
{
    public function index(): View
    {
        return view('pages.weather', [
            'alerts' => PrototypeData::activeAlerts(),
            'cities' => PrototypeData::weatherCities(),
            'forecastsByCity' => PrototypeData::forecastsByCity(),
        ]);
    }
}
