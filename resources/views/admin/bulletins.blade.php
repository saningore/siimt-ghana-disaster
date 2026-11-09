@extends('layouts.ghana')
@section('title', 'Admin · Bulletins')
@section('content')
<div class="page-head wrap"><h1>Bulletins</h1></div>
<section class="section"><div class="wrap">
    @include('admin.partials.nav')
    <div class="toolbar"><button class="btn btn--primary" type="button">New bulletin</button></div>
    <table class="data-table">
        <thead><tr><th>Title</th><th>Severity</th><th>Date</th><th>Source</th><th></th></tr></thead>
        <tbody>
            @foreach ($bulletins as $b)
                <tr>
                    <td>{{ $b['title'] }}</td>
                    <td>{{ $b['severity'] }}</td>
                    <td class="mono">{{ $b['time'] }}</td>
                    <td>{{ $b['source'] }}</td>
                    <td><a href="{{ route('news.show', $b['slug']) }}">Preview</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div></section>
@endsection
