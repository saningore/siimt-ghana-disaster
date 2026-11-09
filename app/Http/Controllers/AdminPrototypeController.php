<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use App\Data\PrototypeData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPrototypeController extends Controller
{
    public function dashboard(): View
    {
        return view('admin.dashboard', [
            'stats' => DemoStore::adminStats(),
        ]);
    }

    public function bulletins(): View
    {
        return view('admin.bulletins', [
            'bulletins' => PrototypeData::bulletins(),
        ]);
    }

    public function roads(): View
    {
        return view('admin.roads', [
            'roads' => PrototypeData::roads(),
        ]);
    }

    public function missingQueue(): View
    {
        return view('admin.missing-queue', [
            'pending' => DemoStore::pendingMissing(),
        ]);
    }

    public function incidentsQueue(): View
    {
        return view('admin.incidents', [
            'incidents' => DemoStore::incidents(),
        ]);
    }

    public function siteConfig(): View
    {
        return view('admin.site-config', [
            'config' => DemoStore::config(),
        ]);
    }

    public function updateSiteConfig(Request $request): RedirectResponse
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

    public function approveMissing(string $id): RedirectResponse
    {
        if (! DemoStore::approveMissing($id)) {
            return back()->with('error', 'Could not approve that submission.');
        }

        return back()->with('success', "Approved {$id}. Listing is now public on Missing Persons.");
    }

    public function rejectMissing(string $id): RedirectResponse
    {
        if (! DemoStore::rejectMissing($id)) {
            return back()->with('error', 'Could not reject that submission.');
        }

        return back()->with('success', "Rejected {$id}.");
    }
}
