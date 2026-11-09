<?php

namespace App\Http\Controllers;

use App\Data\DemoStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function storeMissing(Request $request): RedirectResponse
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

    public function storeContact(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you. Your message has been sent to the team.');
    }

    public function storeIncident(Request $request): RedirectResponse
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
