@php
    $site = config('zeyla');
    $home = url('/');
    $tel = fn (string $p) => '+251' . ltrim($p, '0');

    $explore = [
        ['Services',               $home . '#services'],
        ['Our process',            $home . '#process'],
        ['Why ' . $site['name'],   $home . '#why-us'],
        ['Contact',                $home . '#contact'],
    ];

    $head = 'text-xs font-medium uppercase tracking-[0.16em] text-slate-400';
    $link = 'text-slate-300 transition-colors hover:text-white focus:outline-none focus-visible:text-white';
@endphp

<div class="p-3 sm:p-5">
<footer class="frame relative isolate overflow-hidden bg-ink text-sm ring-1 ring-white/10">
    <div class="pointer-events-none absolute inset-0 -z-10 bg-[radial-gradient(36rem_22rem_at_8%_0%,rgba(37,99,235,0.16),transparent_65%)]" aria-hidden="true"></div>
    <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 sm:px-6 lg:grid-cols-12 lg:gap-8 lg:px-8 lg:py-20">

        <div class="lg:col-span-4">
            <a href="{{ $home }}" class="inline-block rounded-full focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal-light" aria-label="{{ $site['name'] }} home">
                <x-logo uid="foot" />
            </a>
            <p class="mt-6 max-w-xs text-base leading-relaxed text-slate-400">
                {{ $site['tagline'] }} for government, NGOs, and private institutions.
            </p>
        </div>

        <nav aria-label="Footer" class="lg:col-span-2">
            <p class="{{ $head }}">Explore</p>
            <ul class="mt-5 space-y-3">
                @foreach ($explore as [$label, $href])
                    <li><a href="{{ $href }}" class="{{ $link }}">{{ $label }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="lg:col-span-3">
            <p class="{{ $head }}">Services</p>
            <ul class="mt-5 space-y-3">
                @foreach ($site['services'] as $service)
                    <li><a href="{{ $home }}#service-{{ $service['slug'] }}" class="{{ $link }}">{{ $service['name'] }}</a></li>
                @endforeach
            </ul>
        </div>


        <div class="lg:col-span-3">
            <p class="{{ $head }}">Get in touch</p>
            <ul class="mt-5 space-y-3">
                <li><a href="mailto:{{ $site['email'] }}" class="break-all {{ $link }}">{{ $site['email'] }}</a></li>
                @foreach (array_slice($site['phones'], 0, 2) as $phone)
                    <li><a href="tel:{{ $tel($phone) }}" class="{{ $link }}">{{ $phone }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-6 text-slate-400 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
            <p>&copy; {{ date('Y') }} {{ $site['name'] }}. All rights reserved.</p>
            <p>{{ $site['address'] }}</p>
            <a href="#home" class="group inline-flex items-center gap-2 {{ $link }}">
                Back to top
                <span class="grid size-8 place-items-center rounded-full border border-white/15 transition-colors group-hover:border-white/40" aria-hidden="true">
                    <x-icon name="arrow-up" class="size-4" />
                </span>
            </a>
        </div>
    </div>
</footer>
</div>
