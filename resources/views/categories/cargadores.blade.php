@extends('layouts.public')

@section('content')
<section class="bg-white">
    <div class="ruguex-container py-10 lg:py-16">
        <header class="mx-auto max-w-[900px] text-center">
            <h1 class="text-[32px] font-semibold leading-tight text-black md:text-[42px]">
                Llantas para cargadores y maquinaria de construcción
            </h1>

            <p class="mt-4 text-[16px] leading-7 text-[#7a7a7a]">
                Llantas sólidas y neumáticas para cargadores, excavadoras, retroexcavadoras, palas y maquinaria de construcción.
            </p>
        </header>

        <div class="mt-12 grid gap-8 lg:grid-cols-2">
            <section>
                <h2 class="text-center text-[28px] font-semibold text-black">
                    Llantas sólidas para cargadores
                </h2>

                <p class="mt-3 text-center text-[#7a7a7a]">
                    De uso rudo, no se ponchan y rinden el triple.
                </p>

                <div class="mt-8">
                    <article class="mx-auto flex h-full max-w-[360px] flex-col overflow-hidden text-center">
                        <a href="{{ url('/llantas-para-cargadores/brawler-hd') }}" class="flex min-h-[330px] items-center justify-center bg-white p-4">
                            <x-responsive-image
                                path="products/brawler-hd.jpg"
                                alt="Llanta Brawler HD para cargador"
                                class="mx-auto h-[300px] w-full object-contain"
                                sizes="360px"
                            />
                        </a>

                        <div class="flex min-h-[86px] items-center justify-center bg-[#00063a] px-4 py-4">
                            <h3 class="m-0 text-[22px] font-semibold leading-tight text-white">
                                <a href="{{ url('/llantas-para-cargadores/brawler-hd') }}" class="text-white no-underline">
                                    Brawler HD
                                </a>
                            </h3>
                        </div>
                    </article>
                </div>
            </section>

            <section>
                <h2 class="text-center text-[28px] font-semibold text-black">
                    Llantas neumáticas para cargadores
                </h2>

                <div class="mt-8 grid gap-8 sm:grid-cols-2">
                    <article class="flex h-full flex-col overflow-hidden text-center">
                        <a href="{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr') }}" class="flex min-h-[330px] items-center justify-center bg-white p-4">
                            <x-responsive-image
                                path="products/neumatico-c800-l2-otr.jpg"
                                alt="Neumático C800 L2 OTR para cargador"
                                class="mx-auto h-[300px] w-full object-contain"
                                sizes="360px"
                            />
                        </a>

                        <div class="flex min-h-[86px] items-center justify-center bg-[#00063a] px-4 py-4">
                            <h3 class="m-0 text-[22px] font-semibold leading-tight text-white">
                                <a href="{{ url('/llantas-para-cargadores/neumatico-c800-l2-otr') }}" class="text-white no-underline">
                                    Neumático C800 L2 OTR
                                </a>
                            </h3>
                        </div>
                    </article>

                    <article class="flex h-full flex-col overflow-hidden text-center">
                        <a href="{{ url('/llantas-para-cargadores/neumatico-c800-e3-l3-otr') }}" class="flex min-h-[330px] items-center justify-center bg-white p-4">
                            <x-responsive-image
                                path="products/neumatico-c800-e3-l3-otr.jpg"
                                alt="Neumático C-800 E3/L3 OTR para cargador"
                                class="mx-auto h-[300px] w-full object-contain"
                                sizes="360px"
                            />
                        </a>

                        <div class="flex min-h-[86px] items-center justify-center bg-[#00063a] px-4 py-4">
                            <h3 class="m-0 text-[22px] font-semibold leading-tight text-white">
                                <a href="{{ url('/llantas-para-cargadores/neumatico-c800-e3-l3-otr') }}" class="text-white no-underline">
                                    Neumático C-800 E3/L3 OTR
                                </a>
                            </h3>
                        </div>
                    </article>
                </div>
            </section>
        </div>
    </div>
</section>
@endsection