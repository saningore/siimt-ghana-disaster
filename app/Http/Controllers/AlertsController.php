<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class AlertsController extends Controller
{
    public function index(): View
    {
        return view('pages.alerts', [
            'alerts' => PrototypeData::activeAlerts(),
            'regions' => PrototypeData::regionMap(),
        ]);
    }
}
