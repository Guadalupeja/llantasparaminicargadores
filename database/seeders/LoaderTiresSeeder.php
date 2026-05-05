<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class LoaderTiresSeeder extends Seeder
{
    public function run(): void
    {
        $category = ProductCategory::updateOrCreate(
            ['slug' => 'llantas-para-cargadores'],
            [
                'name' => 'Llantas para cargadores',
                'title' => 'Llantas para cargadores y maquinaria de construcción',
                'meta_description' => 'Llantas sólidas y neumáticas para cargadores, cargadores frontales, excavadoras, retroexcavadoras, palas y maquinaria de construcción.',
                'h1' => 'Llantas para cargadores y maquinaria de construcción',
                'intro' => 'Soluciones en llantas sólidas y neumáticas para cargadores frontales, maquinaria pesada y aplicaciones de construcción.',
                'description' => 'Encuentra llantas para cargadores de uso rudo, con opciones sólidas y neumáticas OTR para aplicaciones exigentes.',
                'hero_image' => 'categories/cargadores/hero.jpg',
                'status' => true,
            ]
        );

        $products = [
            [
                'name' => 'Trelleborg BRAWLER® HD',
                'slug' => 'brawler-hd',
                'title' => 'Trelleborg BRAWLER® HD',
                'meta_description' => 'Conoce la llanta sólida Trelleborg BRAWLER HD para cargadores frontales, reciclaje, chatarreras, fundiciones, canteras y minería abierta.',
                'h1' => 'Trelleborg BRAWLER® HD',
                'short_description' => 'Llanta sólida premium para cargadores frontales y aplicaciones extremas.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'La Trelleborg BRAWLER® HD es una llanta sólida premium diseñada para aplicaciones extremas en cargadores frontales y maquinaria de construcción.',
                'description' => 'Llanta sólida premium para aplicaciones extremas como cargadores frontales en centros de reciclaje, chatarreras, basureros, fundiciones, canteras y minería abierta. Su diseño ayuda a reducir tiempos muertos por ponchaduras y mejora la vida útil en trabajo severo.',
                'features' => [
                    'Llanta sólida premium para uso rudo',
                    'No se poncha y reduce tiempos muertos',
                    'Disponible con aperturas elípticas Solidflex para mejorar la absorción de impacto',
                    'Conducción comparable a una llanta neumática rellena',
                    'Fuerza y flexibilidad para soportar sobrecargas, torque excesivo y esfuerzos de corte',
                    'Disponible con huella profunda de hasta 7 pulgadas',
                    'Sistema de aro y disco que permite cambiar configuración según el equipo',
                ],
                'applications' => [
                    'Cargadores frontales',
                    'Centros de reciclaje',
                    'Chatarreras',
                    'Basureros',
                    'Fundiciones',
                    'Canteras',
                    'Minería abierta',
                    'Maquinaria de construcción',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta sólida'],
                    ['label' => 'Aplicación', 'value' => 'Cargador frontal'],
                    ['label' => 'Uso', 'value' => 'Trabajo severo'],
                    ['label' => 'Familia', 'value' => 'BRAWLER HD'],
                    ['label' => 'Marca', 'value' => 'Trelleborg'],
                ],
                'gallery' => [
                    'products/cargadores/brawler-hd.jpg',
                ],
                'hero_image' => 'products/cargadores/brawler-hd.jpg',
                'brochure_url' => null,
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('/contacto'),
                'cta_secondary_text' => null,
                'cta_secondary_url' => null,
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'name' => 'Neumático C800 L2 OTR',
                'slug' => 'neumatico-c800-l2-otr',
                'title' => 'Neumático C800 L2 OTR',
                'meta_description' => 'Conoce el neumático C800 L2 OTR para cargadores frontales, motoniveladoras y manipuladores telescópicos de uso rudo.',
                'h1' => 'Neumático C800 L2 OTR',
                'short_description' => 'Neumático premium OTR de nylon súper reforzado para cargadores y maquinaria de construcción.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'El Neumático C800 L2 OTR está diseñado para cargadores, motoniveladoras y manipuladores telescópicos que trabajan en condiciones exigentes.',
                'description' => 'Neumático premium de diseño duradero, fabricado con nylon súper reforzado para motoniveladoras, cargadores y manipuladores telescópicos de uso rudo. Su diseño está orientado a brindar resistencia, tracción y desempeño en aplicaciones OTR.',
                'features' => [
                    'Neumático premium para uso rudo',
                    'Construcción de nylon súper reforzado',
                    'Huella amplia con tacos profundos',
                    'Diseñado para cargadores, motoniveladoras y manipuladores telescópicos',
                    'Buen desempeño en aplicaciones OTR',
                    'Adecuado para maquinaria de construcción',
                ],
                'applications' => [
                    'Cargadores frontales',
                    'Motoniveladoras',
                    'Manipuladores telescópicos',
                    'Maquinaria de construcción',
                    'Aplicaciones OTR',
                    'Trabajo en superficies exigentes',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta neumática'],
                    ['label' => 'Diseño', 'value' => 'C800 L2 OTR'],
                    ['label' => 'Construcción', 'value' => 'Nylon súper reforzado'],
                    ['label' => 'Aplicación', 'value' => 'Cargador frontal / maquinaria de construcción'],
                    ['label' => 'Uso', 'value' => 'Trabajo rudo'],
                ],
                'gallery' => [
                    'products/cargadores/neumatico-c800-l2-otr.jpg',
                ],
                'hero_image' => 'products/cargadores/neumatico-c800-l2-otr.jpg',
                'brochure_url' => null,
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('/contacto'),
                'cta_secondary_text' => null,
                'cta_secondary_url' => null,
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'name' => 'Neumático C-800 E3/L3 (OTR)',
                'slug' => 'neumatico-c800-e3-l3-otr',
                'title' => 'Neumático C-800 E3/L3 (OTR)',
                'meta_description' => 'Conoce el neumático C-800 E3/L3 OTR para cargador frontal y maquinaria de construcción.',
                'h1' => 'Neumático C-800 E3/L3 (OTR)',
                'short_description' => 'Neumático OTR para cargador frontal y maquinaria de construcción.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'El Neumático C-800 E3/L3 OTR está diseñado para cargadores frontales y aplicaciones de maquinaria de construcción.',
                'description' => 'Neumático para cargador frontal diseñado para aplicaciones OTR. Es una opción para operaciones que requieren desempeño en maquinaria de construcción, superficies exigentes y trabajo continuo.',
                'features' => [
                    'Neumático OTR para cargador frontal',
                    'Diseño E3/L3 para aplicaciones de movimiento de tierra',
                    'Buena opción para maquinaria de construcción',
                    'Pensado para operación en superficies demandantes',
                    'Diseñado para trabajo continuo en aplicaciones industriales y de construcción',
                ],
                'applications' => [
                    'Cargadores frontales',
                    'Maquinaria de construcción',
                    'Movimiento de tierra',
                    'Aplicaciones OTR',
                    'Obra pesada',
                    'Patios de maniobra',
                ],
                'specifications' => [
                    ['label' => 'Tipo', 'value' => 'Llanta neumática'],
                    ['label' => 'Diseño', 'value' => 'C-800 E3/L3 OTR'],
                    ['label' => 'Aplicación', 'value' => 'Cargador frontal'],
                    ['label' => 'Uso', 'value' => 'Maquinaria de construcción'],
                    ['label' => 'Categoría', 'value' => 'OTR'],
                ],
                'gallery' => [
                    'products/cargadores/neumatico-c800-e3-l3-otr.jpg',
                ],
                'hero_image' => 'products/cargadores/neumatico-c800-e3-l3-otr.jpg',
                'brochure_url' => null,
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('/contacto'),
                'cta_secondary_text' => null,
                'cta_secondary_url' => null,
                'sort_order' => 3,
                'status' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'product_category_id' => $category->id,
                    'name' => $product['name'],
                    'title' => $product['title'],
                    'meta_description' => $product['meta_description'],
                    'h1' => $product['h1'],
                    'short_description' => $product['short_description'],
                    'highlight_text' => $product['highlight_text'],
                    'body_intro' => $product['body_intro'],
                    'description' => $product['description'],
                    'features' => $product['features'],
                    'applications' => $product['applications'],
                    'specifications' => $product['specifications'],
                    'gallery' => $product['gallery'],
                    'hero_image' => $product['hero_image'],
                    'brochure_url' => $product['brochure_url'],
                    'cta_primary_text' => $product['cta_primary_text'],
                    'cta_primary_url' => $product['cta_primary_url'],
                    'cta_secondary_text' => $product['cta_secondary_text'],
                    'cta_secondary_url' => $product['cta_secondary_url'],
                    'sort_order' => $product['sort_order'],
                    'status' => $product['status'],
                ]
            );
        }
    }
}