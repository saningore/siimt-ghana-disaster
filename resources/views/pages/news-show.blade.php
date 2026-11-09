@extends('layouts.ghana')
@section('title', $bulletin['title'])
@section('content')
<article class="section">
    <div class="wrap article">
        <p class="article__back"><a href="{{ route('news') }}">← All bulletins</a></p>
        <header class="article__head">
            @include('partials.severity', ['severity' => $bulletin['severity']])
            <span class="tag">{{ $bulletin['tag'] }}</span>
            <h1>{{ $bulletin['title'] }}</h1>
            <p class="article__meta mono">{{ $bulletin['time'] }} · {{ $bulletin['source'] }}</p>
        </header>
        <div class="article__body">
            <p class="lead">{{ $bulletin['excerpt'] }}</p>
            <p>{{ $bulletin['body'] }}</p>
        </div>
        <footer class="article__foot">
            <a class="btn btn--primary" href="{{ $bulletin['url'] }}" target="_blank" rel="noopener">Read at source ↗</a>
        </footer>
    </div>
</article>
@endsection
