@extends('layouts.admin')

@section('content')
<div class="mx-auto max-w-5xl px-4 py-8">
    <h1 class="mb-6 text-3xl font-bold text-slate-900">Nuevo artículo</h1>

    <form action="{{ route('admin.blog.posts.store') }}" method="POST" enctype="multipart/form-data" class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
        @csrf
        @include('admin.blog.posts._form')
        <div class="mt-8">
            <button class="rounded-full bg-orange-600 px-6 py-3 font-semibold text-white hover:bg-orange-700">
                Guardar artículo
            </button>
        </div>
    </form>
</div>
@endsection