<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostCategoryController extends Controller
{
    public function index(): View
    {
        $categories = PostCategory::latest()->paginate(15);

        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.blog.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:160', 'unique:post_categories,slug'],
            'description' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:160'],
            'seo_description' => ['nullable', 'string', 'max:180'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['status'] = $request->boolean('status');

        PostCategory::create($validated);

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(PostCategory $category): View
    {
        return view('admin.blog.categories.edit', compact('category'));
    }

    public function update(Request $request, PostCategory $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:160', 'unique:post_categories,slug,' . $category->id],
            'description' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:160'],
            'seo_description' => ['nullable', 'string', 'max:180'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['slug'] = $validated['slug'] ?: Str::slug($validated['name']);
        $validated['status'] = $request->boolean('status');

        $category->update($validated);

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(PostCategory $category): RedirectResponse
    {
        $category->delete();

        return redirect()
            ->route('admin.blog.categories.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}