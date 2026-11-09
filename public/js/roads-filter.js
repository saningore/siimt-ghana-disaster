document.addEventListener('DOMContentLoaded', () => {
    const chips = document.querySelectorAll('[data-road-filter]');
    const items = document.querySelectorAll('#roadList [data-status]');
    if (!chips.length) return;

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            chips.forEach((c) => c.classList.remove('is-active'));
            chip.classList.add('is-active');
            const filter = chip.dataset.roadFilter;
            items.forEach((item) => {
                item.hidden = filter !== 'all' && item.dataset.status !== filter;
            });
        });
    });
});
