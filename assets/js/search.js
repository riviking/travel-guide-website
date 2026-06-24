(function () {
    function setupSearch(inputId, gridId, clearId, emptyId) {
        const input = document.getElementById(inputId);
        const grid = document.getElementById(gridId);
        const clearButton = document.getElementById(clearId);
        const emptyMessage = document.getElementById(emptyId);

        if (!input || !grid) {
            return;
        }

        const cards = Array.from(grid.querySelectorAll('.card'));

        function filterCards() {
            const query = input.value.trim().toLowerCase();
            let visibleCount = 0;

            cards.forEach(card => {
                const searchableText = `${card.dataset.name || ''} ${card.textContent || ''}`.toLowerCase();
                const isVisible = searchableText.includes(query);

                card.hidden = false;
                card.style.display = isVisible ? '' : 'none';

                if (isVisible) {
                    card.classList.add('is-visible');
                    visibleCount++;
                }
            });

            if (emptyMessage) {
                emptyMessage.style.display = visibleCount === 0 ? 'block' : 'none';
            }

            if (clearButton) {
                clearButton.style.display = query.length > 0 ? 'inline-flex' : 'none';
            }
        }

        input.addEventListener('input', filterCards);

        if (clearButton) {
            clearButton.addEventListener('click', function () {
                input.value = '';
                filterCards();
                input.focus();
            });
        }

        filterCards();
    }

    function initSearch() {
        setupSearch('placeSearch', 'placesGrid', 'clearSearch', 'noResults');
        setupSearch('countrySearch', 'countriesGrid', 'clearCountrySearch', 'noCountryResults');
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSearch);
    } else {
        initSearch();
    }
})();
