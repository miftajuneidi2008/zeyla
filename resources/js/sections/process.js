import gsap from 'gsap';

export function initProcess() {
    const root = document.querySelector('[data-process]');
    const fill = root?.querySelector('[data-process-fill]');
    if (!root || !fill) return;

    const steps = [...root.querySelectorAll('[data-step]')];
    const last = steps.length - 1;

    const mm = gsap.matchMedia();

    mm.add({ wide: '(min-width: 768px)', reduce: '(prefers-reduced-motion: reduce)' }, (ctx) => {
        const { wide, reduce } = ctx.conditions;
        if (reduce) return; // stays fully lit, no scroll effect

        root.classList.add('is-ready'); // steps start dimmed, the line lights them up

        gsap.set(fill, wide
            ? { scaleX: 0, transformOrigin: 'left center' }
            : { scaleY: 0, transformOrigin: 'center top' });

        gsap.to(fill, {
            ...(wide ? { scaleX: 1 } : { scaleY: 1 }),
            ease: 'none',
            scrollTrigger: {
                trigger: root,
                start: wide ? 'top 80%' : 'top 65%',
                end: wide ? 'bottom 45%' : 'bottom 60%',
                scrub: true,
                onUpdate: ({ progress }) => {
                    steps.forEach((step, i) =>
                        step.classList.toggle('is-active', progress > 0 && progress >= i / last - 0.001)
                    );
                },
            },
        });

        return () => root.classList.remove('is-ready');
    });
}
