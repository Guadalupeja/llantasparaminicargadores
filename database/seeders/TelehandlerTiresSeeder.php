<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class TelehandlerTiresSeeder extends Seeder
{
    public function run(): void
    {
        $category = ProductCategory::updateOrCreate(
            ['slug' => 'llantas-para-manipulador-telescopico'],
            [
                'name' => 'Llantas para Manipulador Telescópico',
                'title' => 'Llantas para Manipulador Telescópico',
                'meta_description' => 'Llantas sólidas y radiales para manipuladores telescópicos, telehandlers y cargadores de uso rudo.',
                'h1' => 'Llantas para Manipulador Telescópico',
                'intro' => 'Llantas para manipuladores telescópicos, telehandlers y cargadores, disponibles en versiones sólidas y radiales para aplicaciones exigentes.',
                'description' => 'Soluciones en llantas para manipuladores telescópicos y cargadores, diseñadas para trabajo pesado, estabilidad, resistencia y larga vida útil.',
                'hero_image' => 'categories/manipulador-telescopico/hero.jpg',
                'status' => true,
            ]
        );

        $products = [
            [
                'name' => 'TRELLEBORG BRAWLER® HPS',
                'slug' => 'trelleborg-brawler-hps',
                'title' => 'TRELLEBORG BRAWLER® HPS',
                'meta_description' => 'Llanta sólida premium Trelleborg Brawler HPS para manipuladores telescópicos, telehandlers y cargadores.',
                'h1' => 'TRELLEBORG BRAWLER® HPS',
                'short_description' => 'Llanta sólida premium de alto rendimiento para manipulador telescópico.',
                'highlight_text' => 'Llanta sólida premium para telehandlers, manipuladores telescópicos y cargadores.',
                'body_intro' => 'Llanta sólida PREMIUM de alto rendimiento para cargador telescópico en cualquier aplicación, incluso en condiciones extremas.',
                'description' => 'Llanta sólida de alto rendimiento para manipuladores telescópicos y cargadores. Su construcción sólida ayuda a reducir tiempos muertos por ponchaduras y ofrece estabilidad en operaciones de uso rudo.',
                'features' => [
                    'Perfil ancho y plano con la mejor estabilidad y contrabalance que existe.',
                    'Orificios elípticos en la cara -Solidflex- maximizan la comodidad en el manejo.',
                    'Huella de tracción super profunda.',
                    '4 veces mas caucho que una llanta neumática.',
                    'Disponible en perfiles R4 para mayor tracción en arena, lodo y piedras.',
                    'Llanta apta para su uso en Niveladores, y Cargadores.',
                ],
                'applications' => [
                    'Manipuladores telescópicos',
                    'Telehandlers',
                    'Cargadores',
                    'Maquinaria de construcción',
                    'Aplicaciones industriales',
                    'Trabajo pesado',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta sólida'],
                    ['label' => 'Marca', 'value' => 'Trelleborg'],
                    ['label' => 'Modelo', 'value' => 'BRAWLER HPS'],
                    ['label' => 'Aplicación', 'value' => 'Manipulador telescópico / telehandler / cargador'],
                    ['label' => 'Uso', 'value' => 'Trabajo pesado'],
                ],
                'gallery' => [
                    'products/manipulador-telescopico/trelleborg-brawler-hps.jpg',
                ],
                'hero_image' => 'products/manipulador-telescopico/trelleborg-brawler-hps.jpg',
                'brochure_url' => null,
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/brawler.pdf',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'name' => 'TH400',
                'slug' => 'th400',
                'title' => 'TH400',
                'meta_description' => 'Llanta radial TH400 para manipuladores telescópicos, telehandlers y cargadores de uso rudo con cargas pesadas.',
                'h1' => 'TH400',
                'short_description' => 'Llanta radial OTR para manipuladores telescópicos y cargadores todo terreno.',
                'highlight_text' => 'Llanta radial para manipuladores y cargadores de uso rudo con cargas pesadas.',
                'body_intro' => 'Llanta radial para manipuladores y cargadores de uso rudo con cargas pesadas; es un neumático Super PREMIUM.',
                'description' => 'Llanta radial OTR para manipuladores telescópicos y cargadores todo terreno. Está orientada a trabajo pesado, estabilidad, resistencia y operación en superficies exigentes.',
                'features' => [
                    'Hombros y costados reforzados reducen la deformación en un 20% mejorando la estabilidad y desempeño con brazo extendido o cargas pesadas.',
                    'Huella mas amplia que cualquier competidor, con tacos profundos de mejor tracción.',
                    'Bordes de tacos redondeados y reforzados contra cortes.',
                    'Nervadura al centro y banda de rodaje de diseño patentado mas resistente a la abrasión, el desgaste y más comoda.',
                    'Notable ahorro de combustible.',
                    'Diseño de banda de autolimpieza mejorado.',
                ],
                'applications' => [
                    'Manipuladores telescópicos',
                    'Telehandlers',
                    'Cargadores',
                    'Maquinaria todo terreno',
                    'Construcción',
                    'Uso rudo con cargas pesadas',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta radial'],
                    ['label' => 'Modelo', 'value' => 'TH400'],
                    ['label' => 'Aplicación', 'value' => 'Manipulador telescópico / telehandler / cargador'],
                    ['label' => 'Uso', 'value' => 'Uso rudo / cargas pesadas'],
                    ['label' => 'Medidas disponibles', 'value' => '11LR16 122A8, 340/80R18 143A8, 400/70R18 147A8, 400/70R24 152A8, 440/80R24 161A8, 480/80R26 160A8, 440/80R28 156A8'],
                ],
                'gallery' => [
                    'products/manipulador-telescopico/th400.jpg',
                ],
                'hero_image' => 'products/manipulador-telescopico/th400.jpg',
                'brochure_url' => null,
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/Trelleborg-TH400-TH500-ES.pdf',
                'sort_order' => 2,
                'status' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'product_category_id' => $category->id,
                    ...$product,
                ]
            );
        }
    }
}