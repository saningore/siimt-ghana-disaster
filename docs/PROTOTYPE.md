# GhanaDisaster.com — UI prototype

This Laravel app ships a **clickable UI prototype** with sample data in `App\Data\PrototypeData`.

## Run locally

```bash
composer install
cp .env.example .env   # if needed
php artisan key:generate
php artisan config:clear
php artisan serve
```

Open **http://127.0.0.1:8000** (not the project folder path in the browser).

**Mobile / install demo:** see [MOBILE-DEMO.md](./MOBILE-DEMO.md) (LAN access, PWA install, offline shell).

### Blank page or 500 error?

Laravel 12 defaults to `SESSION_DRIVER=database`, which requires PDO (SQLite/MySQL). On XAMPP/WAMP, enable **pdo_sqlite** or **pdo_mysql**, **or** use file sessions (already set in this repo’s `.env`):

```
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Then run: `php artisan config:clear`

### CSS looks unstyled?

Run `npm install && npm run build`, or rely on fallback assets in `public/css/ghana-disaster.css`.

Optional (Vite dev):

```bash
npm install
npm run dev
```

Or production assets:

```bash
npm run build
```

Without Node, static CSS/JS in `public/css` and `public/js` are used automatically.

After changing Vite entries in `vite.config.js`, run `npm run build` so `@vite()` pages (e.g. `/weather`) do not 500 when `public/build/manifest.json` is stale.

## Interactive demo (session-backed)

No MySQL required — `App\Data\DemoStore` keeps demo state in the session:

| Flow | How to try |
|------|------------|
| Missing persons | Submit `/missing/report` → **Admin → Missing queue** → Approve → entry appears on `/missing` |
| Incident tip | `/incident/report` → **Admin → Incidents** |
| Site banner / EAS | **Admin → Site config** → save → refresh home (shared via view composer) |
| Contact | `/contact` form → flash success |
| Alerts JSON | `GET /api/alerts` |
| Filters | News & roads filter chips; history region chips; weather city selector; alert list clicks map |

## Pages

| URL | Purpose |
|-----|---------|
| `/` | Home, EAS strip, bulletins, roads, helplines |
| `/weather` | GMet warnings + city forecast switcher + Windy embed |
| `/alerts` | Leaflet map + alert list (click list to fly map) |
| `/news`, `/news/{slug}` | Bulletins + severity filters |
| `/roads` | Highway status + status filters |
| `/situation` | Sourced situation metrics + timeline |
| `/missing`, `/missing/report` | Verified list + public report form |
| `/incident/report` | Anonymous incident tip form |
| `/rescue`, `/relief`, `/history` | Information pages (history chart datasets) |
| `/about`, `/data-sources`, `/contact`, `/privacy` | Trust & meta |
| `/admin/*` | Admin UI mock (no auth yet) |
| `/api/alerts` | JSON alert feed for integrations |

## Student tasks

Replace `PrototypeData` with MySQL models, GMet CAP ingest (`GH-L015`), and admin CRUD per the Laravel backlog (`GH-L*` issues).

Footer **Powered by Codyza.com** is required in production.
