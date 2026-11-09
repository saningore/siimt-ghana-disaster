<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use App\Data\PrototypeData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IncidentReportController extends Controller
{
    public function create(): View
    {
        return view('pages.incident-report', [
            'regions' => PrototypeData::ghanaRegions(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'type' => ['required', 'string', 'max:60'],
            'region' => ['required', 'string', 'max:80'],
            'location' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:1000'],
        ]);

        $ref = DemoStore::addIncident($validated);

        return redirect()
            ->route('incident.report')
            ->with('success', "Incident tip logged (ref {$ref}). Our editors may follow up with official agencies.");
    }
}
