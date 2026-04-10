<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
public function home(): View
{
    $seo = [
        'title' => 'Llantas para minicargadores | Trelleborg distribuidores 2026',
        'description' => 'Cotiza mejores llantas para minicargadores y cargadores 2026 Trelleborg sólidas, neumáticas, envío gratuito todo México, entrega inmediata, precios mayoristas',
        'canonical' => url('/'),
        'image' => asset('img/home/bobcat-logo.png'),
        'robots' => 'follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large',
    ];

    return view('pages.home', compact('seo'));
}

    public function about(): View
    {
        $page = Page::where('slug', 'somos')->where('status', true)->firstOrFail();

        $seo = [
            'title' => $page->title,
            'description' => $page->meta_description,
            'canonical' => url('/somos'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
        ];

        return view('pages.somos', compact('page', 'seo'));
    }

    public function contact(): View
    {
        $page = Page::where('slug', 'contacto')->where('status', true)->firstOrFail();

    $seo = [
        'title' => 'Contacto | Llantas para minicargadores Ruguex',
        'description' => 'Solicita cotización y asesoría para llantas sólidas y neumáticas para minicargador. Atención en Puebla y envíos a todo México.',
        'canonical' => url('/contacto'),
        'image' => asset('img/home/bobcat-logo.png'),
        'robots' => 'index,follow',
    ];

        return view('pages.contacto', compact('page', 'seo'));
    }

    public function thanks(): View
    {
        $page = Page::where('slug', 'gracias')->where('status', true)->firstOrFail();

        $seo = [
            'title' => $page->title,
            'description' => $page->meta_description,
            'canonical' => url('/gracias'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'noindex,follow',
        ];

        return view('pages.gracias', compact('page', 'seo'));
    }


public function landing12165()
{
    $seo = [
        'title' => 'Llantas para minicargador 12-16.5 | 33x12-20/7.5 | Ruguex',
        'description' => 'Llantas para minicargador 12-16.5 equivalentes a 33x12-20/7.5. Opciones Premium sólidas y neumáticas para trabajo rudo, asesoría técnica y compra en línea.',
        'canonical' => url('/llanta-12-16-5'),
        'robots' => 'index,follow',
        'image' => asset('storage/landings/12-16-5/hero-12-16-5.png'),
    ];

    $landing = [
        'badge' => 'Medida 12-16.5 | Equivalente a 33x12-20/7.5',
        'title' => 'Llantas para minicargador 12-16.5 para trabajo rudo y operación continua',
        'description' => 'La medida 12-16.5, equivalente a 33x12-20/7.5, es una de las más utilizadas en minicargadores que trabajan con cargas pesadas, superficies demandantes y jornadas continuas. En Ruguex te ayudamos a elegir entre llantas sólidas y neumáticas según el tipo de operación, el piso, el riesgo de ponchadura y el nivel de exigencia de tu equipo.',
        'hero_image' => 'storage/landings/12-16-5/hero-12-16-5.png',
        'intro_title' => '¿Qué llanta 12-16.5 necesita tu minicargador?',
        'intro_text_1' => 'La medida 12-16.5 / 33x12-20/7.5 se utiliza en operaciones donde se requiere resistencia, estabilidad y desempeño en condiciones de trabajo pesado. Elegir correctamente la llanta impacta directamente en la continuidad operativa, el desgaste, la seguridad y el costo total de uso.',
        'intro_text_2' => 'Si tu operación trabaja en reciclaje, residuos, construcción, patios de maniobra o superficies agresivas, te conviene evaluar si necesitas una llanta sólida imponchable o una llanta neumática con mejor amortiguamiento y versatilidad.',
        'intro_image' => 'storage/landings/12-16-5/intro-12-16-5.jpg',
        'uses_title' => 'Aplicaciones comunes de la medida 12-16.5 / 33x12-20/7.5',
        'uses_text' => 'Esta medida es ideal para minicargadores que trabajan en operaciones demandantes y necesitan estabilidad, tracción y una llanta confiable según el entorno.',
        'uses_image' => 'storage/landings/12-16-5/usos-12-16-5.jpg',
        'distributor_title' => 'Distribuidor autorizado con atención especializada',
        'distributor_text_1' => 'Te ayudamos a seleccionar llantas para minicargadores y cargadores según la exigencia real de la operación. Si necesitas una opción sólida para máxima resistencia o una neumática para mayor versatilidad, podemos orientarte antes de comprar.',
        'distributor_text_2' => 'Atendemos proyectos para trabajo rudo, construcción, reciclaje y operación continua, con enfoque en durabilidad, desempeño y soporte comercial.',
        'distributor_image' => 'storage/landings/12-16-5/distribuidor-12-16-5.png',
        'shop_url' => 'https://llantasdemontacargas.com/tienda-en-linea/?swoof=1&pa_medidas=12-16-5&paged=1',
        'solid_title' => 'Llantas sólidas 12-16.5',
        'solid_text' => 'Las llantas sólidas para minicargador están diseñadas para aplicaciones severas. Son imponchables, libres de mantenimiento y recomendadas para ambientes de trabajo rudo donde los tiempos muertos cuestan.',
        'solid_items' => [
            'Imponchables',
            'Menor tiempo muerto por ponchaduras',
            'Excelente desempeño en patios industriales, reciclaje y chatarreras',
            'Alta resistencia al desgaste',
            'Mayor continuidad operativa',
            'Opción ideal para trabajo pesado y uso continuo',
        ],
        'pneumatic_title' => 'Llantas neumáticas 12-16.5',
        'pneumatic_text' => 'Las llantas neumáticas para minicargador ofrecen mejor amortiguamiento y mayor versatilidad en aplicaciones mixtas o en superficies variables, especialmente cuando el terreno exige confort operativo y buena respuesta.',
        'pneumatic_items' => [
            'Mejor absorción de impactos',
            'Buen desempeño en tierra y superficies irregulares',
            'Mayor confort operativo',
            'Buena tracción en uso general',
            'Alternativa funcional para construcción y operación mixta',
            'Excelente opción cuando se requiere versatilidad',
        ],
        'uses_items' => [
            'Construcción',
            'Reciclaje',
            'Manejo de residuos',
            'Industria pesada',
            'Patios de maniobra',
            'Centros de acopio',
            'Operaciones con uso continuo',
        ],
        'faq' => [
            [
                'q' => '¿La medida 12-16.5 es equivalente a 33x12-20/7.5?',
                'a' => 'Sí. Esta landing está enfocada en esa equivalencia para facilitar la búsqueda comercial y técnica de la medida correcta.',
            ],
            [
                'q' => '¿Qué me conviene más, llanta sólida o neumática?',
                'a' => 'Depende de tu operación. Si tu entorno tiene alto riesgo de ponchaduras o materiales agresivos, normalmente conviene una sólida. Si buscas mejor amortiguamiento y mayor versatilidad, puede convenirte una neumática.',
            ],
            [
                'q' => '¿Esta medida sirve para trabajo pesado?',
                'a' => 'Sí. Es una medida muy utilizada en aplicaciones de trabajo demandante donde se requiere estabilidad, resistencia y continuidad operativa.',
            ],
            [
                'q' => '¿Puedo cotizar antes de comprar?',
                'a' => 'Sí. Podemos ayudarte a validar la opción más conveniente antes de generar tu compra.',
            ],
        ],
        'cta_title' => 'Solicita tu cotización hoy',
        'cta_text' => 'Si buscas una llanta 12-16.5 o su equivalente 33x12-20/7.5 para minicargador, te ayudamos a elegir la mejor opción según tu aplicación.',
        'hubspot_target' => 'hubspot-form-12-16-5',
    ];

    return view('pages.landing-medida', compact('seo', 'landing'));
}

public function landing10165()
{
    $seo = [
        'title' => 'Llantas para minicargador 10-16.5 | 31x10-20/7.5 | Ruguex',
        'description' => 'Llantas para minicargador 10-16.5 equivalentes a 31x10-20/7.5. Opciones sólidas y neumáticas para trabajo demandante, asesoría técnica y compra en línea.',
        'canonical' => url('/llanta-10-16-5'),
        'robots' => 'index,follow',
        'image' => asset('storage/landings/10-16-5/hero-10-16-5.png'),
    ];

    $landing = [
        'badge' => 'Medida 10-16.5 | Equivalente a 31x10-20/7.5',
        'title' => 'Llantas para minicargador 10-16.5 con resistencia, tracción y alto desempeño',
        'description' => 'La medida 10-16.5, equivalente a 31x10-20/7.5, es una opción muy utilizada en minicargadores compactos que requieren tracción, resistencia y buen desempeño en operación continua. En Ruguex te ayudamos a elegir la llanta ideal según la aplicación, el tipo de piso y el nivel de exigencia de tu trabajo.',
        'hero_image' => 'storage/landings/10-16-5/hero-10-16-5.png',
        'intro_title' => '¿Qué ventajas tiene la medida 10-16.5?',
        'intro_text_1' => 'La medida 10-16.5 / 31x10-20/7.5 es ideal para minicargadores compactos que trabajan en construcción, patios de servicio, superficies mixtas y aplicaciones donde se requiere equilibrio entre tracción, estabilidad y resistencia.',
        'intro_text_2' => 'La elección entre una llanta sólida o una neumática depende del entorno real de uso. Si tu prioridad es evitar ponchaduras y reducir mantenimiento, la sólida suele ser la mejor alternativa. Si necesitas mejor amortiguamiento y una respuesta más versátil, conviene evaluar una neumática.',
        'intro_image' => 'storage/landings/10-16-5/intro-10-16-5.jpg',
        'uses_title' => 'Usos frecuentes de la medida 10-16.5 / 31x10-20/7.5',
        'uses_text' => 'Esta medida se usa en minicargadores compactos para aplicaciones donde se requiere un buen equilibrio entre tracción, resistencia y maniobrabilidad.',
        'uses_image' => 'storage/landings/10-16-5/usos-10-16-5.jpg',
        'distributor_title' => 'Llantas para operación demandante con atención especializada',
        'distributor_text_1' => 'La medida 10-16.5 / 31x10-20/7.5 es una excelente opción para minicargadores compactos que operan en construcción, patios, industria y servicios generales. Te ayudamos a seleccionar la mejor configuración para tu necesidad real.',
        'distributor_text_2' => 'Si buscas evitar ponchaduras, reducir tiempos muertos y mantener la operación activa, una llanta sólida puede ser la mejor inversión. Si buscas confort y versatilidad, una neumática puede ser la opción adecuada.',
        'distributor_image' => 'storage/landings/10-16-5/distribuidor-10-16-5.png',
        'shop_url' => 'https://llantasdemontacargas.com/tienda-en-linea/?swoof=1&pa_medidas=10-16-5&paged=1',
        'solid_title' => 'Llantas sólidas 10-16.5',
        'solid_text' => 'Las llantas sólidas son recomendables cuando la prioridad es evitar ponchaduras y reducir el mantenimiento. Son especialmente útiles en aplicaciones severas o en ambientes con residuos y materiales agresivos.',
        'solid_items' => [
            'Imponchables',
            'Alta resistencia a cortes',
            'Menos paros por mantenimiento',
            'Excelente opción para trabajo rudo',
            'Mayor continuidad operativa',
            'Mayor confiabilidad en operaciones severas',
        ],
        'pneumatic_title' => 'Llantas neumáticas 10-16.5',
        'pneumatic_text' => 'Las llantas neumáticas en esta medida ofrecen una alternativa versátil para aplicaciones de uso general, con mejor amortiguamiento y buena respuesta en superficies variables.',
        'pneumatic_items' => [
            'Mejor absorción de irregularidades',
            'Más confort durante la operación',
            'Buen desempeño en tierra',
            'Buena opción para construcción y operación mixta',
            'Respuesta estable en trabajo general',
            'Excelente equilibrio entre desempeño y versatilidad',
        ],
        'uses_items' => [
            'Construcción ligera y pesada',
            'Mantenimiento industrial',
            'Movimiento de materiales',
            'Trabajo en terracería',
            'Servicios generales',
            'Operación en superficies mixtas',
        ],
        'faq' => [
            [
                'q' => '¿La medida 10-16.5 es equivalente a 31x10-20/7.5?',
                'a' => 'Sí. Esta landing agrupa esa equivalencia para facilitar la búsqueda del usuario y conectar la medida comercial con la técnica.',
            ],
            [
                'q' => '¿Qué aplicación tiene esta medida?',
                'a' => 'Es una medida usada en minicargadores compactos para construcción, manejo de materiales y operación general en superficies mixtas.',
            ],
            [
                'q' => '¿Qué opción me conviene más: sólida o neumática?',
                'a' => 'Si necesitas máxima resistencia a ponchaduras, normalmente conviene una sólida. Si necesitas mayor amortiguamiento y mejor desempeño en superficies variables, puede convenirte una neumática.',
            ],
            [
                'q' => '¿Puedo pedir ayuda para elegirla?',
                'a' => 'Sí. Podemos ayudarte a cotizar y seleccionar la opción más conveniente según tu uso real.',
            ],
        ],
        'cta_title' => 'Cotiza tu medida 10-16.5 hoy',
        'cta_text' => 'Si buscas una llanta 10-16.5 o su equivalente 31x10-20/7.5 para minicargador, te ayudamos a elegir la mejor opción para tu operación.',
        'hubspot_target' => 'hubspot-form-10-16-5',
    ];

    return view('pages.landing-medida', compact('seo', 'landing'));
}



}