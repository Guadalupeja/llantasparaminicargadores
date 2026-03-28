<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        $seo = [
            'title' => 'Llantas para Minicargadores',
            'description' => 'Llantas sólidas y llantas neumáticas para minicargadores. Conoce nuestras opciones y solicita información.',
            'canonical' => url('/'),
            'image' => asset('images/seo/default.jpg'),
            'robots' => 'index,follow',
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
            'title' => $page->title,
            'description' => $page->meta_description,
            'canonical' => url('/contacto'),
            'image' => asset('images/seo/default.jpg'),
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