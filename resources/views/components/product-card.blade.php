@props([
    'title',
    'description' => null,
    'url' => '#',
    'image' => null,
])

<a href="{{ $url }}" class="group block bg-white text-center">
    <div class="overflow-hidden rounded-none border border-zinc-200 bg-zinc-50">
        <div class="aspect-[4/3] w-full bg-zinc-100">
            @if($image)
                <img
                    src="{{ $image }}"
                    alt="{{ $title }}"
                    class="h-full w-full object-cover transition duration-300 group-hover:scale-[1.02]"
                    loading="lazy"
                    decoding="async"
                >
            @else
                <div class="flex h-full items-center justify-center text-sm text-zinc-400">
                    Imagen de producto
                </div>
            @endif
        </div>
    </div>

    <h3 class="mt-5 text-[24px] font-semibold leading-tight text-zinc-900">
        {{ $title }}
    </h3>

    @if($description)
        <p class="mx-auto mt-3 max-w-[320px] text-sm leading-6 text-zinc-600">
            {{ $description }}
        </p>
    @endif
</a>