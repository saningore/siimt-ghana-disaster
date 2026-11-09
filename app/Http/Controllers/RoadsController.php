<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class RoadsController extends Controller
{
    public function index(): View
    {
        return view('pages.roads', [
            'roads' => PrototypeData::roads(),
        ]);
    }
}
