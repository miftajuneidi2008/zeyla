{{--
    Zeyla Tech PLC logo (public/images/logo.png, transparent background).

    tone="dark"  (default) -> for dark backgrounds (footer): shown on a white plate so the navy lettering stays readable
    tone="light"           -> for light backgrounds (nav): shown as-is
    uid                    -> kept for backwards compatibility with existing <x-logo uid="..."> calls (unused now)
--}}
@props(['uid' => 'zt', 'tone' => 'dark'])

@php
    $plate = $tone === 'light' ? '' : 'rounded-xl bg-white px-3 py-2';
    $height = $tone === 'light' ? 'h-10' : 'h-11';
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center ' . $plate]) }}>
    <img src="{{ asset('images/logo.png') }}" alt="{{ config('zeyla.name') }} PLC" width="900" height="274" class="{{ $height }} w-auto" decoding="async">
</span>
