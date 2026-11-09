<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use Illuminate\View\View;

class MissingController extends Controller
{
    public function index(): View
    {
        return view('pages.missing', [
            'records' => DemoStore::verifiedMissing(),
        ]);
    }
}
