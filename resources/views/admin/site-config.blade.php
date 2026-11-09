@extends('layouts.ghana')
@section('title', 'Admin · Site config')
@section('content')
<div class="page-head wrap"><h1>Site configuration</h1></div>
<section class="section"><div class="wrap form-layout">
    @include('admin.partials.nav')
    <form class="form panel" method="post" action="{{ route('admin.site-config.store') }}">
        @csrf
        <label class="field"><span class="field__label">Mode</span>
            <select class="field__input" name="mode">
                <option value="monitoring" @selected($config['mode'] === 'monitoring')>monitoring</option>
                <option value="active_event" @selected($config['mode'] === 'active_event')>active_event</option>
            </select>
        </label>
        <label class="field"><span class="field__label">EAS severity</span>
            <select class="field__input" name="eas_severity">
                @foreach (['minor', 'moderate', 'severe'] as $sev)
                    <option value="{{ $sev }}" @selected(($config['eas_severity'] ?? '') === $sev)>{{ $sev }}</option>
                @endforeach
            </select>
        </label>
        <label class="field"><span class="field__label">EAS message</span>
            <input class="field__input" name="eas_message" value="{{ old('eas_message', $config['eas_message']) }}" required>
        </label>
        <label class="field"><span class="field__label">Hero title</span>
            <input class="field__input" name="hero_title" value="{{ old('hero_title', $config['hero_title']) }}" required>
        </label>
        <label class="field"><span class="field__label">Hero region line</span>
            <input class="field__input" name="hero_region" value="{{ old('hero_region', $config['hero_region']) }}" required>
        </label>
        <button type="submit" class="btn btn--primary">Save configuration</button>
    </form>
</div></section>
@endsection
