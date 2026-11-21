@php
    // type => [ring/accent colour, icon, icon colour]
    $styles = [
        'success' => ['ring-brand-teal-light/40', 'check', 'bg-brand-teal text-white'],
        'error'   => ['ring-red-400/50',          'alert', 'bg-red-500 text-white'],
        'warning' => ['ring-amber-300/50',        'alert', 'bg-amber-400 text-ink'],
        'info'    => ['ring-white/20',            'info',  'bg-white/15 text-white'],
    ];

    $messages = collect($styles)
        ->keys()
        ->filter(fn ($type) => session()->has($type))
        ->mapWithKeys(fn ($type) => [$type => session($type)]);
@endphp

@if ($messages->isNotEmpty())
    <div class="pointer-events-none fixed inset-x-0 top-24 z-50 flex flex-col items-center gap-3 px-4">
        @foreach ($messages as $type => $message)
            @php [$ring, $icon, $badge] = $styles[$type]; @endphp
            <div data-flash="{{ $type }}"
                 role="{{ $type === 'error' ? 'alert' : 'status' }}"
                 class="pointer-events-auto flex w-full max-w-md items-start gap-4 rounded-2xl bg-ink/95 py-4 pl-4 pr-5 text-white shadow-2xl shadow-black/40 ring-1 backdrop-blur-xl {{ $ring }}">
                <span class="mt-0.5 grid size-7 shrink-0 place-items-center rounded-full {{ $badge }}" aria-hidden="true">
                    <x-icon :name="$icon" class="size-4 stroke-[2.2]" />
                </span>
                <p class="flex-1 pt-0.5 leading-relaxed">{{ $message }}</p>
                <button type="button" data-flash-close aria-label="Dismiss message"
                        class="-mr-1 grid size-6 shrink-0 place-items-center rounded-full text-xl leading-none text-slate-400 transition-colors hover:text-white focus:outline-none focus-visible:ring-2 focus-visible:ring-white">
                    &times;
                </button>
            </div>
        @endforeach
    </div>
@endif
