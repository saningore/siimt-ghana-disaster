<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use App\Data\PrototypeData;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $config = DemoStore::config();

        return view('pages.home', [
            'config' => $config,
            'alerts' => PrototypeData::activeAlerts(),
            'bulletins' => array_slice(PrototypeData::bulletins(), 0, 4),
            'roads' => array_slice(PrototypeData::roads(), 0, 3),
            'helplines' => PrototypeData::helplines(),
        ]);
    }
}
