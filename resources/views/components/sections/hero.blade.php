@php
    $site = config('zeyla');
    $categories = collect($site['services'])->pluck('category')->unique();
@endphp

{{-- Light hero: no filled background. It sits on the page, below the floating nav, with only a faint teal glow and grid behind the artwork --}}
<div class="px-3 pt-[6.25rem] sm:px-5 sm:pt-[6.75rem]">
<section id="home" class="frame relative isolate scroll-mt-28 pb-12 pt-12 lg:pb-16 lg:pt-16">
    {{-- Slowly drifting colour: the cyan and teal blobs come from .hero-aurora itself (see css/sections/hero.css), plus this blue one --}}
    <div class="hero-aurora pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
        <span class="hero-blob-c"></span>
    </div>
    <div class="hero-grid pointer-events-none absolute inset-0 -z-10" aria-hidden="true"></div>

    <div class="relative mx-auto grid max-w-7xl items-center gap-14 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">

        <div class="lg:col-span-7">
            <p data-hero-item class="inline-flex items-center gap-2.5 rounded-full border border-slate-200 bg-white py-1.5 pl-3 pr-4 text-[13px] font-medium text-slate-600 shadow-sm">
                <span class="relative flex size-2" aria-hidden="true">
                    <span class="absolute inline-flex size-full animate-ping rounded-full bg-brand-teal opacity-50"></span>
                    <span class="relative inline-flex size-2 rounded-full bg-brand-teal"></span>
                </span>
                Software development &amp; digital consultancy
            </p>

            <h1 data-hero-item class="mt-7 font-display text-5xl font-semibold leading-[1.02] tracking-[-0.035em] text-ink text-balance sm:text-6xl lg:text-7xl">
                Reliable software and AI solutions
                <span class="accent bg-linear-to-r from-brand-teal-dark to-brand-teal bg-clip-text pr-1 text-transparent">that grow with your business.</span>
            </h1>

            <p data-hero-item class="mt-7 max-w-xl text-lg leading-relaxed text-slate-600">
                From strategy to code to AI automation, we design, build, and support the systems your organization runs on.
            </p>

            <div data-hero-item class="mt-10 flex flex-wrap items-center gap-3 sm:gap-4">
                <a href="#contact" class="group inline-flex items-center gap-3 rounded-full bg-ink py-1.5 pl-7 pr-1.5 font-semibold text-white transition-colors hover:bg-brand-teal-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal focus-visible:ring-offset-2 focus-visible:ring-offset-white">
                    Talk to us
                    <span class="grid size-11 place-items-center rounded-full bg-white text-ink" aria-hidden="true">
                        <x-icon name="arrow-up-right" class="size-5 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
                    </span>
                </a>
                <a href="#services" class="rounded-full border border-slate-300 px-7 py-3.5 font-semibold text-ink transition hover:border-ink/40 hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal">
                    See what we do
                </a>
            </div>

            <div data-hero-item class="mt-14 max-w-xl border-t border-slate-200 pt-6">
                <ul class="flex flex-wrap gap-x-7 gap-y-2.5 text-sm text-slate-600">
                    @foreach ($categories as $category)
                        <li class="flex items-center gap-2.5">
                            <span class="size-1.5 rounded-full bg-brand-teal" aria-hidden="true"></span>{{ $category }}
                        </li>
                    @endforeach
                </ul>
                <p class="mt-4 text-sm text-slate-500">Based in {{ $site['address'] }}.</p>
            </div>
        </div>

        {{-- Pixels resolving into circuit lines, echoing the Zeyla "Z" mark --}}
        <div class="lg:col-span-5" aria-hidden="true">
            <svg viewBox="0 0 560 420" class="mx-auto w-full max-w-lg" fill="none">
                <path id="hero-arc" pathLength="1" stroke-dasharray="1" d="M20 385 C190 440 470 370 535 40"
                      stroke="#0b8f94" stroke-opacity=".55" stroke-width="2" stroke-linecap="round"/>

                <g id="hero-pixels"></g>

                @php
                    $traces = [
                        ['M232 100 H300 L340 140 H450', [450,140]],
                        ['M232 175 H280 L320 215 H395 L435 175 H515', [515,175]],
                        ['M232 250 H330 L370 290 H490', [490,290]],
                        ['M232 325 H290 L330 365 H420 L460 325 H505', [505,325]],
                    ];
                @endphp

                @foreach ($traces as [$d, [$cx, $cy]])
                    <path class="trace-base" pathLength="1" stroke-dasharray="1" d="{{ $d }}" stroke="#0b8f94" stroke-opacity=".4" stroke-width="2" stroke-linejoin="round"/>
                    <path class="trace-flow opacity-0" pathLength="1" style="animation-delay: {{ $loop->index * 0.7 }}s" d="{{ $d }}" stroke="#067077" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <circle class="trace-node" cx="{{ $cx }}" cy="{{ $cy }}" r="6" fill="#ffffff" stroke="#0b8f94" stroke-width="2"/>
                @endforeach
            </svg>
        </div>
    </div>
</section>
</div>