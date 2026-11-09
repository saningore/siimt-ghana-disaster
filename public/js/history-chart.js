let chartInstance;

function buildChart(payload, key) {
    const canvas = document.getElementById('historyChart');
    const sourceEl = document.getElementById('historySource');
    if (!canvas || !payload || typeof Chart === 'undefined') return;

    const dataset = payload.datasets[key] || payload.datasets[payload.defaultKey || 'all'];
    if (!dataset) return;

    if (sourceEl) sourceEl.textContent = dataset.source || '';

    if (chartInstance) chartInstance.destroy();

    chartInstance = new Chart(canvas, {
        type: 'bar',
        data: {
            labels: dataset.labels,
            datasets: [
                {
                    label: 'Flood events',
                    data: dataset.floods,
                    backgroundColor: 'rgba(206, 17, 38, 0.78)',
                },
                {
                    label: 'Storm events',
                    data: dataset.storms,
                    backgroundColor: 'rgba(0, 107, 63, 0.75)',
                },
            ],
        },
        options: {
            responsive: true,
            plugins: { legend: { position: 'bottom' } },
            scales: {
                y: { beginAtZero: true, title: { display: true, text: 'Recorded events' } },
            },
        },
    });
}

document.addEventListener('DOMContentLoaded', () => {
    const payload = window.GHANA_HISTORY;
    if (!payload) return;

    buildChart(payload, payload.defaultKey || 'all');

    document.querySelectorAll('[data-dataset]').forEach((btn) => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('[data-dataset]').forEach((b) => b.classList.remove('is-active'));
            btn.classList.add('is-active');
            buildChart(payload, btn.dataset.dataset);
        });
    });
});
