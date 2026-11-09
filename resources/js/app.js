import '../css/ghana-disaster.css';

function initClock() {
    const el = document.querySelector('[data-clock]');
    if (!el) return;

    const tick = () => {
        const now = new Date();
        const parts = new Intl.DateTimeFormat('en-GB', {
            timeZone: 'Africa/Accra',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false,
        }).formatToParts(now);
        const get = (type) => parts.find((p) => p.type === type)?.value ?? '--';
        el.textContent = `${get('hour')}:${get('minute')}:${get('second')}`;
    };

    tick();
    setInterval(tick, 1000);
}

function initMobileNav() {
    const toggle = document.getElementById('navToggle');
    const nav = document.getElementById('primaryNav');
    if (!toggle || !nav) return;

    toggle.addEventListener('click', () => {
        const open = nav.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initClock();
    initMobileNav();
});
