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
            'title' => $category->title,
            'description' => $category->meta_description,
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
            'title' => $category->title,
            'description' => $category->meta_description,
            'canonical' => url('/llantas-neumaticas-para-minicargador'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('categories.pneumatic', compact('category', 'seo'));
    }
}