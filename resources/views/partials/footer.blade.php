<footer class="site-footer">
    <div class="wrap site-footer__grid">
        <div>
            <p class="site-footer__brand">GHANADISASTER<span class="brand__dot">.com</span></p>
            <p class="site-footer__about">
                An <strong>independent civic information service</strong>. This is not an official website of the Government of Ghana.
                Verify critical information with NADMO, GMet, Ghana Police, and other official sources before you act.
            </p>
        </div>
        <div>
            <h2 class="site-footer__heading">Sections</h2>
            <ul class="site-footer__links">
                <li><a href="{{ route('alerts') }}">Alert map</a></li>
                <li><a href="{{ route('missing') }}">Missing persons</a></li>
                <li><a href="{{ route('relief') }}">Relief &amp; resources</a></li>
                <li><a href="{{ route('history') }}">History</a></li>
            </ul>
        </div>
        <div>
            <h2 class="site-footer__heading">Official links</h2>
            <ul class="site-footer__links">
                <li><a href="https://nadmo.gov.gh/" target="_blank" rel="noopener">NADMO</a></li>
                <li><a href="https://www.meteo.gov.gh/" target="_blank" rel="noopener">GMet</a></li>
                <li><a href="https://www.highways.gov.gh/" target="_blank" rel="noopener">Ghana Highway Authority</a></li>
                <li><a href="https://police.gov.gh/" target="_blank" rel="noopener">Ghana Police</a></li>
            </ul>
        </div>
        <div>
            <h2 class="site-footer__heading">About</h2>
            <ul class="site-footer__links">
                <li><a href="{{ route('about') }}">About this service</a></li>
                <li><a href="{{ route('data-sources') }}">Data sources</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('privacy') }}">Privacy</a></li>
            </ul>
        </div>
    </div>
    <div class="wrap site-footer__bar">
        <span>© {{ date('Y') }} GhanaDisaster.com · Civic information service</span>
        <span class="site-footer__verify">Data provisional · Confirm with official sources</span>
    </div>
    <div class="ghana-stripe" aria-hidden="true"></div>
    <div class="site-footer__powered">
        <a href="https://codyza.com" target="_blank" rel="noopener" class="powered-by" title="Codyza.com">
            Powered by <strong>Codyza.com</strong>
        </a>
    </div>
</footer>
