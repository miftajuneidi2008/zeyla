import gsap from "gsap";

export function initHero() {
    const pixelLayer = document.getElementById("hero-pixels");
    if (!pixelLayer) return;

    /* Pixels that resolve into circuit lines, echoing the Zeyla "Z" mark */
    const pixels = [];
    const cols = 10,
        rows = 16,
        step = 22,
        top = 30;

    for (let c = 0; c < cols; c++) {
        for (let r = 0; r < rows; r++) {
            const density = Math.pow(c / (cols - 1), 1.5);
            if (Math.random() > density * 0.9 + 0.04) continue;

            const size = 5 + density * 9;
            const rect = document.createElementNS(
                "http://www.w3.org/2000/svg",
                "rect",
            );
            rect.setAttribute("x", c * step + (14 - size) / 2);
            rect.setAttribute("y", top + r * step + (14 - size) / 2);
            rect.setAttribute("width", size);
            rect.setAttribute("height", size);
            rect.setAttribute("rx", 1.5);
            rect.setAttribute("fill", "#2563EB");
            rect.setAttribute("opacity", 0.25 + density * 0.75);
            pixelLayer.appendChild(rect);
            pixels.push(rect);
        }
    }

    const mm = gsap.matchMedia();

    mm.add("(prefers-reduced-motion: no-preference)", () => {
        // One orchestrated page-load sequence
        gsap.timeline({ defaults: { ease: "power3.out" } })
            .fromTo(
                "[data-hero-item]",
                { y: 28, opacity: 0 },
                { y: 0, opacity: 1, duration: 0.9, stagger: 0.12 },
            )
            .from(
                pixels,
                {
                    opacity: 0,
                    scale: 0.4,
                    transformOrigin: "center",
                    duration: 0.6,
                    stagger: { each: 0.004, from: "end" },
                },
                0.2,
            )
            .fromTo(
                ".trace-base",
                { strokeDashoffset: 1 },
                {
                    strokeDashoffset: 0,
                    duration: 1.6,
                    stagger: 0.15,
                    ease: "power2.inOut",
                },
                0.5,
            )
            .fromTo(
                "#hero-arc",
                { strokeDashoffset: 1 },
                { strokeDashoffset: 0, duration: 2, ease: "power2.inOut" },
                0.3,
            )
            .from(
                ".trace-node",
                {
                    scale: 0,
                    transformOrigin: "center",
                    duration: 0.5,
                    stagger: 0.12,
                    ease: "back.out(2.5)",
                },
                1.5,
            )
            .to(
                ".trace-flow",
                { opacity: 1, duration: 0.6, stagger: 0.2 },
                1.8,
            );

        // Pixels keep shimmering quietly
        pixels.forEach((p) => {
            if (Math.random() > 0.35) return;
            gsap.to(p, {
                opacity: 0.1,
                duration: 1 + Math.random() * 2,
                repeat: -1,
                yoyo: true,
                delay: Math.random() * 3,
                ease: "sine.inOut",
            });
        });
    });
}
