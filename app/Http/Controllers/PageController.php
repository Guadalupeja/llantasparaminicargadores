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
}