const DISMISS_KEY = 'ghana_pwa_install_dismissed';

function isStandalone() {
    return (
        window.matchMedia('(display-mode: standalone)').matches ||
        window.navigator.standalone === true
    );
}

function isIos() {
    return /iphone|ipad|ipod/i.test(window.navigator.userAgent);
}

function showBanner() {
    const banner = document.getElementById('pwaInstallBanner');
    if (!banner) return;
    banner.hidden = false;
    banner.classList.add('is-visible');
}

function hideBanner(persist = false) {
    const banner = document.getElementById('pwaInstallBanner');
    if (!banner) return;
    banner.hidden = true;
    banner.classList.remove('is-visible');
    if (persist) {
        try {
            localStorage.setItem(DISMISS_KEY, '1');
        } catch {
            /* ignore */
        }
    }
}

function wasDismissed() {
    try {
        return localStorage.getItem(DISMISS_KEY) === '1';
    } catch {
        return false;
    }
}

function registerServiceWorker() {
    if (!('serviceWorker' in navigator)) {
        return;
    }

    window.addEventListener('load', () => {
        navigator.serviceWorker.register('/sw.js').catch(() => {
            /* registration optional in local HTTP demos */
        });
    });
}

function initInstallPrompt() {
    if (isStandalone() || wasDismissed()) {
        return;
    }

    let deferredPrompt = null;
    const installBtn = document.getElementById('pwaInstallBtn');
    const iosHint = document.getElementById('pwaIosHint');

    if (isIos() && iosHint) {
        iosHint.hidden = false;
        showBanner();
    }

    window.addEventListener('beforeinstallprompt', (event) => {
        event.preventDefault();
        deferredPrompt = event;
        if (iosHint) iosHint.hidden = true;
        showBanner();
    });

    installBtn?.addEventListener('click', async () => {
        if (!deferredPrompt) return;
        deferredPrompt.prompt();
        await deferredPrompt.userChoice;
        deferredPrompt = null;
        hideBanner(true);
    });

    document.getElementById('pwaInstallDismiss')?.addEventListener('click', () => hideBanner(true));
}

document.addEventListener('DOMContentLoaded', () => {
    registerServiceWorker();
    initInstallPrompt();
});
