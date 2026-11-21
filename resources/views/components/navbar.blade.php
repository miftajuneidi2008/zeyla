@php
    $home = url('/');
    $site = config('zeyla');
    $services = $site['services'];

    $links = [
        ['about',   'About us',              $home . '#about'],
        ['process', 'Our process',           $home . '#process'],
        ['why-us',  'Why ' . $site['name'],  $home . '#why-us'],
        ['contact', 'Contact',               $home . '#contact'],
    ];

    $linkClass = 'rounded-full px-4 py-2 text-[14.5px] font-medium text-slate-600 transition-colors hover:bg-slate-900/5 hover:text-ink focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal';
@endphp

{{-- Floating light frosted pill, exactly as wide as the framed cards (same 1340px max and same side gutter), so its edges line up with them. It sits on the page above the hero card, and its shadow deepens once the page scrolls (see js/sections/navbar.js) --}}
<header id="site-header" data-scrolled="false" class="group/header fixed inset-x-0 top-0 z-50 px-3 pt-6 sm:px-5 sm:pt-8">
  <div class="mx-auto max-w-[1340px]">
    <nav aria-label="Main"
         class="flex h-16 items-center justify-between rounded-full border border-slate-200/80 bg-white/80 pl-5 pr-2 shadow-sm shadow-slate-900/5 backdrop-blur-xl transition duration-300
                group-data-[scrolled=true]/header:bg-white/90 group-data-[scrolled=true]/header:shadow-lg group-data-[scrolled=true]/header:shadow-slate-900/10
                lg:grid lg:grid-cols-[1fr_auto_1fr]">

        {{-- Brand --}}
        <a href="{{ $home }}" class="justify-self-start rounded-full focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal" aria-label="{{ $site['name'] }} home">
            <x-logo uid="nav" tone="light" />
        </a>

        {{-- Desktop links, centred --}}
        <div class="hidden items-center gap-0.5 lg:flex">

            <div class="group relative">
                <a href="{{ $home }}#services" data-nav="services" class="{{ $linkClass }} flex items-center gap-1">
                    Services
                    <svg class="h-4 w-4 opacity-70 transition-transform group-hover:rotate-180 group-focus-within:rotate-180" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                    </svg>
                </a>

                <div class="invisible absolute left-1/2 top-full w-[40rem] -translate-x-1/2 translate-y-1 pt-5 opacity-0 transition duration-200
                            group-hover:visible group-hover:translate-y-0 group-hover:opacity-100
                            group-focus-within:visible group-focus-within:translate-y-0 group-focus-within:opacity-100">
                    <div class="grid grid-cols-2 gap-1 rounded-3xl border border-slate-200 bg-white p-2 shadow-2xl shadow-slate-900/10">
                        @foreach ($services as $service)
                            <a href="{{ $home }}#service-{{ $service['slug'] }}"
                               class="rounded-2xl p-3.5 transition-colors hover:bg-slate-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal">
                                <span class="block text-sm font-semibold text-ink">{{ $service['name'] }}</span>
                                <span class="mt-0.5 block text-sm leading-snug text-slate-500">{{ $service['summary'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            @foreach ($links as [$id, $label, $href])
                <a href="{{ $href }}" data-nav="{{ $id }}" class="{{ $linkClass }}">{{ $label }}</a>
            @endforeach
        </div>

        {{-- CTA --}}
        <a href="{{ $home }}#contact"
           class="group hidden items-center gap-2.5 justify-self-end rounded-full bg-ink py-2 pl-5 pr-2 text-[14.5px] font-semibold text-white transition-colors hover:bg-brand-teal-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal focus-visible:ring-offset-2 focus-visible:ring-offset-white lg:inline-flex">
            Talk to us
            <span class="grid size-8 place-items-center rounded-full bg-white text-ink" aria-hidden="true">
                <x-icon name="arrow-up-right" class="size-4 transition-transform duration-300 group-hover:-translate-y-px group-hover:translate-x-px" />
            </span>
        </a>

        {{-- Mobile toggle --}}
        <button type="button" id="nav-toggle" aria-controls="nav-mobile" aria-expanded="false" aria-label="Open menu"
                class="grid size-11 place-items-center rounded-full text-ink transition-colors hover:bg-slate-900/5 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal lg:hidden">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                <path id="icon-open" stroke-linecap="round" d="M4 8h16M4 16h16"/>
                <path id="icon-close" stroke-linecap="round" class="hidden" d="M6 6l12 12M18 6L6 18"/>
            </svg>
        </button>
    </nav>

    {{-- Mobile panel --}}
    <div id="nav-mobile" class="mt-2 hidden max-h-[80vh] overflow-y-auto rounded-3xl border border-slate-200 bg-white/95 p-2 shadow-xl shadow-slate-900/10 backdrop-blur-xl lg:hidden">
        <details class="group">
            <summary class="flex cursor-pointer list-none items-center justify-between rounded-2xl px-4 py-3 text-base font-medium text-ink hover:bg-slate-50">
                Services
                <svg class="h-4 w-4 opacity-70 transition-transform group-open:rotate-180" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                </svg>
            </summary>
            <div class="pb-2 pl-3">
                @foreach ($services as $service)
                    <a href="{{ $home }}#service-{{ $service['slug'] }}" class="block rounded-xl px-4 py-2.5 text-sm text-slate-600 hover:bg-slate-50 hover:text-ink">{{ $service['name'] }}</a>
                @endforeach
            </div>
        </details>

        @foreach ($links as [$id, $label, $href])
            <a href="{{ $href }}" class="block rounded-2xl px-4 py-3 text-base font-medium text-ink hover:bg-slate-50">{{ $label }}</a>
        @endforeach

        <a href="{{ $home }}#contact" class="mt-2 block rounded-full bg-ink px-5 py-3.5 text-center text-base font-semibold text-white hover:bg-brand-teal-dark">
            Talk to us
        </a>
    </div>
  </div>
</header>
