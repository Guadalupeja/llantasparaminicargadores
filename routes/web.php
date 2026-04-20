<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\MinicargadorLeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\PostCategoryController as AdminPostCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Rutas públicas del sitio
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/somos', [PageController::class, 'about'])->name('about');
Route::get('/contacto', [PageController::class, 'contact'])->name('contact');
Route::get('/gracias', [PageController::class, 'thanks'])->name('thanks');

Route::post('/contacto', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Leads
|--------------------------------------------------------------------------
*/

Route::post('/minicargador/lead', [MinicargadorLeadController::class, 'store'])
    ->name('minicargador.lead.store');

Route::post('/chat-ruguex/lead', [MinicargadorLeadController::class, 'store'])
    ->name('chat.ruguex.lead.store');

/*
|--------------------------------------------------------------------------
| Categorías y productos
|--------------------------------------------------------------------------
*/

Route::get('/llantas-solidas-para-minicargador', [ProductCategoryController::class, 'solid'])
    ->name('categories.solid');

Route::get('/llantas-neumaticas-para-minicargador', [ProductCategoryController::class, 'pneumatic'])
    ->name('categories.pneumatic');

Route::get('/llantas-solidas-para-minicargador/{product}', [ProductController::class, 'showSolid'])
    ->name('products.solid.show');

Route::get('/llantas-neumaticas-para-minicargador/{product}', [ProductController::class, 'showPneumatic'])
    ->name('products.pneumatic.show');

/*
|--------------------------------------------------------------------------
| Landings de medidas
|--------------------------------------------------------------------------
*/

Route::get('/llanta-12-16-5', [PageController::class, 'landing12165'])->name('landing.12165');
Route::get('/llanta-10-16-5', [PageController::class, 'landing10165'])->name('landing.10165');

/*
|--------------------------------------------------------------------------
| Sitemap
|--------------------------------------------------------------------------
*/

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Blog público
|--------------------------------------------------------------------------
*/

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/categoria/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

/*
|--------------------------------------------------------------------------
| Breeze
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin blog
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->prefix('admin/blog')->name('admin.blog.')->group(function () {
    Route::resource('posts', AdminPostController::class);
    Route::resource('categories', AdminPostCategoryController::class)->parameters([
        'categories' => 'category',
    ]);
});

/*
|--------------------------------------------------------------------------
| Auth Breeze
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';