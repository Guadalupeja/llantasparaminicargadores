<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $solid = ProductCategory::where('slug', 'llantas-solidas-para-minicargador')->firstOrFail();
        $pneumatic = ProductCategory::where('slug', 'llantas-neumaticas-para-minicargador')->firstOrFail();

        $products = [
            [
                'category_id' => $solid->id,
                'name' => 'Brawler HD Solidflex',
                'slug' => 'brawler-hd-solidflex',
                'title' => 'Brawler HD Solidflex',
                'meta_description' => 'Conoce la llanta Brawler HD Solidflex para minicargador, ideal para trabajo pesado y alta resistencia.',
                'h1' => 'Brawler HD Solidflex',
                'short_description' => 'Llanta sólida para minicargador de alto desempeño.',
                'description' => 'La Brawler HD Solidflex ofrece resistencia, durabilidad y estabilidad para aplicaciones exigentes.',
                'features' => [
                    'Alta resistencia al desgaste',
                    'Excelente durabilidad',
                    'Buen desempeño en trabajo pesado',
                ],
                'applications' => [
                    'Construcción',
                    'Patios industriales',
                    'Manejo de materiales',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta sólida'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/brawler-hd-solidflex/hero.jpg',
                ],
                'hero_image' => 'products/brawler-hd-solidflex/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'category_id' => $solid->id,
                'name' => 'Brawler HPS Solidflex Traction/Smooth',
                'slug' => 'brawler-hps-solidflex-traction-smooth',
                'title' => 'Brawler HPS Solidflex Traction/Smooth',
                'meta_description' => 'Conoce la Brawler HPS Solidflex Traction/Smooth para minicargador y sus ventajas para trabajo exigente.',
                'h1' => 'Brawler HPS Solidflex Traction/Smooth',
                'short_description' => 'Llanta sólida para minicargador con excelente resistencia.',
                'description' => 'La Brawler HPS Solidflex Traction/Smooth está diseñada para aplicaciones exigentes y larga vida útil.',
                'features' => [
                    'Diseño robusto',
                    'Desempeño confiable',
                    'Larga vida útil',
                ],
                'applications' => [
                    'Construcción',
                    'Operación industrial',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta sólida'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/brawler-hps-solidflex-traction-smooth/hero.jpg',
                ],
                'hero_image' => 'products/brawler-hps-solidflex-traction-smooth/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'category_id' => $solid->id,
                'name' => 'SKS 900 Traction/Smooth',
                'slug' => 'sks-900-traction-smooth',
                'title' => 'SKS 900 Traction/Smooth',
                'meta_description' => 'Conoce la llanta SKS 900 Traction/Smooth para minicargador y sus aplicaciones.',
                'h1' => 'SKS 900 Traction/Smooth',
                'short_description' => 'Llanta sólida para trabajo demandante.',
                'description' => 'La SKS 900 Traction/Smooth ofrece resistencia y desempeño para minicargadores.',
                'features' => [
                    'Alta resistencia',
                    'Buen agarre',
                    'Larga duración',
                ],
                'applications' => [
                    'Construcción',
                    'Aplicaciones severas',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta sólida'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/sks-900-traction-smooth/hero.jpg',
                ],
                'hero_image' => 'products/sks-900-traction-smooth/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 900',
                'slug' => 'sk-900',
                'title' => 'SK 900',
                'meta_description' => 'Conoce la llanta neumática SK 900 para minicargador.',
                'h1' => 'SK 900',
                'short_description' => 'Llanta neumática para minicargador.',
                'description' => 'La SK 900 brinda desempeño y tracción para diversas condiciones de operación.',
                'features' => [
                    'Buen desempeño',
                    'Tracción confiable',
                    'Versatilidad de uso',
                ],
                'applications' => [
                    'Construcción',
                    'Manejo de materiales',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta neumática'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/sk-900/hero.jpg',
                ],
                'hero_image' => 'products/sk-900/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 900 no direccional',
                'slug' => 'sk-900-2',
                'title' => 'SK 900 no direccional',
                'meta_description' => 'Conoce la llanta SK 900 no direccional para minicargador.',
                'h1' => 'SK 900 no direccional',
                'short_description' => 'Llanta neumática no direccional para minicargador.',
                'description' => 'La SK 900 no direccional ofrece estabilidad y desempeño en operación continua.',
                'features' => [
                    'Diseño no direccional',
                    'Buen desempeño',
                    'Operación confiable',
                ],
                'applications' => [
                    'Industria',
                    'Construcción',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta neumática'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/sk-900-2/hero.jpg',
                ],
                'hero_image' => 'products/sk-900-2/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 800',
                'slug' => 'sk-800',
                'title' => 'SK 800',
                'meta_description' => 'Conoce la llanta neumática SK 800 para minicargador.',
                'h1' => 'SK 800',
                'short_description' => 'Llanta neumática para minicargador de gran desempeño.',
                'description' => 'La SK 800 está pensada para brindar tracción y resistencia en aplicaciones exigentes.',
                'features' => [
                    'Buena tracción',
                    'Desempeño sólido',
                    'Resistencia en operación',
                ],
                'applications' => [
                    'Construcción',
                    'Aplicaciones industriales',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta neumática'],
                    ['label' => 'Aplicación', 'value' => 'Minicargador'],
                ],
                'gallery' => [
                    'products/sk-800/hero.jpg',
                ],
                'hero_image' => 'products/sk-800/hero.jpg',
                'brochure_url' => null,
                'sort_order' => 3,
                'status' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'product_category_id' => $product['category_id'],
                    'name' => $product['name'],
                    'title' => $product['title'],
                    'meta_description' => $product['meta_description'],
                    'h1' => $product['h1'],
                    'short_description' => $product['short_description'],
                    'description' => $product['description'],
                    'features' => $product['features'],
                    'applications' => $product['applications'],
                    'specifications' => $product['specifications'],
                    'gallery' => $product['gallery'],
                    'hero_image' => $product['hero_image'],
                    'brochure_url' => $product['brochure_url'],
                    'sort_order' => $product['sort_order'],
                    'status' => $product['status'],
                ]
            );
        }
    }
}