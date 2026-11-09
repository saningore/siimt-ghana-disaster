@extends('layouts.ghana')
@section('title', 'Situation report')
@section('content')
<div class="page-head wrap">
    <h1>Situation details</h1>
    <p class="page-head__lead">Official NADMO figures appear here only when sourced and dated.</p>
</div>
<section class="section">
    <div class="wrap">
        <div class="citation-box">
            <span class="mono">As of: {{ $situation['as_of'] }}</span>
            <a href="{{ $situation['source_url'] }}" target="_blank" rel="noopener">{{ $situation['source_label'] }} ↗</a>
        </div>
        <div class="stat-row stat-row--3">
            @foreach ($situation['metrics'] as $m)
                <div class="stat-card">
                    <span class="stat-card__label">{{ $m['label'] }}</span>
                    <span class="stat-card__value stat-card__value--text">{{ $m['value'] }}</span>
                    <span class="stat-card__meta">{{ $m['note'] }}</span>
                </div>
            @endforeach
        </div>
        <article class="panel panel--prose">
            <p>{{ $situation['narrative'] }}</p>
        </article>
        <h2 class="section-head__title" style="margin-top:1.5rem">Recent updates</h2>
        <ul class="timeline">
            @foreach ($timeline as $item)
                <li class="timeline__item">
                    <span class="timeline__time mono">{{ $item['time'] }}</span>
                    <p class="timeline__text">{{ $item['text'] }}</p>
                    <span class="timeline__src">{{ $item['source'] }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection
