# Mobile & PWA demo guide

GhanaDisaster.com ships as a **responsive website** plus a **Progressive Web App (PWA)** so phones can install it to the home screen and use a lightweight offline fallback.

## What was added

| Asset | Purpose |
|-------|---------|
| `public/manifest.webmanifest` | App name, colors, icons, shortcuts (Alert map, Report tip, Helplines) |
| `public/icons/*.png` | 192 / 512 / Apple touch icons |
| `public/sw.js` | Caches static assets + shows `offline.html` when navigation fails |
| `public/js/pwa-install.js` | Service worker registration + install banner |
| Layout meta + banner | `standalone` display, iOS “Add to Home Screen” hint |

Admin routes (`/admin/*`) do **not** register the service worker or show the install banner.

## Run locally

```bash
php artisan serve
```

Open **http://127.0.0.1:8000** on your phone or emulator.

> **HTTPS:** Install prompts on real devices usually require **HTTPS** (or `localhost`). LAN IP over plain HTTP works for browsing; **Install** may only appear on Android Chrome when criteria are met, or after deploying with TLS.

## Demo on a real phone (same Wi‑Fi)

1. On your PC, find your LAN IP (Windows: `ipconfig` → IPv4, e.g. `192.168.1.42`).
2. Start the server bound to all interfaces:

   ```bash
   php artisan serve --host=0.0.0.0 --port=8000
   ```

3. Allow **Windows Firewall** inbound TCP **8000** if the phone cannot connect.
4. On the phone browser: `http://192.168.1.42:8000`

### Suggested 5‑minute demo script

1. **Home** — EAS strip, scroll tiles, tap a **helpline** card (starts a call on a real phone).
2. **Menu (☰)** — **Alert map** — pinch/zoom, tap an alert in the list.
3. **Report tip** — submit a short incident (validation + success flash).
4. **Install** — if the green bottom bar appears, tap **Install** (Android Chrome) or follow **Share → Add to Home Screen** (iOS Safari).
5. Open the **home screen icon** — note full-screen chrome and Ghana green theme color.
6. Optional: on laptop, show **`/api/alerts`** JSON as the future native-app feed.

## Remote demo (HTTPS tunnel)

For mentors or clients off your Wi‑Fi, expose the dev server with a tunnel (examples):

```bash
# Terminal 1
php artisan serve --host=127.0.0.1 --port=8000

# Terminal 2 — pick one tool you have installed
ngrok http 8000
# or: cloudflared tunnel --url http://localhost:8000
```

Share the **https://** URL. PWAs and install prompts work best on that link.

## Chrome DevTools (backup recording)

1. Open the site in Chrome → F12 → **Toggle device toolbar**.
2. Choose **Pixel** or **iPhone**.
3. Record the tab (⋮ → Save / share → Save video).

## Verify PWA pieces

| Check | How |
|-------|-----|
| Manifest | DevTools → **Application** → **Manifest** |
| Service worker | **Application** → **Service workers** → `/sw.js` |
| Offline fallback | DevTools → **Network** → **Offline** → reload a page you have not visited → expect cached pages or `/offline.html` |
| Shortcuts | Long-press installed icon (Android) or use app icon context menu where supported |

## Production notes (students)

- Serve the site over **HTTPS** with a real domain.
- Bump `CACHE` in `public/sw.js` when static assets change.
- Expand JSON APIs (`/api/bulletins`, `/api/roads`) before building React Native / Flutter clients.
- Push notifications require a backend worker + VAPID keys (future backlog item).

Footer **Powered by [Codyza.com](https://codyza.com)** must remain on all public pages, including installed PWA mode.
