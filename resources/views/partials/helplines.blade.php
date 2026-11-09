<section class="section section--helplines" id="helplines" aria-labelledby="helplines-heading">
    <div class="wrap">
        <header class="section-head section-head--center">
            <h2 id="helplines-heading">Emergency helplines</h2>
            <p class="section-head__sub">Tap to call on mobile · Verify numbers periodically against official sources</p>
        </header>
        <div class="helpline-grid">
            @foreach ($helplines as $line)
                <a class="helpline-card" href="tel:{{ preg_replace('/\s+/', '', $line['number']) }}">
                    <span class="helpline-card__cat">{{ $line['category'] }}</span>
                    <span class="helpline-card__name">{{ $line['name'] }}</span>
                    <span class="helpline-card__num mono">{{ $line['number'] }}</span>
                    <span class="helpline-card__note">{{ $line['note'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
