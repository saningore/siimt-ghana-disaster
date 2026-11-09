@extends('layouts.ghana')
@section('title', 'Admin · Roads')
@section('content')
<div class="page-head wrap"><h1>Road closures</h1></div>
<section class="section"><div class="wrap">
    @include('admin.partials.nav')
    <table class="data-table">
        <thead><tr><th>Route</th><th>Status</th><th>Region</th><th>Updated</th></tr></thead>
        <tbody>
            @foreach ($roads as $r)
                <tr>
                    <td>{{ $r['route'] }}</td>
                    <td>{{ $r['status'] }}</td>
                    <td>{{ $r['region'] }}</td>
                    <td class="mono">{{ $r['updated'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div></section>
@endsection
