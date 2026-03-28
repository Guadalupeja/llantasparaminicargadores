<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showSolid(Product $product): View
    {
        $product->load('category');

        abort_if(! $product->status, 404);
        abort_if(! $product->category, 404);
        abort_if($product->category->slug !== 'llantas-solidas-para-minicargador', 404);

        $seo = [
            'title' => $product->title,
            'description' => $product->meta_description,
            'canonical' => url('/llantas-solidas-para-minicargador/' . $product->slug),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('products.show', compact('product', 'seo'));
    }

    public function showPneumatic(Product $product): View
    {
        $product->load('category');

        abort_if(! $product->status, 404);
        abort_if(! $product->category, 404);
        abort_if($product->category->slug !== 'llantas-neumaticas-para-minicargador', 404);

        $seo = [
            'title' => $product->title,
            'description' => $product->meta_description,
            'canonical' => url('/llantas-neumaticas-para-minicargador/' . $product->slug),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('products.show', compact('product', 'seo'));
    }
}