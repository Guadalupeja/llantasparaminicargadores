@extends('layouts.public')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
    <x-breadcrumbs :items="[
        ['label' => 'Inicio', 'url' => url('/')],
        ['label' => $category->name],
    ]" />

    <x-section-heading
        :title="$category->h1"
        :description="$category->intro"
    />

    <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($category->products as $product)
            <x-product-card
                :title="$product->name"
                :description="$product->short_description"
                :url="url('/llantas-solidas-para-minicargador/' . $product->slug)"
            />
        @endforeach
    </div>
</section>
@endsection