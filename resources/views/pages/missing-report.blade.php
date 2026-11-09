@extends('layouts.ghana')
@section('title', 'Report missing person')
@section('content')
<div class="page-head wrap">
    <h1>Report a missing person</h1>
    <p class="page-head__lead">Submissions are reviewed by editors before they appear publicly.</p>
</div>
<section class="section">
    <div class="wrap form-layout">
        <form class="form panel" method="post" action="{{ route('missing.report.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="banner banner--info">Always contact <strong>Ghana Police 191</strong> immediately in an emergency.</div>
            <label class="field">
                <span class="field__label">Full name *</span>
                <input class="field__input" name="name" value="{{ old('name') }}" required>
            </label>
            <div class="field-row">
                <label class="field">
                    <span class="field__label">Age</span>
                    <input class="field__input" name="age" type="number" min="0" value="{{ old('age') }}">
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
            </div>
            <label class="field">
                <span class="field__label">Last seen location &amp; date *</span>
                <textarea class="field__input" name="last_seen" rows="3" required>{{ old('last_seen') }}</textarea>
            </label>
            <label class="field">
                <span class="field__label">Your contact phone *</span>
                <input class="field__input" name="phone" type="tel" value="{{ old('phone') }}" required>
            </label>
            <label class="field">
                <span class="field__label">Photo (optional)</span>
                <input class="field__input" name="photo" type="file" accept="image/*">
            </label>
            <label class="field field--check">
                <input type="checkbox" name="confirm" value="1" required @checked(old('confirm'))>
                <span>I confirm this report is made in good faith and understand it will be moderated.</span>
            </label>
            <button type="submit" class="btn btn--primary">Submit for review</button>
        </form>
        <aside class="panel panel--muted">
            <h2>What happens next</h2>
            <ol class="steps">
                <li>Editors verify against public police statements when possible.</li>
                <li>Approved listings show a “verified” badge.</li>
                <li>Rejected or duplicate reports are not published.</li>
            </ol>
            <p><a href="{{ route('admin.missing') }}" class="text-link">Admin queue</a> (demo)</p>
        </aside>
    </div>
</section>
@endsection
