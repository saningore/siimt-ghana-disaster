@extends('layouts.ghana')
@section('title', 'Missing persons')
@section('content')
<div class="page-head wrap">
    <h1>Missing persons</h1>
    <p class="page-head__lead">Verified listings only. For emergencies dial <a href="tel:191" class="text-link">191</a> (Police).</p>
</div>
<section class="section">
    <div class="wrap">
        <div class="toolbar">
            <input type="search" class="field__input" id="missingSearch" placeholder="Search by name or region…" aria-label="Search missing persons">
            <a class="btn btn--ghost" href="{{ route('incident.report') }}">Report incident</a>
            <a class="btn btn--primary" href="{{ route('missing.report') }}">Report missing person</a>
        </div>
        <ul class="missing-grid" id="missingList">
            @foreach ($records as $row)
                <li class="missing-card" data-search="{{ strtolower($row['name'].' '.$row['region']) }}">
                    <span class="tag tag--verified">Verified listing</span>
                    <h2>{{ $row['name'] }}</h2>
                    <dl class="missing-card__dl">
                        <div><dt>Age</dt><dd>{{ $row['age'] }}</dd></div>
                        <div><dt>Region</dt><dd>{{ $row['region'] }}</dd></div>
                        <div><dt>Last seen</dt><dd class="mono">{{ $row['last_seen'] }}</dd></div>
                        <div><dt>Ref</dt><dd class="mono">{{ $row['id'] }}</dd></div>
                    </dl>
                    <p class="missing-card__note">{{ $row['event'] }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.getElementById('missingSearch')?.addEventListener('input', (e) => {
    const q = e.target.value.toLowerCase();
    document.querySelectorAll('#missingList .missing-card').forEach((el) => {
        el.hidden = q && !el.dataset.search.includes(q);
    });
});
</script>
@endpush
