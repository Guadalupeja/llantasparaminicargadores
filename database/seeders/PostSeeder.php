<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'category' => 'Comparativas',
                'title' => 'Llantas sólidas vs neumáticas para minicargador: cuál conviene según tu operación',
                'excerpt' => 'Conoce las diferencias entre llantas sólidas y neumáticas para minicargador, y descubre cuál conviene según el piso, la carga y el tipo de trabajo.',
                'content' => '
                    <h2>¿Cuál es la diferencia entre una llanta sólida y una neumática?</h2>
                    <p>La llanta sólida está diseñada para resistir trabajo rudo, cortes y ponchaduras. La neumática ofrece más amortiguamiento y comodidad en aplicaciones mixtas.</p>

                    <h2>¿Cuándo conviene una llanta sólida?</h2>
                    <p>Cuando tu operación trabaja en residuos, reciclaje, construcción pesada o cualquier entorno donde una ponchadura genera tiempo muerto costoso.</p>

                    <h2>¿Cuándo conviene una llanta neumática?</h2>
                    <p>Cuando necesitas mejor absorción de impactos, una opción más versátil y buen desempeño en superficies variables.</p>

                    <h2>Conclusión</h2>
                    <p>La mejor opción depende del nivel de exigencia, el piso y el costo operativo que representa detener el equipo.</p>
                ',
            ],
            [
                'category' => 'Medidas y equivalencias',
                'title' => 'Qué significa la medida 10-16.5 y su equivalencia 31x10-20/7.5',
                'excerpt' => 'Te explicamos qué significa la medida 10-16.5 en llantas para minicargador y cómo se relaciona con su equivalencia 31x10-20/7.5.',
                'content' => '
                    <h2>¿Qué significa 10-16.5?</h2>
                    <p>La medida 10-16.5 es una medida común en minicargadores compactos y se usa en múltiples aplicaciones industriales y de construcción.</p>

                    <h2>¿Cuál es su equivalencia?</h2>
                    <p>Comercialmente suele relacionarse con 31x10-20/7.5, lo que facilita la búsqueda técnica y comercial de la llanta correcta.</p>

                    <h2>¿En qué equipos se usa?</h2>
                    <p>Es frecuente en minicargadores compactos Bobcat y otros equipos de operación ligera a media.</p>
                ',
            ],
            [
                'category' => 'Medidas y equivalencias',
                'title' => 'Qué significa la medida 12-16.5 y su equivalencia 33x12-20/7.5',
                'excerpt' => 'Aprende qué representa la medida 12-16.5 y por qué también se identifica como 33x12-20/7.5 en llantas para minicargador.',
                'content' => '
                    <h2>¿Qué representa la medida 12-16.5?</h2>
                    <p>La medida 12-16.5 es una de las más utilizadas en minicargadores que trabajan con cargas mayores y en aplicaciones exigentes.</p>

                    <h2>Equivalencia comercial</h2>
                    <p>También se reconoce como 33x12-20/7.5, una equivalencia útil para cotizar, comparar fichas técnicas y validar compatibilidad.</p>

                    <h2>¿Dónde conviene?</h2>
                    <p>Es ideal en trabajo pesado, patios de maniobra, residuos, reciclaje y construcción.</p>
                ',
            ],
            [
                'category' => 'Bobcat',
                'title' => 'Cómo elegir llantas para minicargador Bobcat según la medida y la aplicación',
                'excerpt' => 'Descubre cómo elegir las llantas correctas para equipos Bobcat según la medida, el piso y el nivel de exigencia de la operación.',
                'content' => '
                    <h2>La medida correcta es el punto de partida</h2>
                    <p>Para elegir bien, primero debes validar si tu equipo usa 10-16.5 o 12-16.5, además de revisar el uso real del minicargador.</p>

                    <h2>Tipo de aplicación</h2>
                    <p>No es lo mismo operar en concreto, asfalto, terracería o residuos. El entorno define si conviene una llanta sólida o neumática.</p>

                    <h2>Modelos y configuraciones</h2>
                    <p>En Bobcat es común evaluar opciones como Brawler HPS, SKS900 o neumáticas según turnos y superficie.</p>
                ',
            ],
            [
                'category' => 'Guías de compra',
                'title' => 'Cuándo conviene comprar llanta para minicargador con rin incluido',
                'excerpt' => 'Conoce cuándo te conviene pedir una llanta con rin incluido, qué ventajas ofrece y en qué casos mejora la operación.',
                'content' => '
                    <h2>Ventajas de una llanta con rin incluido</h2>
                    <p>Reduce tiempos de instalación, evita errores de compatibilidad y puede mejorar el costo total frente a comprar por separado.</p>

                    <h2>¿En qué casos conviene más?</h2>
                    <p>Conviene cuando necesitas una solución rápida, ensamble listo para instalar o cuando tu operación no puede detenerse por montaje.</p>

                    <h2>Qué revisar antes de comprar</h2>
                    <p>Patrón de birlo, diámetro de masa, tipo de trabajo y compatibilidad con el equipo.</p>
                ',
            ],
        ];

        foreach ($posts as $item) {
            $category = PostCategory::where('name', $item['category'])->first();

            if (!$category) {
                continue;
            }

            Post::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'post_category_id' => $category->id,
                    'title' => $item['title'],
                    'excerpt' => $item['excerpt'],
                    'content' => $item['content'],
                    'author_name' => 'Ruguex',
                    'reading_time' => max(1, (int) ceil(str_word_count(strip_tags($item['content'])) / 180)),
                    'seo_title' => Str::limit($item['title'], 60, ''),
                    'seo_description' => Str::limit($item['excerpt'], 160, ''),
                    'robots' => 'index,follow',
                    'status' => 'published',
                    'is_featured' => false,
                    'published_at' => now(),
                ]
            );
        }
    }
}