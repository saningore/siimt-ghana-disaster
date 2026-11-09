@extends('layouts.ghana')
@section('title', 'Road & highway updates')
@section('content')
<div class="page-head wrap">
    <h1>Road &amp; highway updates</h1>
    <p class="page-head__lead">Curated from Ghana Highway Authority press releases and official notices.</p>
</div>
<section class="section">
    <div class="wrap">
        <div class="filter-bar" role="tablist" aria-label="Road status filter">
            <button type="button" class="filter-chip is-active" data-road-filter="all">All</button>
            <button type="button" class="filter-chip" data-road-filter="closed">Closed</button>
            <button type="button" class="filter-chip" data-road-filter="restricted">Restricted</button>
            <button type="button" class="filter-chip" data-road-filter="open">Open</button>
        </div>
        <ul class="road-full-list" id="roadList">
            @foreach ($roads as $road)
                <li class="road-full road-full--{{ $road['status'] }}" data-status="{{ $road['status'] }}">
                    <div class="road-full__badge">{{ strtoupper($road['status']) }}</div>
                    <div class="road-full__body">
                        <h2>{{ $road['route'] }}</h2>
                        <p class="road-full__region">{{ $road['region'] }} · Updated {{ $road['updated'] }}</p>
                        <p><strong>Reason:</strong> {{ $road['reason'] }}</p>
                        @if ($road['diversion'] !== 'None')
                            <p><strong>Diversion / guidance:</strong> {{ $road['diversion'] }}</p>
                        @endif
                        <a href="{{ $road['source_url'] }}" target="_blank" rel="noopener" class="text-link">{{ $road['source'] }} ↗</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/roads-filter.js') }}" defer></script>
@endpush
