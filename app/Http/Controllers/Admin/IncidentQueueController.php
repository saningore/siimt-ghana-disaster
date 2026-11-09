<?php

namespace App\Http\Controllers\Admin;

use App\Data\DemoStore;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IncidentQueueController extends Controller
{
    public function index(): View
    {
        return view('admin.incidents', [
            'incidents' => DemoStore::incidents(),
        ]);
    }
}
