<?php

namespace App\Http\Controllers;

use App\Data\PrototypeData;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return view('pages.news', [
            'bulletins' => PrototypeData::bulletins(),
        ]);
    }

    public function show(string $slug): View
    {
        $bulletin = PrototypeData::bulletin($slug);
        abort_if($bulletin === null, 404);

        return view('pages.news-show', ['bulletin' => $bulletin]);
    }
}
