@props([
    'items' => [],
])

@if(count($items))
    <nav aria-label="Breadcrumb" class="mb-5 sm:mb-6 md:mb-8">
        <ol class="flex flex-wrap items-center gap-x-1.5 gap-y-1 text-[11px] leading-4 text-zinc-500 sm:gap-x-2 sm:gap-y-2 sm:text-[12px] sm:leading-5 md:text-sm">
            @foreach ($items as $index => $item)
                <li class="inline-flex min-w-0 items-center gap-1.5 sm:gap-2">
                    @if (!empty($item['url']) && $index !== count($items) - 1)
                        <a
                            href="{{ $item['url'] }}"
                            class="max-w-full break-words transition hover:text-zinc-900"
                        >
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="max-w-full break-words font-medium text-zinc-900">
                            {{ $item['label'] }}
                        </span>
                    @endif

                    @if ($index !== count($items) - 1)
                        <span aria-hidden="true" class="text-zinc-400">/</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif