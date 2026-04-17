@extends('layouts.public')

@push('meta')
@php
    $items = collect($landing['mosaic_items'] ?? [])->values();

    $carouselSlidesDesktop = $items->chunk(3);
    $carouselSlidesMobile = $items->map(fn ($item) => collect([$item]));

    $itemListElements = collect($landing['mosaic_items'] ?? [])->values()->map(function ($item, $index) {
        return [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'url' => $item['url'],
            'name' => $item['label'],
        ];
    })->all();

    $offerCatalogItems = collect($landing['mosaic_items'] ?? [])->values()->map(function ($item) use ($landing) {
        return [
            '@type' => 'Offer',
            'url' => $item['url'],
            'availability' => 'https://schema.org/InStock',
            'itemOffered' => [
                '@type' => 'Product',
                'name' => $item['label'],
                'description' => $item['description'],
                'brand' => [
                    '@type' => 'Brand',
                    'name' => $landing['schema']['brand_name'] ?? 'Trelleborg',
                ],
                'manufacturer' => [
                    '@type' => 'Organization',
                    'name' => $landing['schema']['manufacturer_name'] ?? 'Trelleborg',
                ],
                'image' => !empty($item['image_path'])
                    ? asset('storage/originals/' . ltrim($item['image_path'], '/'))
                    : ($item['image'] ?? null),
            ],
        ];
    })->all();

    $breadcrumbItems = collect($landing['breadcrumbs'] ?? [])->values()->map(function ($item, $index) {
        $entry = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
        ];

        if (!empty($item['url'])) {
            $entry['item'] = $item['url'];
        }

        return $entry;
    })->all();

    $structuredData = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => url('/') . '#organization',
                'name' => 'Ruguex',
                'url' => url('/'),
                'logo' => asset('img/home/logo-ruguex.png'),
            ],
            [
                '@type' => 'WebSite',
                '@id' => url('/') . '#website',
                'url' => url('/'),
                'name' => 'Ruguex',
                'publisher' => ['@id' => url('/') . '#organization'],
                'inLanguage' => 'es-MX',
            ],
            [
                '@type' => 'WebPage',
                '@id' => url()->current() . '#webpage',
                'url' => url()->current(),
                'name' => $seo['title'],
                'description' => $seo['description'],
                'isPartOf' => ['@id' => url('/') . '#website'],
                'about' => [
                    '@type' => 'Thing',
                    'name' => $landing['measure_display'] . ' Bobcat',
                ],
                'primaryImageOfPage' => $seo['image'] ?? null,
                'inLanguage' => 'es-MX',
            ],
            [
                '@type' => 'BreadcrumbList',
                '@id' => url()->current() . '#breadcrumb',
                'itemListElement' => $breadcrumbItems,
            ],
            [
                '@type' => 'ItemList',
                '@id' => url()->current() . '#itemlist',
                'name' => $landing['schema']['item_list_name'] ?? $seo['title'],
                'itemListElement' => $itemListElements,
            ],
            [
                '@type' => 'Brand',
                '@id' => url()->current() . '#brand',
                'name' => $landing['schema']['brand_name'] ?? 'Trelleborg',
            ],
            [
                '@type' => 'OfferCatalog',
                '@id' => url()->current() . '#catalog',
                'name' => 'Catálogo de llantas para minicargador Bobcat',
                'itemListElement' => $offerCatalogItems,
            ],
            [
                '@type' => 'FAQPage',
                '@id' => url()->current() . '#faq',
                'mainEntity' => collect($landing['faq'] ?? [])->map(fn ($item) => [
                    '@type' => 'Question',
                    'name' => $item['q'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $item['a'],
                    ],
                ])->values()->all(),
            ],
        ],
    ];

    $structuredData['@graph'] = array_values(array_filter($structuredData['@graph'], function ($item) {
        if (($item['@type'] ?? null) === 'BreadcrumbList') {
            return !empty($item['itemListElement']);
        }

        if (($item['@type'] ?? null) === 'ItemList') {
            return !empty($item['itemListElement']);
        }

        if (($item['@type'] ?? null) === 'OfferCatalog') {
            return !empty($item['itemListElement']);
        }

        return true;
    }));
@endphp

@if (!empty($seo['keywords']))
<meta name="keywords" content="{{ $seo['keywords'] }}">
@endif

<script type="application/ld+json">
{!! json_encode($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush

@section('content')
<div class="rgx-landing">

    {{-- HERO --}}
    <section class="rgx-hero">
        <div class="rgx-hero__media">
            <x-responsive-image
                :path="$landing['hero_image']"
                :alt="$landing['title']"
                class="rgx-hero__img"
                sizes="100vw"
                loading="eager"
                fetchpriority="high"
            />
        </div>

        <div class="ruguex-container rgx-hero__inner">
            <span class="rgx-badge">{{ $landing['badge'] }}</span>
            <h1 class="rgx-title">{{ $landing['title'] }}</h1>
            <p class="rgx-subtitle">{{ $landing['description'] }}</p>

            <div class="rgx-btns">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotiza ahora</a>
                <a class="rgx-btn rgx-btn-secondary" href="{{ $landing['shop_url'] }}" target="_blank" rel="noopener">Compra en línea</a>
            </div>
        </div>
    </section>

    {{-- FRANJA --}}
    <section class="rgx-band">
        <div class="ruguex-container">
            <p>25% más vida llanta contra llanta, GARANTIZADO por escrito.</p>
        </div>
    </section>

    {{-- CARRUSEL DE PRODUCTOS --}}
{{-- CARRUSEL DE PRODUCTOS --}}
@if ($items->isNotEmpty())
<section class="rgx-section rgx-light">
    <div class="ruguex-container">
        <h2 class="rgx-h2 rgx-text-center">
            Compra en línea llantas Bobcat {{ $landing['measure_display'] }}
        </h2>
        <p class="rgx-subtitle rgx-text-center">
            Modelos sólidos y neumáticos Trelleborg disponibles para entrega inmediata.
        </p>

        {{-- Desktop / Tablet: 3 productos por slide --}}
        <div class="hidden md:block">
            <div class="rgx-carousel" data-rgx-carousel>
                <button type="button" class="rgx-carousel__nav rgx-carousel__nav--prev" data-rgx-prev aria-label="Producto anterior">
                    ‹
                </button>

                <div class="rgx-carousel__viewport">
                    <div class="rgx-carousel__track" data-rgx-track>
                        @foreach ($carouselSlidesDesktop as $slide)
                            <div class="rgx-carousel__slide">
                                <div class="rgx-carousel__slide-grid">
                                    @foreach ($slide as $item)
                                        <a href="{{ $item['url'] }}" target="_blank" rel="noopener" class="rgx-shop-card rgx-shop-card--single">
                                            <div class="rgx-shop-card__image">
                                                @if (!empty($item['image_path']))
                                                    <x-responsive-image
                                                        :path="$item['image_path']"
                                                        :alt="$item['label']"
                                                        class="rgx-shop-card__img"
                                                        sizes="(min-width: 1100px) 33vw, (min-width: 768px) 50vw, 100vw"
                                                    />
                                                @else
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['label'] }}" class="rgx-shop-card__img" loading="lazy" decoding="async">
                                                @endif
                                            </div>

                                            <div class="rgx-shop-card__body">
                                                @if (!empty($item['promo']))
                                                    <span class="rgx-shop-card__promo">{{ $item['promo'] }}</span>
                                                @endif

                                                <span class="rgx-shop-card__badge">{{ $item['type_label'] }}</span>
                                                <h3 class="rgx-shop-card__title">{{ $item['label'] }}</h3>
                                                <p class="rgx-shop-card__text">{{ $item['description'] }}</p>
                                                <p class="rgx-shop-card__price">{{ $item['price'] }}</p>
                                                <span class="rgx-shop-card__cta">Ver producto</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" class="rgx-carousel__nav rgx-carousel__nav--next" data-rgx-next aria-label="Producto siguiente">
                    ›
                </button>
            </div>
        </div>

        {{-- Móvil: 1 producto por slide --}}
        <div class="md:hidden">
            <div class="rgx-carousel rgx-carousel--mobile" data-rgx-carousel>
                <button type="button" class="rgx-carousel__nav rgx-carousel__nav--prev" data-rgx-prev aria-label="Producto anterior">
                    ‹
                </button>

                <div class="rgx-carousel__viewport">
                    <div class="rgx-carousel__track" data-rgx-track>
                        @foreach ($carouselSlidesMobile as $slide)
                            <div class="rgx-carousel__slide">
                                <div class="rgx-carousel__slide-grid rgx-carousel__slide-grid--single">
                                    @foreach ($slide as $item)
                                        <a href="{{ $item['url'] }}" target="_blank" rel="noopener" class="rgx-shop-card rgx-shop-card--single">
                                            <div class="rgx-shop-card__image">
                                                @if (!empty($item['image_path']))
                                                    <x-responsive-image
                                                        :path="$item['image_path']"
                                                        :alt="$item['label']"
                                                        class="rgx-shop-card__img"
                                                        sizes="100vw"
                                                    />
                                                @else
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['label'] }}" class="rgx-shop-card__img" loading="lazy" decoding="async">
                                                @endif
                                            </div>

                                            <div class="rgx-shop-card__body">
                                                @if (!empty($item['promo']))
                                                    <span class="rgx-shop-card__promo">{{ $item['promo'] }}</span>
                                                @endif

                                                <span class="rgx-shop-card__badge">{{ $item['type_label'] }}</span>
                                                <h3 class="rgx-shop-card__title">{{ $item['label'] }}</h3>
                                                <p class="rgx-shop-card__text">{{ $item['description'] }}</p>
                                                <p class="rgx-shop-card__price">{{ $item['price'] }}</p>
                                                <span class="rgx-shop-card__cta">Ver producto</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="button" class="rgx-carousel__nav rgx-carousel__nav--next" data-rgx-next aria-label="Producto siguiente">
                    ›
                </button>
            </div>
        </div>
    </div>
</section>
@endif

    {{-- INTRO --}}
    <section class="rgx-section rgx-accent">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <h2 class="rgx-h2">{{ $landing['intro_title'] }}</h2>
                <p class="rgx-text">{{ $landing['intro_text_1'] }}</p>
                <p class="rgx-text">{{ $landing['intro_text_2'] }}</p>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar asesoría</a>
                    <a class="rgx-btn rgx-btn-secondary-dark" href="{{ $landing['shop_url'] }}" target="_blank" rel="noopener">Ver opciones</a>
                </div>
            </div>

            <div class="rgx-cover">
                <x-responsive-image
                    :path="$landing['intro_image']"
                    :alt="$landing['intro_title']"
                    class="rgx-cover__img"
                    sizes="(min-width: 1024px) 50vw, 100vw"
                />
            </div>
        </div>
    </section>

    {{-- BLOQUE BOBCAT --}}
    @if (!empty($landing['bobcat']))
    <section class="rgx-section">
        <div class="ruguex-container">
            <div class="rgx-bobcat-wrap">
                <div class="rgx-bobcat-main">
                    <div class="rgx-bobcat-main__media">
                        <x-responsive-image
                            :path="$landing['bobcat_visual_image']"
                            :alt="$landing['bobcat']['title']"
                            class="rgx-bobcat-main__img"
                            sizes="(min-width: 1100px) 360px, 100vw"
                        />
                    </div>

                    <h2 class="rgx-h2">{{ $landing['bobcat']['title'] }}</h2>
                    <p class="rgx-text">{{ $landing['bobcat']['text'] }}</p>

                    <ul class="rgx-list">
                        @foreach ($landing['bobcat']['models'] as $model)
                            <li>{{ $model }}</li>
                        @endforeach
                    </ul>

                    <div class="rgx-block-cta">
                        <a class="rgx-btn rgx-btn-primary" href="{{ $landing['bobcat']['url'] }}" target="_blank" rel="noopener">
                            Ver más modelos Bobcat
                        </a>
                    </div>
                </div>

                <div class="rgx-bobcat-side">
                    <div class="rgx-card rgx-bobcat-highlight">
                        <h3 class="rgx-h3">¿Qué solución Trelleborg te conviene?</h3>
                        <p class="rgx-text">
                            Para esta medida podemos llevar al usuario desde opciones neumáticas reforzadas y para condiciones extremas, como SK-02 y SK-05, hasta soluciones sólidas premium Brawler para trabajo severo. Así cubrimos construcción, residuos, reciclaje, patios de maniobra y superficies duras.
                        </p>
                    </div>

                    @if (!empty($landing['product_families']))
                        <div class="rgx-family-grid">
                            @foreach ($landing['product_families'] as $family)
                                <article class="rgx-family-card">
                                    <span class="rgx-family-card__tag">{{ $family['tag'] }}</span>
                                    <h3 class="rgx-family-card__title">{{ $family['name'] }}</h3>
                                    <p class="rgx-family-card__text">{{ $family['description'] }}</p>

                                    <ul class="rgx-family-card__list">
                                        @foreach ($family['highlights'] as $highlight)
                                            <li>{{ $highlight }}</li>
                                        @endforeach
                                    </ul>

                                    @if (!empty($family['spec_items']))
                                        <div class="rgx-family-card__spec-grid">
                                            @foreach ($family['spec_items'] as $spec)
                                                <div class="rgx-family-card__spec-item">
                                                    <span class="rgx-family-card__spec-label">{{ $spec['label'] }}</span>
                                                    <strong class="rgx-family-card__spec-value">{{ $spec['value'] }}</strong>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </article>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- COMPARATIVO SOLIDA / NEUMATICA --}}
    <section class="rgx-section">
        <div class="ruguex-container">
            <div class="rgx-grid-cards">
                <div class="rgx-card rgx-card-dark">
                    <h3 class="rgx-h3">{{ $landing['solid_title'] }}</h3>
                    <p class="rgx-text">{{ $landing['solid_text'] }}</p>

                    <ul class="rgx-list">
                        @foreach ($landing['solid_items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="rgx-block-cta">
                        <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotizar llanta sólida</a>
                    </div>
                </div>

                <div class="rgx-card">
                    <h3 class="rgx-h3">{{ $landing['pneumatic_title'] }}</h3>
                    <p class="rgx-text">{{ $landing['pneumatic_text'] }}</p>

                    <ul class="rgx-list">
                        @foreach ($landing['pneumatic_items'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <div class="rgx-block-cta">
                        <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Cotizar llanta neumática</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- TRELLEBORG / MODELOS --}}
    @if (!empty($landing['brands']))
    <section class="rgx-section rgx-light">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <h2 class="rgx-h2">
                    {{ $landing['measure'] === '12-16.5' ? 'Trelleborg, Brawler y SKS' : 'Trelleborg y Brawler' }}
                </h2>
                <p class="rgx-text">{{ $landing['brands']['manufacturer']['distributor_text'] }}</p>

                <ul class="rgx-list">
                    @foreach ($landing['brands']['models'] as $model)
                        <li>{{ $model }}</li>
                    @endforeach
                </ul>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="{{ $landing['brands']['manufacturer']['url'] }}" target="_blank" rel="noopener">
                        Ver fabricante Trelleborg
                    </a>
                </div>
            </div>

            <div>
                <h3 class="rgx-h3">Modelos destacados</h3>
                <p class="rgx-text">
                    Te ofrecemos configuraciones Trelleborg que generan confianza desde la búsqueda: Brawler HPS{{ $landing['measure'] === '12-16.5' ? ', SKS900' : '' }} y opciones neumáticas para distintos niveles de exigencia.
                </p>

                <div class="rgx-modelos-media">
                    <x-responsive-image
                        :path="$landing['featured_model_image']"
                        alt="Llanta para minicargador S550"
                        class="rgx-modelos-media__img"
                        sizes="(min-width: 1024px) 50vw, 100vw"
                    />
                </div>
            </div>
        </div>
    </section>
    @endif

    {{-- USOS --}}
    <section class="rgx-section rgx-accent">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <x-responsive-image
                    :path="$landing['uses_image']"
                    :alt="$landing['title']"
                    class="rgx-img"
                    sizes="(min-width: 1024px) 50vw, 100vw"
                />
            </div>

            <div>
                <h2 class="rgx-h2">{{ $landing['uses_title'] }}</h2>
                <p class="rgx-text">{{ $landing['uses_text'] }}</p>

                <ul class="rgx-list">
                    @foreach ($landing['uses_items'] as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Quiero una recomendación</a>
                </div>
            </div>
        </div>
    </section>

    {{-- VENTAJAS TECNICAS Y COMERCIALES --}}
    <section class="rgx-section">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">Ventajas de comprar con Ruguex</h2>

            <div class="rgx-grid-cards">
                <div class="rgx-card">
                    <h3 class="rgx-h3">Ventajas técnicas</h3>
                    <ul class="rgx-list">
                        @foreach ($landing['technical_values'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="rgx-card">
                    <h3 class="rgx-h3">Ventajas comerciales</h3>
                    <ul class="rgx-list">
                        @foreach ($landing['commercial_values'] as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="rgx-block-cta-center">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar cotización</a>
            </div>
        </div>
    </section>

    {{-- DISTRIBUIDOR --}}
    <section class="rgx-section rgx-light">
        <div class="ruguex-container rgx-grid-2">
            <div>
                <h2 class="rgx-h2">{{ $landing['distributor_title'] }}</h2>
                <p class="rgx-text">{{ $landing['distributor_text_1'] }}</p>
                <p class="rgx-text">{{ $landing['distributor_text_2'] }}</p>

                <div class="rgx-block-cta">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Hablar con un asesor</a>
                </div>
            </div>

            <div class="rgx-cover">
                <x-responsive-image
                    :path="$landing['distributor_image']"
                    :alt="$landing['distributor_title']"
                    class="rgx-cover__img"
                    sizes="(min-width: 1024px) 50vw, 100vw"
                />
            </div>
        </div>
    </section>

    {{-- CONTACTO / LOGISTICA --}}
    @if (!empty($landing['contact']))
    <section class="rgx-section rgx-accent">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">Contacto, stock y montaje</h2>

            <div class="rgx-grid-cards">
                <div class="rgx-card rgx-contact-card">
                    <h3 class="rgx-h3">{{ $landing['contact']['matriz'] }}</h3>
                    <p class="rgx-text">
                        Atención comercial y técnica para selección, cotización y seguimiento de llantas Bobcat. Matriz en Puebla y almacenes con entrega y montaje gratis en EDOMEX, PUEBLA, GTO, NL, SLP, JAL y AGS. Consulta stock y disponibilidad de prensa para montaje por WhatsApp.
                    </p>
                </div>

                <div class="rgx-card rgx-contact-card">
                    <h3 class="rgx-h3">Almacenes con entrega y montaje</h3>
                    <ul class="rgx-list">
                        @foreach ($landing['contact']['warehouses'] as $warehouse)
                            <li>{{ $warehouse }}</li>
                        @endforeach
                    </ul>
                    <p class="rgx-contact-note">{{ $landing['contact']['stock_note'] }}</p>
                </div>
            </div>

            <div class="rgx-block-cta-center">
                <a class="rgx-btn rgx-btn-primary" href="{{ $landing['contact']['whatsapp_url'] }}" target="_blank" rel="noopener">
                    Consultar stock por WhatsApp
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- FICHAS TECNICAS --}}
    @if (!empty($landing['technical_pdfs']))
    <section class="rgx-section rgx-light">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">
                Fichas técnicas de llantas Bobcat {{ $landing['measure_display'] }}
            </h2>
            <p class="rgx-subtitle rgx-text-center">
                Descarga fichas técnicas Trelleborg de las familias Brawler HPS, Brawler HD, SK-800 y SK-900 para comparar aplicaciones, capacidades de carga, medidas equivalentes y tipos de rin.
            </p>

            <div class="rgx-pdf-grid">
                @foreach ($landing['technical_pdfs'] as $pdf)
                    <a href="{{ $pdf['url'] }}" target="_blank" rel="noopener" class="rgx-pdf-card">
                        <span class="rgx-pdf-card__icon">PDF</span>
                        <span class="rgx-pdf-card__label">{{ $pdf['label'] }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- FAQ --}}
    <section class="rgx-section">
        <div class="ruguex-container">
            <h2 class="rgx-h2 rgx-text-center">
                Preguntas frecuentes sobre llantas Bobcat {{ $landing['measure_display'] }}
            </h2>

            <div class="rgx-faq">
                @foreach ($landing['faq'] as $item)
                    <details>
                        <summary>{{ $item['q'] }}</summary>
                        <p>{{ $item['a'] }}</p>
                    </details>
                @endforeach
            </div>

            <div class="rgx-block-cta-center">
                <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Resolver mis dudas y cotizar</a>
            </div>
        </div>
    </section>

    {{-- FORMULARIO --}}
    <section class="rgx-section rgx-form-section" id="cotizacion">
        <div class="ruguex-container">
            <div class="rgx-form-box rgx-form-box-dark">
                <h2 class="rgx-contacto-h2 rgx-text-center">
                    Cotiza tus llantas Bobcat {{ $landing['measure_display'] }}
                </h2>
                <p class="rgx-contacto-subtitle rgx-text-center">
                    Te ayudamos a elegir la mejor opción Trelleborg para tu operación: sólida o neumática.
                </p>

                <div id="{{ $landing['hubspot_target'] }}"></div>
            </div>
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="rgx-section">
        <div class="ruguex-container">
            <div class="rgx-cta-final">
                <h2 class="rgx-h2">{{ $landing['cta_title'] }}</h2>
                <p class="rgx-text">{{ $landing['cta_text'] }}</p>

                <div class="rgx-btns rgx-btns-center">
                    <a class="rgx-btn rgx-btn-primary" href="#cotizacion">Solicitar cotización</a>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

@push('scripts')
<script src="//js.hsforms.net/forms/shell.js" charset="utf-8"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.hbspt) {
        hbspt.forms.create({
            region: "na1",
            portalId: "7547674",
            formId: "f8177bc5-6a7b-4364-92a4-1731bef2ecdd",
            target: "#{{ $landing['hubspot_target'] }}"
        });
    }



    document.querySelectorAll('[data-rgx-carousel]').forEach(function (carousel) {
        const track = carousel.querySelector('[data-rgx-track]');
        const prevBtn = carousel.querySelector('[data-rgx-prev]');
        const nextBtn = carousel.querySelector('[data-rgx-next]');

        if (!track) return;

        const originalSlides = Array.from(track.children);
        if (originalSlides.length === 0) return;

        const firstClone = originalSlides[0].cloneNode(true);
        firstClone.setAttribute('data-rgx-clone', 'true');
        track.appendChild(firstClone);

        const slides = Array.from(track.children);

        let currentIndex = 0;
        let autoPlay = null;
        let isTransitioning = false;

        function updateCarousel(withTransition = true) {
            track.style.transition = withTransition ? 'transform .45s ease' : 'none';
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
        }

        function goNext() {
            if (isTransitioning) return;
            isTransitioning = true;
            currentIndex += 1;
            updateCarousel(true);
        }

        function goPrev() {
            if (isTransitioning) return;

            if (currentIndex === 0) {
                track.style.transition = 'none';
                currentIndex = slides.length - 2;
                track.style.transform = `translateX(-${currentIndex * 100}%)`;

                requestAnimationFrame(() => {
                    requestAnimationFrame(() => {
                        isTransitioning = true;
                        currentIndex -= 1;
                        updateCarousel(true);
                    });
                });

                return;
            }

            isTransitioning = true;
            currentIndex -= 1;
            updateCarousel(true);
        }

        function startAutoPlay() {
            if (originalSlides.length <= 1) return;
            stopAutoPlay();
            autoPlay = setInterval(goNext, 5000);
        }

        function stopAutoPlay() {
            if (autoPlay) {
                clearInterval(autoPlay);
                autoPlay = null;
            }
        }

        track.addEventListener('transitionend', function () {
            if (currentIndex === slides.length - 1) {
                currentIndex = 0;
                updateCarousel(false);
            }

            isTransitioning = false;
        });

        prevBtn?.addEventListener('click', function () {
            stopAutoPlay();
            goPrev();
            startAutoPlay();
        });

        nextBtn?.addEventListener('click', function () {
            stopAutoPlay();
            goNext();
            startAutoPlay();
        });

        carousel.addEventListener('mouseenter', stopAutoPlay);
        carousel.addEventListener('mouseleave', startAutoPlay);

        updateCarousel(false);
        startAutoPlay();
    });
});
</script>
@endpush