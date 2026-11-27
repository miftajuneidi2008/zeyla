@php
    $site = config('zeyla');
    $phones = collect($site['phones']);

    // Local numbers (09...) -> international format for tel: links
    $tel = fn (string $p) => '+251' . ltrim($p, '0');

    $label = 'mb-2 block text-sm font-medium text-slate-700';
    $field = 'block w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base text-ink placeholder:text-slate-400 transition focus:border-brand-teal focus:outline-none focus:ring-4 focus:ring-brand-teal/15 aria-invalid:border-red-500';
    $error = 'mt-2 text-sm text-red-600';

    $iconTile = 'grid size-11 shrink-0 place-items-center rounded-xl bg-white text-brand-teal-dark shadow-sm ring-1 ring-slate-200';
    $link = 'transition-colors hover:text-brand-teal-dark focus:outline-none focus-visible:text-brand-teal-dark';
@endphp

<div class="px-3 pt-3 sm:px-5 sm:pt-5">
<section id="contact" class="frame relative scroll-mt-24 overflow-hidden bg-linear-to-br from-[#DCE8FD] via-[#E8EFFC] to-[#F5F7FA] py-20 ring-1 ring-brand-teal/20 lg:py-28">

    {{-- Soft teal light on a pale tint, so this card breaks up the dark ones around it --}}
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(40rem_30rem_at_12%_20%,rgba(37,99,235,0.14),transparent_65%),radial-gradient(34rem_24rem_at_92%_90%,rgba(37,99,235,0.10),transparent_65%)]" aria-hidden="true"></div>

    {{-- On phones: intro, form, details. On desktop: intro + details on the left, form on the right --}}
    <div class="relative mx-auto grid max-w-7xl gap-x-16 gap-y-12 px-4 sm:px-6 lg:grid-cols-12 lg:grid-rows-[auto_1fr] lg:px-8">

        {{-- Intro --}}
        <div class="lg:col-span-5 lg:row-start-1">
            <p class="eyebrow">Contact</p>
            <h2 class="mt-5 max-w-md font-display text-4xl font-semibold tracking-[-0.03em] text-ink text-balance sm:text-5xl">
                Let's build something <span class="accent text-brand-red">together.</span>
            </h2>
            <p class="mt-6 max-w-md text-lg leading-relaxed text-slate-600">
                Tell us what your organization needs. We'll reply with next steps.
            </p>
        </div>

        {{-- Form --}}
        <div class="lg:col-span-7 lg:col-start-6 lg:row-span-2 lg:row-start-1">

            @if ($errors->has('send'))
                <p role="alert" class="mb-6 rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
                    {{ $errors->first('send') }}
                </p>
            @endif

            <form id="contact-form" method="POST" action="{{ route('contact.store') }}"
                  class="grid gap-x-6 gap-y-6 rounded-3xl border border-slate-200/80 bg-white p-6 shadow-xl shadow-slate-900/5 sm:grid-cols-2 sm:p-10">
                @csrf

                {{-- Honeypot: hidden from people, bots fill it in --}}
                <div class="absolute -left-[9999px]" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
                </div>

                <div>
                    <label for="name" class="{{ $label }}">Name <span class="text-brand-red" aria-hidden="true">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name"
                           placeholder="Enter your name" class="{{ $field }}"
                           @error('name') aria-invalid="true" aria-describedby="name-error" @enderror>
                    @error('name') <p id="name-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="email" class="{{ $label }}">Email <span class="text-brand-red" aria-hidden="true">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                           placeholder="Enter your email address" class="{{ $field }}"
                           @error('email') aria-invalid="true" aria-describedby="email-error" @enderror>
                    @error('email') <p id="email-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="organization" class="{{ $label }}">Organization</label>
                    <input type="text" id="organization" name="organization" value="{{ old('organization') }}" autocomplete="organization"
                           placeholder="Where do you work?" class="{{ $field }}"
                           @error('organization') aria-invalid="true" aria-describedby="organization-error" @enderror>
                    @error('organization') <p id="organization-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="{{ $label }}">Message <span class="text-brand-red" aria-hidden="true">*</span></label>
                    <textarea id="message" name="message" rows="5" required maxlength="3000"
                              placeholder="Tell us what you'd like to discuss." class="{{ $field }} resize-none"
                              @error('message') aria-invalid="true" aria-describedby="message-error" @enderror>{{ old('message') }}</textarea>
                    @error('message') <p id="message-error" class="{{ $error }}">{{ $message }}</p> @enderror
                </div>

                <div class="sm:col-span-2">
                    <button type="submit"
                            class="group inline-flex w-full items-center justify-between gap-4 rounded-full bg-ink py-2 pl-7 pr-2 font-semibold text-white transition-colors hover:bg-brand-teal-dark focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal focus-visible:ring-offset-2 focus-visible:ring-offset-white disabled:opacity-60 sm:w-auto sm:justify-start">
                        <span data-label>Send message</span>
                        <span class="grid size-11 place-items-center rounded-full bg-white text-ink" aria-hidden="true">
                            <x-icon name="arrow-up-right" class="size-5 transition-transform duration-300 group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
                        </span>
                    </button>
                </div>
            </form>
        </div>

        {{-- Contact details --}}
        <dl class="space-y-7 lg:col-span-5 lg:row-start-2 lg:self-start">
            <div class="flex items-start gap-4">
                <span class="{{ $iconTile }}"><x-icon name="mail" class="size-5" /></span>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Email us</dt>
                    <dd class="mt-1 text-lg text-ink">
                        <a href="mailto:{{ $site['email'] }}" class="break-all {{ $link }}">{{ $site['email'] }}</a>
                    </dd>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <span class="{{ $iconTile }}"><x-icon name="phone" class="size-5" /></span>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Call us</dt>
                    <dd class="mt-1 space-y-1 text-lg text-ink">
                        @foreach ($phones->take(2) as $phone)
                            <a href="tel:{{ $tel($phone) }}" class="block {{ $link }}">{{ $phone }}</a>
                        @endforeach

                        @if ($phones->count() > 2)
                            <details class="group pt-1">
                                <summary class="cursor-pointer list-none text-base font-medium text-brand-teal-dark underline decoration-2 underline-offset-4 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-teal">
                                    <span class="group-open:hidden">More numbers</span>
                                    <span class="hidden group-open:inline">Fewer numbers</span>
                                </summary>
                                <div class="mt-2 space-y-1">
                                    @foreach ($phones->slice(2) as $phone)
                                        <a href="tel:{{ $tel($phone) }}" class="block {{ $link }}">{{ $phone }}</a>
                                    @endforeach
                                </div>
                            </details>
                        @endif
                    </dd>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <span class="{{ $iconTile }}"><x-icon name="pin" class="size-5" /></span>
                <div>
                    <dt class="text-sm font-medium text-slate-500">Visit us</dt>
                    <dd class="mt-1 text-lg leading-relaxed text-ink">{{ $site['address'] }}</dd>
                </div>
            </div>
        </dl>
    </div>
</section>
</div>
