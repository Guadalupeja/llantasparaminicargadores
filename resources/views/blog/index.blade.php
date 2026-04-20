@extends('layouts.site')

@section('content')
<section class="bg-white py-12 md:py-16">
    <div class="ruguex-container">
        <div class="mx-auto max-w-4xl text-center">
            <span class="inline-flex rounded-full border border-orange-200 bg-orange-50 px-4 py-1.5 text-sm font-semibold tracking-wide text-orange-700">
                Blog Ruguex
            </span>

            <h1 class="mt-5 text-[34px] font-extrabold leading-tight tracking-[-0.02em] text-slate-900 md:text-[48px]">
                Blog de llantas para minicargador
            </h1>

            <p class="mx-auto mt-5 max-w-3xl text-[17px] leading-8 text-slate-600 md:text-[18px]">
                Guías, comparativas y consejos prácticos para elegir la mejor llanta para minicargador según la medida, el tipo de trabajo y la exigencia real de tu operación.
            </p>
        </div>

        @if($categories->count())
            <div class="mt-10 flex flex-wrap justify-center gap-3">
                <a href="{{ route('blog.index') }}"
                   class="rounded-full border border-slate-300 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-900 hover:text-slate-900">
                    Todas
                </a>

                @foreach($categories as $category)
                    <a href="{{ route('blog.category', $category) }}"
                       class="rounded-full border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-orange-500 hover:text-orange-600">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        @endif

        <div class="mt-12 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            @forelse($posts as $post)
                <article class="group overflow-hidden rounded-[28px] border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    @if($post->featured_image)
                        <a href="{{ route('blog.show', $post) }}" class="block overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $post->featured_image) }}"
                                alt="{{ $post->featured_image_alt ?: $post->title }}"
                                class="h-60 w-full object-cover transition duration-500 group-hover:scale-[1.03]"
                            >
                        </a>
                    @endif

                    <div class="p-6 md:p-7">
                        <div class="flex items-center gap-3 text-sm text-slate-500">
                            <a href="{{ route('blog.category', $post->category) }}" class="font-semibold text-orange-600 hover:text-orange-700">
                                {{ $post->category->name }}
                            </a>
                            <span>•</span>
                            <span>{{ optional($post->published_at)->format('d/m/Y') }}</span>
                        </div>

                        <h2 class="mt-4 text-[25px] font-extrabold leading-[1.2] tracking-[-0.02em] text-slate-900">
                            <a href="{{ route('blog.show', $post) }}" class="transition hover:text-orange-600">
                                {{ $post->title }}
                            </a>
                        </h2>

                        @if($post->excerpt)
                            <p class="mt-4 text-[16px] leading-7 text-slate-600">
                                {{ $post->excerpt }}
                            </p>
                        @endif

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm text-slate-500">
                                {{ $post->reading_time }} min de lectura
                            </span>

                            <a href="{{ route('blog.show', $post) }}"
                               class="inline-flex items-center gap-2 text-sm font-bold text-orange-600 transition hover:text-orange-700">
                                Leer artículo
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-full rounded-[28px] border border-slate-200 bg-slate-50 p-10 text-center">
                    <p class="text-lg font-medium text-slate-700">
                        Aún no hay artículos publicados.
                    </p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection