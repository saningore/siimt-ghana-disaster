function renderForecast(days) {
    const grid = document.getElementById('forecastGrid');
    if (!grid || !days) return;

    grid.innerHTML = days.map((day) => `
        <div class="forecast-day">
            <span class="forecast-day__name">${day.day}</span>
            <span class="forecast-day__wx">${day.wx}</span>
            <span class="forecast-day__temp mono">${day.hi}° / ${day.lo}°</span>
            <span class="forecast-day__rain">Rain ${day.rain}%</span>
        </div>
    `).join('');
}

document.addEventListener('DOMContentLoaded', () => {
    const select = document.getElementById('citySelect');
    const data = window.GHANA_FORECASTS || {};
    if (!select) return;

    const update = () => {
        const city = select.value;
        renderForecast(data[city] || data.Accra || []);
    };

    select.addEventListener('change', update);
    update();
});
