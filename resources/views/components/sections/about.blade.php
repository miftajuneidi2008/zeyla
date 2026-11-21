@php
    $site = config('zeyla');
    $place = collect(explode(',', $site['address']))->slice(-2)->map(fn ($p) => trim($p))->implode(', ');

    $stats = [
        [count($site['services']), 'Core services'],
        [count($site['steps']), 'Step delivery process'],
        [$place, 'Where we are based'],
    ];

@endphp

<section id="about" class="scroll-mt-24 bg-white pt-24 lg:pt-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="grid items-center gap-14 lg:grid-cols-12 lg:gap-12">

            <div class="lg:col-span-6">
                <p class="eyebrow">About us</p>
                <h2 class="mt-5 font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">Who we <span class="accent text-brand-teal-dark">are</span></h2>
                <p class="mt-6 text-lg leading-relaxed text-slate-600">
                    {{ $site['name'] }} is a software development company based in Addis Ababa. We design, build, and support websites, mobile apps, management systems, and AI automation that help organizations work faster and serve people better.
                </p>
                <p class="mt-4 text-lg leading-relaxed text-slate-600">
                    We work as an extension of your team: we listen first, build in clear steps, and stay on after launch so your systems keep running as your needs grow.
                </p>
                <a href="#contact" class="group mt-8 inline-flex items-center gap-2 font-semibold text-ink transition-colors hover:text-brand-teal-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal">
                    Start a conversation
                    <x-icon name="arrow-right" class="size-5 transition-transform duration-300 group-hover:translate-x-1" />
                </a>
            </div>

            {{-- Decorative illustration: a dashboard, a phone app and an AI node, i.e. the web, mobile and automation work we do. No real figures are shown. --}}
            <div class="lg:col-span-6" aria-hidden="true">
                <div class="mx-auto w-full max-w-xl rounded-[2rem] bg-linear-to-br from-sky-50 via-white to-teal-50 p-4 ring-1 ring-slate-900/[0.07] sm:p-6">
                    <svg viewBox="0 0 520 390" class="w-full" fill="none">
                        <defs>
                            <linearGradient id="about-bar" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0" stop-color="#4fd1d6"/>
                                <stop offset="1" stop-color="#0b8f94"/>
                            </linearGradient>
                        </defs>

                        {{-- Dashboard window --}}
                        <rect x="14" y="24" width="372" height="276" rx="20" fill="#ffffff" stroke="#0f172a" stroke-opacity=".08"/>
                        <circle cx="38" cy="48" r="4.5" fill="#cbd5e1"/>
                        <circle cx="54" cy="48" r="4.5" fill="#cbd5e1"/>
                        <circle cx="70" cy="48" r="4.5" fill="#cbd5e1"/>
                        <path d="M14 68H386" stroke="#0f172a" stroke-opacity=".06"/>

                        {{-- Sidebar --}}
                        <rect x="34" y="88" width="52" height="8" rx="4" fill="#0b8f94" fill-opacity=".85"/>
                        <rect x="34" y="112" width="40" height="8" rx="4" fill="#e2e8f0"/>
                        <rect x="34" y="136" width="46" height="8" rx="4" fill="#e2e8f0"/>
                        <rect x="34" y="160" width="36" height="8" rx="4" fill="#e2e8f0"/>

                        {{-- Summary tiles --}}
                        <rect x="112" y="84" width="84" height="46" rx="12" fill="#0b8f94" fill-opacity=".1"/>
                        <rect x="124" y="96" width="30" height="6" rx="3" fill="#0b8f94" fill-opacity=".6"/>
                        <rect x="124" y="110" width="52" height="10" rx="5" fill="#067077"/>
                        <rect x="206" y="84" width="84" height="46" rx="12" fill="#031a3d" fill-opacity=".06"/>
                        <rect x="218" y="96" width="30" height="6" rx="3" fill="#031a3d" fill-opacity=".3"/>
                        <rect x="218" y="110" width="44" height="10" rx="5" fill="#031a3d" fill-opacity=".7"/>
                        <rect x="300" y="84" width="72" height="46" rx="12" fill="#0b8f94" fill-opacity=".1"/>
                        <rect x="312" y="96" width="26" height="6" rx="3" fill="#0b8f94" fill-opacity=".6"/>
                        <rect x="312" y="110" width="40" height="10" rx="5" fill="#067077"/>

                        {{-- Bar chart --}}
                        <path d="M112 270H372" stroke="#0f172a" stroke-opacity=".08"/>
                        <path d="M112 232H372M112 194H372" stroke="#0f172a" stroke-opacity=".05" stroke-dasharray="3 5"/>
                        <rect x="124" y="236" width="24" height="34" rx="6" fill="url(#about-bar)" fill-opacity=".45"/>
                        <rect x="164" y="222" width="24" height="48" rx="6" fill="url(#about-bar)" fill-opacity=".55"/>
                        <rect x="204" y="226" width="24" height="44" rx="6" fill="url(#about-bar)" fill-opacity=".65"/>
                        <rect x="244" y="204" width="24" height="66" rx="6" fill="url(#about-bar)" fill-opacity=".75"/>
                        <rect x="284" y="188" width="24" height="82" rx="6" fill="url(#about-bar)" fill-opacity=".88"/>
                        <rect x="324" y="166" width="24" height="104" rx="6" fill="url(#about-bar)"/>

                        {{-- Growth line, ending in a node like the hero circuit lines --}}
                        <path d="M136 224 L176 208 L216 214 L256 190 L296 170 L336 146" stroke="#031a3d" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="336" cy="146" r="6" fill="#ffffff" stroke="#031a3d" stroke-width="2.5"/>

                        {{-- Phone app --}}
                        <rect x="372" y="112" width="124" height="256" rx="26" fill="#031a3d"/>
                        <rect x="380" y="124" width="108" height="232" rx="19" fill="#ffffff"/>
                        <rect x="414" y="131" width="40" height="6" rx="3" fill="#031a3d" fill-opacity=".15"/>
                        <circle cx="434" cy="186" r="26" stroke="#0b8f94" stroke-opacity=".18" stroke-width="9"/>
                        <circle cx="434" cy="186" r="26" stroke="#0b8f94" stroke-width="9" stroke-linecap="round" stroke-dasharray="104 164" transform="rotate(-90 434 186)"/>
                        <path d="M426 187l6 6 11-12" stroke="#067077" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="396" y="232" width="76" height="30" rx="9" fill="#0b8f94" fill-opacity=".1"/>
                        <circle cx="410" cy="247" r="6" fill="#0b8f94" fill-opacity=".7"/>
                        <rect x="422" y="243" width="38" height="8" rx="4" fill="#0b8f94" fill-opacity=".45"/>
                        <rect x="396" y="270" width="76" height="30" rx="9" fill="#031a3d" fill-opacity=".06"/>
                        <circle cx="410" cy="285" r="6" fill="#031a3d" fill-opacity=".4"/>
                        <rect x="422" y="281" width="30" height="8" rx="4" fill="#031a3d" fill-opacity=".25"/>
                        <rect x="396" y="312" width="76" height="28" rx="14" fill="#0b8f94"/>

                        {{-- AI automation node, wired to the dashboard --}}
                        <path d="M62 340 H120 L146 314 H256" stroke="#0b8f94" stroke-opacity=".5" stroke-width="2" stroke-linejoin="round" stroke-dasharray="4 5"/>
                        <circle cx="256" cy="314" r="5" fill="#ffffff" stroke="#0b8f94" stroke-width="2"/>
                        <rect x="14" y="316" width="48" height="48" rx="14" fill="#ffffff" stroke="#0b8f94" stroke-opacity=".5" stroke-width="2"/>
                        <g transform="translate(26 328) scale(1)" stroke="#067077" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="5" y="5" width="14" height="14" rx="2.5"/>
                            <path d="M9 1v4M15 1v4M9 19v4M15 19v4M1 9h4M1 15h4M19 9h4M19 15h4"/>
                        </g>
                    </svg>
                </div>
            </div>
        </div>

        <dl class="mt-16 grid gap-8 border-t border-slate-200 pt-10 sm:grid-cols-3">
            @foreach ($stats as [$value, $label])
                <div>
                    <dt class="text-sm text-slate-500">{{ $label }}</dt>
                    <dd class="mt-1 font-display text-3xl font-semibold tracking-tight text-ink">{{ $value }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>