@extends('layouts.public')

@push('meta')
    @php
        $pageUrl = url('/llantas-solidas-para-minicargador');
        $pageTitle = $seo['title'] ?? 'Llantas sólidas para minicargador';
        $pageDescription = $seo['description'] ?? 'Llantas sólidas para minicargador imponchables, libres de mantenimiento y de uso rudo.';
        $pageImage = asset('storage/originals/heros/llantas-solidas-para-minicargadores.jpg');

        $itemListElements = [];
        $productGraph = [];

        foreach ($category->products as $index => $product) {
            $productUrl = url('/llantas-solidas-para-minicargador/' . $product->slug);
            $productImage = $product->hero_image
                ? asset('storage/originals/' . ltrim($product->hero_image, '/'))
                : asset('storage/originals/products/default-solid.jpg');

            $itemListElements[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'url' => $productUrl,
                'name' => $product->name,
            ];

            $productGraph[] = [
                '@type' => 'Product',
                '@id' => $productUrl . '#product',
                'name' => $product->name,
                'url' => $productUrl,
                'image' => [$productImage],
                'category' => $category->name,
                'brand' => [
                    '@type' => 'Brand',
                    'name' => 'Ruguex',
                ],
                'description' => $product->excerpt
                    ?? $product->short_description
                    ?? ('Llanta sólida para minicargador ' . $product->name),
                'isRelatedTo' => [
                    '@id' => $pageUrl . '#collectionpage',
                ],
            ];
        }

        $solidStructuredData = [
            '@context' => 'https://schema.org',
            '@graph' => array_merge([
                [
                    '@type' => 'CollectionPage',
                    '@id' => $pageUrl . '#collectionpage',
                    'url' => $pageUrl,
                    'name' => $pageTitle,
                    'description' => $pageDescription,
                    'inLanguage' => 'es-MX',
                    'primaryImageOfPage' => [
                        '@type' => 'ImageObject',
                        'url' => $pageImage,
                    ],
                ],
                [
                    '@type' => 'WebPage',
                    '@id' => $pageUrl . '#webpage',
                    'url' => $pageUrl,
                    'name' => $pageTitle,
                    'description' => $pageDescription,
                    'inLanguage' => 'es-MX',
                    'isPartOf' => [
                        '@type' => 'WebSite',
                        '@id' => url('/') . '#website',
                    ],
                    'breadcrumb' => [
                        '@id' => $pageUrl . '#breadcrumb',
                    ],
                    'about' => [
                        '@id' => $pageUrl . '#collectionpage',
                    ],
                ],
                [
                    '@type' => 'BreadcrumbList',
                    '@id' => $pageUrl . '#breadcrumb',
                    'itemListElement' => [
                        [
                            '@type' => 'ListItem',
                            'position' => 1,
                            'name' => 'Inicio',
                            'item' => url('/'),
                        ],
                        [
                            '@type' => 'ListItem',
                            'position' => 2,
                            'name' => $category->name,
                            'item' => $pageUrl,
                        ],
                    ],
                ],
                [
                    '@type' => 'ItemList',
                    '@id' => $pageUrl . '#itemlist',
                    'name' => 'Modelos de llantas sólidas para minicargador',
                    'url' => $pageUrl,
                    'numberOfItems' => count($category->products),
                    'itemListElement' => $itemListElements,
                ],
            ], $productGraph),
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($solidStructuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush


@section('content')
    {{-- Hero --}}
    <section class="relative overflow-hidden bg-black">
        <div class="absolute inset-0">
            <x-responsive-image
                path="heros/llantas-solidas-para-minicargadores.jpg"
                alt="Llantas sólidas para minicargadores"
                class="h-full w-full object-cover object-center"
                sizes="100vw"
                eager="true"
            />
        </div>

        <div class="absolute inset-0 bg-black/75"></div>

        <div class="relative mx-auto max-w-[1140px] px-[10px] py-[80px] md:py-[110px]">
            <h1 class="text-center font-['Roboto',sans-serif] text-[30px] lg:text-[40px] font-semibold leading-[1.2] text-white md:text-[32px]">
                {{ $category->h1 ?: 'Llantas sólidas para Minicargadores' }}
            </h1>
        </div>
    </section>

    {{-- Intro --}}
    <section class="bg-[#f5f5f5]">
        <div class="mx-auto max-w-[1140px] px-[10px] pt-[30px] pb-[10px]">
            <div class="text-center">
                <h2 class="m-0 font-['Roboto',sans-serif] text-[28px] font-semibold leading-[1.3] text-black md:text-[33px] md:leading-[42.9px]">
                    Llantas para Minicargador
                </h2>

                <p class="mt-5 mb-0 font-['Roboto',sans-serif] text-[16px] font-normal text-[#7a7a7a]">
                    {{ $category->intro ?: 'Imponchables, libres de mantenimiento y de uso rudo.' }}
                </p>
            </div>

            <div class="h-[30px]"></div>
        </div>
    </section>

    {{-- Productos --}}
    <section class="bg-[#f5f5f5]">
        <div class="mx-auto max-w-[1140px] px-[10px]">
            <div class="flex flex-wrap">
                @foreach ($category->products as $product)
                    @php
                        $productImage = $product->hero_image ?: 'products/default-solid.jpg';
                    @endphp

                    <article class="w-full md:w-1/2 lg:w-1/3">
                        <div class="flex h-full w-full flex-wrap content-start p-[10px]">
                            <div class="mb-5 w-full text-center">
                                <a href="{{ url('/llantas-solidas-para-minicargador/' . $product->slug) }}" class="inline-block">
                                    <x-responsive-image
                                        path="{{ $productImage }}"
                                        alt="{{ $product->name }}"
                                        class="inline-block h-auto max-w-full align-middle"
                                        sizes="(min-width: 1024px) 357px, (min-width: 768px) 50vw, 100vw"
                                    />
                                </a>
                            </div>

                            <div class="mb-5 w-full">
                                <div class="h-[20px]"></div>
                            </div>

                            <div class="w-full text-center">
                                <div class="mt-[-60px] bg-[#00063a] p-[15px] min-h-[98px]">
                                    <h2 class="m-0 font-['Roboto',sans-serif] text-[22px] font-semibold leading-[1.3] text-white md:text-[26px] md:leading-[33.8px]">
                                        <a
                                            href="{{ url('/llantas-solidas-para-minicargador/' . $product->slug) }}"
                                            class="text-white no-underline transition duration-200 hover:text-white"
                                        >
                                            {{ $product->name }}
                                        </a>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Botón tienda --}}
    <section class="bg-[#f5f5f5]">
        <div class="mx-auto max-w-[1140px] px-[20px] pb-[20px]">
            <div class="h-[20px]"></div>

            <div class="text-center">
                <a
                    href="https://llantasdemontacargas.com/tienda-en-linea/?swoof=1&product_cat=llantas-minicargadores"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center rounded-[3px] bg-[#e76a3e] px-[24px] py-[12px] lg:px-[34px] lg:py-[22px]  font-['Roboto',sans-serif] text-[15px] lg:text-[30px] font-medium leading-[15px] text-white transition duration-300 hover:bg-[#e85f00]"
                >
                    Ir a la tienda en línea
                </a>
            </div>

            <div class="h-[10px]"></div>
        </div>
    </section>

    {{-- Contacto --}}
    <section
        id="contacto"
        class="relative overflow-hidden bg-black"
        role="region"
        aria-label="Formulario de contacto"
    >
        <div class="absolute inset-0">
            <x-responsive-image
                path="heros/venta-de-llantas-para-montacargas.jpg"
                alt="Venta de llantas para montacargas"
                class="h-full w-full object-cover object-center"
                sizes="100vw"
            />
        </div>

        <div class="absolute inset-0 bg-black/50"></div>

        <div class="relative mx-auto max-w-[1140px] px-[10px]">
            <div class="h-[72px] md:h-[104px]"></div>

            <div class="mb-5 text-center">
                <h2 class="m-0 font-['Roboto',sans-serif] text-[24px] font-semibold leading-[1.2] text-white md:text-[32px] lg:text-[42px]">
                    COTIZA EN LINEA LLANTAS SÓLIDAS PARA MINICARGADOR O SOLICITA UNA ASESORIA:
                </h2>
            </div>

            <div class="mb-5">
                <div id="hs-form-solid-ruguex" class="min-h-[400px]">
                    <noscript>
                        <p class="text-white">Activa JavaScript para ver el formulario de contacto.</p>
                    </noscript>
                </div>
            </div>

            <div class="h-[72px] md:h-[104px]"></div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
(() => {
    const formContainer = document.querySelector('#hs-form-solid-ruguex');
    if (!formContainer) return;

    let loaded = false;

    const loadForm = () => {
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
                typeof window.hbspt.forms.create === 'function'
            ) {
                window.hbspt.forms.create({
                    region: 'na1',
                    portalId: '7547674',
                    formId: 'f8177bc5-6a7b-4364-92a4-1731bef2ecdd',
                    target: '#hs-form-solid-ruguex'
                });
            }
        };

        document.body.appendChild(script);
    };

    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    loadForm();
                    observer.disconnect();
                }
            });
        }, { rootMargin: '300px 0px' });

        observer.observe(formContainer);
    } else {
        window.addEventListener('load', loadForm, { once: true });
    }
})();
</script>
@endpush