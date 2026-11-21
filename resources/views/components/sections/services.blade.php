@php
    use Illuminate\Support\Facades\Cache;

    // Read each inline SVG once and cache it (in local dev, read fresh so edits show)
    $svg = fn (string $file) => app()->isLocal()
        ? file_get_contents(public_path('images/services/' . $file))
        : Cache::rememberForever('svc-svg-' . $file, fn () => file_get_contents(public_path('images/services/' . $file)));

    $groups = collect(config('zeyla.services'))->groupBy('category');
@endphp

{{-- Negative top margin: the section starts behind the hero's rounded bottom corners --}}
<section id="services" class="relative scroll-mt-24 bg-white pb-24 pt-24 lg:pb-32 lg:pt-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div data-services-head class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="eyebrow">Services</p>
                <h2 class="mt-5 font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">What we <span class="accent text-brand-teal-dark">do</span></h2>
                <p class="mt-5 max-w-xl text-lg leading-relaxed text-slate-600">
                    Five services, one team. Use what you need now and add more as your organization grows.
                </p>
            </div>
            <a href="#contact" class="group inline-flex shrink-0 items-center gap-2 font-semibold text-ink transition-colors hover:text-brand-teal-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal">
                Ask about a service
                <x-icon name="arrow-right" class="size-5 transition-transform duration-300 group-hover:translate-x-1" />
            </a>
        </div>

        <div class="mt-16 space-y-16">
            @foreach ($groups as $category => $services)
                <div>
                    <div class="flex items-baseline justify-between gap-4 border-b border-slate-200 pb-4">
                        <h3 class="flex items-baseline gap-4 font-display text-xl font-semibold tracking-tight text-ink">
                            <span class="text-sm font-medium tabular-nums text-brand-teal-dark">{{ sprintf('%02d', $loop->iteration) }}</span>
                            {{ $category }}
                        </h3>
                        <span class="text-sm text-slate-500">{{ $services->count() }} services</span>
                    </div>

                    <ul class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
                        @foreach ($services as $service)
                            <li id="service-{{ $service['slug'] }}"
                                class="svc group relative flex scroll-mt-28 flex-col overflow-hidden rounded-3xl bg-white p-2 shadow-sm shadow-slate-900/[0.04] ring-1 ring-slate-900/[0.07] transition duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-navy/10 hover:ring-brand-teal/30 focus-within:ring-2 focus-within:ring-brand-teal">

                                <div class="overflow-hidden rounded-[1.25rem] bg-linear-to-b from-slate-50 to-slate-100/70" aria-hidden="true">
                                    <div class="svc-art">
                                        {{-- SVGs are inlined so their parts can animate. For a real photo, use a .jpg/.webp filename in config/zeyla.php --}}
                                        @if (str_ends_with($service['image'], '.svg'))
                                            {!! $svg($service['image']) !!}
                                        @else
                                            <img src="{{ asset('images/services/' . $service['image']) }}" alt="" width="480" height="320" loading="lazy" class="aspect-[3/2] w-full object-cover">
                                        @endif
                                    </div>
                                </div>

                                <div class="flex flex-1 flex-col px-5 pb-5 pt-6">
                                    <h4 class="font-display text-xl font-semibold tracking-tight text-ink">{{ $service['name'] }}</h4>
                                    <p class="mt-2 leading-relaxed text-slate-600">{{ $service['description'] }}</p>

                                    <p class="mt-4 flex items-start gap-2.5 text-[15px] font-medium leading-snug text-navy">
                                        <span class="mt-px grid size-5 shrink-0 place-items-center rounded-full bg-brand-teal/10 text-brand-teal-dark" aria-hidden="true">
                                            <x-icon name="check" class="size-3 stroke-[2.5]" />
                                        </span>
                                        {{ $service['outcome'] }}
                                    </p>

                                    {{-- Whole card is clickable through this one link --}}
                                    <a href="#contact" data-service="{{ $service['slug'] }}"
                                       class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-semibold text-brand-teal-dark after:absolute after:inset-0 after:content-[''] hover:text-navy focus:outline-none">
                                        <span>Ask about this service<span class="sr-only">: {{ $service['name'] }}</span></span>
                                        <x-icon name="arrow-right" class="size-4 transition-transform duration-300 group-hover:translate-x-1" />
                                    </a>
                                </div>

                                <span class="svc-spot pointer-events-none absolute inset-0" aria-hidden="true"></span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
