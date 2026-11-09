<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class GuidanceController extends Controller
{
    public function rescue(): View
    {
        return view('pages.rescue');
    }

    public function relief(): View
    {
        return view('pages.relief', [
            'resources' => PrototypeData::reliefResources(),
            'helplines' => PrototypeData::helplines(),
        ]);
    }
}
