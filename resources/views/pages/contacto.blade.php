@extends('layouts.public')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
    <x-breadcrumbs :items="[
        ['label' => 'Inicio', 'url' => url('/')],
        ['label' => $page->name],
    ]" />

    <x-section-heading
        :title="$page->h1"
        :description="$page->intro"
    />

    <form action="{{ route('contact.store') }}" method="POST" class="mt-10 max-w-2xl space-y-6">
        @csrf

        <div>
            <label for="name" class="mb-2 block text-sm font-medium text-zinc-800">Nombre</label>
            <input id="name" name="name" type="text" class="w-full rounded-xl border border-zinc-300 px-4 py-3 outline-none focus:border-zinc-900">
        </div>

        <div>
            <label for="email" class="mb-2 block text-sm font-medium text-zinc-800">Correo</label>
            <input id="email" name="email" type="email" class="w-full rounded-xl border border-zinc-300 px-4 py-3 outline-none focus:border-zinc-900">
        </div>

        <div>
            <label for="phone" class="mb-2 block text-sm font-medium text-zinc-800">Teléfono</label>
            <input id="phone" name="phone" type="text" class="w-full rounded-xl border border-zinc-300 px-4 py-3 outline-none focus:border-zinc-900">
        </div>

        <div>
            <label for="message" class="mb-2 block text-sm font-medium text-zinc-800">Mensaje</label>
            <textarea id="message" name="message" rows="5" class="w-full rounded-xl border border-zinc-300 px-4 py-3 outline-none focus:border-zinc-900"></textarea>
        </div>

        <button type="submit" class="inline-flex rounded-xl bg-zinc-900 px-6 py-3 text-sm font-medium text-white hover:bg-zinc-800">
            Enviar
        </button>
    </form>
</section>
@endsection