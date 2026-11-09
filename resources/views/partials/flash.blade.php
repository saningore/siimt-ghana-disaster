@if (session('success'))
    <div class="wrap flash flash--success" role="status">{{ session('success') }}</div>
@endif
@if (session('error'))
    <div class="wrap flash flash--error" role="alert">{{ session('error') }}</div>
@endif
@if ($errors->any())
    <div class="wrap flash flash--error" role="alert">
        <ul class="flash__list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
