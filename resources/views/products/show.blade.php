@extends('layouts.public')

@section('content')
<section class="mx-auto max-w-7xl px-4 py-16 lg:px-8">
    <x-breadcrumbs :items="[
        ['label' => 'Inicio', 'url' => url('/')],
        ['label' => $product->category?->name, 'url' => $product->category?->slug === 'llantas-solidas-para-minicargador' ? url('/llantas-solidas-para-minicargador') : url('/llantas-neumaticas-para-minicargador')],
        ['label' => $product->name],
    ]" />

    <p class="text-sm text-zinc-500">{{ $product->category?->name }}</p>

    <h1 class="mt-2 text-3xl font-bold tracking-tight text-zinc-900 lg:text-5xl">
        {{ $product->h1 ?: $product->name }}
    </h1>

    @if($product->short_description)
        <p class="mt-4 max-w-3xl text-lg leading-8 text-zinc-600">
            {{ $product->short_description }}
        </p>
    @endif

    @php
        $features = is_array($product->features) ? $product->features : [];
        $applications = is_array($product->applications) ? $product->applications : [];
        $specifications = is_array($product->specifications) ? $product->specifications : [];
    @endphp

    @if ($product->description)
        <div class="mt-10 max-w-4xl">
            <h2 class="text-xl font-semibold text-zinc-900">Descripción</h2>
            <p class="mt-4 leading-7 text-zinc-600">
                {{ $product->description }}
            </p>
        </div>
    @endif

    @if (count($features))
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-zinc-900">Características</h2>
            <ul class="mt-4 space-y-3 text-zinc-600">
                @foreach ($features as $feature)
                    <li>• {{ $feature }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($applications))
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-zinc-900">Aplicaciones</h2>
            <ul class="mt-4 space-y-3 text-zinc-600">
                @foreach ($applications as $application)
                    <li>• {{ $application }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (count($specifications))
        <div class="mt-10">
            <h2 class="text-xl font-semibold text-zinc-900">Especificaciones</h2>

            <div class="mt-4 overflow-hidden rounded-2xl border border-zinc-200">
                <table class="min-w-full divide-y divide-zinc-200">
                    <tbody class="divide-y divide-zinc-200 bg-white">
                        @foreach ($specifications as $spec)
                            <tr>
                                <td class="w-1/3 px-4 py-3 text-sm font-medium text-zinc-900">
                                    {{ $spec['label'] ?? '' }}
                                </td>
                                <td class="px-4 py-3 text-sm text-zinc-600">
                                    {{ $spec['value'] ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</section>
@endsection