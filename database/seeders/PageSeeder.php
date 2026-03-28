<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'name' => 'Quiénes somos',
                'slug' => 'somos',
                'title' => 'Quiénes somos',
                'meta_description' => 'Conoce más sobre nuestra empresa y experiencia en llantas para minicargadores.',
                'h1' => 'Quiénes somos',
                'intro' => 'Conoce nuestra experiencia y compromiso con nuestros clientes.',
                'content' => null,
                'status' => true,
            ],
            [
                'name' => 'Contacto',
                'slug' => 'contacto',
                'title' => 'Contacto',
                'meta_description' => 'Ponte en contacto con nosotros para cotizar llantas para minicargadores.',
                'h1' => 'Contacto',
                'intro' => 'Estamos listos para ayudarte a encontrar la mejor opción.',
                'content' => null,
                'status' => true,
            ],
            [
                'name' => 'Gracias',
                'slug' => 'gracias',
                'title' => 'Gracias',
                'meta_description' => 'Gracias por contactarnos. Hemos recibido tu información.',
                'h1' => 'Gracias',
                'intro' => 'Gracias por ponerte en contacto con nosotros.',
                'content' => null,
                'status' => true,
            ],
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(
                ['slug' => $page['slug']],
                $page
            );
        }
    }
}