@extends('layouts.ghana')
@section('title', 'Report an incident')
@section('content')
<div class="page-head wrap">
    <h1>Report a public incident</h1>
    <p class="page-head__lead">Share flooding, fire, road damage, or other hazards. Tips are reviewed before any public alert.</p>
</div>
<section class="section">
    <div class="wrap form-layout">
        <form class="form panel" method="post" action="{{ route('incident.report.store') }}">
            @csrf
            <label class="field">
                <span class="field__label">Incident type *</span>
                <select class="field__input" name="type" required>
                    @foreach (['Flooding', 'Fire', 'Road damage', 'Landslide', 'Fallen tree', 'Other'] as $type)
                        <option @selected(old('type') === $type)>{{ $type }}</option>
                    @endforeach
                </select>
            </label>
            <label class="field">
                <span class="field__label">Region *</span>
                <select class="field__input" name="region" required>
                    <option value="">Select…</option>
                    @foreach ($regions as $r)
                        <option @selected(old('region') === $r)>{{ $r }}</option>
                    @endforeach
                </select>
            </label>
            <label class="field">
                <span class="field__label">Location *</span>
                <input class="field__input" name="location" value="{{ old('location') }}" required placeholder="Town, landmark, or GPS description">
            </label>
            <label class="field">
                <span class="field__label">Description *</span>
                <textarea class="field__input" name="description" rows="4" required>{{ old('description') }}</textarea>
            </label>
            <button type="submit" class="btn btn--primary">Submit tip</button>
        </form>
        <aside class="panel panel--muted">
            <h2>Emergency first</h2>
            <p>Life-threatening situations: call <strong>112</strong> or <strong>191</strong> before using this form.</p>
            <p><a href="{{ route('admin.incidents') }}" class="text-link">View admin incident inbox</a></p>
        </aside>
    </div>
</section>
@endsection
