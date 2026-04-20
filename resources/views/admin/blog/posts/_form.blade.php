@if ($errors->any())
    <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">
        <p class="mb-2 font-semibold">Revisa los siguientes errores:</p>
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid gap-6">
    <div>
        <label class="mb-2 block font-semibold text-slate-700">Categoría</label>
        <select name="post_category_id" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
            <option value="">Selecciona una categoría</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('post_category_id', $post->post_category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Título</label>
        <input
            type="text"
            name="title"
            value="{{ old('title', $post->title ?? '') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
        <p class="mt-2 text-sm text-slate-500">
            Usa un título claro, útil y atractivo para buscadores y usuarios.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Slug</label>
        <input
            type="text"
            name="slug"
            value="{{ old('slug', $post->slug ?? '') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
        <p class="mt-2 text-sm text-slate-500">
            Si lo dejas vacío, se genera automáticamente a partir del título.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Extracto</label>
        <textarea
            name="excerpt"
            rows="3"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
        <p class="mt-2 text-sm text-slate-500">
            Resumen breve del artículo. También sirve como apoyo para SEO y listados.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Contenido</label>
        <textarea
            name="content"
            rows="16"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >{{ old('content', $post->content ?? '') }}</textarea>
        <p class="mt-2 text-sm text-slate-500">
            Puedes usar HTML básico para encabezados, párrafos, listas y enlaces.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Imagen destacada</label>
        <input
            type="file"
            name="featured_image"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
        <p class="mt-2 text-sm text-slate-500">
            Formatos permitidos: JPG, JPEG, PNG, WEBP, AVIF. Máximo 4 MB.
        </p>

        @if (!empty($post?->featured_image))
            <div class="mt-4">
                <p class="mb-2 text-sm font-medium text-slate-600">Imagen actual</p>
                <img
                    src="{{ asset('storage/' . $post->featured_image) }}"
                    alt="{{ $post->featured_image_alt ?: $post->title }}"
                    class="h-32 rounded-2xl object-cover"
                >
            </div>
        @endif
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Alt de imagen</label>
        <input
            type="text"
            name="featured_image_alt"
            value="{{ old('featured_image_alt', $post->featured_image_alt ?? '') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
        <p class="mt-2 text-sm text-slate-500">
            Describe la imagen con lenguaje natural y relacionado al tema.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Autor</label>
        <input
            type="text"
            name="author_name"
            value="{{ old('author_name', $post->author_name ?? 'Ruguex') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">SEO title</label>
        <input
            type="text"
            name="seo_title"
            value="{{ old('seo_title', $post->seo_title ?? '') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
        <p class="mt-2 text-sm text-slate-500">
            Idealmente no más de 60 caracteres.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">SEO description</label>
        <textarea
            name="seo_description"
            rows="3"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >{{ old('seo_description', $post->seo_description ?? '') }}</textarea>
        <p class="mt-2 text-sm text-slate-500">
            Idealmente no más de 160 caracteres.
        </p>
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Canonical URL</label>
        <input
            type="text"
            name="canonical_url"
            value="{{ old('canonical_url', $post->canonical_url ?? '') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
    </div>

    <div>
        <label class="mb-2 block font-semibold text-slate-700">Robots</label>
        <input
            type="text"
            name="robots"
            value="{{ old('robots', $post->robots ?? 'index,follow') }}"
            class="w-full rounded-2xl border border-slate-300 px-4 py-3"
        >
    </div>

    <div class="grid gap-6 md:grid-cols-2">
        <div>
            <label class="mb-2 block font-semibold text-slate-700">Estado</label>
            <select name="status" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
                <option value="draft" @selected(old('status', $post->status ?? 'draft') === 'draft')>Borrador</option>
                <option value="published" @selected(old('status', $post->status ?? '') === 'published')>Publicado</option>
            </select>
        </div>

        <div>
            <label class="mb-2 block font-semibold text-slate-700">Fecha de publicación</label>
            <input
                type="datetime-local"
                name="published_at"
                value="{{ old('published_at', isset($post) && $post->published_at ? $post->published_at->format('Y-m-d\TH:i') : '') }}"
                class="w-full rounded-2xl border border-slate-300 px-4 py-3"
            >
        </div>
    </div>

    <div class="flex items-center gap-3">
        <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured ?? false))>
        <label class="font-semibold text-slate-700">Artículo destacado</label>
    </div>
</div>