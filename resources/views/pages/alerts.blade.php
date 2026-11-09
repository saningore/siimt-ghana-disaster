@extends('layouts.ghana')
@section('title', 'Live alert map')
@section('content')
<div class="page-head wrap">
    <h1>Live alert map</h1>
    <p class="page-head__lead">Regions under active CAP warnings. Marker size reflects number of alerts affecting each area.</p>
</div>

<section class="section">
    <div class="wrap map-layout">
        <div class="map-layout__map">
            <div id="alertMap" class="map-canvas" role="application" aria-label="Ghana disaster alert map"></div>
            <div class="map-legend">
                <span><i class="dot dot--severe"></i> Severe / danger</span>
                <span><i class="dot dot--moderate"></i> Moderate / watch</span>
                <span><i class="dot dot--minor"></i> Minor / info</span>
            </div>
        </div>
        <aside class="map-layout__side panel">
            <h2>Active alerts</h2>
            <ul class="alert-stack" id="alertList">
                @foreach ($alerts as $alert)
                    <li class="alert-card alert-card--compact" data-alert-id="{{ $alert['id'] }}">
                        @include('partials.severity', ['severity' => $alert['severity']])
                        <h3>{{ $alert['title'] }}</h3>
                        <p class="alert-card__areas">{{ implode(' · ', $alert['areas']) }}</p>
                    </li>
                @endforeach
            </ul>
            <p class="verify-note">Source: Ghana Meteorological Agency (CAP). Always confirm on <a href="https://www.meteo.gov.gh/alerts/" target="_blank" rel="noopener">meteo.gov.gh ↗</a>.</p>
        </aside>
    </div>
</section>
@endsection

@push('scripts')
<script>
window.GHANA_ALERT_MAP = {
    regions: @json($regions),
    alerts: @json($alerts),
};
</script>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite('resources/js/alerts-map.js')
@else
    <script src="{{ asset('js/alerts-map.js') }}" defer></script>
@endif
@endpush
