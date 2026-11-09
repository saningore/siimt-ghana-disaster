@php
    $nav = [
        ['route' => 'home', 'label' => 'Home'],
        ['route' => 'weather', 'label' => 'Weather'],
        ['route' => 'alerts', 'label' => 'Alert Map'],
        ['route' => 'news', 'label' => 'News'],
        ['route' => 'situation', 'label' => 'Situation'],
        ['route' => 'missing', 'label' => 'Missing'],
        ['route' => 'incident.report', 'label' => 'Report tip'],
        ['route' => 'roads', 'label' => 'Roads'],
        ['route' => 'history', 'label' => 'History'],
        ['route' => 'relief', 'label' => 'Relief'],
    ];
@endphp
<div class="ghana-stripe" aria-hidden="true"></div>
<header class="site-header">
    <div class="wrap site-header__row">
        <a class="brand" href="{{ route('home') }}">
            <span class="brand__mark" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none"><path d="M12 2 3 6v6c0 5 3.8 8.4 9 10 5.2-1.6 9-5 9-10V6l-9-4Z" stroke="#fff" stroke-width="1.6"/><path d="M12 7v6M12 16h.01" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
            </span>
            <span class="brand__text">
                <span class="brand__name">GHANADISASTER<span class="brand__dot">.com</span></span>
                <span class="brand__sub">Independent Emergency Information Service</span>
            </span>
        </a>
        <div class="site-header__tools">
            <div class="clock" aria-live="off">
                <span class="clock__label">GMT · Accra</span>
                <span class="clock__value mono" data-clock>--:--:--</span>
            </div>
            <button type="button" class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="primaryNav">
                <span class="sr-only">Menu</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
            </button>
        </div>
    </div>
    <nav class="site-nav" id="primaryNav" aria-label="Primary">
        <div class="wrap">
            <ul class="site-nav__list">
                @foreach ($nav as $item)
                    <li>
                        <a href="{{ route($item['route']) }}" @class(['is-active' => request()->routeIs($item['route']) || request()->routeIs($item['route'].'.*')])>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
                <li class="site-nav__admin">
                    <a href="{{ route('admin.dashboard') }}">Admin</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
