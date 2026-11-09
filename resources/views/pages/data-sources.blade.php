@extends('layouts.ghana')
@section('title', 'Data sources')
@section('content')
<div class="page-head wrap"><h1>Data sources</h1></div>
<section class="section"><div class="wrap panel">
    <table class="data-table">
        <thead><tr><th>Domain</th><th>Source</th><th>Usage</th></tr></thead>
        <tbody>
            <tr><td>Weather warnings</td><td><a href="https://www.meteo.gov.gh/api/cap/rss.xml" target="_blank" rel="noopener">GMet CAP RSS</a></td><td>Alerts, map, EAS strip</td></tr>
            <tr><td>Forecast context</td><td>Open-Meteo</td><td>Labeled non-official forecast</td></tr>
            <tr><td>Disaster ops</td><td><a href="https://nadmo.gov.gh/" target="_blank" rel="noopener">NADMO</a></td><td>Situation snapshots (curated)</td></tr>
            <tr><td>Roads</td><td><a href="https://www.highways.gov.gh/" target="_blank" rel="noopener">GHA</a></td><td>Closures & diversions</td></tr>
            <tr><td>History</td><td>DesInventar / EM-DAT</td><td>Charts & archives</td></tr>
        </tbody>
    </table>
</div></section>
@endsection
