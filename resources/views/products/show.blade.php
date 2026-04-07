@extends('layouts.public')

@section('content')
@php
    $features = is_array($product->features) ? $product->features : [];
    $applications = is_array($product->applications) ? $product->applications : [];
    $specifications = is_array($product->specifications) ? $product->specifications : [];
    $gallery = is_array($product->gallery) ? $product->gallery : [];

    $heroImage = $product->hero_image
        ? asset('storage/' . ltrim($product->hero_image, '/'))
        : null;

    $categoryUrl = $product->category?->slug === 'llantas-solidas-para-minicargador'
        ? url('/llantas-solidas-para-minicargador')
        : url('/llantas-neumaticas-para-minicargador');
@endphp


<section class="bg-[#f5f5f5]">
    <div class="mx-auto max-w-[1140px] px-4 py-6">
        <x-breadcrumbs :items="[
            ['label' => 'Inicio', 'url' => url('/')],
            ['label' => $product->category?->name, 'url' => $categoryUrl],
            ['label' => $product->name],
        ]" />
    </div>
</section>







<section class="bg-[#ffffff]">
    <div class="mx-auto max-w-[1140px] px-4 pb-16">
        <div class="grid gap-10 lg:grid-cols-[360px_minmax(0,1fr)]">
            <div class="flex justify-center lg:justify-start">
                @if($product->hero_image)
                    <x-responsive-image
                        :path="$product->hero_image"
                        :alt="$product->name"
                        class="h-auto w-full max-w-[350px] object-contain"
                        sizes="(min-width: 1024px) 350px, 100vw"
                    />
                @endif
            </div>

            <div>
                <h2 class="text-[32px] font-semibold leading-tight text-black">
                    {{ $product->name }}
                </h2>

                @if($product->highlight_text)
                    <div class="mt-5 inline-block bg-[#ff6a00] px-5 py-3 text-[17px] font-semibold leading-tight text-white">
                        {{ $product->highlight_text }}
                    </div>
                @endif

                @if($product->body_intro)
                    <div class="mt-6 max-w-[760px] text-[16px] leading-8 text-[#7a7a7a]">
                        <p>{{ $product->body_intro }}</p>
                    </div>
                @endif

                @if(count($features))
                    <ul class="mt-6 space-y-2 pl-6 text-[16px] leading-8 text-[#7a7a7a]">
                        @foreach($features as $feature)
                            <li class="list-disc">{{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="mt-8 flex flex-wrap gap-4">
                @if($product->cta_primary_text && $product->cta_primary_url)
                    <a
                        href="{{ $product->cta_primary_url }}"
                        class="inline-flex min-h-[46px] items-center justify-center bg-black px-8 py-3 text-[16px] font-semibold text-white transition hover:bg-zinc-800"
                    >
                        {{ $product->cta_primary_text }}
                    </a>
                @endif

                @if($product->cta_secondary_text && $product->cta_secondary_url)
                    <a
                        href="{{ asset('storage/' . ltrim($product->cta_secondary_url, '/')) }}"
                        download
                        class="inline-flex min-h-[46px] items-center justify-center bg-[#ef3d3d] px-8 py-3 text-[16px] font-semibold text-white transition hover:bg-red-700"
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

        <div class="pointer-events-none absolute inset-0" aria-hidden="true"></div>

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