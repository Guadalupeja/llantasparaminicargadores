@extends('layouts.public')

@push('meta')
    @php
        $features = is_array($product->features) ? $product->features : [];
        $category = $product->category;

        $categoryUrl = $category?->slug === 'llantas-solidas-para-minicargador'
            ? url('/llantas-solidas-para-minicargador')
            : url('/llantas-neumaticas-para-minicargador');

        $productUrl = $category?->slug === 'llantas-solidas-para-minicargador'
            ? url('/llantas-solidas-para-minicargador/' . $product->slug)
            : url('/llantas-neumaticas-para-minicargador/' . $product->slug);

        $productImage = $product->hero_image
            ? asset('storage/' . ltrim($product->hero_image, '/'))
            : asset('images/seo/default.jpg');

        $productDescription = $product->body_intro
            ?: ($product->highlight_text ?: ('Llanta para minicargador ' . $product->name));

        $productStructuredData = [
            '@context' => 'https://schema.org',
            '@graph' => [
                [
                    '@type' => 'WebPage',
                    '@id' => $productUrl . '#webpage',
                    'url' => $productUrl,
                    'name' => $seo['title'] ?? $product->name,
                    'description' => $seo['description'] ?? $productDescription,
                    'isPartOf' => [
                        '@id' => url('/') . '#website',
                    ],
                    'inLanguage' => 'es-MX',
                    'breadcrumb' => [
                        '@id' => $productUrl . '#breadcrumb',
                    ],
                    'primaryImageOfPage' => [
                        '@type' => 'ImageObject',
                        'url' => $productImage,
                    ],
                    'mainEntity' => [
                        '@id' => $productUrl . '#product',
                    ],
                ],
                [
                    '@type' => 'BreadcrumbList',
                    '@id' => $productUrl . '#breadcrumb',
                    'itemListElement' => array_values(array_filter([
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'Inicio',
                            'item' => url('/'),
                        ],
                        $category ? [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => $category->name,
                            'item' => $categoryUrl,
                        ] : null,
                        [
                            '@type' => 'ListItem',
                            'position' => 3,
                            'name' => $product->name,
                            'item' => $productUrl,
                        ],
                    ])),
                ],
                [
                    '@type' => 'Product',
                    '@id' => $productUrl . '#product',
                    'name' => $product->name,
                    'url' => $productUrl,
                    'image' => [$productImage],
                    'description' => $productDescription,
                    'category' => $category?->name,
                    'brand' => [
                        '@type' => 'Brand',
                        'name' => 'Ruguex',
                    ],
                    'additionalProperty' => collect($features)->map(function ($feature, $index) {
                        return [
                            '@type' => 'PropertyValue',
                            'name' => 'Característica ' . ($index + 1),
                            'value' => $feature,
                        ];
                    })->values()->all(),
                ],
            ],
        ];
    @endphp

    @php
    $heroPreload = $product->hero_image
        ? asset('storage/' . ltrim($product->hero_image, '/'))
        : null;
@endphp

@if ($heroPreload)
    <link rel="preload" as="image" href="{{ $heroPreload }}" fetchpriority="high">
@endif

    <script type="application/ld+json">
        {!! json_encode($productStructuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush





@section('content')
@php
    $features = is_array($product->features) ? $product->features : [];
    $applications = is_array($product->applications) ? $product->applications : [];
    $specifications = is_array($product->specifications) ? $product->specifications : [];
    $gallery = is_array($product->gallery) ? $product->gallery : [];

    $heroImage = $product->hero_image
        ? asset('storage/' . ltrim($product->hero_image, '/'))
        : null;

    $category = $product->category;

    $categoryUrl = $category?->slug === 'llantas-solidas-para-minicargador'
        ? url('/llantas-solidas-para-minicargador')
        : url('/llantas-neumaticas-para-minicargador');

    $categoryTitle = $category?->title ?: $category?->name;
    $categoryIntro = $category?->intro;
@endphp

<section class="bg-[#f5f5f5]">
    <div class="mx-auto max-w-[1140px] px-4 py-4 sm:py-5 md:py-6">
        <x-breadcrumbs :items="[
            ['label' => 'Inicio', 'url' => url('/')],
            ['label' => $product->category?->name, 'url' => $categoryUrl],
            ['label' => $product->name],
        ]" />
    </div>
</section>

@if ($category)
    <section class="bg-[#f5f5f5]">
        <div class="mx-auto max-w-[1140px] px-4 pb-6 text-center sm:pb-8 md:pb-10">
            <h1 class="m-0 font-['Roboto',sans-serif] text-[24px] font-semibold leading-[1.25] text-black sm:text-[28px] md:text-[33px] md:leading-[42.9px]">
                {{ $categoryTitle }}
            </h1>

            @if ($categoryIntro)
                <p class="mx-auto mt-4 mb-0 max-w-[760px] font-['Roboto',sans-serif] text-[15px] font-normal leading-7 text-[#7a7a7a] sm:mt-5 sm:text-[16px]">
                    {{ $categoryIntro }}
                </p>
            @endif
        </div>
    </section>
@endif

<section class="bg-[#ffffff]">
    <div class="mx-auto max-w-[1140px] px-4 pb-12 sm:pb-14 md:pb-16">
        <div class="grid items-start gap-8 sm:gap-10 lg:grid-cols-[minmax(280px,360px)_minmax(0,1fr)] lg:gap-12">
            <div class="flex justify-center lg:justify-start">
                @if($product->hero_image)
                    <x-responsive-image
                        :path="$product->hero_image"
                        :alt="$product->name"
                        class="h-auto w-full max-w-[220px] object-contain sm:max-w-[280px] md:max-w-[320px] lg:max-w-[350px]"
                        sizes="(min-width: 1024px) 350px, (min-width: 768px) 320px, (min-width: 640px) 280px, 220px"
                        :lazy="false"
                        fetchpriority="high"
                        width="350"
                        height="350"
                    />
                @endif
            </div>

            <div class="min-w-0">
                <h2 class="text-[28px] font-semibold leading-[1.15] text-black sm:text-[32px] md:text-[38px]">
                    {{ $product->name }}
                </h2>

                @if($product->highlight_text)
                    <div class="mt-4 inline-block max-w-full bg-[#e76a3e] px-4 py-3 text-[15px] font-semibold leading-[1.35] text-white sm:mt-5 sm:px-5 sm:text-[16px] md:text-[17px]">
                        {{ $product->highlight_text }}
                    </div>
                @endif

                @if($product->body_intro)
                    <div class="mt-5 max-w-[760px] text-[15px] leading-7 text-[#7a7a7a] sm:mt-6 sm:text-[16px] sm:leading-8">
                        <p>{{ $product->body_intro }}</p>
                    </div>
                @endif

                @if(count($features))
                    <ul class="mt-5 space-y-2 pl-5 text-[15px] leading-7 text-[#7a7a7a] sm:mt-6 sm:space-y-3 sm:pl-6 sm:text-[16px] sm:leading-8">
                        @foreach($features as $feature)
                            <li class="list-disc">{{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mt-7 flex flex-col gap-3 sm:mt-8 sm:flex-row sm:flex-wrap sm:gap-4">
                    @if($product->cta_primary_text && $product->cta_primary_url)
                        <a
                            href="{{ $product->cta_primary_url }}"
                            class="inline-flex min-h-[48px] w-full items-center justify-center bg-black px-6 py-3 text-center text-[15px] font-semibold text-white transition hover:bg-zinc-800 sm:min-h-[46px] sm:w-auto sm:px-8 sm:text-[16px]"
                        >
                            {{ $product->cta_primary_text }}
                        </a>
                    @endif

                    @if($product->cta_secondary_text && $product->cta_secondary_url)
                        <a
                            href="{{ asset('storage/' . ltrim($product->cta_secondary_url, '/')) }}"
                            download
                            class="inline-flex min-h-[48px] w-full items-center justify-center bg-[#e76a3e] px-6 py-3 text-center text-[15px] font-semibold text-white transition hover:bg-[#d85c31] sm:min-h-[46px] sm:w-auto sm:px-8 sm:text-[16px]"
                        >
                            {{ $product->cta_secondary_text }}
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Contacto --}}
<section
    id="contacto"
    class="relative block overflow-hidden"
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

    <div class="absolute inset-0 bg-black/45" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-[1140px] px-4">
        <div class="py-14 sm:py-16 md:py-20 lg:py-24">
            <div class="mb-5 text-center sm:mb-6">
                <h2 class="m-0 font-['Roboto',sans-serif] text-[24px] font-semibold leading-[1.2] text-white sm:text-[30px] md:text-[34px] lg:text-[42px] lg:leading-[1.1]">
                    COTIZA EN LINEA O SOLICITA UNA ASESORIA:
                </h2>
            </div>

            <div class="mx-auto w-full max-w-[980px]">
                <div class="rounded-[18px] border border-white/15 p-4 shadow-[0_20px_60px_rgba(0,0,0,0.35)] backdrop-blur-[2px] sm:p-5 md:p-7">
                    <div id="hs-form-contacto-ruguex" data-hs-form-contacto>
                        <div class="flex min-h-[260px] items-center justify-center text-center text-white/80 sm:min-h-[320px]">
                            Cargando formulario...
                        </div>
                        <noscript>
                            <p class="text-white">Activa JavaScript para ver el formulario de contacto.</p>
                        </noscript>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        (() => {
            const formContainer = document.querySelector('#hs-form-contacto-ruguex');
            if (!formContainer) return;

            let loaded = false;

            const initHubSpotForm = () => {
                if (loaded) return;
                loaded = true;

                const script = document.createElement('script');
                script.src = 'https://js.hsforms.net/forms/shell.js';
                script.async = true;
                script.defer = true;

                script.onload = () => {
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

                document.body.appendChild(script);
            };

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            initHubSpotForm();
                            observer.disconnect();
                        }
                    });
                }, {
                    rootMargin: '300px 0px'
                });

                observer.observe(formContainer);
            } else {
                window.addEventListener('load', initHubSpotForm, { once: true });
            }
        })();
    </script>
@endpush

@endsection