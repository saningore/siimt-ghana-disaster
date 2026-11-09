<nav class="admin-nav" aria-label="Admin">
    <a href="{{ route('admin.dashboard') }}" @class(['is-active' => request()->routeIs('admin.dashboard')])>Dashboard</a>
    <a href="{{ route('admin.bulletins') }}" @class(['is-active' => request()->routeIs('admin.bulletins')])>Bulletins</a>
    <a href="{{ route('admin.roads') }}" @class(['is-active' => request()->routeIs('admin.roads')])>Roads</a>
    <a href="{{ route('admin.missing') }}" @class(['is-active' => request()->routeIs('admin.missing*')])>Missing queue</a>
    <a href="{{ route('admin.incidents') }}" @class(['is-active' => request()->routeIs('admin.incidents')])>Incidents</a>
    <a href="{{ route('admin.site-config') }}" @class(['is-active' => request()->routeIs('admin.site-config*')])>Site config</a>
    <a href="{{ route('home') }}" class="admin-nav__exit">← Public site</a>
</nav>
