<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::updateOrCreate(
            ['slug' => 'llantas-solidas-para-minicargador'],
            [
                'name' => 'Llantas sólidas para minicargador',
                'title' => 'Llantas sólidas para minicargador',
                'meta_description' => 'Conoce nuestra línea de llantas sólidas para minicargador para trabajo pesado y alto desempeño.',
                'h1' => 'Llantas sólidas para Minicargadores',
                'intro' => 'Imponchables, libres de mantenimiento y de uso rudo.',
                'description' => 'Encuentra opciones de llantas sólidas diseñadas para resistencia, estabilidad y larga vida útil.',
                'hero_image' => 'categories/solid/hero.jpg',
                'status' => true,
            ]
        );

        ProductCategory::updateOrCreate(
            ['slug' => 'llantas-neumaticas-para-minicargador'],
            [
                'name' => 'Llantas neumáticas para minicargador',
                'title' => 'Llantas Neumáticas para Minicargador',
                'meta_description' => 'Llantas Neumáticas para minicargador 2026, cotiza aquí llantas macizas, neumáticos, cushion para Minicargadores. 3 veces más hule consumible, precios mayoristas',
                'h1' => 'Llantas neumáticas para Minicargadores',
                'intro' => 'Más versátiles, mejor amortiguamiento y desempeño en tierra.',
                'description' => 'Encuentra modelos de llantas neumáticas para minicargador en aplicaciones industriales y de construcción.',
                'hero_image' => 'categories/pneumatic/hero.jpg',
                'status' => true,
            ]
        );
    }
}