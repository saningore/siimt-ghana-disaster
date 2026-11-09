@php
    $map = [
        'danger' => ['label' => 'Danger', 'class' => 'sev--danger'],
        'watch' => ['label' => 'Watch', 'class' => 'sev--watch'],
        'info' => ['label' => 'Info', 'class' => 'sev--info'],
        'moderate' => ['label' => 'Moderate', 'class' => 'sev--watch'],
        'minor' => ['label' => 'Minor', 'class' => 'sev--info'],
        'severe' => ['label' => 'Severe', 'class' => 'sev--danger'],
    ];
    $s = $map[$severity] ?? $map['info'];
@endphp
<span class="sev {{ $s['class'] }}">{{ $s['label'] }}</span>
