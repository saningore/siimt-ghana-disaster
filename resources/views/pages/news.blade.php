@extends('layouts.ghana')
@section('title', 'Disaster news & bulletins')
@section('content')
<div class="page-head wrap">
    <h1>News &amp; verified bulletins</h1>
    <p class="page-head__lead">Editorial summaries with links to original sources.</p>
</div>
<section class="section">
    <div class="wrap">
        <div class="filter-bar" role="tablist" aria-label="Filter bulletins">
            <button type="button" class="filter-chip is-active" data-filter="all">All</button>
            <button type="button" class="filter-chip" data-filter="danger">Danger</button>
            <button type="button" class="filter-chip" data-filter="watch">Watch</button>
            <button type="button" class="filter-chip" data-filter="info">Info</button>
        </div>
        <div class="news-grid" id="newsGrid">
            @foreach ($bulletins as $item)
                <article class="news-card news-card--{{ $item['severity'] }}" data-severity="{{ $item['severity'] }}">
                    <header class="news-card__head">
                        @include('partials.severity', ['severity' => $item['severity']])
                        <span class="tag">{{ $item['tag'] }}</span>
                        <span class="mono news-card__time">{{ $item['time'] }}</span>
                    </header>
                    <h2 class="news-card__title"><a href="{{ route('news.show', $item['slug']) }}">{{ $item['title'] }}</a></h2>
                    <p>{{ $item['excerpt'] }}</p>
                    <footer class="news-card__foot">
                        <span>{{ $item['source'] }}</span>
                        <a href="{{ route('news.show', $item['slug']) }}">Read →</a>
                    </footer>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="{{ asset('js/news-filter.js') }}" defer></script>
@endpush
