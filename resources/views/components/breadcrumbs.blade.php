@props([
    'items' => [],
])

@if(count($items))
    <nav aria-label="Breadcrumb" class="mb-8">
        <ol class="flex flex-wrap items-center gap-x-2 gap-y-2 text-sm text-zinc-500">
            @foreach ($items as $index => $item)
                <li class="inline-flex items-center gap-2">
                    @if (!empty($item['url']) && $index !== count($items) - 1)
                        <a href="{{ $item['url'] }}" class="transition hover:text-zinc-900">
                            {{ $item['label'] }}
                        </a>
                    @else
                        <span class="font-medium text-zinc-900">
                            {{ $item['label'] }}
                        </span>
                    @endif

                    @if ($index !== count($items) - 1)
                        <span aria-hidden="true">/</span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif