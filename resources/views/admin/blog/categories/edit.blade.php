@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-4xl px-4 py-8">
    <h1 class="mb-6 text-3xl font-bold text-slate-900">Editar categoría</h1>

    <form action="{{ route('admin.blog.categories.update', $category) }}" method="POST" class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
        @csrf
        @method('PUT')

        <div class="grid gap-6">
            <div>
                <label class="mb-2 block font-semibold text-slate-700">Nombre</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
            </div>

            <div>
                <label class="mb-2 block font-semibold text-slate-700">Slug</label>
                <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
            </div>

            <div>
                <label class="mb-2 block font-semibold text-slate-700">Descripción</label>
                <textarea name="description" rows="4" class="w-full rounded-2xl border border-slate-300 px-4 py-3">{{ old('description', $category->description) }}</textarea>
            </div>

            <div>
                <label class="mb-2 block font-semibold text-slate-700">SEO title</label>
                <input type="text" name="seo_title" value="{{ old('seo_title', $category->seo_title) }}" class="w-full rounded-2xl border border-slate-300 px-4 py-3">
            </div>

            <div>
                <label class="mb-2 block font-semibold text-slate-700">SEO description</label>
                <textarea name="seo_description" rows="3" class="w-full rounded-2xl border border-slate-300 px-4 py-3">{{ old('seo_description', $category->seo_description) }}</textarea>
            </div>

            <label class="flex items-center gap-3">
                <input type="checkbox" name="status" value="1" @checked(old('status', $category->status))>
                <span class="font-semibold text-slate-700">Activa</span>
            </label>
        </div>

        <div class="mt-8">
            <button class="rounded-full bg-orange-600 px-6 py-3 font-semibold text-white hover:bg-orange-700">
                Actualizar categoría
            </button>
        </div>
    </form>
</div>
@endsection