@extends('layouts.ghana')
@section('title', 'Rescue information')
@section('content')
<div class="page-head wrap">
    <h1>Rescue &amp; response information</h1>
    <p class="page-head__lead">Coordination overview — not a live rescue headcount unless NADMO publishes one.</p>
</div>
<section class="section">
    <div class="wrap cols-2">
        <article class="panel panel--prose">
            <h2>NADMO Urban Search &amp; Rescue</h2>
            <p>NADMO operates a 24/7 Emergency Operations Centre and Urban Search &amp; Rescue units. During major events, follow official NADMO and security service channels.</p>
            <ul>
                <li>Report life-threatening emergencies: <strong>112</strong> or <strong>191</strong></li>
                <li>Disaster coordination: NADMO hotlines on the <a href="{{ route('home') }}#helplines">helplines page</a></li>
            </ul>
        </article>
        <article class="panel panel--prose">
            <h2>If you are trapped or in immediate danger</h2>
            <ol class="steps">
                <li>Call 112 or 191 and share landmark or digital address if known.</li>
                <li>Move to highest ground in flood situations if safe to do so.</li>
                <li>Do not drive through flooded roads.</li>
                <li>Signal rescue aircraft only as directed by officials.</li>
            </ol>
        </article>
    </div>
</section>
@endsection
