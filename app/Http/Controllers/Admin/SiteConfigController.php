<?php

namespace App\Http\Controllers\Admin;

use App\Data\DemoStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteConfigController extends Controller
{
    public function edit(): View
    {
        return view('admin.site-config', [
            'config' => DemoStore::config(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'mode' => ['required', 'in:monitoring,active_event'],
            'eas_message' => ['required', 'string', 'max:240'],
            'eas_severity' => ['required', 'in:minor,moderate,severe'],
            'hero_title' => ['required', 'string', 'max:160'],
            'hero_region' => ['required', 'string', 'max:160'],
        ]);

        DemoStore::saveConfig($data);

        return redirect()->route('admin.site-config')->with('success', 'Site configuration saved. Check the public homepage.');
    }
}
