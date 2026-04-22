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
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="apple-touch-icon" href="{{ asset('favicon.png') }}">

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    @php
    $isStagingHost = request()->getHost() === 'prueba.llantasparaminicargadores.com';
@endphp

<meta name="robots" content="{{ $isStagingHost ? 'noindex,nofollow,noarchive,nosnippet' : $seoRobots }}">
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

    {{-- Preconnect opcional para acelerar GTM cuando sí cargue --}}
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="dns-prefetch" href="//www.googletagmanager.com">

    {{-- DataLayer disponible desde el inicio --}}
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'gtm.start': Date.now(),
            event: 'gtm.js'
        });
    </script>

    {{-- Carga diferida de Google Tag Manager --}}
    <script>
        (function () {
            var gtmId = 'GTM-5N6PL39';
            var gtmLoaded = false;

            function loadGTM() {
                if (gtmLoaded) return;
                gtmLoaded = true;

                var firstScript = document.getElementsByTagName('script')[0];
                var script = document.createElement('script');
                script.async = true;
                script.src = 'https://www.googletagmanager.com/gtm.js?id=' + gtmId;
                firstScript.parentNode.insertBefore(script, firstScript);
            }

            function loadGTMOnce() {
                loadGTM();

                window.removeEventListener('load', loadGTMOnce);
                window.removeEventListener('scroll', loadGTMOnce, passiveOptions);
                window.removeEventListener('mousemove', loadGTMOnce);
                window.removeEventListener('touchstart', loadGTMOnce, passiveOptions);
                window.removeEventListener('click', loadGTMOnce);
                window.removeEventListener('keydown', loadGTMOnce);
            }

            var passiveOptions = { passive: true };

            window.addEventListener('load', function () {
                setTimeout(loadGTMOnce, 2500);
            });

            window.addEventListener('scroll', loadGTMOnce, passiveOptions);
            window.addEventListener('mousemove', loadGTMOnce);
            window.addEventListener('touchstart', loadGTMOnce, passiveOptions);
            window.addEventListener('click', loadGTMOnce);
            window.addEventListener('keydown', loadGTMOnce);
        })();
    </script>

    @stack('meta')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white text-zinc-900 antialiased">
    {{-- Google Tag Manager (noscript) --}}
    <noscript>
        <iframe
            src="https://www.googletagmanager.com/ns.html?id=GTM-5N6PL39"
            height="0"
            width="0"
            style="display:none;visibility:hidden"
        ></iframe>
    </noscript>
    {{-- End Google Tag Manager (noscript) --}}

    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

<x-ruguex-whatsapp-widget />
<x-minicargador-chat-agent title="Agente virtual Ruguex" />

    @stack('scripts')
</body>
</html>