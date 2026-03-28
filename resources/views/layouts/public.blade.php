<!doctype html>
<html lang="es-MX" class="scroll-smooth">
<head>
    @php
        $seoTitle = data_get($seo ?? [], 'title', config('app.name', 'Llantas para Minicargadores'));
        $seoDescription = data_get($seo ?? [], 'description', '');
        $seoRobots = data_get($seo ?? [], 'robots', 'index,follow');
        $seoCanonical = data_get($seo ?? [], 'canonical', url()->current());
        $seoImage = data_get($seo ?? [], 'image', asset('images/seo/default.jpg'));
    @endphp

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="{{ $seoRobots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">

    <meta property="og:locale" content="es_MX">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-zinc-900 antialiased">
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @stack('scripts')
</body>
</html>