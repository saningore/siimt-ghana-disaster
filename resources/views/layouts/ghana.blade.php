<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'GhanaDisaster.com — independent disaster information and emergency awareness for Ghana.')">
    <meta name="theme-color" content="#006B3F">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="GhanaDisaster">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="apple-touch-icon" href="{{ asset('icons/apple-touch-icon.png') }}">
    <title>@yield('title', 'Ghana Disaster Alerts') · GhanaDisaster.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/ghana-disaster.css', 'resources/js/app.js'])
    @else
        <link rel="stylesheet" href="{{ asset('css/ghana-disaster.css') }}">
    @endif
    @stack('head')
</head>
<body @class(['page-admin' => request()->routeIs('admin.*')])>
<a class="skip-link" href="#main">Skip to content</a>

@include('partials.header')

@if (!request()->routeIs('admin.*'))
    @include('partials.eas-strip')
@endif

<main id="main" class="site-main">
    @include('partials.flash')
    @yield('content')
</main>

@include('partials.footer')

@if (!request()->routeIs('admin.*'))
    @include('partials.pwa-install-banner')
@endif

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@if (!file_exists(public_path('build/manifest.json')) && !file_exists(public_path('hot')))
    <script src="{{ asset('js/app.js') }}" defer></script>
@endif
@if (!request()->routeIs('admin.*'))
    <script src="{{ asset('js/pwa-install.js') }}" defer></script>
@endif
@stack('scripts')
</body>
</html>
