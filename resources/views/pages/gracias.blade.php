@extends('layouts.public')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
    <x-section-heading
        :title="$page->h1"
        :description="$page->intro"
    />

    <a href="{{ url('/') }}" class="mt-8 inline-flex rounded-xl bg-zinc-900 px-6 py-3 text-sm font-medium text-white hover:bg-zinc-800">
        Volver al inicio
    </a>
</section>
@endsection