<footer class="border-t border-zinc-200 bg-zinc-50">
    <div class="mx-auto max-w-7xl px-4 py-12 lg:px-8">
        <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <p class="text-base font-semibold text-zinc-900">
                    Llantas para Minicargadores
                </p>
                <p class="mt-4 max-w-xl text-sm leading-7 text-zinc-600">
                    Soluciones en llantas sólidas y llantas neumáticas para minicargadores, enfocadas en desempeño,
                    resistencia y atención comercial.
                </p>
            </div>

            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-zinc-900">Secciones</p>
                <ul class="mt-4 space-y-3 text-sm text-zinc-600">
                    <li><a href="{{ url('/') }}" class="hover:text-zinc-900">Inicio</a></li>
                    <li><a href="{{ url('/somos') }}" class="hover:text-zinc-900">Somos</a></li>
                    <li><a href="{{ url('/contacto') }}" class="hover:text-zinc-900">Contacto</a></li>
                </ul>
            </div>

            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-zinc-900">Productos</p>
                <ul class="mt-4 space-y-3 text-sm text-zinc-600">
                    <li><a href="{{ url('/llantas-solidas-para-minicargador') }}" class="hover:text-zinc-900">Llantas sólidas</a></li>
                    <li><a href="{{ url('/llantas-neumaticas-para-minicargador') }}" class="hover:text-zinc-900">Llantas neumáticas</a></li>
                </ul>
            </div>
        </div>

        <div class="mt-10 border-t border-zinc-200 pt-6">
            <p class="text-xs text-zinc-500">
                © {{ now()->year }} Llantas para Minicargadores. Todos los derechos reservados.
            </p>
        </div>
    </div>
</footer>