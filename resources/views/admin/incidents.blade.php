@extends('layouts.ghana')
@section('title', 'Admin · Incidents')
@section('content')
<div class="page-head wrap"><h1>Public incident tips</h1></div>
<section class="section"><div class="wrap">
    @include('admin.partials.nav')
    <table class="data-table">
        <thead><tr><th>Ref</th><th>Type</th><th>Region</th><th>Location</th><th>Status</th><th>Submitted</th></tr></thead>
        <tbody>
            @foreach ($incidents as $inc)
                <tr>
                    <td class="mono">{{ $inc['id'] }}</td>
                    <td>{{ $inc['type'] }}</td>
                    <td>{{ $inc['region'] }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($inc['location'], 40) }}</td>
                    <td>{{ $inc['status'] }}</td>
                    <td class="mono">{{ $inc['submitted_at'] ?? '—' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div></section>
@endsection
