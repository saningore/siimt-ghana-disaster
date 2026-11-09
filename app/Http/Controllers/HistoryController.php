<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function index(): View
    {
        return view('pages.history', [
            'datasets' => PrototypeData::historyDatasets(),
            'defaultKey' => 'all',
        ]);
    }
}
