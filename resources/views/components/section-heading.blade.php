@props([
    'title',
    'description' => null,
    'centered' => false,
])

<div @class([
    'max-w-3xl',
    'mx-auto text-center' => $centered,
])>
    <h2 class="text-2xl font-bold tracking-tight text-zinc-900 lg:text-3xl">
        {{ $title }}
    </h2>

    @if($description)
        <p class="mt-4 text-base leading-7 text-zinc-600">
            {{ $description }}
        </p>
    @endif
</div>