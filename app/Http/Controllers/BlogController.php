<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('category')
            ->published()
            ->latest('published_at')
            ->paginate(9);

        $categories = PostCategory::where('status', true)
            ->orderBy('name')
            ->get();

        $seo = [
            'title' => 'Blog de llantas para minicargador | Ruguex',
            'description' => 'Guías, comparativas y consejos para elegir llantas sólidas y neumáticas para minicargador.',
            'canonical' => url('/blog'),
            'image' => asset('img/home/bobcat-logo.png'),
            'robots' => 'index,follow',
        ];

        return view('blog.index', compact('posts', 'categories', 'seo'));
    }

    public function show(Post $post): View
    {
        abort_if(
            $post->status !== 'published' || !$post->published_at || $post->published_at->isFuture(),
            404
        );

        $relatedPosts = Post::with('category')
            ->published()
            ->where('id', '!=', $post->id)
            ->where('post_category_id', $post->post_category_id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $seo = [
            'title' => $post->seo_title_resolved,
            'description' => $post->seo_description_resolved,
            'canonical' => $post->canonical_url ?: url('/blog/' . $post->slug),
            'image' => $post->featured_image ? asset('storage/' . $post->featured_image) : asset('img/home/bobcat-logo.png'),
            'robots' => $post->robots ?: 'index,follow',
        ];

        return view('blog.show', compact('post', 'relatedPosts', 'seo'));
    }

    public function category(PostCategory $category): View
    {
        abort_unless($category->status, 404);

        $posts = Post::with('category')
            ->published()
            ->where('post_category_id', $category->id)
            ->latest('published_at')
            ->paginate(9);

        $categories = PostCategory::where('status', true)
            ->orderBy('name')
            ->get();

        $seo = [
            'title' => $category->seo_title ?: ('Blog: ' . $category->name . ' | Ruguex'),
            'description' => $category->seo_description ?: ('Artículos y guías sobre ' . $category->name . ' para minicargador.'),
            'canonical' => route('blog.category', $category),
            'image' => asset('img/home/bobcat-logo.png'),
            'robots' => 'index,follow',
        ];

        return view('blog.index', compact('posts', 'categories', 'seo', 'category'));
    }
}