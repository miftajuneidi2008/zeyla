import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

export function initServices() {
    const cards = gsap.utils.toArray('.svc');
    if (!cards.length) return;

    // Pointer light on each card (sets a CSS variable only)
    cards.forEach((card) => {
        card.addEventListener('pointermove', (e) => {
            const r = card.getBoundingClientRect();
            card.style.setProperty('--mx', `${e.clientX - r.left}px`);
            card.style.setProperty('--my', `${e.clientY - r.top}px`);
        });
    });

    const mm = gsap.matchMedia();

    mm.add('(prefers-reduced-motion: no-preference)', () => {
        gsap.from('[data-services-head] > *', {
            y: 24, opacity: 0, duration: 0.8, stagger: 0.1, ease: 'power3.out',
            scrollTrigger: { trigger: '#services', start: 'top 75%', once: true },
        });

        gsap.set(cards, { opacity: 0, y: 48 });

        // Cards rise in row by row; then each illustration builds itself
        ScrollTrigger.batch(cards, {
            start: 'top 90%',
            once: true,
            onEnter: (batch) => {
                gsap.to(batch, { opacity: 1, y: 0, duration: 0.9, ease: 'power3.out', stagger: 0.14, clearProps: 'transform' });

                batch.forEach((card, i) => {
                    const delay = i * 0.14 + 0.3;
                    gsap.from(card.querySelectorAll('.pop'), {
                        scale: 0, opacity: 0, transformOrigin: '50% 50%',
                        duration: 0.55, ease: 'back.out(2.2)', stagger: 0.07, delay,
                    });
                    gsap.from(card.querySelectorAll('.grow'), {
                        scaleY: 0, transformOrigin: '50% 100%',
                        duration: 0.7, ease: 'power3.out', stagger: 0.08, delay,
                    });
                });
            },
        });
    });
}
