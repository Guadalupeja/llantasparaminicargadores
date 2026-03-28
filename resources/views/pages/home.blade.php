@extends('layouts.public')

@section('content')
    <section class="relative overflow-hidden border-b border-zinc-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-4 py-16 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-zinc-500">
                    Llantas para minicargadores
                </p>

                <h1 class="mt-4 max-w-3xl text-4xl font-bold tracking-tight text-zinc-900 lg:text-6xl">
                    Llantas sólidas y neumáticas para minicargador
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-zinc-600">
                    Conoce opciones de llantas para minicargadores enfocadas en resistencia, tracción,
                    desempeño y operación confiable para aplicaciones exigentes.
                </p>

                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ url('/llantas-solidas-para-minicargador') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-zinc-900 px-6 py-3 text-sm font-medium text-white transition hover:bg-zinc-800">
                        Ver llantas sólidas
                    </a>

                    <a href="{{ url('/llantas-neumaticas-para-minicargador') }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-zinc-300 px-6 py-3 text-sm font-medium text-zinc-900 transition hover:border-zinc-400 hover:bg-zinc-50">
                        Ver llantas neumáticas
                    </a>
                </div>

                <div class="mt-10 grid gap-4 sm:grid-cols-3">
                    <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-sm font-semibold text-zinc-900">Resistencia</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Opciones para trabajo exigente.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-sm font-semibold text-zinc-900">Desempeño</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Soluciones para distintas superficies.
                        </p>
                    </div>

                    <div class="rounded-2xl border border-zinc-200 bg-zinc-50 p-4">
                        <p class="text-sm font-semibold text-zinc-900">Atención</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Apoyo para identificar la opción correcta.
                        </p>
                    </div>
                </div>
            </div>

            <div>
                <div class="rounded-3xl border border-zinc-200 bg-zinc-50 p-6 lg:p-8">
                    <div class="grid gap-5">
                        <div class="rounded-2xl bg-white p-5 ring-1 ring-zinc-200">
                            <p class="text-sm font-semibold text-zinc-900">Llantas sólidas para minicargador</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600">
                                Enfocadas en alta resistencia, estabilidad y larga vida útil en operación demandante.
                            </p>
                            <a href="{{ url('/llantas-solidas-para-minicargador') }}"
                               class="mt-4 inline-flex text-sm font-medium text-zinc-900 hover:text-zinc-700">
                                Explorar categoría
                            </a>
                        </div>

                        <div class="rounded-2xl bg-white p-5 ring-1 ring-zinc-200">
                            <p class="text-sm font-semibold text-zinc-900">Llantas neumáticas para minicargador</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600">
                                Diseñadas para brindar tracción, adaptabilidad y desempeño en diferentes condiciones de trabajo.
                            </p>
                            <a href="{{ url('/llantas-neumaticas-para-minicargador') }}"
                               class="mt-4 inline-flex text-sm font-medium text-zinc-900 hover:text-zinc-700">
                                Explorar categoría
                            </a>
                        </div>

                        <div class="rounded-2xl bg-white p-5 ring-1 ring-zinc-200">
                            <p class="text-sm font-semibold text-zinc-900">Atención comercial</p>
                            <p class="mt-2 text-sm leading-6 text-zinc-600">
                                Te ayudamos a orientarte de acuerdo con tu aplicación, operación y necesidad de compra.
                            </p>
                            <a href="{{ url('/contacto') }}"
                               class="mt-4 inline-flex text-sm font-medium text-zinc-900 hover:text-zinc-700">
                                Solicitar información
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
        <x-section-heading
            title="Categorías principales"
            description="Explora nuestras líneas principales de llantas para minicargadores."
            :centered="true"
        />

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <x-product-card
                title="Llantas sólidas para minicargador"
                description="Consulta nuestra categoría de llantas sólidas para aplicaciones de alto desgaste, operación severa y necesidades de larga duración."
                :url="url('/llantas-solidas-para-minicargador')"
            />

            <x-product-card
                title="Llantas neumáticas para minicargador"
                description="Conoce nuestra línea de llantas neumáticas para aplicaciones que requieren tracción, desempeño y adaptabilidad."
                :url="url('/llantas-neumaticas-para-minicargador')"
            />
        </div>
    </section>

    <section class="border-y border-zinc-200 bg-zinc-50">
        <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
            <x-section-heading
                title="¿Por qué elegir nuestras opciones de llantas?"
                description="Una estructura de contenido pensada para comunicar valor comercial y orientar al usuario."
                :centered="true"
            />

            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Mayor resistencia</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Opciones preparadas para trabajo en condiciones demandantes y aplicaciones severas.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Tracción y estabilidad</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Modelos orientados a mejorar el desempeño y la operación en distintas superficies.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Variedad de opciones</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Alternativas sólidas y neumáticas para diferentes tipos de trabajo y requerimientos.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Atención comercial</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Soporte para ayudarte a identificar una mejor opción según tu necesidad de compra.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-2">
            <div class="rounded-3xl border border-zinc-200 bg-white p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-zinc-500">
                    Llantas sólidas
                </p>
                <h2 class="mt-4 text-2xl font-bold tracking-tight text-zinc-900">
                    Para trabajo severo y alta exigencia
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Las llantas sólidas suelen ser una alternativa atractiva cuando se busca resistencia,
                    estabilidad y larga duración en condiciones de trabajo demandantes.
                </p>
                <a href="{{ url('/llantas-solidas-para-minicargador') }}"
                   class="mt-6 inline-flex rounded-2xl bg-zinc-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-zinc-800">
                    Ver categoría
                </a>
            </div>

            <div class="rounded-3xl border border-zinc-200 bg-white p-8">
                <p class="text-sm font-semibold uppercase tracking-[0.16em] text-zinc-500">
                    Llantas neumáticas
                </p>
                <h2 class="mt-4 text-2xl font-bold tracking-tight text-zinc-900">
                    Para tracción y adaptabilidad
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Las llantas neumáticas pueden ofrecer una combinación útil de tracción, desempeño y adaptabilidad
                    para distintas superficies y aplicaciones de minicargador.
                </p>
                <a href="{{ url('/llantas-neumaticas-para-minicargador') }}"
                   class="mt-6 inline-flex rounded-2xl bg-zinc-900 px-5 py-3 text-sm font-medium text-white transition hover:bg-zinc-800">
                    Ver categoría
                </a>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-16 lg:px-8 lg:pb-24">
        <div class="grid gap-8 rounded-3xl bg-zinc-900 px-6 py-10 text-white lg:grid-cols-[1.4fr_0.6fr] lg:items-center lg:px-10">
            <div>
                <h2 class="text-3xl font-bold tracking-tight">
                    ¿Necesitas apoyo para elegir una llanta para tu minicargador?
                </h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-zinc-300">
                    Ponte en contacto con nosotros para recibir orientación comercial sobre opciones sólidas y neumáticas.
                </p>
            </div>

            <div class="flex flex-col gap-4 sm:flex-row lg:flex-col">
                <a href="{{ url('/contacto') }}"
                   class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3 text-sm font-medium text-zinc-900 transition hover:bg-zinc-100">
                    Solicitar información
                </a>

                <a href="{{ url('/somos') }}"
                   class="inline-flex items-center justify-center rounded-2xl border border-zinc-600 px-6 py-3 text-sm font-medium text-white transition hover:border-zinc-400">
                    Conocer más
                </a>
            </div>
        </div>
    </section>
@endsection