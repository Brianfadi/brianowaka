<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::withCount(['projects'])
            ->orderBy('order')
            ->orderBy('name');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $categories = $query->paginate(15)->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|max:20',
            'icon'        => 'nullable|string|max:100',
            'order'       => 'nullable|integer|min:0',
        ]);

        Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'color'       => $request->color ?? '#6366f1',
            'icon'        => $request->icon,
            'is_active'   => $request->boolean('is_active', true),
            'order'       => $request->input('order', 0),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', "Category \"{$request->name}\" created.");
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'        => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
            'color'       => 'nullable|string|max:20',
            'icon'        => 'nullable|string|max:100',
            'order'       => 'nullable|integer|min:0',
        ]);

        $category->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'color'       => $request->color ?? $category->color,
            'icon'        => $request->icon,
            'is_active'   => $request->boolean('is_active', true),
            'order'       => $request->input('order', 0),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', "Category \"{$category->name}\" updated.");
    }

    public function destroy(Category $category)
    {
        $projectCount = $category->projects()->count();

        if ($projectCount > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', "Cannot delete \"{$category->name}\" — it has {$projectCount} project(s) assigned.");
        }

        $name = $category->name;
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', "Category \"{$name}\" deleted.");
    }
}
