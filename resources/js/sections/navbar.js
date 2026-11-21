export function initNavbar() {
    const header = document.getElementById('site-header');
    const toggle = document.getElementById('nav-toggle');
    const mobile = document.getElementById('nav-mobile');

    // Shadow appears once the page is scrolled
    if (header) {
        const onScroll = () => (header.dataset.scrolled = window.scrollY > 12 ? 'true' : 'false');
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    // Mobile menu
    if (toggle && mobile) {
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        const setMenu = (open) => {
            mobile.classList.toggle('hidden', !open);
            iconOpen.classList.toggle('hidden', open);
            iconClose.classList.toggle('hidden', !open);
            toggle.setAttribute('aria-expanded', open);
            toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        };

        toggle.addEventListener('click', () => setMenu(mobile.classList.contains('hidden')));
        mobile.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setMenu(false)));
        document.addEventListener('keydown', (e) => e.key === 'Escape' && setMenu(false));
    }

    // Highlight the link of the section currently in view
    const links = document.querySelectorAll('[data-nav]');
    if (links.length && 'IntersectionObserver' in window) {
        const spy = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) return;
                    links.forEach((l) =>
                        l.setAttribute('aria-current', l.dataset.nav === entry.target.id ? 'true' : 'false')
                    );
                });
            },
            { rootMargin: '-45% 0px -50% 0px' }
        );
        document.querySelectorAll('section[id]').forEach((s) => spy.observe(s));
    }
}
