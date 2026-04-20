<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View
    {
        $posts = Post::with('category')
            ->latest()
            ->paginate(15);

        return view('admin.blog.posts.index', compact('posts'));
    }

    public function create(): View
    {
        $categories = PostCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.blog.posts.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'post_category_id' => ['required', 'exists:post_categories,id'],
            'title' => ['required', 'string', 'max:170'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:posts,slug'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:4096'],
            'featured_image_alt' => ['nullable', 'string', 'max:180'],
            'author_name' => ['nullable', 'string', 'max:120'],
            'seo_title' => ['nullable', 'string', 'max:160'],
            'seo_description' => ['nullable', 'string', 'max:180'],
            'canonical_url' => ['nullable', 'url'],
            'robots' => ['nullable', 'string', 'max:60'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['author_name'] = $validated['author_name'] ?: 'Ruguex';
        $validated['robots'] = $validated['robots'] ?: 'index,follow';
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['reading_time'] = max(
            1,
            (int) ceil(str_word_count(strip_tags($validated['content'])) / 180)
        );

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        Post::create($validated);

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Artículo creado correctamente.');
    }

    public function edit(Post $post): View
    {
        $categories = PostCategory::where('status', true)
            ->orderBy('name')
            ->get();

        return view('admin.blog.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'post_category_id' => ['required', 'exists:post_categories,id'],
            'title' => ['required', 'string', 'max:170'],
            'slug' => ['nullable', 'string', 'max:180', 'unique:posts,slug,' . $post->id],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'featured_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,avif', 'max:4096'],
            'featured_image_alt' => ['nullable', 'string', 'max:180'],
            'author_name' => ['nullable', 'string', 'max:120'],
            'seo_title' => ['nullable', 'string', 'max:160'],
            'seo_description' => ['nullable', 'string', 'max:180'],
            'canonical_url' => ['nullable', 'url'],
            'robots' => ['nullable', 'string', 'max:60'],
            'status' => ['required', 'in:draft,published'],
            'published_at' => ['nullable', 'date'],
        ]);

        $validated['slug'] = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['title']);

        $validated['author_name'] = $validated['author_name'] ?: 'Ruguex';
        $validated['robots'] = $validated['robots'] ?: 'index,follow';
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['reading_time'] = max(
            1,
            (int) ceil(str_word_count(strip_tags($validated['content'])) / 180)
        );

        if ($request->hasFile('featured_image')) {
            if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
                Storage::disk('public')->delete($post->featured_image);
            }

            $validated['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $post->update($validated);

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Artículo actualizado correctamente.');
    }

    public function destroy(Post $post): RedirectResponse
    {
        if ($post->featured_image && Storage::disk('public')->exists($post->featured_image)) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()
            ->route('admin.blog.posts.index')
            ->with('success', 'Artículo eliminado correctamente.');
    }
}