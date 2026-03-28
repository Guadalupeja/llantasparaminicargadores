<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/somos', [PageController::class, 'about'])->name('about');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/gracias', [PageController::class, 'thanks'])->name('thanks');

Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

Route::get('/llantas-solidas-para-minicargador', [ProductCategoryController::class, 'solid'])
    ->name('categories.solid');

Route::get('/llantas-neumaticas-para-minicargador', [ProductCategoryController::class, 'pneumatic'])
    ->name('categories.pneumatic');

Route::get('/llantas-solidas-para-minicargador/{product}', [ProductController::class, 'showSolid'])
    ->name('products.solid.show');

Route::get('/llantas-neumaticas-para-minicargador/{product}', [ProductController::class, 'showPneumatic'])
    ->name('products.pneumatic.show');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');