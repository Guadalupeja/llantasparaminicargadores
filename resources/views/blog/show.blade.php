@extends('layouts.site')

@section('content')
<section class="bg-white py-10 md:py-14">
    <div class="ruguex-container">
        <nav class="mb-8 text-sm text-slate-500">
            <ol class="flex flex-wrap items-center gap-2">
                <li><a href="{{ route('home') }}" class="hover:text-slate-900">Inicio</a></li>
                <li>/</li>
                <li><a href="{{ route('blog.index') }}" class="hover:text-slate-900">Blog</a></li>
                <li>/</li>
                <li><a href="{{ route('blog.category', $post->category) }}" class="hover:text-slate-900">{{ $post->category->name }}</a></li>
                <li>/</li>
                <li class="font-medium text-slate-900">{{ $post->title }}</li>
            </ol>
        </nav>

        <article class="mx-auto max-w-4xl">
            <p class="text-sm font-semibold uppercase tracking-[0.12em] text-orange-600">
                {{ $post->category->name }}
            </p>

            <h1 class="mt-4 text-[34px] font-extrabold leading-[1.08] tracking-[-0.03em] text-slate-900 md:text-[52px]">
                {{ $post->title }}
            </h1>

            <div class="mt-6 flex flex-wrap items-center gap-4 text-sm text-slate-500">
                <span class="font-medium text-slate-700">{{ $post->author_name }}</span>
                <span>•</span>
                <span>{{ optional($post->published_at)->format('d/m/Y') }}</span>
                <span>•</span>
                <span>{{ $post->reading_time }} min de lectura</span>
            </div>

            @if($post->featured_image)
                <div class="mt-8 overflow-hidden rounded-[30px]">
                    <img
                        src="{{ asset('storage/' . $post->featured_image) }}"
                        alt="{{ $post->featured_image_alt ?: $post->title }}"
                        class="w-full object-cover"
                    >
                </div>
            @endif

            <div class="prose prose-lg mt-10 max-w-none prose-headings:font-extrabold prose-headings:tracking-[-0.02em] prose-headings:text-slate-900 prose-p:text-[17px] prose-p:leading-8 prose-p:text-slate-700 prose-a:font-semibold prose-a:text-orange-600 prose-strong:text-slate-900 prose-li:text-slate-700">
                {!! $post->content !!}
            </div>

            <div class="mt-14 rounded-[28px] bg-slate-50 p-8 md:p-10">
                <h2 class="text-[28px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900">
                    ¿Necesitas ayuda para elegir la llanta correcta?
                </h2>

                <p class="mt-4 text-[16px] leading-7 text-slate-600">
                    En Ruguex te ayudamos a elegir la mejor opción según la medida, el tipo de trabajo y la exigencia real de tu operación.
                </p>

                <div class="mt-6 flex flex-wrap gap-4">
                    <a href="{{ url('/contacto') }}"
                       class="rounded-full bg-orange-600 px-6 py-3 text-sm font-bold text-white transition hover:bg-orange-700">
                        Solicitar asesoría
                    </a>

                    <a href="{{ url('/llanta-12-16-5') }}"
                       class="rounded-full border border-slate-300 px-6 py-3 text-sm font-bold text-slate-800 transition hover:border-slate-900 hover:text-slate-900">
                        Ver landing 12-16.5
                    </a>

                    <a href="{{ url('/llanta-10-16-5') }}"
                       class="rounded-full border border-slate-300 px-6 py-3 text-sm font-bold text-slate-800 transition hover:border-slate-900 hover:text-slate-900">
                        Ver landing 10-16.5
                    </a>
                </div>
            </div>
        </article>

        @if($relatedPosts->count())
            <div class="mx-auto mt-16 max-w-6xl">
                <h2 class="text-[32px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900">
                    Artículos relacionados
                </h2>

                <div class="mt-8 grid gap-8 md:grid-cols-3">
                    @foreach($relatedPosts as $related)
                        <article class="rounded-[26px] border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                            <p class="text-sm font-semibold text-orange-600">
                                {{ $related->category->name }}
                            </p>

                            <h3 class="mt-3 text-[22px] font-extrabold leading-[1.2] tracking-[-0.02em] text-slate-900">
                                <a href="{{ route('blog.show', $related) }}" class="hover:text-orange-600">
                                    {{ $related->title }}
                                </a>
                            </h3>
                        </article>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</section>

@push('meta')
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Article',
    'headline' => $post->title,
    'description' => $post->seo_description_resolved,
    'articleSection' => $post->category->name,
    'image' => $post->featured_image
        ? [asset('storage/' . $post->featured_image)]
        : [asset('img/home/bobcat-logo.png')],
    'datePublished' => optional($post->published_at)?->toIso8601String(),
    'dateModified' => optional($post->updated_at)?->toIso8601String(),
    'author' => [
        '@type' => 'Person',
        'name' => $post->author_name,
    ],
    'publisher' => [
        '@type' => 'Organization',
        'name' => 'Ruguex',
        'logo' => [
            '@type' => 'ImageObject',
            'url' => asset('img/home/bobcat-logo.png'),
        ],
    ],
    'mainEntityOfPage' => [
        '@type' => 'WebPage',
        '@id' => $seo['canonical'] ?? url()->current(),
    ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
</script>
@endpush
@endsection