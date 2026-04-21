@extends('layouts.public')

@push('meta')
    @php
        $structuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'Organization',
                    '@id' => url('/').'#organization',
                    'name' => 'Ruguex',
                    'url' => url('/'),
                    'logo' => asset('img/home/logo-ruguex.png'),
                    'sameAs' => [
                        'https://www.facebook.com/Ruguex-Llantas-para-Montacargas-118660366666792/',
                        'https://www.linkedin.com/company/ruguex/',
                    ],
                ],
                [
                    '@type' => 'WebSite',
                    '@id' => url('/').'#website',
                    'url' => url('/'),
                    'name' => 'Ruguex',
                    'publisher' => [
                        '@id' => url('/').'#organization',
                    ],
                    'inLanguage' => 'es-MX',
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => url('/').'#webpage',
                    'url' => url('/'),
                    'name' => $seo['title'] ?? 'Llantas para minicargadores | Ruguex',
                    'description' => $seo['description'] ?? '',
                    'isPartOf' => [
                        '@id' => url('/').'#website',
                    ],
                    'about' => [
                        '@id' => url('/').'#organization',
                    ],
                    'inLanguage' => 'es-MX',
                ],
                [
                    '@type' => 'ItemList',
                    '@id' => url('/').'#categorias',
                    'name' => 'Categorías de llantas para minicargadores',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'Llantas sólidas para minicargador',
                            'url' => url('/llantas-solidas-para-minicargador'),
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => 'Llantas neumáticas para minicargador',
                            'url' => url('/llantas-neumaticas-para-minicargador'),
                        ],
                    ],
                ],
                [
                    '@type' => 'ItemList',
                    '@id' => url('/').'#productos-destacados-solidos',
                    'name' => 'Llantas sólidas para minicargador',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'url' => url('/llantas-solidas-para-minicargador/brawler-hd-solidflex'),
                            'name' => 'Brawler HD Solidflex',
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'url' => url('/llantas-solidas-para-minicargador/brawler-hps-solidflex-traction-smooth'),
                            'name' => 'Brawler HPS Solidflex Traction Smooth',
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 3,
                            'url' => url('/llantas-solidas-para-minicargador/sks-900-traction-smooth'),
                            'name' => 'SKS 900 Traction Smooth',
                        ],
                    ],
                ],
                [
                    '@type' => 'ItemList',
                    '@id' => url('/').'#productos-destacados-neumaticos',
                    'name' => 'Llantas neumáticas para minicargador',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'url' => url('/llantas-neumaticas-para-minicargador/sk-900'),
                            'name' => 'SK 900',
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'url' => url('/llantas-neumaticas-para-minicargador/sk-900-2'),
                            'name' => 'SK 900 no direccional',
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 3,
                            'url' => url('/llantas-neumaticas-para-minicargador/sk-800'),
                            'name' => 'SK 800',
                        ],
                    ],
                ],
                [
                    '@type' => 'Service',
                    '@id' => url('/').'#service',
                    'name' => 'Venta y asesoría de llantas para minicargadores',
                    'provider' => [
                        '@id' => url('/').'#organization',
                    ],
                    'areaServed' => 'MX',
                    'serviceType' => [
                        'Venta de llantas sólidas para minicargador',
                        'Venta de llantas neumáticas para minicargador',
                        'Asesoría técnica',
                        'Compra en línea',
                    ],
                ],
            ],
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    {{-- Preload del hero LCP --}}
    <link
        rel="preload"
        as="image"
        href="{{ asset('storage/originals/home/hero-bobcat.jpg') }}"
        fetchpriority="high"
    >

    <style>
        .cv-auto {
            content-visibility: auto;
            contain-intrinsic-size: 1px 1000px;
        }
    </style>
@endpush

@section('content')
    {{-- Hero principal --}}
    <section class="relative overflow-hidden bg-black">
        <div class="absolute inset-0">
            <img
                src="{{ asset('storage/originals/home/hero-bobcat.jpg') }}"
                alt="Llantas para minicargadores Ruguex"
                class="h-full w-full object-cover object-center"
                loading="eager"
                fetchpriority="high"
                decoding="async"
                width="1600"
                height="900"
            >
        </div>

        <div class="absolute inset-0 bg-black/55"></div>

        <div class="relative ruguex-container flex min-h-[250px] flex-col items-center justify-center px-4 py-14 text-center sm:min-h-[280px] sm:py-16 md:min-h-[320px] lg:min-h-[300px]">
            <h1 class="text-balance text-[28px] font-extrabold leading-tight text-white md:text-[32px]">
                Llantas para minicargadores
            </h1>

            <a
                href="{{ url('/#contacto') }}"
                class="ruguex-btn mt-8 sm:mt-10"
                data-load-hubspot
            >
                Cotiza ahora
            </a>
        </div>
    </section>

    {{-- Franja naranja --}}
    <section class="bg-[#e76a3e]">
        <div class="ruguex-container grid items-center gap-8 py-8 md:grid-cols-3 md:py-10">
            <div class="text-center text-[28px] font-extrabold leading-tight text-black sm:text-[30px] md:text-[32px] lg:text-[38px]">
                25% más de
                <span
                    id="rotating-word"
                    class="inline-block min-w-[150px] text-center transition-all duration-500 sm:min-w-[190px]"
                >
                    Vida
                </span>
                <br>
                GARANTIZADO.
            </div>

            <div class="bg-black p-5 text-center">
                <a
                    href="https://llantasdemontacargas.com/tienda-en-linea/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="text-[20px] font-bold leading-tight text-white underline underline-offset-4 md:text-[28px] lg:text-[30px]"
                >
                    ¡Compra en Línea Aquí!
                </a>
            </div>

            <a
                href="https://llantasbobcat.com/"
                class="flex flex-col items-center justify-center transition-opacity duration-300 hover:opacity-85"
            >
                <x-responsive-image
                    path="home/bobcat-logo.png"
                    alt="Bobcat"
                    class="h-auto w-[150px] sm:w-[190px] lg:w-[300px]"
                    sizes="(min-width: 1024px) 300px, (min-width: 640px) 190px, 150px"
                />

                <p class="mt-3 text-center text-[20px] font-bold leading-none text-black lg:text-[30px]">
                    Llantas Bobcat
                </p>
            </a>
        </div>
    </section>

    {{-- Categorías --}}
    <section class="bg-black cv-auto">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <a href="{{ url('/llantas-solidas-para-minicargador') }}" class="block bg-black">
                <div class="flex h-full flex-col">
                    <div class="flex h-[61px] items-center justify-center bg-black px-4 lg:h-[122px]">
                        <h2 class="m-0 text-center text-[29px] font-bold leading-[1.1] text-white lg:text-[39px]">
                            Llantas sólidas
                        </h2>
                    </div>

                    <x-responsive-image
                        path="home/categoria-solidas.jpg"
                        alt="Llantas sólidas para minicargador"
                        class="block h-[202px] w-full object-cover lg:h-[404px]"
                        sizes="(min-width: 768px) 50vw, 100vw"
                    />
                </div>
            </a>

            <a href="{{ url('/llantas-neumaticas-para-minicargador') }}" class="block bg-black">
                <div class="flex h-full flex-col">
                    <x-responsive-image
                        path="home/categoria-neumaticas.jpg"
                        alt="Llantas neumáticas para minicargador"
                        class="block h-[202px] w-full object-cover lg:h-[404px]"
                        sizes="(min-width: 768px) 50vw, 100vw"
                    />

                    <div class="flex h-[61px] items-center justify-center bg-black px-4 lg:h-[122px]">
                        <h2 class="m-0 text-center text-[29px] font-bold leading-[1.1] text-white lg:text-[39px]">
                            Llantas neumáticas
                        </h2>
                    </div>
                </div>
            </a>
        </div>
    </section>

    {{-- Sólidas --}}
    <section class="bg-white cv-auto">
        <div class="ruguex-container py-7 lg:py-14">
            <header class="mx-auto max-w-[1140px] px-[10px] pt-[10px]">
                <div class="mb-5 h-[30px]"></div>

                <h2 class="mb-5 text-center font-['Roboto',sans-serif] text-[28px] font-semibold leading-[36px] text-black md:text-[33px] md:leading-[42.9px]">
                    Llantas para Minicargadores Sólidas
                </h2>

                <p class="mb-[28px] text-center font-['Roboto',sans-serif] text-[16px] font-normal text-[#7a7a7a]">
                    Llantas sólidas para minicargador: Imponchables, libres de mantenimiento y de uso rudo.
                </p>
            </header>

            <div class="mx-auto flex max-w-[1140px] flex-wrap">
                @foreach ([
                    [
                        'url' => url('/llantas-solidas-para-minicargador/brawler-hd-solidflex'),
                        'path' => 'products/brawler-hd.jpg',
                        'alt' => 'Brawler HD Solidflex',
                        'title' => 'Brawler HD <br> Solidflex',
                    ],
                    [
                        'url' => url('/llantas-solidas-para-minicargador/brawler-hps-solidflex-traction-smooth'),
                        'path' => 'products/brawler-hps.jpg',
                        'alt' => 'Brawler HPS Solidflex Traction Smooth',
                        'title' => 'Brawler® HPS Solidflex Traction/Smooth',
                    ],
                    [
                        'url' => url('/llantas-solidas-para-minicargador/sks-900-traction-smooth'),
                        'path' => 'products/sks-900.jpg',
                        'alt' => 'SKS 900 Traction Smooth',
                        'title' => 'SKS 900 <br> Traction/Smooth',
                    ],
                ] as $item)
                    <article class="w-full md:w-1/3">
                        <div class="flex h-full w-full flex-wrap content-start p-[10px]">
                            <div class="mb-5 w-full text-center">
                                <a href="{{ $item['url'] }}" class="inline-block">
                                    <x-responsive-image
                                        path="{{ $item['path'] }}"
                                        alt="{{ $item['alt'] }}"
                                        class="inline-block h-auto max-w-full align-middle"
                                        sizes="(min-width: 768px) 33vw, 100vw"
                                    />
                                </a>
                            </div>

                            <div class="mb-5 w-full">
                                <div class="h-[20px]"></div>
                            </div>

                            <div class="w-full text-center">
                                <div class="mt-[-60px] bg-[#00063a] p-[15px]">
                                    <h3 class="m-0 clear-both p-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[1.3] text-white sm:text-[24px] md:text-[26px] md:leading-[33.8px]">
                                        <a href="{{ $item['url'] }}" class="text-white no-underline transition duration-200 hover:text-white">
                                            {!! $item['title'] !!}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Neumáticas --}}
    <section class="bg-white cv-auto">
        <div class="mx-auto max-w-[1140px] px-[10px] pb-10 lg:pb-14">
            <header class="pt-[10px]">
                <div class="mb-5 h-[30px]"></div>

                <h2 class="mb-5 text-center font-['Roboto',sans-serif] text-[28px] font-semibold leading-[36px] text-black md:text-[33px] md:leading-[42.9px]">
                    Llantas Neumáticas para Minicargador
                </h2>

                <p class="mb-[28px] text-center font-['Roboto',sans-serif] text-[16px] font-normal text-[#7a7a7a]">
                    Llantas Neumáticas para Minicargadores: Más versátiles, mejor amortiguamiento y desempeño en tierra.
                </p>
            </header>

            <div class="flex flex-wrap">
                @foreach ([
                    [
                        'url' => url('/llantas-neumaticas-para-minicargador/sk-900'),
                        'path' => 'products/sk-900.jpg',
                        'alt' => 'SK 900',
                        'title' => 'SK 900',
                    ],
                    [
                        'url' => url('/llantas-neumaticas-para-minicargador/sk-900-2'),
                        'path' => 'products/sk-900-2.jpg',
                        'alt' => 'SK 900 no direccional',
                        'title' => 'SK 900 no direccional',
                    ],
                    [
                        'url' => url('/llantas-neumaticas-para-minicargador/sk-800'),
                        'path' => 'products/sk-800.jpg',
                        'alt' => 'SK 800',
                        'title' => 'SK 800',
                    ],
                ] as $item)
                    <article class="w-full md:w-1/3">
                        <div class="flex h-full w-full flex-wrap content-start p-[10px]">
                            <div class="mb-5 w-full text-center">
                                <a href="{{ $item['url'] }}" class="inline-block">
                                    <x-responsive-image
                                        path="{{ $item['path'] }}"
                                        alt="{{ $item['alt'] }}"
                                        class="inline-block h-auto max-w-full align-middle"
                                        sizes="(min-width: 768px) 33vw, 100vw"
                                    />
                                </a>
                            </div>

                            <div class="mb-5 w-full">
                                <div class="h-[20px]"></div>
                            </div>

                            <div class="w-full text-center">
                                <div class="mt-[-60px] bg-[#00063a] p-[15px]">
                                    <h3 class="m-0 clear-both p-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[1.3] text-white sm:text-[24px] md:text-[26px] md:leading-[33.8px]">
                                        <a href="{{ $item['url'] }}" class="text-white no-underline transition duration-200 hover:text-white">
                                            {{ $item['title'] }}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Franja distribuidor --}}
    <section class="relative block bg-black transition-[background,border,border-radius,box-shadow] duration-300 cv-auto">
        <div class="relative mx-auto flex max-w-[1140px]">
            <div class="relative flex min-h-px w-full">
                <div class="relative flex w-full flex-wrap items-center content-center">
                    <div class="w-full text-center">
                        <div class="m-[30px] transition-[background,border,border-radius,box-shadow,transform] duration-300">
                            <p class="m-0 p-0 font-['Roboto',sans-serif] text-[28px] font-semibold leading-[1.1] text-white sm:text-[34px] md:text-[41px] md:leading-[41px]">
                                Distribuidores autorizados de la marca Trelleborg
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Nosotros --}}
    <section class="bg-black cv-auto">
        <div class="mx-auto max-w-[1440px]">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative min-h-[300px] overflow-hidden sm:min-h-[420px] lg:min-h-[617px]">
                    <img
                        src="{{ asset('storage/originals/home/llantas-para-Montacargas-y-Cargadores.jpg') }}"
                        alt="Llantas para Montacargas y Cargadores"
                        class="absolute inset-0 h-full w-full object-cover object-center"
                        loading="lazy"
                        decoding="async"
                        width="1200"
                        height="900"
                    >
                </div>

                <div class="relative flex min-h-[360px] items-center overflow-hidden px-6 py-12 sm:px-10 md:px-14 lg:min-h-[617px] lg:px-[78px] lg:py-[70px]">
                    <div class="absolute inset-0">
                        <x-responsive-image
                            path="heros/venta-de-llantas-para-montacargas.jpg"
                            alt="Venta de llantas para montacargas"
                            class="h-full w-full object-cover object-center"
                            sizes="100vw"
                        />
                    </div>

                    <div class="absolute inset-0 bg-black/20"></div>

                    <div class="relative z-10 w-full max-w-[620px]">
                        <p class="mb-[24px] font-['Roboto',sans-serif] text-[20px] font-normal leading-none sm:text-[22px]">
                            <span class="font-bold text-[#e76a3e]">NOSOTROS</span>
                        </p>

                        <h2 class="mb-[24px] font-['Roboto',sans-serif] text-[30px] font-bold leading-[1.05] text-white sm:text-[40px] md:text-[48px] lg:text-[54px]">
                            Compra a crédito, con entrega inmediata y Garantías. Las mejores Llantas para el manejo de materiales en la Industria.
                        </h2>

                        <p class="mb-[28px] font-['Roboto',sans-serif] text-[16px] font-normal leading-[1.75] text-white">
                            Distribuidor Autorizado. Soluciones para Montacargas, Cargadores, Manipuladores y maquinaria de Construcción. Trelleborg fabrica las llantas de alta gama más resistentes y duraderas para aplicaciones demandantes. Ofrecemos los precios más bajos, entrega inmediata, crédito y asesoría técnica en la selección e instalación.
                        </p>

                        <div>
                            <a
                                href="{{ url('/somos') }}"
                                class="inline-flex min-h-[56px] items-center justify-center rounded-[4px] bg-[#e76a3e] px-[28px] py-[15px] font-['Roboto',sans-serif] text-[16px] font-medium leading-[16px] text-white transition duration-300 hover:bg-[#d94d00]"
                            >
                                CONOCER MÁS
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contacto --}}
    <section
        id="contacto"
        class="relative box-border block overflow-hidden transition-[background,border,border-radius,box-shadow] duration-300 cv-auto"
        role="region"
        aria-label="Formulario de contacto"
    >
        <div class="absolute inset-0" aria-hidden="true">
            <x-responsive-image
                path="heros/venta-de-llantas-para-montacargas.jpg"
                alt=""
                class="h-full w-full object-cover object-center"
                sizes="100vw"
            />
        </div>

        <div class="pointer-events-none absolute inset-0 bg-black/45" aria-hidden="true"></div>

        <div class="relative mx-auto flex max-w-[1140px]">
            <div class="relative box-border flex min-h-px w-full">
                <div class="relative box-border flex w-full flex-wrap content-start p-2.5">
                    <div class="w-full">
                        <div class="h-[56px] md:h-[104px]"></div>
                    </div>

                    <div class="z-10 mb-5 w-full text-center">
                        <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[24px] font-semibold leading-[1.2] text-white sm:text-[30px] lg:text-[42px] lg:leading-[42px]">
                            COTIZA EN LINEA O SOLICITA UNA ASESORIA:
                        </h2>
                    </div>

                    <div class="z-10 mx-auto mb-5 w-full max-w-[980px]">
                        <div class="rounded-[18px] border border-white/15 p-4 shadow-[0_20px_60px_rgba(0,0,0,0.35)] backdrop-blur-[2px] md:p-7">
                            <div id="hs-form-contacto-ruguex" data-hs-form-contacto>
                                <div class="min-h-[320px] flex items-center justify-center text-white/80">
                                    Cargando formulario...
                                </div>
                                <noscript>
                                    <p class="text-white">Activa JavaScript para ver el formulario de contacto.</p>
                                </noscript>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <div class="h-[56px] md:h-[104px]"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
(() => {
    const formContainer = document.querySelector('#hs-form-contacto-ruguex');
    if (!formContainer) return;

    const triggerButtons = document.querySelectorAll('[data-load-hubspot]');
    let loaded = false;
    let loading = false;
    let observer = null;

    const createForm = () => {
        if (
            window.hbspt &&
            window.hbspt.forms &&
            typeof window.hbspt.forms.create === 'function' &&
            !formContainer.querySelector('.hbspt-form')
        ) {
            formContainer.innerHTML = '';

            window.hbspt.forms.create({
                region: 'na1',
                portalId: '7547674',
                formId: 'f8177bc5-6a7b-4364-92a4-1731bef2ecdd',
                target: '#hs-form-contacto-ruguex'
            });
        }
    };

    const loadHubSpot = () => {
        if (loaded || loading) return;

        if (window.hbspt?.forms?.create) {
            loaded = true;
            createForm();
            if (observer) observer.disconnect();
            return;
        }

        loading = true;

        const script = document.createElement('script');
        script.src = 'https://js.hsforms.net/forms/shell.js';
        script.async = true;
        script.defer = true;

        script.onload = () => {
            loaded = true;
            loading = false;
            createForm();
            if (observer) observer.disconnect();
        };

        script.onerror = () => {
            loading = false;
        };

        document.body.appendChild(script);
    };

    triggerButtons.forEach((button) => {
        button.addEventListener('click', () => {
            loadHubSpot();
        }, { passive: true });
    });

    if ('IntersectionObserver' in window) {
        observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    loadHubSpot();
                }
            });
        }, {
            rootMargin: '100px 0px'
        });

        observer.observe(formContainer);
    } else {
        window.addEventListener('load', () => {
            setTimeout(loadHubSpot, 3000);
        }, { once: true });
    }
})();
</script>
@endpush