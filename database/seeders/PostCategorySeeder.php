<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Guías de compra',
            'Comparativas',
            'Medidas y equivalencias',
            'Bobcat',
            'Mantenimiento y operación',
        ];

        foreach ($categories as $name) {
            PostCategory::firstOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'status' => true,
                ]
            );
        }
    }
}