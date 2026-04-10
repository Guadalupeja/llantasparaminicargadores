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
                'title' => 'Llantas Sólidas para Minicargadores 2026| Trelleborg Brawler',
                'meta_description' => 'Cotiza en línea las llantas sólidas para Minicargadores Premium con 25% más vida Garantizado. Resistencia superior, Precios Mayorista y entrega inmediata Mx.',
                'h1' => 'Brawler HD Solidflex',
                'short_description' => 'Llanta sólida para minicargador de alto desempeño.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'Específicamente diseñadas para minicargadores en las aplicaciones más rigurosas que se encuentran en chatarreras, centros de reciclaje e industria siderúrgica, minería y basureros con presencia de múltiples elementos cortantes y/o terrenos accidentados.',
                'description' => 'La Brawler HD Solidflex ofrece resistencia, durabilidad y estabilidad para aplicaciones exigentes.',
                'features' => [
                    'Fabricadas en componentes de hule súper duraderos y resistente a cortes.',
                    'Banda de rodamiento más profunda y ancha mejora estabilidad, tracción y vida.',
                    '3 veces más resistente que una llanta neumática.',
                    'Sistema patentado de intercambiabilidad disco y llanta de fácil instalación; no requiere de prensa.',
                    'Disponible en perfiles Traction de huella amplia y Smooth liso.',
                    'Aptas para retroexcavadoras, zanjadoras y tractor compacto.',
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
                'brochure_url' => 'fichas/brawler-hd-solidflex.pdf',
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => '#contacto',
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/brawler-hd-solidflex.pdf',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'category_id' => $solid->id,
                'name' => 'Brawler HPS Solidflex Traction/Smooth',
                'slug' => 'brawler-hps-solidflex-traction-smooth',
                'title' => 'Llanta Sólida para Minicargador Premium 2026 | Trelleborg',
                'meta_description' => 'Llanta sólida para Minicargador Imponchables, libres de mantenimiento y de uso rudo. Hasta 3 veces más hule consumible GARANTIZADO, materiales Premium Europeas.',
                'h1' => 'Brawler HPS Solidflex Traction/Smooth',
                'short_description' => 'Llanta sólida para minicargador con excelente resistencia.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'Llanta Sólida de alto desempeño es HPS, diseñadas para trabajo rudo en chatarreras, centros de reciclaje, de acopio de basura y Minería en presencia de objetos punzo cortantes.',
                'description' => 'La Brawler HPS Solidflex Traction/Smooth está diseñada para aplicaciones exigentes y larga vida útil.',
                'features' => [
                    'Diseño único con orificios en cara lateral ofrecen una conducción mas cómoda al tiempo que amortiguan impactos y por ende aumentan durabilidad.',
                    'Hasta 3 veces mas hule consumible que cualquier llanta Neumática.',
                    'Compatible con el rin original.',
                    'Diseño y materiales PREMIUM a prueba de cortes, impactos, pinchaduras y grietas.',
                    'Disponible en perfiles Traction de huella profunda o bien Smooth completamente liso.',
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
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/brawler-hps-solidflex.pdf',
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'category_id' => $solid->id,
                'name' => 'SKS 900 Traction/Smooth',
                'slug' => 'sks-900-traction-smooth',
                'title' => 'Llantas Sólidas para Minicargadores | Trelleborg SKS 900',
                'meta_description' => 'Cotiza llantas sólidas para Minicargadores de entrega inmediata, el mejor precio 2025 y Garantía de vida extendida. Cotiza aquí llantas Trelleborg para Cargador',
                'h1' => 'SKS 900 Traction/Smooth',
                'short_description' => 'Llanta sólida para trabajo demandante.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'Llanta Sólida de alto desempeño es HPS, diseñadas para trabajo rudo en chatarreras, centros de reciclaje, de acopio de basura y Minería en presencia de objetos punzo cortantes.',
                'description' => 'La SKS 900 Traction/Smooth ofrece resistencia y desempeño para minicargadores.',
                'features' => [
                    'Diseño único con orificios en cara lateral ofrecen una conducción mas cómoda al tiempo que amortiguan impactos y por ende aumentan durabilidad.',
                    'Hasta 3 veces mas hule consumible que cualquier llanta Neumática.',
                    'Compatible con el rin original.',
                    'Diseño y materiales PREMIUM a prueba de cortes, impactos, pinchaduras y grietas.',
                    'Disponible en perfiles Traction de huella profunda o bien Smooth completamente liso.',
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
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => null,
                'cta_secondary_url' => null,
                'sort_order' => 3,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 900',
                'slug' => 'sk-900',
                'title' => 'Llantas Neumáticas para Minicargador | Trelleborg SK 900',
                'meta_description' => 'Cotiza llantas neumáticas para Minicargador entrega inmediata, el mejor precio 2026 y Garantía de vida extendida. Cotiza aquí llantas Trelleborg para Cargador',
                'h1' => 'SK 900',
                'short_description' => 'Llanta neumática para minicargador.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'Una llanta PREMIUM para trabajo pesado con una banda más amplia y de mayor durabilidad que cualquiera de su segmento.',
                'description' => 'La SK 900 brinda desempeño y tracción para diversas condiciones de operación.',
                'features' => [
                    'Diseño de llanta reforzado con protector lateral contra impactos.',
                    'Materiales compuestos a prueba de cortes y desgajamientos.',
                    'Disponible en perfil Traction de huella profunda para terracería y suelos accidentados o bien en un perfil smooth, liso de mayor contacto y estabilidad.',
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
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/sk-900.pdf',
                'sort_order' => 1,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 900 no direccional',
                'slug' => 'sk-900-2',
                'title' => 'Llantas Neumáticas para Minicargadores | SK 900 ND',
                'meta_description' => 'Cotiza aquí Neumáticos Premium Europeos para Minicargadores todo terreno. 25% mas vida Garantizado por escrito, Precios Matorista, Crédito y entrega inmediata.',
                'h1' => 'SK 900 no direccional',
                'short_description' => 'Llanta neumática no direccional para minicargador.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'De perfil asimétrico con banda de rodamiento superior a cualquier llanta del segmento, diseñada para cargador compacto de uso rudo.',
                'description' => 'La SK 900 no direccional ofrece estabilidad y desempeño en operación continua.',
                'features' => [
                    'Hombros reforzados contra golpes.',
                    'Diseño de banda brinda igual tracción hacia delante y de reversa.',
                    'Gran resistencia al desgaste.',
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
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/sk-900.pdf',
                'sort_order' => 2,
                'status' => true,
            ],
            [
                'category_id' => $pneumatic->id,
                'name' => 'SK 800 Trelleborg',
                'slug' => 'sk-800',
                'title' => 'Llantas Neumáticas para Cargadores | Trelleborg SK 800',
                'meta_description' => 'Cotiza las mejores llantas Neumáticas para Cargadores, Palas y Minicargadores con 25% más vida GARANTIZADO. Calidad y Precios Mayorista y con Entrega inmediata.',
                'h1' => 'SK 800',
                'short_description' => 'Llanta neumática para minicargador de gran desempeño.',
                'highlight_text' => '25% más vida llanta contra llanta, GARANTIZADO por escrito.',
                'body_intro' => 'Una llanta neumática para cargadores de segmento Medio pero fabricada con materiales Premium para garantizar su durabilidad superior. Para uso general en la construcción.',
                'description' => 'La SK 800 está pensada para brindar tracción y resistencia en aplicaciones exigentes.',
                'features' => [
                    'Banda de rodamiento mas amplia da mejor tracción en todo tipo de superficies.',
                    'Diseño agresivo a prueba de piedras, golpes y desgajamientos.',
                    'Gran refuerzo lateral contra golpes de costado.',
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
                'cta_primary_text' => 'Solicitar presupuesto ahora',
                'cta_primary_url' => url('#contacto'),
                'cta_secondary_text' => 'Descargar Ficha',
                'cta_secondary_url' => 'fichas/sk-800.pdf',
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