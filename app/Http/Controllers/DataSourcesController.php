<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class DataSourcesController extends Controller
{
    public function index(): View
    {
        return view('pages.data-sources');
    }
}
