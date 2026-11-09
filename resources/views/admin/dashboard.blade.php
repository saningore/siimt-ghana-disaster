@extends('layouts.ghana')
@section('title', 'Admin dashboard')
@section('content')
<div class="page-head wrap">
    <h1>Admin dashboard</h1>
    <p class="page-head__lead">Editor dashboard — sign-in will be enabled in a future release.</p>
</div>
<section class="section">
    <div class="wrap">
        @include('admin.partials.nav')
        <div class="stat-row stat-row--5 admin-stats">
            <div class="stat-card"><span class="stat-card__label">Last CAP ingest</span><span class="stat-card__value stat-card__value--text">{{ $stats['last_cap_ingest'] }}</span></div>
            <div class="stat-card"><span class="stat-card__label">Active alerts</span><span class="stat-card__value">{{ $stats['active_alerts'] }}</span></div>
            <div class="stat-card"><span class="stat-card__label">Pending missing</span><span class="stat-card__value">{{ $stats['pending_missing'] }}</span></div>
            <div class="stat-card"><span class="stat-card__label">Draft bulletins</span><span class="stat-card__value">{{ $stats['draft_bulletins'] }}</span></div>
            <div class="stat-card"><span class="stat-card__label">Incident tips</span><span class="stat-card__value">{{ $stats['pending_incidents'] ?? 0 }}</span></div>
        </div>
        <div class="panel">
            <h2>Quick actions</h2>
            <div class="hero__actions">
                <a class="btn btn--primary" href="{{ route('admin.bulletins') }}">Manage bulletins</a>
                <a class="btn btn--ghost" href="{{ route('admin.roads') }}">Road closures</a>
                <a class="btn btn--ghost" href="{{ route('admin.missing') }}">Missing queue ({{ $stats['pending_missing'] }})</a>
                <a class="btn btn--ghost" href="{{ route('admin.incidents') }}">Incident inbox</a>
                <a class="btn btn--ghost" href="{{ route('admin.site-config') }}">Site config</a>
                <a class="btn btn--ghost" href="{{ route('api.alerts') }}" target="_blank" rel="noopener">Alerts JSON API</a>
            </div>
        </div>
    </div>
</section>
@endsection
