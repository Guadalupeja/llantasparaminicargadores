@extends('layouts.public')

@section('content')
    <section class="border-b border-zinc-200 bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 py-16 lg:grid-cols-2 lg:items-center lg:px-8 lg:py-24">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-zinc-500">
                    Llantas para minicargadores
                </p>

                <h1 class="mt-4 max-w-3xl text-4xl font-bold tracking-tight text-zinc-900 lg:text-6xl">
                    Llantas sólidas y neumáticas para minicargadores
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-zinc-600">
                    Encuentra opciones de llantas para minicargador enfocadas en resistencia, desempeño y operación confiable
                    para aplicaciones exigentes.
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
            </div>

            <div class="rounded-3xl border border-zinc-200 bg-zinc-50 p-8 lg:p-10">
                <div class="space-y-6">
                    <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-zinc-200">
                        <p class="text-sm font-semibold text-zinc-900">Llantas sólidas</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Opciones pensadas para resistencia, estabilidad y larga vida útil en trabajo severo.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-zinc-200">
                        <p class="text-sm font-semibold text-zinc-900">Llantas neumáticas</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Modelos orientados a tracción, desempeño y adaptabilidad para distintas superficies.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-zinc-200">
                        <p class="text-sm font-semibold text-zinc-900">Atención comercial</p>
                        <p class="mt-2 text-sm leading-6 text-zinc-600">
                            Te ayudamos a identificar la opción más conveniente según tu aplicación y requerimientos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
    <x-section-heading
    title="Explora nuestras categorías"
    description="Accede rápidamente a nuestras categorías principales de llantas para minicargador."
    :centered="true"
        />

        <div class="mt-10 grid gap-6 md:grid-cols-2">
            <x-product-card
                title="Llantas sólidas para minicargador"
                description="Conoce nuestra categoría de llantas sólidas para aplicaciones de alto desgaste y operación demandante."
                :url="url('/llantas-solidas-para-minicargador')"
            />

            <x-product-card
                title="Llantas neumáticas para minicargador"
                description="Consulta nuestra línea de llantas neumáticas para distintas condiciones de operación y trabajo."
                :url="url('/llantas-neumaticas-para-minicargador')"
            />
        </div>
    </section>

    <section class="border-y border-zinc-200 bg-zinc-50">
        <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
        <x-section-heading
            title="Ventajas de nuestra oferta"
            description="Una base comercial clara para ayudar al usuario a encontrar una mejor opción de compra."
            :centered="true"
        />

            <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Resistencia</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Opciones de llantas para aplicaciones exigentes y condiciones de trabajo severas.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Desempeño</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Soluciones enfocadas en tracción, estabilidad y operación confiable.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Atención</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Acompañamiento comercial para ayudarte a identificar la categoría adecuada.
                    </p>
                </div>

                <div class="rounded-2xl border border-zinc-200 bg-white p-6">
                    <h3 class="text-lg font-semibold text-zinc-900">Cobertura</h3>
                    <p class="mt-3 text-sm leading-6 text-zinc-600">
                        Atención orientada a solicitudes de información, cotización y seguimiento comercial.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
        <div class="grid gap-8 rounded-3xl bg-zinc-900 px-6 py-10 text-white lg:grid-cols-[1.4fr_0.6fr] lg:items-center lg:px-10">
            <div>
                <h2 class="text-3xl font-bold tracking-tight">
                    ¿Buscas apoyo para elegir la mejor llanta para tu minicargador?
                </h2>
                <p class="mt-4 max-w-2xl text-base leading-7 text-zinc-300">
                    Podemos ayudarte a orientarte entre opciones sólidas y neumáticas según tu tipo de operación y requerimiento.
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