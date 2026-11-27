{{--
    Zeyla Tech logo: the "Z" circuit mark + wordmark.

    tone="dark"  (default) -> for dark backgrounds (nav, footer)
    tone="light"           -> for light backgrounds
    uid                    -> unique id when the logo appears twice on one page (SVG gradient id)
--}}
@props(['uid' => 'zt', 'tone' => 'dark'])

@php
    $zeyla = $tone === 'light' ? 'text-ink' : 'text-white';
    $tech  = $tone === 'light' ? 'text-brand-red' : 'text-brand-teal-light';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-3']) }}>
    <svg class="size-9 shrink-0" viewBox="0 0 40 40" fill="none" aria-hidden="true">
        <defs>
            <linearGradient id="{{ $uid }}-g" x1="3" y1="2" x2="37" y2="38" gradientUnits="userSpaceOnUse">
                <stop stop-color="#2563EB"/>
                <stop offset="1" stop-color="#153E75"/>
            </linearGradient>
        </defs>
        <rect width="40" height="40" rx="11" fill="url(#{{ $uid }}-g)"/>
        <rect x=".5" y=".5" width="39" height="39" rx="10.5" stroke="#fff" stroke-opacity=".22"/>
        <path d="M12.5 13.5H27.5L12.5 26.5H24" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="28.5" cy="26.5" r="2.1" stroke="#D7263D" stroke-width="1.8"/>
    </svg>
    <span class="font-display text-[1.3rem] font-semibold leading-none tracking-tight {{ $zeyla }}">Zeyla<span class="{{ $tech }} font-medium"> Tech</span></span>
</span>
