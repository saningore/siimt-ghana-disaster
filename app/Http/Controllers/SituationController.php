<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class SituationController extends Controller
{
    public function index(): View
    {
        return view('pages.situation', [
            'situation' => PrototypeData::situation(),
            'timeline' => PrototypeData::situationTimeline(),
        ]);
    }
}
