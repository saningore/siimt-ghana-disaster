@extends('layouts.ghana')

@section('title', 'Live alerts, weather & emergency updates')

@section('content')
<section class="hero">
    <div class="wrap hero__inner">
        <p class="hero__kicker">
            <span class="pulse-dot" aria-hidden="true"></span>
            Monitoring · <span class="mono">{{ $config['hero_date'] }}</span>
        </p>
        <h1 class="hero__title">{{ $config['hero_title'] }}</h1>
        <p class="hero__region">{{ $config['hero_region'] }}</p>
        <div class="stat-row">
            <div class="stat-card">
                <span class="stat-card__label">Weather watches</span>
                <span class="stat-card__value">{{ count($alerts) }}</span>
                <span class="stat-card__meta">GMet CAP</span>
            </div>
            <div class="stat-card">
                <span class="stat-card__label">Road notices</span>
                <span class="stat-card__value">{{ count($roads) }}</span>
                <span class="stat-card__meta">Curated GHA</span>
            </div>
            <div class="stat-card">
                <span class="stat-card__label">Mode</span>
                <span class="stat-card__value stat-card__value--text">{{ ucfirst($config['mode']) }}</span>
                <span class="stat-card__meta">No unsourced tolls</span>
            </div>
        </div>
        <p class="hero__note">{{ $config['hero_note'] }}</p>
        <div class="hero__actions">
            <a class="btn btn--primary" href="#helplines">Emergency helplines</a>
            <a class="btn btn--ghost" href="{{ route('alerts') }}">Live alert map</a>
            <a class="btn btn--ghost" href="{{ route('situation') }}">Situation</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="wrap cols-2">
        <article class="panel">
            <header class="panel__head">
                <h2>Latest bulletins</h2>
                <a class="panel__more" href="{{ route('news') }}">All news →</a>
            </header>
            <ul class="feed-list">
                @foreach ($bulletins as $item)
                    <li class="feed-item">
                        <div class="feed-item__meta">
                            @include('partials.severity', ['severity' => $item['severity']])
                            <span class="mono">{{ $item['time'] }}</span>
                        </div>
                        <h3 class="feed-item__title">
                            <a href="{{ route('news.show', $item['slug']) }}">{{ $item['title'] }}</a>
                        </h3>
                        <p class="feed-item__excerpt">{{ $item['excerpt'] }}</p>
                        <span class="feed-item__src">{{ $item['source'] }}</span>
                    </li>
                @endforeach
            </ul>
        </article>
        <article class="panel">
            <header class="panel__head">
                <h2>Highway updates</h2>
                <a class="panel__more" href="{{ route('roads') }}">Full status →</a>
            </header>
            <ul class="road-list">
                @foreach ($roads as $road)
                    <li class="road-item road-item--{{ $road['status'] }}">
                        <span class="road-item__status">{{ strtoupper($road['status']) }}</span>
                        <strong>{{ $road['route'] }}</strong>
                        <p>{{ $road['reason'] }}</p>
                        <span class="road-item__meta">{{ $road['region'] }} · {{ $road['updated'] }}</span>
                    </li>
                @endforeach
            </ul>
        </article>
    </div>
</section>

<section class="section section--muted">
    <div class="wrap">
        <h2 class="section-head__title">Explore</h2>
        <div class="tile-grid">
            @foreach ([
                ['Weather', 'Forecast & official warnings', 'weather'],
                ['Alert map', 'Regions under watch', 'alerts'],
                ['Situation', 'Official figures when published', 'situation'],
                ['Missing', 'Search or report (moderated)', 'missing'],
                ['Rescue info', 'USAR & safety guidance', 'rescue'],
                ['Relief', 'Preparedness & helplines', 'relief'],
            ] as [$t, $s, $r])
                <a class="tile" href="{{ route($r) }}">
                    <span class="tile__title">{{ $t }}</span>
                    <span class="tile__sub">{{ $s }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

@include('partials.helplines', ['helplines' => $helplines])
@endsection
