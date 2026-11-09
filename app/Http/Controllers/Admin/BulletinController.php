<?php

namespace App\Http\Controllers\Admin;

use App\Data\PrototypeData;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class BulletinController extends Controller
{
    public function index(): View
    {
        return view('admin.bulletins', [
            'bulletins' => PrototypeData::bulletins(),
        ]);
    }
}
