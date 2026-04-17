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

public function landing12165(): View
{
    $catalog = $this->minicargadorCatalog();
    $shared = $this->minicargadorSharedData();

    $mosaicItems = array_merge(
        $catalog['neumatica']['12-16.5'],
        $catalog['solida']['12-16.5']
    );

    $seo = [
        'title' => 'Llantas Bobcat 12-16.5 | Trelleborg | Ruguex',
        'description' => 'Llantas Bobcat 12-16.5 y 33x12-20/7.5 para minicargador. Trelleborg Brawler, SK y SKS, con rin, montaje y entrega inmediata.',
        'canonical' => url('/llanta-12-16-5'),
        'robots' => 'index,follow',
        'image' => asset('storage/originals/landings/12-16-5/hero-12-16-5.png'),
        'keywords' => 'llantas bobcat 12-16.5, llantas bobcat 33x12-20/7.5, trelleborg brawler hps, sks900, sk-02, sk-05, llantas para minicargador bobcat, llantas bobcat con rin',
    ];

    $landing = [
        'measure' => '12-16.5',
        'measure_display' => '12-16.5 / 33x12-20/7.5',
        'equivalent' => '33x12-20/7.5',

        'badge' => 'Medida Bobcat 12-16.5 | Equivalente a 33x12-20/7.5',
        'title' => 'Llantas Bobcat 12-16.5 para minicargador | Trelleborg Brawler y SK',
        'description' => 'La medida Bobcat 12-16.5, equivalente a 33x12-20/7.5, es una de las más utilizadas en minicargadores que trabajan con cargas pesadas, superficies demandantes y jornadas continuas. En Ruguex te ayudamos a elegir entre llantas sólidas y neumáticas Trelleborg según el tipo de operación, el piso y el nivel de exigencia de tu equipo.',

        'hero_image' => 'landings/12-16-5/hero-12-16-5.png',
        'intro_image' => 'landings/12-16-5/intro-12-16-5.jpg',
        'uses_image' => 'landings/12-16-5/usos-12-16-5.jpg',
        'distributor_image' => 'landings/12-16-5/distribuidor-12-16-5.png',
        'bobcat_visual_image' => 'landings/12-16-5/Llanta-S100-Bobcat.jpg',
        'featured_model_image' => 'landings/12-16-5/Llanta-para-minicargador-S550.jpg',

        'intro_title' => '¿Qué llanta Bobcat 12-16.5 necesita tu minicargador?',
        'intro_text_1' => 'La medida 12-16.5 / 33x12-20/7.5 se utiliza en minicargadores Bobcat donde se requiere resistencia, estabilidad y desempeño en condiciones de trabajo pesado.',
        'intro_text_2' => 'Si tu operación trabaja en reciclaje, residuos, construcción o patios de maniobra, te conviene evaluar opciones Trelleborg Brawler HPS, Brawler HD, SK-02, SK-05, SK-800, SK-900 y SKS900 según el nivel de exigencia.',

        'uses_title' => 'Aplicaciones comunes de la medida Bobcat 12-16.5 / 33x12-20/7.5',
        'uses_text' => 'Esta medida es ideal para equipos Bobcat que trabajan en operaciones demandantes y necesitan estabilidad, tracción y una llanta confiable según el entorno.',

        'distributor_title' => 'Distribuidor autorizado Trelleborg para llantas Bobcat',
        'distributor_text_1' => 'Te ayudamos a seleccionar llantas Trelleborg para minicargadores Bobcat según la exigencia real de la operación. Si necesitas una opción sólida para máxima resistencia o una neumática para mayor versatilidad, podemos orientarte antes de comprar.',
        'distributor_text_2' => 'Atendemos proyectos para trabajo rudo, construcción, reciclaje y operación continua, con enfoque en durabilidad, desempeño y soporte comercial.',

        'shop_url' => 'https://llantasdemontacargas.com/tienda-en-linea/?swoof=1&pa_medidas=12-16-5&paged=1',

        'solid_title' => 'Llantas sólidas Bobcat 12-16.5',
        'solid_text' => 'Las llantas sólidas Trelleborg para Bobcat 12-16.5 están diseñadas para aplicaciones severas. Destacan modelos Brawler HPS, Brawler HD y SKS900, con opciones lisas, con rin e incluso ensamble de fábrica.',
        'solid_items' => [
            'Modelos Brawler HPS, Brawler HD y SKS900.',
            'Opciones con rin, lisa y trabajo 3 turnos.',
            'Menor tiempo muerto por ponchaduras.',
            'Alta resistencia al desgaste.',
            'Mayor continuidad operativa.',
            'Opción ideal para trabajo pesado y uso continuo.',
        ],

        'pneumatic_title' => 'Llantas neumáticas Bobcat 12-16.5',
        'pneumatic_text' => 'Las llantas neumáticas para Bobcat 12-16.5 ofrecen opciones para construcción, operación mixta y condiciones extremas. Entre los modelos disponibles destacan SK-02, SK-05, SK-800 y SK-900, según el entorno de trabajo, la resistencia requerida y la vida útil esperada.',
        'pneumatic_items' => [
            'Modelos SK-02, SK-05, SK-800 y SK-900.',
            'Opciones para uso general, trabajo pesado y condiciones extremas.',
            'Mejor absorción de impactos y confort operativo.',
            'Buen desempeño en tierra, concreto y superficies mixtas.',
            'Alternativas para priorizar resistencia a pinchazos o mayor vida útil.',
            'Excelente opción para construcción, patios de maniobra y operación continua.',
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

        'bobcat' => [
            'title' => 'Llantas para equipos Bobcat',
            'text' => 'La medida 12-16.5 / 33x12-20/7.5 es común en equipos Bobcat para trabajo rudo y operación continua.',
            'models' => ['S450', 'S510', 'S530', 'S550', 'S570', 'S590', 'S595', 'T450', 'T550', 'T590'],
            'url' => 'https://llantasbobcat.com',
        ],

        'brands' => [
            'manufacturer' => $shared['trelleborg'],
            'models' => ['Brawler HPS', 'Brawler HD', 'SK-02', 'SK-05', 'SK-800', 'SK-900', 'SKS900'],
        ],

        'mosaic_items' => $mosaicItems,
        'technical_values' => $shared['technical_values'],
        'commercial_values' => $shared['commercial_values'],
        'technical_pdfs' => $shared['pdfs'],
        'contact' => $shared['contact'],

        'breadcrumbs' => [
            ['name' => 'Inicio', 'url' => url('/')],
            ['name' => 'Llantas Bobcat 12-16.5', 'url' => url('/llanta-12-16-5')],
            ['name' => '33x12-20/7.5'],
        ],

        'schema' => [
            'brand_name' => 'Trelleborg',
            'manufacturer_name' => 'Trelleborg',
            'item_list_name' => 'Llantas Bobcat 12-16.5 / 33x12-20/7.5',
        ],

        'faq' => [
            [
                'q' => '¿La medida Bobcat 12-16.5 es equivalente a 33x12-20/7.5?',
                'a' => 'Sí. Esta landing está enfocada en esa equivalencia para facilitar la búsqueda comercial y técnica de la medida correcta.',
            ],
            [
                'q' => '¿Qué modelos Trelleborg ofrecen para Bobcat 12-16.5?',
                'a' => 'En esta medida destacamos Brawler HPS, Brawler HD, SK-02, SK-05, SK-800, SK-900 y SKS900, además de configuraciones con rin y trabajo severo.',
            ],
            [
                'q' => '¿La llanta puede incluir rin?',
                'a' => 'Sí. Hay opciones con rin incluido y ensamble de fábrica Rin + Llanta.',
            ],
            [
                'q' => '¿Tienen montaje y garantía?',
                'a' => 'Sí. Ofrecemos montaje especializado y garantía directa con distribuidor por 6 meses.',
            ],
            [
                'q' => '¿Las llantas Bobcat incluyen rin?',
                'a' => 'Contamos con opciones con rin y ensamble de fábrica Rin + Llanta, según el modelo y la medida.',
            ],
            [
                'q' => '¿Qué diferencia hay entre Brawler HPS y SKS900?',
                'a' => 'Brawler HPS y SKS900 son configuraciones para trabajo severo. La recomendación depende del tipo de operación, el turno, el piso y si necesitas rin o mayor resistencia al desgaste.',
            ],
            [
                'q' => '¿Qué modelos neumáticos manejan para Bobcat 12-16.5?',
                'a' => 'Además de opciones para uso general y trabajo pesado, manejamos familias como SK-02 y SK-05 para minicargador, orientadas a mayor resistencia, menor desgaste y trabajo en condiciones más severas.',
            ],
            [
                'q' => '¿Tienen entrega inmediata y montaje?',
                'a' => 'Sí. Contamos con stock de modelos y rines para entrega inmediata y montaje en nuestros almacenes, sujeto a disponibilidad.',
            ],
            [
                'q' => '¿Envían por Paquetería Potosinos?',
                'a' => 'Sí. Realizamos envío sin costo a cualquier sucursal de Paquetería Potosinos.',
            ],
            [
                'q' => '¿La garantía es directa con distribuidor?',
                'a' => 'Sí. Ofrecemos garantía directa con distribuidor por 6 meses.',
            ],
        ],

        'cta_title' => 'Solicita tu cotización de llantas Bobcat 12-16.5',
        'cta_text' => 'Si buscas una llanta Bobcat 12-16.5 o su equivalente 33x12-20/7.5, te ayudamos a elegir la mejor opción Trelleborg para tu operación.',
        'hubspot_target' => 'hubspot-form-12-16-5',

        'product_families' => [
            [
                'name' => 'Brawler HPS',
                'tag' => 'Sólida premium',
                'description' => 'Pensada para ambientes extremos y operación continua donde el costo del tiempo muerto es alto.',
                'highlights' => [
                    'Compound resistente a cortes',
                    'Opciones Smooth y Solidflex',
                    'Excelente tracción',
                    'Hasta 3 veces más desgaste vs neumática',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '12-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 3,960 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Reciclaje y trabajo severo'],
                    ['label' => 'Ventaja', 'value' => 'Mayor continuidad operativa'],
                ],
            ],
            [
                'name' => 'Brawler HD',
                'tag' => 'Sólida para servicio severo',
                'description' => 'Muy fuerte para trabajo rudo, con ventaja comercial clara cuando buscas una solución con rueda integrada.',
                'highlights' => [
                    'No requiere prensa',
                    'Wheel & disk system integrado',
                    'Mayor resistencia a corte y chunking',
                    'Probada por OEMs',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '12-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 3,705 kg'],
                    ['label' => 'Instalación', 'value' => 'Sin prensa'],
                    ['label' => 'Uso ideal', 'value' => 'Servicio severo'],
                ],
            ],
            [
                'name' => 'SK-02',
                'tag' => 'Neumática reforzada',
                'description' => 'Opción neumática para minicargador orientada a trabajo demandante, cuando necesitas más resistencia y menor desgaste en operación continua.',
                'highlights' => [
                    'Alta resistencia a pinchazos',
                    'Reducido desgaste de la banda',
                    'Flancos reforzados antiabrasión',
                    'Diseño reforzado en la parte central',
                ],
                'spec_items' => [
                    ['label' => 'Medidas', 'value' => '10-16.5 y 12-16.5'],
                    ['label' => 'Uso ideal', 'value' => 'Trabajo demandante'],
                    ['label' => 'Ventaja', 'value' => 'Mayor resistencia'],
                    ['label' => 'Enfoque', 'value' => 'Menor desgaste'],
                ],
            ],
            [
                'name' => 'SK-05',
                'tag' => 'Neumática extrema',
                'description' => 'Neumático robusto para condiciones extremas, ideal cuando la prioridad es alargar la vida útil en ambientes severos.',
                'highlights' => [
                    'Bajo índice de huecos',
                    'Mayor profundidad de dibujo',
                    'Mayor vida del neumático',
                    'Pensada para condiciones extremas',
                ],
                'spec_items' => [
                    ['label' => 'Medidas', 'value' => '10-16.5 y 12-16.5'],
                    ['label' => 'Uso ideal', 'value' => 'Condiciones extremas'],
                    ['label' => 'Ventaja', 'value' => 'Mayor vida útil'],
                    ['label' => 'Enfoque', 'value' => 'Mayor durabilidad'],
                ],
            ],
            [
                'name' => 'SK-800',
                'tag' => 'Neumática uso general',
                'description' => 'Alternativa para construcción general cuando necesitas tracción y estabilidad con un enfoque más comercial.',
                'highlights' => [
                    'Caucho natural',
                    'Vida útil extendida',
                    'Alta estabilidad',
                    'Buen agarre en distintos pisos',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '12-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 2,540 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Construcción general'],
                    ['label' => 'Rin', 'value' => '9.75-16.5'],
                ],
            ],
            [
                'name' => 'SK-900 / SK-900 ND',
                'tag' => 'Neumática premium',
                'description' => 'Opción premium para trabajo pesado y superficies duras, con mejor desempeño en confort y desgaste.',
                'highlights' => [
                    'Excelente resistencia al desgaste',
                    'Costado robusto',
                    'Buen desempeño multisuperficie',
                    'Muy buen confort de marcha',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '12-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 2,865 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Concreto y asfalto'],
                    ['label' => 'Versión ND', 'value' => 'Mayor profundidad de dibujo'],
                ],
            ],
        ],
    ];

    return view('pages.landing-medida', compact('seo', 'landing'));
}

 public function landing10165(): View
{
    $catalog = $this->minicargadorCatalog();
    $shared = $this->minicargadorSharedData();

    $mosaicItems = array_merge(
        $catalog['neumatica']['10-16.5'],
        $catalog['solida']['10-16.5']
    );

    $seo = [
        'title' => 'Llantas Bobcat 10-16.5 | Trelleborg | Ruguex',
        'description' => 'Llantas Bobcat 10-16.5 y 31x10-20/7.5 para minicargador. Trelleborg Brawler y SK, con rin, montaje y entrega inmediata.',
        'canonical' => url('/llanta-10-16-5'),
        'robots' => 'index,follow',
        'image' => asset('storage/originals/landings/10-16-5/hero-10-16-5.png'),
        'keywords' => 'llantas bobcat 10-16.5, llantas bobcat 31x10-20/7.5, trelleborg brawler hps, sk-02, sk-05, llantas para minicargador bobcat, llantas bobcat con rin',
    ];

    $landing = [
        'measure' => '10-16.5',
        'measure_display' => '10-16.5 / 31x10-20/7.5',
        'equivalent' => '31x10-20/7.5',

        'badge' => 'Medida Bobcat 10-16.5 | Equivalente a 31x10-20/7.5',
        'title' => 'Llantas Bobcat 10-16.5 para minicargador | Trelleborg Brawler y SK',
        'description' => 'La medida Bobcat 10-16.5, equivalente a 31x10-20/7.5, es una opción muy utilizada en minicargadores compactos que requieren tracción, resistencia y buen desempeño en operación continua. En Ruguex te ayudamos a elegir la llanta ideal según la aplicación, el tipo de piso y el nivel de exigencia del trabajo.',

        'hero_image' => 'landings/10-16-5/hero-10-16-5.png',
        'intro_image' => 'landings/10-16-5/intro-10-16-5.jpg',
        'uses_image' => 'landings/10-16-5/usos-10-16-5.jpg',
        'distributor_image' => 'landings/10-16-5/distribuidor-10-16-5.png',
        'bobcat_visual_image' => 'landings/10-16-5/Llanta-S100-Bobcat.jpg',
        'featured_model_image' => 'landings/10-16-5/Llanta-para-minicargador-S550.jpg',

        'intro_title' => '¿Qué llanta Bobcat 10-16.5 necesita tu minicargador?',
        'intro_text_1' => 'La medida 10-16.5 / 31x10-20/7.5 es ideal para minicargadores Bobcat compactos que trabajan en construcción, patios de servicio, superficies mixtas y aplicaciones donde se requiere equilibrio entre tracción, estabilidad y resistencia.',
        'intro_text_2' => 'La elección entre una llanta sólida o una neumática depende del entorno real de uso. Si tu prioridad es evitar ponchaduras y reducir mantenimiento, la sólida suele ser la mejor alternativa. Si necesitas mejor amortiguamiento y una respuesta más versátil, conviene evaluar modelos como SK-02, SK-05, SK-800 y SK-900.',

        'uses_title' => 'Usos frecuentes de la medida Bobcat 10-16.5 / 31x10-20/7.5',
        'uses_text' => 'Esta medida se usa en minicargadores Bobcat compactos para aplicaciones donde se requiere un buen equilibrio entre tracción, resistencia y maniobrabilidad.',

        'distributor_title' => 'Distribuidor autorizado Trelleborg para llantas Bobcat',
        'distributor_text_1' => 'La medida 10-16.5 / 31x10-20/7.5 es una excelente opción para minicargadores Bobcat compactos. Te ayudamos a seleccionar la mejor configuración para tu necesidad real.',
        'distributor_text_2' => 'Si buscas evitar ponchaduras, reducir tiempos muertos y mantener la operación activa, una llanta sólida puede ser la mejor inversión. Si buscas confort y versatilidad, una neumática puede ser la opción adecuada.',

        'shop_url' => 'https://llantasdemontacargas.com/tienda-en-linea/?swoof=1&pa_medidas=10-16-5&paged=1',

        'solid_title' => 'Llantas sólidas Bobcat 10-16.5',
        'solid_text' => 'Las llantas sólidas Trelleborg para Bobcat 10-16.5 son recomendables cuando la prioridad es evitar ponchaduras y reducir mantenimiento. Destacan configuraciones Brawler HPS, Brawler HD, lisa y con rin.',
        'solid_items' => [
            'Modelos Brawler HPS y Brawler HD.',
            'Opciones lisa, 3 turnos y con rin.',
            'Alta resistencia a cortes.',
            'Menos paros por mantenimiento.',
            'Excelente opción para trabajo rudo.',
            'Mayor continuidad operativa.',
        ],

        'pneumatic_title' => 'Llantas neumáticas Bobcat 10-16.5',
        'pneumatic_text' => 'Las llantas neumáticas para Bobcat 10-16.5 incluyen opciones para uso general, trabajo pesado y condiciones extremas. Entre los modelos disponibles destacan SK-02, SK-05, SK-800 y SK-900, según el tipo de piso, la resistencia requerida y la exigencia de la operación.',
        'pneumatic_items' => [
            'Modelos SK-02, SK-05, SK-800 y SK-900.',
            'Opciones para uso general, trabajo pesado y condiciones extremas.',
            'Mejor absorción de irregularidades y confort de marcha.',
            'Alternativas con mayor resistencia a pinchazos y menor desgaste.',
            'Buen desempeño en tierra, concreto y superficies mixtas.',
            'Excelente opción para construcción, mantenimiento y trabajo continuo.',
        ],

        'uses_items' => [
            'Construcción ligera y pesada',
            'Mantenimiento industrial',
            'Movimiento de materiales',
            'Trabajo en terracería',
            'Servicios generales',
            'Operación en superficies mixtas',
        ],

        'bobcat' => [
            'title' => 'Llantas para equipos Bobcat',
            'text' => 'La medida 10-16.5 / 31x10-20/7.5 se utiliza en equipos Bobcat compactos donde se requiere tracción, estabilidad y buen desempeño.',
            'models' => ['463', 'S70', 'S100', 'S130', 'S150', 'S160', 'S175', 'S185', 'S205'],
            'url' => 'https://llantasbobcat.com',
        ],

        'brands' => [
            'manufacturer' => $shared['trelleborg'],
            'models' => ['Brawler HPS', 'Brawler HD', 'SK-02', 'SK-05', 'SK-800', 'SK-900'],
        ],

        'mosaic_items' => $mosaicItems,
        'technical_values' => $shared['technical_values'],
        'commercial_values' => $shared['commercial_values'],
        'technical_pdfs' => $shared['pdfs'],
        'contact' => $shared['contact'],

        'breadcrumbs' => [
            ['name' => 'Inicio', 'url' => url('/')],
            ['name' => 'Llantas Bobcat 10-16.5', 'url' => url('/llanta-10-16-5')],
            ['name' => '31x10-20/7.5'],
        ],

        'schema' => [
            'brand_name' => 'Trelleborg',
            'manufacturer_name' => 'Trelleborg',
            'item_list_name' => 'Llantas Bobcat 10-16.5 / 31x10-20/7.5',
        ],

        'faq' => [
            [
                'q' => '¿La medida Bobcat 10-16.5 es equivalente a 31x10-20/7.5?',
                'a' => 'Sí. Esta landing agrupa esa equivalencia para facilitar la búsqueda del usuario y conectar la medida comercial con la técnica.',
            ],
            [
                'q' => '¿Qué modelos Trelleborg ofrecen para Bobcat 10-16.5?',
                'a' => 'En esta medida destacamos Brawler HPS, Brawler HD, SK-02, SK-05, SK-800 y SK-900, además de opciones con rin y configuraciones para distintos turnos.',
            ],
            [
                'q' => '¿La llanta puede incluir rin?',
                'a' => 'Sí. Hay opciones con rin incluido y ensamble de fábrica.',
            ],
            [
                'q' => '¿Tienen stock, montaje y garantía?',
                'a' => 'Sí. Contamos con stock, montaje especializado y garantía directa con distribuidor por 6 meses.',
            ],
            [
                'q' => '¿Las llantas Bobcat incluyen rin?',
                'a' => 'Contamos con opciones con rin y ensamble de fábrica Rin + Llanta, según el modelo y la medida.',
            ],
            [
                'q' => '¿Qué modelos neumáticos manejan para Bobcat 10-16.5?',
                'a' => 'Además de opciones para uso general y trabajo pesado, manejamos familias como SK-02 y SK-05 para minicargador, orientadas a mayor resistencia, menor desgaste y trabajo en condiciones más severas.',
            ],
            [
                'q' => '¿Tienen entrega inmediata y montaje?',
                'a' => 'Sí. Contamos con stock de modelos y rines para entrega inmediata y montaje en nuestros almacenes, sujeto a disponibilidad.',
            ],
            [
                'q' => '¿Envían por Paquetería Potosinos?',
                'a' => 'Sí. Realizamos envío sin costo a cualquier sucursal de Paquetería Potosinos.',
            ],
            [
                'q' => '¿La garantía es directa con distribuidor?',
                'a' => 'Sí. Ofrecemos garantía directa con distribuidor por 6 meses.',
            ],
        ],

        'cta_title' => 'Solicita tu cotización de llantas Bobcat 10-16.5',
        'cta_text' => 'Si buscas una llanta Bobcat 10-16.5 o su equivalente 31x10-20/7.5, te ayudamos a elegir la mejor opción Trelleborg para tu operación.',
        'hubspot_target' => 'hubspot-form-10-16-5',

        'product_families' => [
            [
                'name' => 'Brawler HPS',
                'tag' => 'Sólida premium',
                'description' => 'Ideal para trabajo severo y ambientes agresivos donde una ponchadura o un corte detiene la operación.',
                'highlights' => [
                    'Compound resistente a cortes',
                    'Opciones Smooth y Solidflex',
                    'Hasta 3 veces más desgaste vs neumática',
                    'Menos tiempo muerto',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '10-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 2,815 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Reciclaje y trabajo severo'],
                    ['label' => 'Ventaja', 'value' => 'Mayor continuidad operativa'],
                ],
            ],
            [
                'name' => 'Brawler HD',
                'tag' => 'Sólida para servicio severo',
                'description' => 'Pensada para servicio severo, con sistema integrado que simplifica la instalación y reduce tiempos de montaje.',
                'highlights' => [
                    'No requiere prensa',
                    'Wheel & disk system integrado',
                    'Mayor resistencia a corte y chunking',
                    'Probada por OEMs',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '10-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 3,290 kg'],
                    ['label' => 'Instalación', 'value' => 'Sin prensa'],
                    ['label' => 'Uso ideal', 'value' => 'Servicio severo'],
                ],
            ],
            [
                'name' => 'SK-02',
                'tag' => 'Neumática reforzada',
                'description' => 'Opción neumática para minicargador con enfoque en resistencia a pinchazos y mayor durabilidad en operación demandante.',
                'highlights' => [
                    'Alta resistencia a pinchazos',
                    'Reducido desgaste de la banda',
                    'Flancos reforzados antiabrasión',
                    'Diseño reforzado en la parte central',
                ],
                'spec_items' => [
                    ['label' => 'Medidas', 'value' => '10-16.5 y 12-16.5'],
                    ['label' => 'Uso ideal', 'value' => 'Trabajo demandante'],
                    ['label' => 'Ventaja', 'value' => 'Mayor resistencia'],
                    ['label' => 'Enfoque', 'value' => 'Menor desgaste'],
                ],
            ],
            [
                'name' => 'SK-05',
                'tag' => 'Neumática extrema',
                'description' => 'Neumático robusto para condiciones extremas, ideal cuando la prioridad es alargar la vida útil en ambientes severos.',
                'highlights' => [
                    'Bajo índice de huecos',
                    'Mayor profundidad de dibujo',
                    'Mayor vida del neumático',
                    'Pensada para condiciones extremas',
                ],
                'spec_items' => [
                    ['label' => 'Medidas', 'value' => '10-16.5 y 12-16.5'],
                    ['label' => 'Uso ideal', 'value' => 'Condiciones extremas'],
                    ['label' => 'Ventaja', 'value' => 'Mayor vida útil'],
                    ['label' => 'Enfoque', 'value' => 'Mayor durabilidad'],
                ],
            ],
            [
                'name' => 'SK-800',
                'tag' => 'Neumática uso general',
                'description' => 'Buena alternativa para construcción general cuando buscas tracción, estabilidad y una solución más económica.',
                'highlights' => [
                    'Caucho natural',
                    'Vida extendida',
                    'Alta estabilidad y seguridad',
                    'Agarre en superficies lisas y rugosas',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '10-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 2,135 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Construcción general'],
                    ['label' => 'Rin', 'value' => '8.25-16.5'],
                ],
            ],
            [
                'name' => 'SK-900 / SK-900 ND',
                'tag' => 'Neumática premium',
                'description' => 'Recomendada para trabajo pesado; la versión ND es especialmente atractiva para concreto, asfalto y superficies duras.',
                'highlights' => [
                    'Excelente confort de marcha',
                    'Excelente resistencia al desgaste',
                    'Costado robusto',
                    'Buen desempeño multisuperficie',
                ],
                'spec_items' => [
                    ['label' => 'Medida', 'value' => '10-16.5'],
                    ['label' => 'Capacidad', 'value' => 'Hasta 2,135 kg'],
                    ['label' => 'Uso ideal', 'value' => 'Concreto y asfalto'],
                    ['label' => 'Versión ND', 'value' => 'Mayor profundidad de dibujo'],
                ],
            ],
        ],
    ];

    return view('pages.landing-medida', compact('seo', 'landing'));
}
private function minicargadorCatalog(): array
{
    return [
        'neumatica' => [
            '10-16.5' => [
                [
                    'label' => 'Neumática 1-2 turnos',
                    'type_label' => 'Neumática',
                    'promo' => 'Entrega inmediata',
                    'description' => 'Llanta neumática para minicargador Bobcat 10-16.5. Disponible para compra en línea.',
                    'price' => '$6,425.35 IVA incluido',
                    'image' => asset('img/chat/neumatica-10-16-5-1-2-turnos.jpg'),
                    'image_path' => 'chat/neumatica-10-16-5-1-2-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-neumatica-para-minicargador-10-16-5-trabajo-medio-6/',
                ],
                [
                    'label' => 'Neumática 3 turnos',
                    'type_label' => 'Neumática',
                    'promo' => 'Trabajo 3 turnos',
                    'description' => 'Llanta neumática para minicargador Bobcat 10-16.5. Disponible para compra en línea.',
                    'price' => '$7,800.20 IVA incluido',
                    'image' => asset('img/chat/neumatica-10-16-5-3-turnos.jpg'),
                    'image_path' => 'chat/neumatica-10-16-5-3-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-neumatica-para-minicargador-10-16-5-trabajo-medio-4/',
                ],
            ],

            '12-16.5' => [
                [
                    'label' => 'Neumática 1-2 turnos',
                    'type_label' => 'Neumática',
                    'promo' => 'Entrega inmediata',
                    'description' => 'Llanta neumática para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$8,610.46 IVA incluido',
                    'image' => asset('img/chat/neumatica-12-16-5-1-2-turnos.jpg'),
                    'image_path' => 'chat/neumatica-12-16-5-1-2-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-neumatica-para-minicargador-12-16-5-trabajo-pesado-2/',
                ],
                [
                    'label' => 'Neumática 3 turnos',
                    'type_label' => 'Neumática',
                    'promo' => 'Trabajo 3 turnos',
                    'description' => 'Llanta neumática para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$9,513.43 IVA incluido',
                    'image' => asset('img/chat/neumatica-12-16-5-3-turnos.jpg'),
                    'image_path' => 'chat/neumatica-12-16-5-3-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-neumatico-para-minicargador-12-16-5-trabajo-pesado-2/',
                ],
            ],
        ],

        'solida' => [
            '10-16.5' => [
                [
                    'label' => 'Sólida 3 turnos lisa',
                    'type_label' => 'Sólida',
                    'promo' => 'Lisa / trabajo severo',
                    'description' => 'Llanta sólida lisa para minicargador Bobcat 10-16.5. Disponible para compra en línea.',
                    'price' => '$15,672.91 IVA incluido',
                    'image' => asset('img/chat/solida-10-16-5-lisa.jpg'),
                    'image_path' => 'chat/solida-10-16-5-lisa.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-10-16-5-trabajo-pesado-lisa-brawler-hps-ss-sm-a-trelleborg-2/',
                ],
                [
                    'label' => 'Sólida 3 turnos',
                    'type_label' => 'Sólida',
                    'promo' => 'Brawler HPS',
                    'description' => 'Llanta sólida para minicargador Bobcat 10-16.5. Disponible para compra en línea.',
                    'price' => '$9,875.27 IVA incluido',
                    'image' => asset('img/chat/solida-10-16-5-3-turnos.jpg'),
                    'image_path' => 'chat/solida-10-16-5-3-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-10-16-5-trabajo-pesado-brawler-hps-ss-sf-tr-tft-trelleborg-2/',
                ],
                [
                    'label' => 'Sólida con rin',
                    'type_label' => 'Sólida',
                    'promo' => 'Ensamble con rin',
                    'description' => 'Llanta sólida con rin para minicargador Bobcat 10-16.5. Disponible para compra en línea.',
                    'price' => '$15,672.91 IVA incluido',
                    'image' => asset('img/chat/solida-10-16-5-con-rin.jpg'),
                    'image_path' => 'chat/solida-10-16-5-con-rin.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-10-16-5-trabajo-pesado-incluye-rin-brawler-hps-ss-sf-tr-a-trelleborg/',
                ],
            ],

            '12-16.5' => [
                [
                    'label' => 'Sólida 3 turnos',
                    'type_label' => 'Sólida',
                    'promo' => 'Brawler HPS',
                    'description' => 'Llanta sólida para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$15,198.42 IVA incluido',
                    'image' => asset('img/chat/solida-12-16-5-3-turnos.jpg'),
                    'image_path' => 'chat/solida-12-16-5-3-turnos.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-12-16-5-trabajo-pesado-brawler-hps-ss-trelleborg-2/',
                ],
                [
                    'label' => 'Sólida 3 turnos con rin',
                    'type_label' => 'Sólida',
                    'promo' => 'Ensamble con rin',
                    'description' => 'Llanta sólida con rin para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$15,198.42 IVA incluido',
                    'image' => asset('img/chat/solida-12-16-5-3-turnos-con-rin.jpg'),
                    'image_path' => 'chat/solida-12-16-5-3-turnos-con-rin.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-12-16-5-trabajo-pesado-incluye-rin-brawler-hps-ss-tr-a-trelleborg/',
                ],
                [
                    'label' => 'Sólida 3 turnos lisa',
                    'type_label' => 'Sólida',
                    'promo' => 'Lisa / trabajo severo',
                    'description' => 'Llanta sólida lisa para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$15,420.84 IVA incluido',
                    'image' => asset('img/chat/solida-12-16-5-lisa.jpg'),
                    'image_path' => 'chat/solida-12-16-5-lisa.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-12-16-5-trabajo-pesado-lisa-brawler-hps-ss-sm-trelleborg/',
                ],
                [
                    'label' => 'Sólida 3 turnos lisa con rin',
                    'type_label' => 'Sólida',
                    'promo' => 'Lisa con rin',
                    'description' => 'Llanta sólida lisa con rin para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$16,829.48 IVA incluido',
                    'image' => asset('img/chat/solida-12-16-5-lisa-con-rin.jpg'),
                    'image_path' => 'chat/solida-12-16-5-lisa-con-rin.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-12-16-5-trabajo-pesado-incluye-rin-lisa-brawler-hps-ss-sf-sm-a-trelleborg/',
                ],
                [
                    'label' => 'Sólida 3 turnos SKS900',
                    'type_label' => 'Sólida',
                    'promo' => 'Modelo SKS900',
                    'description' => 'Llanta sólida SKS900 para minicargador Bobcat 12-16.5. Disponible para compra en línea.',
                    'price' => '$16,696.02 IVA incluido',
                    'image' => asset('img/chat/solida-12-16-5-sks900.jpg'),
                    'image_path' => 'chat/solida-12-16-5-sks900.jpg',
                    'url' => 'https://llantasdemontacargas.com/tienda-en-linea/producto/llanta-solida-para-minicargador-12-16-5-trabajo-pesado-sks-900-trelleborg/',
                ],
            ],
        ],
    ];
}

    private function minicargadorSharedData(): array
    {
        return [
            'trelleborg' => [
                'name' => 'Trelleborg',
                'url' => 'https://www.trelleborg-tires.com/en-us/products-and-solutions/wheels',
                'distributor_text' => 'Distribuidor autorizado de llantas Trelleborg para minicargador Bobcat.',
            ],
            'contact' => [
                'whatsapp_url' => 'https://wa.me/528332395885?text=Hola,%20necesito%20informaci%C3%B3n%20sobre%20llantas%20para%20minicargador%20Bobcat.',
                'matriz' => 'Matriz Puebla',
                'warehouses' => ['EDOMEX', 'PUEBLA', 'GUANAJUATO', 'NUEVO LEÓN', 'SAN LUIS POTOSÍ', 'JALISCO', 'AGUASCALIENTES'],
                'stock_note' => 'Consulta stock y disponibilidad de prensa para montaje.',
            ],
            'technical_values' => [
                'Llanta original de equipos Bobcat.',
                'Rines a medida con todos los patrones de birlo y diámetro de masa.',
                'Ensamble de fábrica Rin + Llanta para garantizar desempeño.',
                'Garantía de desempeño y vida 25% más vs cualquier otra marca.',
                'Asesoría experta en la selección.',
                'Montaje especializado socio Trelleborg Interfit.',
            ],
            'commercial_values' => [
                'Stock de modelos y rines para entrega inmediata.',
                'Ensamble de fábrica con rin incluido a mejor costo que por separado.',
                'Envío sin costo a cualquier sucursal Paquetería Potosinos.',
                'Montaje gratis en almacenes EDOMEX, PUEBLA, GTO, NL, SLP, JAL y AGS.',
                'Descuento por volumen a mayoristas y flotillas.',
                'Crédito a cliente frecuente rápido y sencillo.',
                'Garantía directa con distribuidor por 6 meses.',
            ],
            'pdfs' => [
                [
                    'label' => 'Ficha técnica Brawler HPS Solidflex',
                    'url' => asset('storage/originals/fichas-tecnicas/brawler-hps-solidflex.pdf'),
                ],
                [
                    'label' => 'Ficha técnica Brawler HD Solidflex',
                    'url' => asset('storage/originals/fichas-tecnicas/brawler-hd-solidflex.pdf'),
                ],
                [
                    'label' => 'Ficha técnica SK-800',
                    'url' => asset('storage/originals/fichas-tecnicas/sk-800.pdf'),
                ],
                [
                    'label' => 'Ficha técnica SK-900 / SK-900 ND',
                    'url' => asset('storage/originals/fichas-tecnicas/sk-900.pdf'),
                ],
            ],
        ];
    }
}