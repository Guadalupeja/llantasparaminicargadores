<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $products = Product::with('category')
            ->where('status', true)
            ->get();

        $staticUrls = [
            url('/'),
            url('/somos'),
            url('/contacto'),
            url('/llantas-solidas-para-minicargador'),
            url('/llantas-neumaticas-para-minicargador'),
        ];

        return response()
            ->view('sitemap', compact('products', 'staticUrls'))
            ->header('Content-Type', 'application/xml');
    }
}