<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\MinicargadorLeadController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Mail;



Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/somos', [PageController::class, 'about'])->name('about');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/gracias', [PageController::class, 'thanks'])->name('thanks');

Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');


Route::post('/minicargador/lead', [MinicargadorLeadController::class, 'store'])
    ->name('minicargador.lead.store');


Route::get('/llantas-solidas-para-minicargador', [ProductCategoryController::class, 'solid'])
    ->name('categories.solid');

Route::get('/llantas-neumaticas-para-minicargador', [ProductCategoryController::class, 'pneumatic'])
    ->name('categories.pneumatic');

Route::get('/llantas-solidas-para-minicargador/{product}', [ProductController::class, 'showSolid'])
    ->name('products.solid.show');

Route::get('/llantas-neumaticas-para-minicargador/{product}', [ProductController::class, 'showPneumatic'])
    ->name('products.pneumatic.show');


Route::get('/llanta-12-16-5', [PageController::class, 'landing12165'])->name('landing.12165');
Route::get('/llanta-10-16-5', [PageController::class, 'landing10165'])->name('landing.10165');



Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');