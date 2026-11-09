<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use App\Data\PrototypeData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MissingReportController extends Controller
{
    public function create(): View
    {
        return view('pages.missing-report', [
            'regions' => PrototypeData::ghanaRegions(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'age' => ['nullable', 'integer', 'min:0', 'max:120'],
            'region' => ['required', 'string', 'max:80'],
            'last_seen' => ['required', 'string', 'max:500'],
            'phone' => ['required', 'string', 'max:30'],
            'confirm' => ['accepted'],
        ]);

        $ref = DemoStore::addMissingSubmission($validated);

        return redirect()
            ->route('missing.report')
            ->with('success', "Report received (ref {$ref}). Editors will review before publication.");
    }
}
