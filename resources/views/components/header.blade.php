<header class="sticky top-0 z-40 border-b border-zinc-200 bg-white/95 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <a href="{{ url('/') }}" class="inline-flex items-center text-lg font-semibold tracking-tight text-zinc-900">
                Llantas para Minicargadores
            </a>

            <nav class="hidden items-center gap-6 md:flex">
                <a href="{{ url('/') }}" class="text-sm font-medium text-zinc-700 transition hover:text-zinc-900">
                    Inicio
                </a>
                <a href="{{ url('/llantas-solidas-para-minicargador') }}" class="text-sm font-medium text-zinc-700 transition hover:text-zinc-900">
                    Llantas sólidas
                </a>
                <a href="{{ url('/llantas-neumaticas-para-minicargador') }}" class="text-sm font-medium text-zinc-700 transition hover:text-zinc-900">
                    Llantas neumáticas
                </a>
                <a href="{{ url('/somos') }}" class="text-sm font-medium text-zinc-700 transition hover:text-zinc-900">
                    Somos
                </a>
                <a href="{{ url('/contacto') }}" class="text-sm font-medium text-zinc-700 transition hover:text-zinc-900">
                    Contacto
                </a>
                <a href="{{ url('/contacto') }}" class="inline-flex items-center rounded-xl bg-zinc-900 px-4 py-2 text-sm font-medium text-white transition hover:bg-zinc-800">
                    Cotizar
                </a>
            </nav>

            <button
                type="button"
                class="inline-flex items-center justify-center rounded-xl border border-zinc-300 px-3 py-2 text-sm font-medium text-zinc-800 md:hidden"
                data-menu-toggle
                aria-expanded="false"
                aria-controls="mobile-menu"
            >
                Menú
            </button>
        </div>

        <div id="mobile-menu" class="hidden border-t border-zinc-200 py-4 md:hidden" data-menu>
            <nav class="flex flex-col gap-3">
                <a href="{{ url('/') }}" class="rounded-lg px-2 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900">
                    Inicio
                </a>
                <a href="{{ url('/llantas-solidas-para-minicargador') }}" class="rounded-lg px-2 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900">
                    Llantas sólidas
                </a>
                <a href="{{ url('/llantas-neumaticas-para-minicargador') }}" class="rounded-lg px-2 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900">
                    Llantas neumáticas
                </a>
                <a href="{{ url('/somos') }}" class="rounded-lg px-2 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900">
                    Somos
                </a>
                <a href="{{ url('/contacto') }}" class="rounded-lg px-2 py-2 text-sm font-medium text-zinc-700 hover:bg-zinc-100 hover:text-zinc-900">
                    Contacto
                </a>
                <a href="{{ url('/contacto') }}" class="mt-2 inline-flex items-center justify-center rounded-xl bg-zinc-900 px-4 py-3 text-sm font-medium text-white transition hover:bg-zinc-800">
                    Cotizar
                </a>
            </nav>
        </div>
    </div>
</header>