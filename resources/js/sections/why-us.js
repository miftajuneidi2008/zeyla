import gsap from "gsap";

export function initWhyUs() {
    const section = document.getElementById("why-us");
    if (!section) return;

    const cards = gsap.utils.toArray("[data-why-item]", section);
    const icons = gsap.utils.toArray("[data-why-icon]", section);

    // Cursor spotlight: the glow follows the pointer inside each card.
    // This answers the visitor's own action, so it is not tied to reduced-motion.
    cards.forEach((card) => {
        card.addEventListener("pointermove", (e) => {
            const rect = card.getBoundingClientRect();
            card.style.setProperty("--mx", `${e.clientX - rect.left}px`);
            card.style.setProperty("--my", `${e.clientY - rect.top}px`);
        });
    });

    // One scroll-in sequence: heading, teal rule, cards, then icons.
    const mm = gsap.matchMedia();

    mm.add("(prefers-reduced-motion: no-preference)", () => {
        const tl = gsap.timeline({
            defaults: { ease: "power3.out" },
            scrollTrigger: { trigger: section, start: "top 70%", once: true },
        });

        tl.from("[data-why-head]", { y: 28, opacity: 0, duration: 0.9 })
            .from(
                "[data-why-rule]",
                {
                    scaleX: 0,
                    transformOrigin: "left center",
                    duration: 1,
                    ease: "power2.inOut",
                },
                "-=0.5",
            )
            .from(
                cards,
                {
                    y: 40,
                    opacity: 0,
                    duration: 0.9,
                    stagger: 0.14,
                    clearProps: "transform,opacity",
                },
                "-=0.6",
            )
            .from(
                icons,
                {
                    scale: 0.5,
                    opacity: 0,
                    duration: 0.6,
                    stagger: 0.14,
                    ease: "back.out(1.8)",
                    clearProps: "transform,opacity",
                },
                "<0.25",
            );
    });
}
