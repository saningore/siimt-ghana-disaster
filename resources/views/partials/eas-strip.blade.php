@php
    $eas = $siteConfig ?? [];
    $severity = $eas['eas_severity'] ?? 'moderate';
@endphp
<div class="eas @if($severity === 'moderate') eas--moderate @elseif($severity === 'minor') eas--minor @else eas--severe @endif" role="status" aria-live="polite">
    <div class="wrap eas__inner">
        <span class="eas__badge">Active alert</span>
        <span class="eas__msg">{{ $eas['eas_message'] ?? 'Monitoring — no active national alert' }}</span>
        <a class="eas__link" href="{{ route('alerts') }}">Alert map →</a>
    </div>
</div>
