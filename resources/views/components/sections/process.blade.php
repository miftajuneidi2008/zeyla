<section id="process" class="scroll-mt-24 bg-white py-24 lg:py-32">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="max-w-2xl">
            <p class="eyebrow">How we work</p>
            <h2 class="mt-5 font-display text-4xl font-semibold tracking-[-0.03em] text-ink sm:text-5xl">Our <span class="accent text-brand-red">process</span></h2>
            <p class="mt-5 text-lg leading-relaxed text-slate-600">
                Five steps, from the first conversation to long-term support.
            </p>
        </div>

        <div data-process class="process relative mt-20">

            {{-- Progress line: vertical on phones, horizontal from the first to the last badge on desktop --}}
            <div class="absolute bottom-24 left-7 top-7 w-px bg-slate-200 md:bottom-auto md:left-[10%] md:right-[10%] md:h-px md:w-auto" aria-hidden="true">
                <div data-process-fill class="h-full w-full bg-linear-to-r from-brand-teal to-brand-teal-light"></div>
            </div>

            <ol class="relative md:grid md:grid-cols-5 md:gap-6">
                @foreach (config('zeyla.steps') as $step)
                    <li data-step class="process-step relative flex gap-5 pb-10 last:pb-0 md:flex-col md:items-center md:gap-0 md:pb-0 md:text-center">
                        <span class="step-badge relative z-10 grid size-14 shrink-0 place-items-center rounded-full">
                            <x-icon :name="$step['icon']" />
                        </span>
                        <div class="md:mt-7">
                            <p class="text-xs font-medium uppercase tracking-[0.16em] text-brand-teal-dark">Step {{ $loop->iteration }}</p>
                            <h3 class="mt-2 font-display text-xl font-semibold tracking-tight text-ink">{{ $step['title'] }}</h3>
                            <p class="mt-2 leading-relaxed text-slate-600 md:mx-auto md:max-w-[15rem]">{{ $step['description'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
        </div>
    </div>
</section>
