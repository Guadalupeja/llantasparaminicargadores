@props([
    'title',
    'description' => null,
    'url' => '#',
])

<a href="{{ $url }}" class="group block rounded-2xl border border-zinc-200 bg-white p-6 transition hover:-translate-y-0.5 hover:border-zinc-400 hover:shadow-sm">
    <div>
        <h3 class="text-xl font-semibold text-zinc-900 transition group-hover:text-zinc-700">
            {{ $title }}
        </h3>

        @if($description)
            <p class="mt-3 text-sm leading-6 text-zinc-600">
                {{ $description }}
            </p>
        @endif

        <span class="mt-5 inline-flex text-sm font-medium text-zinc-900">
            Ver más
        </span>
    </div>
</a>