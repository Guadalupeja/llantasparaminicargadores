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
                'h1' => 'Llantas sólidas para minicargador',
                'intro' => 'Soluciones de llantas sólidas para minicargadores en aplicaciones exigentes.',
                'description' => 'Encuentra opciones de llantas sólidas diseñadas para resistencia, estabilidad y larga vida útil.',
                'hero_image' => 'categories/solid/hero.jpg',
                'status' => true,
            ]
        );

        ProductCategory::updateOrCreate(
            ['slug' => 'llantas-neumaticas-para-minicargador'],
            [
                'name' => 'Llantas neumáticas para minicargador',
                'title' => 'Llantas neumáticas para minicargador',
                'meta_description' => 'Conoce nuestra línea de llantas neumáticas para minicargador para distintas superficies y aplicaciones.',
                'h1' => 'Llantas neumáticas para minicargador',
                'intro' => 'Opciones de llantas neumáticas para minicargadores con gran desempeño y tracción.',
                'description' => 'Encuentra modelos de llantas neumáticas para minicargador en aplicaciones industriales y de construcción.',
                'hero_image' => 'categories/pneumatic/hero.jpg',
                'status' => true,
            ]
        );
    }
}