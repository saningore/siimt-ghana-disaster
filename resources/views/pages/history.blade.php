@extends('layouts.ghana')
@section('title', 'Historical disasters')
@section('content')
<div class="page-head wrap">
    <h1>Historical disaster records</h1>
    <p class="page-head__lead">Historical disaster trends from published national and international records.</p>
</div>
<section class="section">
    <div class="wrap">
        <div class="filter-bar" role="tablist" aria-label="Region dataset">
            <button type="button" class="filter-chip is-active" data-dataset="all">All Ghana</button>
            <button type="button" class="filter-chip" data-dataset="greater_accra">Greater Accra</button>
            <button type="button" class="filter-chip" data-dataset="northern">Northern belt</button>
        </div>
        <div class="panel">
            <canvas id="historyChart" height="120" aria-label="Historical disaster counts chart"></canvas>
            <p class="chart-source mono" id="historySource">{{ $datasets['all']['source'] ?? '' }}</p>
        </div>
    </div>
</section>
@endsection

@push('head')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js" defer></script>
@endpush
@push('scripts')
<script>window.GHANA_HISTORY = @json(['datasets' => $datasets, 'defaultKey' => $defaultKey]);</script>
@if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite('resources/js/history-chart.js')
@else
    <script src="{{ asset('js/history-chart.js') }}" defer></script>
@endif
@endpush
