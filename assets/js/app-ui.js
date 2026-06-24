(function () {
    document.documentElement.classList.add('js-enhanced');

    function showPageLoader() {
        document.body.classList.add('page-loading');
    }

    function hidePageLoader() {
        document.body.classList.remove('page-loading');
        document.body.classList.add('page-ready');
    }

    function initPageLoader() {
        const loader = document.createElement('div');
        loader.className = 'page-loader';
        loader.innerHTML = '<div class="page-loader-spinner" aria-label="Loading"></div>';
        document.body.appendChild(loader);

        window.addEventListener('load', hidePageLoader);
        setTimeout(hidePageLoader, 700);

        document.querySelectorAll('a[href]').forEach(link => {
            link.addEventListener('click', event => {
                const href = link.getAttribute('href');
                const target = link.getAttribute('target');

                if (!href || href.startsWith('#') || href.startsWith('javascript:') || target === '_blank' || event.ctrlKey || event.metaKey) {
                    return;
                }

                showPageLoader();
            });
        });

        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', showPageLoader);
        });
    }

    function initCardReveal() {
        const cards = document.querySelectorAll('.grid .card');

        if (!cards.length) {
            return;
        }

        if (!('IntersectionObserver' in window)) {
            cards.forEach(card => card.classList.add('is-visible'));
            return;
        }

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });

        cards.forEach(card => observer.observe(card));
    }

    function initImageLoadingStates() {
        document.querySelectorAll('.card img').forEach(image => {
            image.classList.add('is-loading');

            function markLoaded() {
                image.classList.remove('is-loading');
                image.classList.add('is-loaded');
            }

            if (image.complete) {
                markLoaded();
            } else {
                image.addEventListener('load', markLoaded, { once: true });
                image.addEventListener('error', markLoaded, { once: true });
            }
        });
    }

    function initAppUi() {
        [
            initPageLoader,
            initCardReveal,
            initImageLoadingStates,
        ].forEach(initFunction => {
            try {
                initFunction();
            } catch (error) {
                console.error('Travel Guide UI error:', error);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAppUi);
    } else {
        initAppUi();
    }
})();
