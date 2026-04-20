<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticPages = [
            [
                'loc' => url('/'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '1.0',
            ],
            [
                'loc' => url('/somos'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'loc' => url('/contacto'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'monthly',
                'priority' => '0.7',
            ],
            [
                'loc' => url('/llanta-10-16-5'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => url('/llanta-12-16-5'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.9',
            ],
            [
                'loc' => route('categories.solid'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('categories.pneumatic'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
            [
                'loc' => route('blog.index'),
                'lastmod' => now()->toAtomString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ],
        ];

        $products = Product::query()
            ->where('status', true)
            ->get()
            ->map(function ($product) {
                $routeName = $product->category?->slug === 'llantas-solidas-para-minicargador'
                    ? 'products.solid.show'
                    : 'products.pneumatic.show';

                return [
                    'loc' => route($routeName, $product),
                    'lastmod' => optional($product->updated_at)->toAtomString() ?? now()->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.7',
                ];
            })
            ->values()
            ->all();

        $blogCategories = PostCategory::query()
            ->where('status', true)
            ->get()
            ->map(function ($category) {
                return [
                    'loc' => route('blog.category', $category),
                    'lastmod' => optional($category->updated_at)->toAtomString() ?? now()->toAtomString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.7',
                ];
            })
            ->values()
            ->all();

        $posts = Post::query()
            ->published()
            ->get()
            ->map(function ($post) {
                return [
                    'loc' => route('blog.show', $post),
                    'lastmod' => optional($post->updated_at)->toAtomString() ?? now()->toAtomString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.7',
                ];
            })
            ->values()
            ->all();

        $urls = array_merge($staticPages, $products, $blogCategories, $posts);

        $xml = view('sitemap.index', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}