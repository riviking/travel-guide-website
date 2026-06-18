const searchInput = document.getElementById('placeSearch');
const clearBtn    = document.getElementById('clearSearch');
const cards       = document.querySelectorAll('#placesGrid .card');
const noResults   = document.getElementById('noResults');

searchInput.addEventListener('input', function () {
    const query = this.value.trim().toLowerCase();
    let visibleCount = 0;

    cards.forEach(card => {
        const name = card.getAttribute('data-name');
        if (name.includes(query)) {
            card.style.display = '';
            visibleCount++;
        } else {
            card.style.display = 'none';
        }
    });

    // Show/hide "no results" message
    noResults.style.display = visibleCount === 0 ? 'block' : 'none';

    // Show/hide clear button
    clearBtn.style.display = query.length > 0 ? 'inline' : 'none';
});

clearBtn.addEventListener('click', function () {
    searchInput.value = '';
    searchInput.dispatchEvent(new Event('input'));
    searchInput.focus();
});