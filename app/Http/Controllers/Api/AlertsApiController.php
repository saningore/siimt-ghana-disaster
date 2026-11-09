<?php

namespace App\Http\Controllers\Api;

use App\Data\PrototypeData;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AlertsApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'source' => 'Ghana Meteorological Agency (CAP)',
            'fetched_at' => now()->toIso8601String(),
            'alerts' => PrototypeData::activeAlerts(),
        ]);
    }
}
