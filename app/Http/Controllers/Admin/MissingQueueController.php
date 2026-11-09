<?php

namespace App\Http\Controllers\Admin;

use App\Data\DemoStore;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MissingQueueController extends Controller
{
    public function index(): View
    {
        return view('admin.missing-queue', [
            'pending' => DemoStore::pendingMissing(),
        ]);
    }

    public function approve(string $id): RedirectResponse
    {
        if (! DemoStore::approveMissing($id)) {
            return back()->with('error', 'Could not approve that submission.');
        }

        return back()->with('success', "Approved {$id}. Listing is now public on Missing Persons.");
    }

    public function reject(string $id): RedirectResponse
    {
        if (! DemoStore::rejectMissing($id)) {
            return back()->with('error', 'Could not reject that submission.');
        }

        return back()->with('success', "Rejected {$id}.");
    }
}
