<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\View\View;

class ProductCategoryController extends Controller
{
    public function solid(): View
    {
        $category = ProductCategory::with('products')
            ->where('slug', 'llantas-solidas-para-minicargador')
            ->where('status', true)
            ->firstOrFail();

        $seo = [
            'title' => 'Mejores llantas sólidas para Minicargadores 2026| Trelleborg',
            'description' => 'Llantas sólidas para minicargador, las mejores llantas macizas 2026, neumáticos, cushion para Minicargadores. 3 veces más hule consumible, precios mayorista',
            'canonical' => url('/llantas-solidas-para-minicargador'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('categories.solid', compact('category', 'seo'));
    }

    public function pneumatic(): View
    {
        $category = ProductCategory::with('products')
            ->where('slug', 'llantas-neumaticas-para-minicargador')
            ->where('status', true)
            ->firstOrFail();

        $seo = [
            'title' => 'Llantas Neumáticas para Minicargador',
            'description' => 'Llantas Neumáticas para minicargador 2026, cotiza aquí llantas macizas, neumáticos, cushion para Minicargadores. 3 veces más hule consumible, precios mayoristas',
            'canonical' => url('/llantas-neumaticas-para-minicargador'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('categories.pneumatic', compact('category', 'seo'));
    }

    public function loaders(): View
{
    $category = ProductCategory::with(['products' => function ($query) {
            $query->where('status', true)
                ->orderBy('sort_order');
        }])
        ->where('slug', 'llantas-para-cargadores')
        ->where('status', true)
        ->firstOrFail();

    $seo = [
        'title' => $category->title ?? 'Llantas para cargadores y maquinaria de construcción',
        'description' => $category->meta_description ?? 'Llantas sólidas y neumáticas para cargadores, cargadores frontales y maquinaria de construcción.',
        'canonical' => url('/llantas-para-cargadores'),
        'image' => $category->hero_image
            ? asset('storage/' . ltrim($category->hero_image, '/'))
            : asset('images/seo/default.jpg'),
        'robots' => 'index,follow',
    ];

    return view('categories.cargadores', compact('category', 'seo'));
}

public function telehandler(): View
{
    $category = ProductCategory::with(['products' => function ($query) {
            $query->where('status', true)
                ->orderBy('sort_order')
                ->orderBy('name');
        }])
        ->where('slug', 'llantas-para-manipulador-telescopico')
        ->where('status', true)
        ->firstOrFail();

    $seo = [
        'title' => $category->title ?? 'Llantas para Manipulador Telescópico',
        'description' => $category->meta_description ?? 'Llantas para manipuladores telescópicos, telehandlers y cargadores.',
        'canonical' => url('/llantas-para-manipulador-telescopico'),
        'image' => $category->hero_image
            ? asset('storage/' . ltrim($category->hero_image, '/'))
            : asset('images/seo/default.jpg'),
        'robots' => 'index,follow',
    ];

    return view('categories.manipulador-telescopico', compact('category', 'seo'));
}


}