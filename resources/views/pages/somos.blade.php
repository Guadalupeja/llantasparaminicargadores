@extends('layouts.public')

@section('content')



<section
  class="relative block box-border py-[70px] md:py-[90px] lg:py-[110px]"
  style="content-visibility:auto; contain-intrinsic-size: 950px;"
>
    <div class="relative mx-auto flex max-w-[1140px] flex-wrap md:flex-nowrap">
        <div class="relative flex min-h-px w-full md:w-1/2">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="pb-[20px] md:pb-[40px]">
                        <p class="mb-[20px]">Llantas para Montacargas, Minicargadores y Telehandlers.</p>
                        <p class="mb-[20px]">“Somos una comercializadora de equipos y refacciones especializadas al servicio de la Industria en México.</p>
                        <p class="mb-[20px]">Distribuimos desde el año 2010 la gama de producto del fabricante top Europeo Trelleborg, incluyendo entre otras líneas de producto, sus llantas Premium para manejo de materiales.&nbsp;</p>
                        <p class="mb-[20px]">A través de nuestra marca&nbsp;surtimos las llantas más resistentes y duraderas; para aplicaciones demandantes, a precios competitivos, con amplias existencias, asistencia y entrega directa en sitio.</p>
                        <p class="mb-[20px]">Conozca más de nuestra gama de producto en: bsh@bombasellos.com.mx”</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:flex md:min-h-px md:w-[7%]">
            <div class="relative flex w-full flex-wrap content-start"></div>
        </div>

        <div class="relative flex min-h-px w-full md:w-[42.996%]">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="w-full text-center">
                <x-responsive-image
                    path="about1-1.jpg"
                    alt="somos"
                    class="h-auto w-[150px] sm:w-[190px] lg:w-[500px]"
                    sizes="(min-width: 1024px) 300px, (min-width: 640px) 190px, 150px"
                />
                </div>
            </div>
        </div>
    </div>
</section>

<section
  class="propuesta-valor-bg relative block w-full box-border bg-cover bg-center bg-no-repeat py-[140px] md:py-[200px] lg:py-[270px]">

                    <div class="absolute inset-0">
                        <x-responsive-image
                            path="heros/venta-de-llantas-para-montacargas.jpg"
                            alt="Venta de llantas para montacargas"
                            class="h-full w-full object-cover object-center"
                            sizes="100vw"
                        />
                    </div>

  <div class="relative mx-auto flex max-w-[1140px] flex-wrap md:flex-nowrap">
    <div class="relative flex min-h-px w-full md:w-[45%]">
      <div class="relative flex w-full flex-wrap content-center items-center p-[10px]">
        <div class="relative mb-4 md:mb-5 w-full font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
          <div>
            <p class="mb-4 md:mb-5">
              <span class="text-white">
                <strong class="font-semibold">Conoce nuestra</strong>
              </span>
            </p>
          </div>
        </div>

        <div class="relative w-full font-['Roboto',sans-serif] text-[34px] leading-[1.1] md:text-[42px] lg:text-[51px] font-normal text-[#7a7a7a]">
          <div>
            <p class="mb-5">
              <span class="text-white">
                <strong class="font-semibold">Propuesta de valor</strong>
              </span>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="relative flex min-h-px w-full md:w-[55%]">
      <div class="relative flex w-full flex-wrap content-center items-center p-[10px]">
        <div class="relative w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal leading-[30px] md:leading-[33.6px] text-white">
          <div>
            <ul class="mt-0 mb-[10px] pl-5">
              <li>Producto Premium con más vida útil llanta v/s llanta, GARANTIZADO por escrito.</li>
              <li>Asistencia directa en sitio con fuerza de ventas en <b class="font-bold">Puebla, Ciudad de México, Estado de México, Monterrey, Guanajuato y Queretaro.</b></li>
              <li>Precios competitivos.</li>
              <li>Amplio Stock para entrega inmediata.</li>
              <li>Extendemos Crédito de forma rápida y sencilla.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<section
  class="relative block box-border py-[70px] md:py-[110px]"
  style="content-visibility:auto; contain-intrinsic-size: 1100px;"
id="trelleborg">
    <div class="relative mx-auto flex max-w-[1140px]">
        <div class="relative flex min-h-px w-full">
            <div class="relative flex w-full flex-wrap content-start p-[15px]">
                <div class="mb-5 w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="mb-5">
                        <p class="mb-5">Fundada en 1905, con presencia en 50 países y mas de 23 mil empleados, Trelleborg es un fabricante top Europeo de sellos hidráulicos, compuestos plásticos, mangueras, componentes automotrices y llantas industriales.</p>
                        <p class="mb-5">Su amplia experiencia desarrollando polímeros de alto desempeño para todo tipo de aplicaciones, le ha permitido posicionarse como el principal proveedor de las marcas de equipo original <strong class="font-semibold">Bobcat®, Case®, CAT®, Gehl®, New Holland®</strong>, entre otras.</p>
                        <p class="mb-5">Trelleborg es actualmente la marca mas innovadora del segmento, con patentes y desarrollos exclusivos en llantas para el manejo de materiales.</p>
                        <p class="mb-5">Sus llantas se caracterizan por ofrecer mas capas de material, de mejores compuestos, con bandas de rodamiento mas amplias y costados mejor reforzados que otros fabricantes Premium.</p>
                        <p class="mb-5"><strong class="font-semibold">Garantizamos 25% mas kilómetros y ciclos llanta contra llanta por escrito, sin importar las condiciones de trabajo de su maquina.</strong></p>
                    </div>
                </div>

                <div class="mb-5 w-full">
                    <div>
                        <h2 class="m-0 p-0 font-['Roboto',sans-serif] text-[34px] leading-[1.1] md:text-[44px] lg:text-[51px] lg:leading-[51px] font-semibold text-black">
                            ¿Por qué elegirnos?
                        </h2>
                    </div>
                </div>

                <div class="mb-5 w-full text-left md:text-justify font-['Roboto',sans-serif] font-normal text-[#7a7a7a]">
                    <div class="my-[30px]">
                        <p class="mb-5">Llevamos un producto Superior enfocado en mejores materiales, mas rendimiento, mejor diseño y calidad a la Industria con las mejores condiciones comerciales.</p>
                    </div>
                </div>

                <section class="w-full">
                    <div class="flex flex-wrap">
                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] flex justify-center text-[#ee5a35]">
                                            <svg class="h-[30px] w-[30px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path
                                                    d="M12 3v18M8.5 7.5C8.5 6.1 9.8 5 11.5 5h1c1.9 0 3.5 1.2 3.5 3s-1.3 2.5-3.5 3l-1 .2C9.3 11.6 8 12.4 8 14c0 1.8 1.6 3 3.5 3h1c1.7 0 3-1.1 3-2.5"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Precios Mayorista.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] flex justify-center text-[#ee5a35]">
                                            <svg class="h-[30px] w-[30px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <circle cx="12" cy="8" r="3" stroke="currentColor" stroke-width="2"/>
                                                <path
                                                    d="M7 14l-1 6 6-3 6 3-1-6"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Garantía de vida y Desempeño.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] flex justify-center text-[#ee5a35]">
                                            <svg class="h-[30px] w-[30px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path
                                                    d="M3 7h11v8H3zM14 10h3l3 3v2h-6z"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linejoin="round"
                                                />
                                                <circle cx="7" cy="17" r="2" stroke="currentColor" stroke-width="2"/>
                                                <circle cx="17" cy="17" r="2" stroke="currentColor" stroke-width="2"/>
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Entrega inmediata.</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-full sm:w-1/2 lg:w-1/4">
                            <div class="flex w-full flex-wrap content-start p-[15px]">
                                <div class="w-full">
                                    <div class="block text-center">
                                        <div class="mx-auto mb-[10px] flex justify-center text-[#ee5a35]">
                                            <svg class="h-[30px] w-[30px]" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                                <path
                                                    d="M4 14v-2a8 8 0 0 1 16 0v2"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                />
                                                <rect x="3" y="13" width="4" height="6" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <rect x="17" y="13" width="4" height="6" rx="2" stroke="currentColor" stroke-width="2"/>
                                                <path
                                                    d="M12 19h2"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                />
                                            </svg>
                                        </div>
                                        <div class="flex-grow">
                                            <h6 class="mt-[10px] mb-0 font-['Roboto',sans-serif] text-[18px] leading-[19.8px] font-medium text-[#03132b]">
                                                <span>Asistencia Técnica</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
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