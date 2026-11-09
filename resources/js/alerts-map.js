function severityColor(severity) {
    if (severity === 'severe' || severity === 'danger') return '#ce1126';
    if (severity === 'moderate' || severity === 'watch') return '#fcd116';
    return '#006b3f';
}

function countAlertsForRegion(regionName, alerts) {
    return alerts.filter((a) => a.areas.some((area) => area.toLowerCase().includes(regionName.toLowerCase()) || regionName.toLowerCase().includes(area.toLowerCase()))).length;
}

function findRegionForAlert(alert, regions) {
    const area = alert.areas?.[0];
    if (!area) return null;
    return regions.find((r) => r.name.toLowerCase().includes(area.toLowerCase()) || area.toLowerCase().includes(r.name.toLowerCase()));
}

document.addEventListener('DOMContentLoaded', () => {
    const data = window.GHANA_ALERT_MAP;
    const mapEl = document.getElementById('alertMap');
    if (!data || !mapEl || typeof L === 'undefined') return;

    const map = L.map(mapEl, { scrollWheelZoom: true }).setView([7.946, -1.023], 6.5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '&copy; OpenStreetMap',
    }).addTo(map);

    const regionLayers = {};

    data.regions.forEach((region) => {
        const hits = countAlertsForRegion(region.name, data.alerts);
        const radius = 22000 + hits * 18000;
        const color = hits > 0 ? severityColor(data.alerts[0]?.severity) : '#94a3b8';

        const circle = L.circle([region.lat, region.lng], {
            radius,
            color,
            fillColor: color,
            fillOpacity: hits > 0 ? 0.35 : 0.08,
            weight: hits > 0 ? 2 : 1,
        }).addTo(map);

        circle.bindPopup(
            `<strong>${region.name}</strong><br>${hits ? `${hits} active watch(es)` : 'No active alert'}<br><small>Approximate centroid — not official boundary</small>`,
        );
        regionLayers[region.name] = circle;
    });

    document.querySelectorAll('[data-alert-id]').forEach((item, index) => {
        const alert = data.alerts[index];
        if (!alert) return;

        item.style.cursor = 'pointer';
        item.addEventListener('click', () => {
            document.querySelectorAll('[data-alert-id]').forEach((el) => el.classList.remove('is-highlight'));
            item.classList.add('is-highlight');
            const region = findRegionForAlert(alert, data.regions);
            if (region) {
                map.flyTo([region.lat, region.lng], 8, { duration: 0.8 });
                regionLayers[region.name]?.openPopup();
            }
        });
    });
});
