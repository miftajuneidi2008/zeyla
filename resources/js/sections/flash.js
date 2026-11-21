import gsap from "gsap";

export function initFlash() {
    const items = document.querySelectorAll("[data-flash]");
    if (!items.length) return;

    const reduce = window.matchMedia(
        "(prefers-reduced-motion: reduce)",
    ).matches;

    items.forEach((el, i) => {
        const close = () => {
            if (reduce) return el.remove();
            gsap.to(el, {
                y: -16,
                opacity: 0,
                duration: 0.3,
                ease: "power2.in",
                onComplete: () => el.remove(),
            });
        };

        if (!reduce) {
            gsap.from(el, {
                y: -24,
                opacity: 0,
                duration: 0.5,
                delay: i * 0.1,
                ease: "power3.out",
            });
        }

        el.querySelector("[data-flash-close]")?.addEventListener(
            "click",
            close,
        );

        // Errors stay until the visitor closes them; other messages leave by themselves.
        if (el.dataset.flash !== "error") {
            setTimeout(close, 6000);
        }
    });
}
