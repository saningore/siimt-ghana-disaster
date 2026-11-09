@extends('layouts.ghana')
@section('title', 'Relief & resources')
@section('content')
<div class="page-head wrap">
    <h1>Relief &amp; preparedness</h1>
    <p class="page-head__lead">Official donation channels only when published by NADMO or trusted partners.</p>
</div>
<section class="section">
    <div class="wrap cols-2">
        @foreach ($resources as $block)
            <article class="panel">
                <h2>{{ $block['title'] }}</h2>
                <ul class="check-list">
                    @foreach ($block['items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </article>
        @endforeach
    </div>
</section>
@include('partials.helplines', ['helplines' => $helplines])
@endsection
