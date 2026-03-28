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
</section>
@endsection