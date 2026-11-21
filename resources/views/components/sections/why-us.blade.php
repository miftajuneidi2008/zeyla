<div class="px-3 sm:px-5">
<section id="why-us" class="frame scroll-mt-24 overflow-hidden bg-linear-to-br from-sky-50 via-white to-teal-50 py-20 ring-1 ring-slate-900/[0.07] lg:py-28">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div data-why-head>
            <p class="eyebrow">Why {{ config('zeyla.name') }}</p>
            <h2 class="mt-5 max-w-2xl font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">
                Why clients <span class="accent text-brand-teal-dark">choose us</span>
            </h2>
        </div>
        <div data-why-rule class="mt-7 h-px w-24 bg-linear-to-r from-brand-teal to-transparent"></div>

        {{-- gap-px on a tinted background draws perfect 1px lines between cards --}}
        <dl class="mt-14 grid gap-px overflow-hidden rounded-3xl bg-slate-900/[0.07] ring-1 ring-slate-900/[0.07] sm:grid-cols-2">
            @foreach (config('zeyla.reasons') as $reason)
                <div data-why-item class="why-card group bg-white/70 p-8 lg:p-12">
                    <div class="flex items-start justify-between">
                        <span data-why-icon class="grid size-12 place-items-center rounded-2xl bg-brand-teal/10 text-brand-teal-dark ring-1 ring-brand-teal/15 transition duration-500 ease-out group-hover:-translate-y-1 group-hover:bg-brand-teal group-hover:text-white group-hover:ring-transparent">
                            <x-icon :name="$reason['icon']" />
                        </span>
                        <span class="font-display text-sm font-medium tabular-nums text-slate-300" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</span>
                    </div>
                    <dt class="mt-8 font-display text-2xl font-semibold tracking-tight text-ink">{{ $reason['title'] }}</dt>
                    <dd class="mt-3 max-w-sm leading-relaxed text-slate-600">{{ $reason['description'] }}</dd>
                </div>
            @endforeach
        </dl>
    </div>
</section>
</div>
