@extends('layouts.public')

@section('content')
@php
    $activeCategory = $category ?? null;
    $featuredPost = $posts->count() ? $posts->first() : null;
    $gridPosts = $posts->count() > 1 ? $posts->slice(1) : collect();
@endphp

<section class="relative overflow-hidden bg-[#111111]">
    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-black/70"></div>

    <div class="relative mx-auto max-w-[1140px] px-4 py-14 sm:py-16 md:py-20 lg:py-24">
        <div class="max-w-[780px]">
            <span class="inline-flex items-center rounded-full border border-white/15 bg-white/5 px-4 py-2 text-[12px] font-semibold uppercase tracking-[0.18em] text-white/80">
                Blog Ruguex
            </span>

            <h1 class="mt-5 text-[32px] font-semibold leading-[1.08] text-white sm:text-[40px] md:text-[52px]">
                Blog de llantas para minicargador
            </h1>

            <p class="mt-5 max-w-[720px] text-[16px] leading-8 text-white/75 sm:text-[17px]">
                Guías, comparativas y consejos prácticos para elegir la mejor llanta para minicargador según la medida,
                el tipo de trabajo y la exigencia real de tu operación.
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <a
                    href="{{ route('blog.index') }}"
                    class="inline-flex min-h-[46px] items-center justify-center bg-[#e76a3e] px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-[#d85c31]"
                >
                    Ver todos los artículos
                </a>

                <a
                    href="{{ url('/contacto') }}"
                    class="inline-flex min-h-[46px] items-center justify-center border border-white/20 bg-white/5 px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-white/10"
                >
                    Solicitar asesoría
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f5f5f5]">
    <div class="mx-auto max-w-[1140px] px-4 py-6 sm:py-8">
        <div class="flex flex-wrap gap-3">
            <a
                href="{{ route('blog.index') }}"
                class="inline-flex min-h-[42px] items-center rounded-full px-4 py-2 text-[14px] font-medium transition {{ $activeCategory ? 'bg-white text-[#4b4b4b] hover:bg-zinc-100' : 'bg-[#e76a3e] text-white' }}"
            >
                Todas
            </a>

            @foreach($categories as $cat)
                <a
                    href="{{ route('blog.category', $cat) }}"
                    class="inline-flex min-h-[42px] items-center rounded-full px-4 py-2 text-[14px] font-medium transition {{ $activeCategory && $activeCategory->id === $cat->id ? 'bg-[#e76a3e] text-white' : 'bg-white text-[#4b4b4b] hover:bg-zinc-100' }}"
                >
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>
    </div>
</section>

@if($activeCategory)
    <section class="bg-white">
        <div class="mx-auto max-w-[1140px] px-4 pt-8 pb-2 sm:pt-10">
            <div class="rounded-[24px] border border-zinc-200 bg-[#fcfcfc] px-6 py-6 sm:px-8">
                <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-[#e76a3e]">
                    Categoría activa
                </p>
                <h2 class="mt-2 text-[26px] font-semibold leading-[1.15] text-black sm:text-[32px]">
                    {{ $activeCategory->name }}
                </h2>

                @if($activeCategory->description)
                    <p class="mt-3 max-w-[760px] text-[15px] leading-7 text-[#6b7280] sm:text-[16px] sm:leading-8">
                        {{ $activeCategory->description }}
                    </p>
                @endif
            </div>
        </div>
    </section>
@endif

<section class="bg-white">
    <div class="mx-auto max-w-[1140px] px-4 py-10 sm:py-12 md:py-14">
        @if($featuredPost)
            <div class="mb-12 rounded-[28px] border border-zinc-200 bg-white shadow-[0_12px_40px_rgba(0,0,0,0.06)] overflow-hidden">
                <div class="grid gap-0 lg:grid-cols-[1.1fr_0.9fr]">
                    <div class="order-2 flex flex-col justify-center p-6 sm:p-8 md:p-10 lg:order-1">
                        <div class="flex flex-wrap items-center gap-3 text-[13px] text-[#6b7280]">
                            <a
                                href="{{ route('blog.category', $featuredPost->category) }}"
                                class="inline-flex rounded-full bg-[#fff3ee] px-3 py-1 font-medium text-[#d85c31] transition hover:bg-[#ffe7dd]"
                            >
                                {{ $featuredPost->category->name }}
                            </a>

                            <span>{{ optional($featuredPost->published_at)->format('d/m/Y') }}</span>
                            <span>•</span>
                            <span>{{ $featuredPost->reading_time }} min de lectura</span>
                        </div>

                        <h2 class="mt-5 text-[28px] font-semibold leading-[1.1] text-black sm:text-[34px] md:text-[40px]">
                            <a href="{{ route('blog.show', $featuredPost) }}" class="transition hover:text-[#e76a3e]">
                                {{ $featuredPost->title }}
                            </a>
                        </h2>

                        @if($featuredPost->excerpt)
                            <p class="mt-5 max-w-[640px] text-[15px] leading-8 text-[#6b7280] sm:text-[16px]">
                                {{ $featuredPost->excerpt }}
                            </p>
                        @endif

                        <div class="mt-7">
                            <a
                                href="{{ route('blog.show', $featuredPost) }}"
                                class="inline-flex min-h-[46px] items-center justify-center bg-black px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-zinc-800"
                            >
                                Leer artículo destacado
                            </a>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        @if($featuredPost->featured_image)
                            <img
                                src="{{ asset('storage/' . ltrim($featuredPost->featured_image, '/')) }}"
                                alt="{{ $featuredPost->featured_image_alt ?: $featuredPost->title }}"
                                class="h-full min-h-[240px] w-full object-cover"
                                loading="eager"
                                decoding="async"
                            >
                        @else
                            <div class="flex h-full min-h-[240px] items-center justify-center bg-gradient-to-br from-[#1c1c1c] to-[#3a3a3a] p-10 text-center text-white">
                                <div>
                                    <p class="text-[13px] font-semibold uppercase tracking-[0.16em] text-white/70">
                                        Artículo destacado
                                    </p>
                                    <p class="mt-3 text-[26px] font-semibold leading-[1.2]">
                                        {{ $featuredPost->title }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if($gridPosts->count())
            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                @foreach($gridPosts as $post)
                    <article class="group overflow-hidden rounded-[24px] border border-zinc-200 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.04)] transition hover:-translate-y-1 hover:shadow-[0_18px_40px_rgba(0,0,0,0.08)]">
                        <a href="{{ route('blog.show', $post) }}" class="block">
                            @if($post->featured_image)
                                <img
                                    src="{{ asset('storage/' . ltrim($post->featured_image, '/')) }}"
                                    alt="{{ $post->featured_image_alt ?: $post->title }}"
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
                                            {{ $post->title }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        </a>

                        <div class="p-6">
                            <div class="flex flex-wrap items-center gap-3 text-[13px] text-[#6b7280]">
                                <a
                                    href="{{ route('blog.category', $post->category) }}"
                                    class="inline-flex rounded-full bg-[#fff3ee] px-3 py-1 font-medium text-[#d85c31] transition hover:bg-[#ffe7dd]"
                                >
                                    {{ $post->category->name }}
                                </a>

                                <span>{{ optional($post->published_at)->format('d/m/Y') }}</span>
                            </div>

                            <h3 class="mt-4 text-[22px] font-semibold leading-[1.2] text-black">
                                <a href="{{ route('blog.show', $post) }}" class="transition group-hover:text-[#e76a3e]">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            @if($post->excerpt)
                                <p class="mt-4 text-[15px] leading-7 text-[#6b7280]">
                                    {{ $post->excerpt }}
                                </p>
                            @endif

                            <div class="mt-5 flex items-center justify-between gap-4">
                                <span class="text-[13px] text-[#6b7280]">
                                    {{ $post->reading_time }} min de lectura
                                </span>

                                <a
                                    href="{{ route('blog.show', $post) }}"
                                    class="text-[14px] font-semibold text-[#e76a3e] transition hover:text-[#d85c31]"
                                >
                                    Leer artículo →
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @elseif(!$featuredPost)
            <div class="rounded-[24px] border border-zinc-200 bg-[#fafafa] px-6 py-12 text-center">
                <h2 class="text-[24px] font-semibold text-black">
                    Aún no hay artículos publicados
                </h2>
                <p class="mt-3 text-[15px] leading-7 text-[#6b7280]">
                    Estamos preparando nuevas guías y comparativas para ayudarte a elegir la mejor llanta para minicargador.
                </p>
            </div>
        @endif

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>

<section class="bg-[#111111]">
    <div class="mx-auto max-w-[1140px] px-4 py-12 sm:py-14 md:py-16">
        <div class="rounded-[28px] border border-white/10 bg-white/[0.04] px-6 py-8 sm:px-8 md:px-10">
            <div class="max-w-[760px]">
                <p class="text-[13px] font-semibold uppercase tracking-[0.18em] text-[#e76a3e]">
                    ¿Buscas una recomendación técnica?
                </p>

                <h2 class="mt-3 text-[28px] font-semibold leading-[1.15] text-white sm:text-[34px]">
                    Te ayudamos a elegir la mejor llanta para tu minicargador
                </h2>

                <p class="mt-4 text-[15px] leading-8 text-white/75 sm:text-[16px]">
                    Si no sabes si te conviene una llanta sólida o neumática, o necesitas validar medida,
                    equivalencia y aplicación, en Ruguex podemos orientarte.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a
                        href="{{ url('/contacto') }}"
                        class="inline-flex min-h-[46px] items-center justify-center bg-[#e76a3e] px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-[#d85c31]"
                    >
                        Solicitar asesoría
                    </a>

                    <a
                        href="{{ url('/llantas-solidas-para-minicargador') }}"
                        class="inline-flex min-h-[46px] items-center justify-center border border-white/15 bg-white/5 px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-white/10"
                    >
                        Ver llantas sólidas
                    </a>

                    <a
                        href="{{ url('/llantas-neumaticas-para-minicargador') }}"
                        class="inline-flex min-h-[46px] items-center justify-center border border-white/15 bg-white/5 px-6 py-3 text-[15px] font-semibold text-white transition hover:bg-white/10"
                    >
                        Ver llantas neumáticas
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection