@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-7xl px-4 py-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Artículos del blog</h1>
            <p class="mt-1 text-slate-600">Administra artículos publicados y borradores.</p>
        </div>

        <a href="{{ route('admin.blog.posts.create') }}"
           class="rounded-full bg-orange-600 px-5 py-3 text-sm font-semibold text-white hover:bg-orange-700">
            Nuevo artículo
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-2xl bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <table class="min-w-full divide-y divide-slate-200">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Artículo</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Categoría</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Estado</th>
                    <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wide text-slate-500">Fecha</th>
                    <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wide text-slate-500">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @foreach($posts as $post)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                @if($post->featured_image)
                                    <img
                                        src="{{ asset('storage/' . $post->featured_image) }}"
                                        alt="{{ $post->featured_image_alt ?: $post->title }}"
                                        class="h-14 w-20 rounded-xl object-cover"
                                    >
                                @endif

                                <div>
                                    <p class="font-semibold text-slate-900">{{ $post->title }}</p>
                                    <p class="text-sm text-slate-500">{{ $post->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-slate-600">{{ $post->category->name ?? '-' }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $post->status }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ optional($post->published_at)->format('d/m/Y H:i') ?: '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-end gap-4">
                                <a href="{{ route('admin.blog.posts.edit', $post) }}" class="text-orange-600 hover:text-orange-700">
                                    Editar
                                </a>

                                <form action="{{ route('admin.blog.posts.destroy', $post) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este artículo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $posts->links() }}
    </div>
</div>
@endsection