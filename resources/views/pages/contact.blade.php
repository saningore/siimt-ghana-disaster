@extends('layouts.ghana')
@section('title', 'Contact')
@section('content')
<div class="page-head wrap"><h1>Contact</h1></div>
<section class="section"><div class="wrap form-layout">
    <form class="form panel" method="post" action="{{ route('contact.store') }}">
        @csrf
        <label class="field"><span class="field__label">Name</span><input class="field__input" name="name" value="{{ old('name') }}" required></label>
        <label class="field"><span class="field__label">Email</span><input class="field__input" name="email" type="email" value="{{ old('email') }}" required></label>
        <label class="field"><span class="field__label">Message</span><textarea class="field__input" name="message" rows="5" required>{{ old('message') }}</textarea></label>
        <button class="btn btn--primary" type="submit">Send</button>
    </form>
</div></section>
@endsection
