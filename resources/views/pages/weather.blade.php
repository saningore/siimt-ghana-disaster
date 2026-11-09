@extends('layouts.ghana')
@section('title', 'Weather & warnings')
@section('content')
<div class="page-head wrap">
    <h1>Weather &amp; rain warnings</h1>
    <p class="page-head__lead">Official GMet warnings are separate from numerical forecast models.</p>
</div>

<section class="section">
    <div class="wrap cols-2">
        <article class="panel panel--accent">
            <header class="panel__head">
                <h2>Official warnings (GMet)</h2>
                <span class="tag">CAP feed</span>
            </header>
            <ul class="alert-stack">
                @forelse ($alerts as $alert)
                    <li class="alert-card">
                        @include('partials.severity', ['severity' => $alert['severity']])
                        <h3>{{ $alert['title'] }}</h3>
                        <p class="mono alert-card__time">Onset {{ $alert['onset'] }} · Expires {{ $alert['expires'] }}</p>
                        <p>{{ $alert['instruction'] }}</p>
                        <p class="alert-card__areas"><strong>Areas:</strong> {{ implode(', ', $alert['areas']) }}</p>
                        <a href="{{ $alert['source_url'] }}" target="_blank" rel="noopener" class="text-link">View on GMet ↗</a>
                    </li>
                @empty
                    <li class="empty-state">No active official alerts at this time.</li>
                @endforelse
            </ul>
        </article>
        <article class="panel">
            <header class="panel__head">
                <h2>Numerical forecast</h2>
                <span class="tag tag--muted">Open-Meteo style</span>
            </header>
            <label class="field">
                <span class="field__label">City</span>
                <select class="field__input" id="citySelect">
                    @foreach ($cities as $city)
                        <option value="{{ $city['name'] }}">{{ $city['name'] }}</option>
                    @endforeach
                </select>
            </label>
            <p class="forecast-disclaimer">Numerical forecast only — not an official GMet warning.</p>
            <div class="forecast-grid" id="forecastGrid"></div>
        </article>
    </div>
</section>

<section class="section section--muted">
    <div class="wrap">
        <h2>Wind &amp; pressure context</h2>
        <p class="section-head__sub">Third-party embed — for situational awareness only.</p>
        <div class="windy-embed">
            <iframe title="Windy weather map" src="https://embed.windy.com/embed2.html?lat=7.946&lon=-1.023&detailLat=5.603&detailLon=-0.187&width=650&height=450&zoom=6&level=surface&overlay=wind&product=ecmwf&menu=&message=true&marker=&calendar=now&pressure=true&type=map&location=coordinates&detail=&metricWind=default&metricTemp=default&radarRange=-1" loading="lazy"></iframe>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>window.GHANA_FORECASTS = @json($forecastsByCity);</script>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite('resources/js/weather-forecast.js')
@else
    <script src="{{ asset('js/weather-forecast.js') }}" defer></script>
@endif
@endpush
