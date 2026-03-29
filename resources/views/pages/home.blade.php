@extends('layouts.public')

@section('content')
    <section class="border-b border-zinc-200 bg-white">
        <div class="mx-auto max-w-7xl px-4 py-14 lg:px-8 lg:py-20">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div>
                    <h1 class="text-4xl font-bold tracking-tight text-zinc-900 lg:text-6xl">
                        Llantas para minicargadores
                    </h1>

                    <div class="mt-6">
                        <a href="{{ url('/contacto') }}"
                           class="inline-flex items-center justify-center rounded-2xl bg-zinc-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-zinc-800">
                            Cotiza ahora
                        </a>
                    </div>

                    <p class="mt-6 max-w-2xl text-xl font-medium leading-8 text-zinc-700">
                        25% más de Vida Desempeño ciclos GARANTIZADO.
                    </p>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-zinc-50 p-6 lg:p-8">
                    <div class="space-y-5">
                        <div class="rounded-2xl bg-white p-5 ring-1 ring-zinc-200">
                            <h2 class="text-lg font-semibold text-zinc-900">
                                ¡Compra en Línea Aquí!
                            </h2>
                            <p class="mt-2 text-sm leading-6 text-zinc-600">
                                Accede a la tienda en línea para consultar opciones relacionadas.
                            </p>
                            <a href="https://llantasdemontacargas.com"
                               class="mt-4 inline-flex text-sm font-semibold text-zinc-900 hover:text-zinc-700">
                                Ir a tienda en línea
                            </a>
                        </div>

                        <div class="rounded-2xl bg-white p-5 ring-1 ring-zinc-200">
                            <h2 class="text-lg font-semibold text-zinc-900">
                                Llantas Bobcat
                            </h2>
                            <p class="mt-2 text-sm leading-6 text-zinc-600">
                                Consulta la línea enfocada a Bobcat y sus aplicaciones.
                            </p>
                            <a href="https://llantasbobcat.com"
                               class="mt-4 inline-flex text-sm font-semibold text-zinc-900 hover:text-zinc-700">
                                Ver línea Bobcat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-14 lg:px-8">
        <div class="grid gap-6 md:grid-cols-2">
            <a href="{{ url('/llantas-solidas-para-minicargador') }}"
               class="group rounded-3xl border border-zinc-200 bg-white p-8 transition hover:border-zinc-400 hover:shadow-sm">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-900">
                    Llantas sólidas
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Explora nuestra categoría de llantas sólidas para minicargador.
                </p>
            </a>

            <a href="{{ url('/llantas-neumaticas-para-minicargador') }}"
               class="group rounded-3xl border border-zinc-200 bg-white p-8 transition hover:border-zinc-400 hover:shadow-sm">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-900">
                    Llantas neumáticas
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Explora nuestra categoría de llantas neumáticas para minicargador.
                </p>
            </a>
        </div>
    </section>

    <section class="border-t border-zinc-200 bg-zinc-50">
        <div class="mx-auto max-w-7xl px-4 py-14 lg:px-8">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-900">
                    Llantas para Minicargadores Sólidas
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Llantas sólidas para minicargador: Imponchables, libres de mantenimiento y de uso rudo.
                </p>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <x-product-card
                    title="Brawler HD Solidflex"
                    description="Llanta sólida para minicargador orientada a trabajo demandante."
                    :url="url('/llantas-solidas-para-minicargador/brawler-hd-solidflex')"
                />

                <x-product-card
                    title="Brawler® HPS Solidflex Traction/Smooth"
                    description="Modelo sólido para alto desempeño y aplicaciones exigentes."
                    :url="url('/llantas-solidas-para-minicargador/brawler-hps-solidflex-traction-smooth')"
                />

                <x-product-card
                    title="SKS 900 Traction/Smooth"
                    description="Opción sólida para operación de uso rudo en minicargador."
                    :url="url('/llantas-solidas-para-minicargador/sks-900-traction-smooth')"
                />
            </div>
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-4 py-14 lg:px-8">
            <div class="max-w-3xl">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-900">
                    Llantas Neumáticas para Minicargador
                </h2>
                <p class="mt-4 text-base leading-7 text-zinc-600">
                    Llantas Neumáticas para Minicargadores: Más versátiles, mejor amortiguamiento y desempeño en tierra.
                </p>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                <x-product-card
                    title="SK 900"
                    description="Llanta neumática para minicargador con desempeño confiable."
                    :url="url('/llantas-neumaticas-para-minicargador/sk-900')"
                />

                <x-product-card
                    title="SK 900 No Direccional"
                    description="Modelo neumático no direccional para distintas condiciones de trabajo."
                    :url="url('/llantas-neumaticas-para-minicargador/sk-900-2')"
                />

                <x-product-card
                    title="SK 800"
                    description="Opción neumática para tracción y desempeño en operación."
                    :url="url('/llantas-neumaticas-para-minicargador/sk-800')"
                />
            </div>
        </div>
    </section>

    <section class="border-y border-zinc-200 bg-zinc-50">
        <div class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
            <div class="grid gap-10 lg:grid-cols-2 lg:items-center">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-zinc-500">
                        Distribuidores autorizados de la marca Trelleborg
                    </p>

                    <h2 class="mt-4 text-3xl font-bold tracking-tight text-zinc-900 lg:text-4xl">
                        Nosotros
                    </h2>

                    <p class="mt-6 text-base leading-7 text-zinc-600">
                        Compra a crédito, con entrega inmediata y garantías. Las mejores llantas para el manejo de materiales en la industria.
                    </p>

                    <p class="mt-4 text-base leading-7 text-zinc-600">
                        Distribuidor Autorizado. Soluciones para Montacargas, Cargadores, Manipuladores y maquinaria de Construcción.
                        Trelleborg fabrica las llantas de alta gama más resistentes y duraderas para aplicaciones demandantes.
                        Ofrecemos los precios más bajos, entrega inmediata, crédito y asesoría técnica en la selección e instalación.
                    </p>

                    <a href="{{ url('/somos') }}"
                       class="mt-8 inline-flex rounded-2xl bg-zinc-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-zinc-800">
                        Conocer más
                    </a>
                </div>

                <div class="rounded-3xl border border-zinc-200 bg-white p-8">
                    <h3 class="text-xl font-bold text-zinc-900">
                        Cotiza en línea o solicita una asesoría
                    </h3>

                    <div class="mt-6 space-y-3 text-sm text-zinc-600">
                        <p>(83)3239-5885</p>
                        <p>(22)2227-3866</p>
                        <p>595 112 4238</p>
                        <p>(83)3246-2205</p>
                        <p>ventas@llantasdemontacargas.com</p>
                    </div>

                    <a href="{{ url('/contacto') }}"
                       class="mt-8 inline-flex rounded-2xl border border-zinc-300 px-6 py-3 text-sm font-semibold text-zinc-900 transition hover:border-zinc-400 hover:bg-zinc-50">
                        Ir a contacto
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection