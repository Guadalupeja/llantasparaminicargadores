@extends('layouts.public')

@push('meta')
    @php
        $postUrl = route('blog.show', $post);
        $postImage = $post->featured_image
            ? asset('storage/' . ltrim($post->featured_image, '/'))
            : ($seo['image'] ?? asset('images/seo/default.jpg'));

        $blogPostingStructuredData = [
            '@context' => 'https://schema.org',
            '@type' => 'BlogPosting',
            'headline' => $post->title,
            'description' => $post->seo_description ?: $post->excerpt,
            'image' => [$postImage],
            'datePublished' => optional($post->published_at)->toIso8601String(),
            'dateModified' => optional($post->updated_at)->toIso8601String(),
            'author' => [
                '@type' => 'Person',
                'name' => $post->author_name ?: 'Ruguex',
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'Ruguex',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('img/home/logo-ruguex.png'),
                ],
            ],
            'mainEntityOfPage' => [
                '@type' => 'WebPage',
                '@id' => $postUrl,
            ],
            'articleSection' => $post->category?->name,
            'inLanguage' => 'es-MX',
        ];
    @endphp

    <script type="application/ld+json">
        {!! json_encode($blogPostingStructuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
<section class="bg-[#f5f5f5]">
    <div class="mx-auto max-w-[1140px] px-4 py-4 sm:py-5 md:py-6">
        <x-breadcrumbs :items="[
            ['label' => 'Inicio', 'url' => url('/')],
            ['label' => 'Blog', 'url' => route('blog.index')],
            ['label' => $post->category->name, 'url' => route('blog.category', $post->category)],
            ['label' => $post->title],
        ]" />
    </div>
</section>

<section class="bg-white">
    <div class="mx-auto max-w-[1140px] px-4 pt-8 pb-10 sm:pt-10 sm:pb-12 md:pt-12 md:pb-14">
        <div class="mx-auto max-w-[860px]">
            <a
                href="{{ route('blog.category', $post->category) }}"
                class="inline-flex rounded-full bg-[#fff3ee] px-4 py-2 text-[13px] font-semibold uppercase tracking-[0.12em] text-[#d85c31] transition hover:bg-[#ffe7dd]"
            >
                {{ $post->category->name }}
            </a>

            <h1 class="mt-5 text-[32px] font-semibold leading-[1.08] text-black sm:text-[40px] md:text-[50px]">
                {{ $post->title }}
            </h1>

            <div class="mt-5 flex flex-wrap items-center gap-x-4 gap-y-2 text-[14px] text-[#6b7280]">
                <span>
                    {{ optional($post->published_at)->translatedFormat('d \\d\\e F \\d\\e Y') }}
                </span>
                <span>•</span>
                <span>{{ $post->reading_time }} min de lectura</span>
                <span>•</span>
                <span>Por {{ $post->author_name ?: 'Ruguex' }}</span>
            </div>

            @if($post->excerpt)
                <p class="mt-6 max-w-[760px] text-[17px] leading-8 text-[#6b7280]">
                    {{ $post->excerpt }}
                </p>
            @endif
        </div>
    </div>
</section>

@if($post->featured_image)
    <section class="bg-white">
        <div class="mx-auto max-w-[1140px] px-4 pb-10 sm:pb-12">
            <div class="overflow-hidden rounded-[28px] border border-zinc-200 shadow-[0_14px_40px_rgba(0,0,0,0.06)]">
                <img
                    src="{{ asset('storage/' . ltrim($post->featured_image, '/')) }}"
                    alt="{{ $post->featured_image_alt ?: $post->title }}"
                    class="h-auto max-h-[560px] w-full object-cover"
                    loading="eager"
                    decoding="async"
                >
            </div>
        </div>
    </section>
@endif

<section class="bg-white">
    <div class="mx-auto max-w-[1140px] px-4 pb-14 sm:pb-16 md:pb-20">
        <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_320px] lg:gap-12">
            <article class="min-w-0">
                <div class="mx-auto max-w-[760px]">
                    <div class="blog-prose">
                        {!! $post->content !!}
                    </div>

                    <div class="mt-10 rounded-[24px] border border-[#f1c9bb] bg-[#fff8f4] p-6 sm:p-8">
                        <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-[#e76a3e]">
                            ¿Necesitas ayuda para elegir?
                        </p>

                        <h2 class="mt-3 text-[26px] font-semibold leading-[1.15] text-black sm:text-[30px]">
                            Te ayudamos a elegir la mejor llanta para tu minicargador
                        </h2>

                        <p class="mt-4 text-[15px] leading-8 text-[#6b7280] sm:text-[16px]">
                            Si no estás seguro de qué medida, tipo de llanta o configuración conviene más para tu operación,
                            en Ruguex podemos orientarte según el modelo del equipo, el tipo de piso y la exigencia real del trabajo.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <a
                                href="{{ url('/contacto') }}"
                                class="inline-flex min-h-[46px] items-center justify-center bg-[#e76a3e] px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-[#d85c31]"
                            >
                                Solicitar asesoría
                            </a>

                            <a
                                href="{{ url('/llantas-solidas-para-minicargador') }}"
                                class="inline-flex min-h-[46px] items-center justify-center border border-[#e8c8bc] bg-white px-6 py-3 text-[15px] font-semibold text-[#3f3f46] transition hover:bg-[#fff4ef]"
                            >
                                Ver llantas sólidas
                            </a>

                            <a
                                href="{{ url('/llantas-neumaticas-para-minicargador') }}"
                                class="inline-flex min-h-[46px] items-center justify-center border border-[#e8c8bc] bg-white px-6 py-3 text-[15px] font-semibold text-[#3f3f46] transition hover:bg-[#fff4ef]"
                            >
                                Ver llantas neumáticas
                            </a>
                        </div>
                    </div>
                </div>
            </article>

            <aside class="min-w-0">
                <div class="space-y-6 lg:sticky lg:top-24">
                    <div class="rounded-[24px] border border-zinc-200 bg-[#fafafa] p-6">
                        <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-[#e76a3e]">
                            Categoría
                        </p>

                        <h3 class="mt-3 text-[22px] font-semibold text-black">
                            {{ $post->category->name }}
                        </h3>

                        @if($post->category->description)
                            <p class="mt-3 text-[15px] leading-7 text-[#6b7280]">
                                {{ $post->category->description }}
                            </p>
                        @endif

                        <div class="mt-5">
                            <a
                                href="{{ route('blog.category', $post->category) }}"
                                class="text-[15px] font-semibold text-[#e76a3e] transition hover:text-[#d85c31]"
                            >
                                Ver más artículos de esta categoría →
                            </a>
                        </div>
                    </div>

                    <div class="rounded-[24px] border border-zinc-200 bg-white p-6 shadow-[0_8px_24px_rgba(0,0,0,0.04)]">
                        <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-[#e76a3e]">
                            Explora por tema
                        </p>

                        <div class="mt-5 flex flex-wrap gap-3">
                            <a href="{{ route('blog.index') }}" class="inline-flex rounded-full bg-[#f4f4f5] px-4 py-2 text-[14px] font-medium text-[#3f3f46] transition hover:bg-[#ececec]">
                                Todos los artículos
                            </a>
                            <a href="{{ url('/llanta-10-16-5') }}" class="inline-flex rounded-full bg-[#f4f4f5] px-4 py-2 text-[14px] font-medium text-[#3f3f46] transition hover:bg-[#ececec]">
                                Medida 10-16.5
                            </a>
                            <a href="{{ url('/llanta-12-16-5') }}" class="inline-flex rounded-full bg-[#f4f4f5] px-4 py-2 text-[14px] font-medium text-[#3f3f46] transition hover:bg-[#ececec]">
                                Medida 12-16.5
                            </a>
                            <a href="{{ url('/llantas-solidas-para-minicargador') }}" class="inline-flex rounded-full bg-[#f4f4f5] px-4 py-2 text-[14px] font-medium text-[#3f3f46] transition hover:bg-[#ececec]">
                                Llantas sólidas
                            </a>
                            <a href="{{ url('/llantas-neumaticas-para-minicargador') }}" class="inline-flex rounded-full bg-[#f4f4f5] px-4 py-2 text-[14px] font-medium text-[#3f3f46] transition hover:bg-[#ececec]">
                                Llantas neumáticas
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

@if($relatedPosts->count())
    <section class="bg-[#f5f5f5]">
        <div class="mx-auto max-w-[1140px] px-4 py-12 sm:py-14 md:py-16">
            <div class="mb-8">
                <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-[#e76a3e]">
                    También te puede interesar
                </p>
                <h2 class="mt-2 text-[30px] font-semibold leading-[1.12] text-black sm:text-[36px]">
                    Artículos relacionados
                </h2>
            </div>

            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach($relatedPosts as $related)
                    <article class="group overflow-hidden rounded-[24px] border border-zinc-200 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(0,0,0,0.08)]">
                        <a href="{{ route('blog.show', $related) }}" class="block">
                            @if($related->featured_image)
                                <img
                                    src="{{ asset('storage/' . ltrim($related->featured_image, '/')) }}"
                                    alt="{{ $related->featured_image_alt ?: $related->title }}"
                                    class="h-[220px] w-full object-cover"
                                    loading="lazy"
                                    decoding="async"
                                >
                            @else
                                <div class="flex h-[220px] items-center justify-center bg-[#181818] p-8 text-center text-white">
                                    <div>
                                        <p class="text-[12px] font-semibold uppercase tracking-[0.16em] text-white/60">
                                            Ruguex Blog
                                        </p>
                                        <p class="mt-3 text-[24px] font-semibold leading-[1.2]">
                                            {{ $related->title }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </a>

                        <div class="p-6">
                            <div class="flex flex-wrap items-center gap-3 text-[13px] text-[#6b7280]">
                                <a
                                    href="{{ route('blog.category', $related->category) }}"
                                    class="inline-flex rounded-full bg-[#fff3ee] px-3 py-1 font-medium text-[#d85c31] transition hover:bg-[#ffe7dd]"
                                >
                                    {{ $related->category->name }}
                                </a>

                                <span>{{ optional($related->published_at)->format('d/m/Y') }}</span>
                            </div>

                            <h3 class="mt-4 text-[22px] font-semibold leading-[1.2] text-black">
                                <a href="{{ route('blog.show', $related) }}" class="transition group-hover:text-[#e76a3e]">
                                    {{ $related->title }}
                                </a>
                            </h3>

                            @if($related->excerpt)
                                <p class="mt-4 text-[15px] leading-7 text-[#6b7280]">
                                    {{ $related->excerpt }}
                                </p>
                            @endif

                            <div class="mt-5">
                                <a
                                    href="{{ route('blog.show', $related) }}"
                                    class="text-[14px] font-semibold text-[#e76a3e] transition hover:text-[#d85c31]"
                                >
                                    Leer artículo →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

<section class="bg-[#111111]">
    <div class="mx-auto max-w-[1140px] px-4 py-12 sm:py-14 md:py-16">
        <div class="rounded-[28px] border border-white/10 bg-white/[0.04] px-6 py-8 sm:px-8 md:px-10">
            <div class="max-w-[760px]">
                <p class="text-[13px] font-semibold uppercase tracking-[0.18em] text-[#e76a3e]">
                    ¿Listo para cotizar?
                </p>

                <h2 class="mt-3 text-[28px] font-semibold leading-[1.15] text-white sm:text-[34px]">
                    Convierte esta información en una recomendación correcta para tu equipo
                </h2>

                <p class="mt-4 text-[15px] leading-8 text-white/75 sm:text-[16px]">
                    Si necesitas ayuda para validar la medida, la aplicación o el tipo de llanta que conviene para tu minicargador,
                    en Ruguex podemos orientarte.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a
                        href="{{ url('/contacto') }}"
                        class="inline-flex min-h-[46px] items-center justify-center bg-[#e76a3e] px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-[#d85c31]"
                    >
                        Solicitar asesoría
                    </a>

                    <a
                        href="{{ route('blog.index') }}"
                        class="inline-flex min-h-[46px] items-center justify-center border border-white/15 bg-white/5 px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-white/10"
                    >
                        Volver al blog
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection