@php
    $site = config('zeyla');
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#153E75">

    <title>@yield('title', $site['title'])</title>
    <meta name="description" content="@yield('description', $site['description'])">

    <meta property="og:site_name" content="{{ $site['name'] }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', $site['title'])">
    <meta property="og:description" content="@yield('description', $site['description'])">
    <meta property="og:url" content="{{ url('/') }}">
    <meta name="twitter:card" content="summary">

    <link rel="icon" href="{{ asset('images/favicon.svg') }}" type="image/svg+xml">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@300..700&family=Instrument+Serif:ital@0;1&display=swap" rel="stylesheet">

    <script>document.documentElement.classList.add('js')</script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cloud font-sans text-slate-700 antialiased">

    <a href="#main"
       class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-5 focus:py-2.5 focus:font-semibold focus:text-ink">
        Skip to content
    </a>

    <x-navbar />
    <x-flash />

    <main id="main">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>
