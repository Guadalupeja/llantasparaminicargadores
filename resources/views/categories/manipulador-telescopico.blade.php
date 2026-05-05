@extends('layouts.public')

@section('content')
<section class="bg-white">
    <div class="ruguex-container py-10 lg:py-16">
        <header class="mx-auto max-w-[900px] text-center">
            <h1 class="text-[32px] font-semibold leading-tight text-black md:text-[42px]">
                Llantas para Manipulador Telescópico
            </h1>

            <p class="mt-4 text-[16px] leading-7 text-[#7a7a7a]">
                Llantas sólidas y radiales para manipuladores telescópicos, telehandlers y cargadores de uso rudo.
            </p>
        </header>

        <div class="mt-12 grid gap-8 lg:grid-cols-2">
            <section>
                <h2 class="text-center text-[28px] font-semibold text-black">
                    Llantas sólidas para manipulador telescópico
                </h2>

                <p class="mt-3 text-center text-[#7a7a7a]">
                    Llanta sólida premium de alto rendimiento para telehandlers, manipuladores telescópicos y cargadores.
                </p>

                <div class="mt-8">
                    <article class="mx-auto flex h-full max-w-[360px] flex-col overflow-hidden text-center">
                        <a href="{{ url('/llantas-para-manipulador-telescopico/trelleborg-brawler-hps') }}" class="flex min-h-[330px] items-center justify-center bg-white p-4">
                            <x-responsive-image
                                path="products/manipulador-telescopico/trelleborg-brawler-hps.webp"
                                alt="Llanta sólida Trelleborg Brawler HPS para manipulador telescópico"
                                class="mx-auto h-[300px] w-full object-contain"
                                sizes="360px"
                            />
                        </a>

                        <div class="flex min-h-[86px] items-center justify-center bg-[#00063a] px-4 py-4">
                            <h3 class="m-0 text-[22px] font-semibold leading-tight text-white">
                                <a href="{{ url('/llantas-para-manipulador-telescopico/trelleborg-brawler-hps') }}" class="text-white no-underline">
                                    TRELLEBORG BRAWLER® HPS
                                </a>
                            </h3>
                        </div>
                    </article>
                </div>
            </section>

            <section>
                <h2 class="text-center text-[28px] font-semibold text-black">
                    Llantas radiales para manipulador telescópico
                </h2>

                <p class="mt-3 text-center text-[#7a7a7a]">
                    Llanta radial para manipuladores telescópicos, telehandlers y cargadores de uso rudo con cargas pesadas.
                </p>

                <div class="mt-8">
                    <article class="mx-auto flex h-full max-w-[360px] flex-col overflow-hidden text-center">
                        <a href="{{ url('/llantas-para-manipulador-telescopico/th400') }}" class="flex min-h-[330px] items-center justify-center bg-white p-4">
                            <x-responsive-image
                                path="products/manipulador-telescopico/th400.jpg"
                                alt="Llanta radial TH400 para manipulador telescópico"
                                class="mx-auto h-[300px] w-full object-contain"
                                sizes="360px"
                            />
                        </a>

                        <div class="flex min-h-[86px] items-center justify-center bg-[#00063a] px-4 py-4">
                            <h3 class="m-0 text-[22px] font-semibold leading-tight text-white">
                                <a href="{{ url('/llantas-para-manipulador-telescopico/th400') }}" class="text-white no-underline">
                                    TH400
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