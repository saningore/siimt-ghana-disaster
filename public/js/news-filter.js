document.addEventListener('DOMContentLoaded', () => {
    const chips = document.querySelectorAll('[data-filter]');
    const cards = document.querySelectorAll('#newsGrid [data-severity]');
    if (!chips.length) return;

    chips.forEach((chip) => {
        chip.addEventListener('click', () => {
            chips.forEach((c) => c.classList.remove('is-active'));
            chip.classList.add('is-active');
            const filter = chip.dataset.filter;
            cards.forEach((card) => {
                card.hidden = filter !== 'all' && card.dataset.severity !== filter;
            });
        });
    });
});
