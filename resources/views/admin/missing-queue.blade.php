@extends('layouts.ghana')
@section('title', 'Admin · Missing queue')
@section('content')
<div class="page-head wrap"><h1>Missing persons queue</h1></div>
<section class="section"><div class="wrap">
    @include('admin.partials.nav')
    @if (count($pending) === 0)
        <p class="empty-state">No pending submissions. <a href="{{ route('missing.report') }}">Submit a test report</a>.</p>
    @else
        <table class="data-table">
            <thead><tr><th>Ref</th><th>Name</th><th>Region</th><th>Last seen</th><th>Submitted</th><th>Actions</th></tr></thead>
            <tbody>
                @foreach ($pending as $row)
                    <tr>
                        <td class="mono">{{ $row['id'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['region'] }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($row['last_seen'], 36) }}</td>
                        <td class="mono">{{ $row['submitted_at'] ?? '—' }}</td>
                        <td class="table-actions">
                            <form method="post" action="{{ route('admin.missing.approve', $row['id']) }}">@csrf<button type="submit" class="btn btn--primary btn--sm">Approve</button></form>
                            <form method="post" action="{{ route('admin.missing.reject', $row['id']) }}">@csrf<button type="submit" class="btn btn--ghost btn--sm">Reject</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div></section>
@endsection
