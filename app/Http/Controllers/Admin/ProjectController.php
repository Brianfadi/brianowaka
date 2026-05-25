<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with('category')->latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $projects = $query->paginate(10)->withQueryString();
        $categories = Category::active()->ordered()->get();

        return view('admin.projects.index', compact('projects', 'categories'));
    }

    public function create()
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'category_id'       => 'nullable|exists:categories,id',
            'demo_link'         => 'nullable|url',
            'github_link'       => 'nullable|url',
        ]);

        $data = $request->except(['tech_stack', 'features', 'images', '_token']);
        $data['slug']        = Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_for_sale'] = $request->boolean('is_for_sale');
        $data['status']      = $request->input('status', 'draft');

        $data['tech_stack'] = $this->parseTextarea($request->tech_stack);
        $data['features']   = $this->parseTextarea($request->features);
        $data['images']     = $this->parseTextarea($request->images);

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $categories = Category::active()->ordered()->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'category_id'       => 'nullable|exists:categories,id',
            'demo_link'         => 'nullable|url',
            'github_link'       => 'nullable|url',
        ]);

        $data = $request->except(['tech_stack', 'features', 'images', '_token', '_method']);
        $data['slug']        = Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_for_sale'] = $request->boolean('is_for_sale');
        $data['status']      = $request->input('status', 'draft');

        $data['tech_stack'] = $this->parseTextarea($request->tech_stack);
        $data['features']   = $this->parseTextarea($request->features);
        $data['images']     = $this->parseTextarea($request->images);

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function parseTextarea(?string $value): array
    {
        if (empty($value)) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $value))));
    }
}
