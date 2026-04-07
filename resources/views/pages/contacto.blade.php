@extends('layouts.public')

@push('meta')
    @php
        $contactStructuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            '@id' => url('/contacto') . '#contactpage',
            'url' => url('/contacto'),
            'name' => $seo['title'] ?? 'Contacto | Ruguex',
            'description' => $seo['description'] ?? '',
            'inLanguage' => 'es-MX',
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($contactStructuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')

<section class="propuesta-valor-bg font-bold relative block w-full box-border bg-cover bg-center bg-no-repeat pt-[20px] md:py-[50px] lg:pt-[85px]"
style="background-image: url('{{ asset('img/llantas-de-montacarga-1.webp') }}');">
    <div class="lg:mx-[80px]">
        <div class="mb-[30px] mx-[80px] flex border-b border-[#e1e1e1] pb-[10px]">
            <ul class="m-0 mb-5 list-none p-0">
                <li class="relative flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="mailto:ventas@llantasdemontacargas.com" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-envelope block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">ventas@llantasdemontacargas.com</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <span class="relative top-0 flex pr-[5px] text-left">
                        <i aria-hidden="true" class="fa-solid fa-location-dot block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                    </span>
                    <span class="block self-center pl-[5px] font-['Roboto',sans-serif] text-white">Avenida 125 Oriente #224, Guadalupe Hidalgo. Puebla. C.P. 72494.</span>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(83)3246-2205" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(83)3246-2205</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(83)3239-5885" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(83)3239-5885</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(22)2227-3866" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(22)2227-3866</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start pb-[5px] text-left text-[16px]">
                    <a href="tel:(59)5112-4238" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(59)5112-4238</span>
                    </a>
                </li>

                <li class="relative mt-[5px] flex items-center justify-start text-left text-[16px]">
                    <a href="tel:(55)5752-1715" target="_blank" class="flex w-full items-center justify-start bg-transparent font-['Roboto',sans-serif] text-[16px] text-[#e64e4e] no-underline shadow-none transition duration-300 ease-in-out">
                        <span class="relative top-0 flex pr-[5px] text-left">
                            <i aria-hidden="true" class="fa-solid fa-phone block w-[1.25em] text-[16px] leading-[16px] text-white"></i>
                        </span>
                        <span class="block self-center pl-[5px] text-white">(55)5752-1715</span>
                    </a>
                </li>
            </ul>
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