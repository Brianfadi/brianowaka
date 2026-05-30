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
            'image_files.*'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB max
        ]);

        $data = $request->except(['tech_stack', 'features', 'images', 'image_files', '_token']);
        $data['slug']        = Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_for_sale'] = $request->boolean('is_for_sale');
        $data['status']      = $request->input('status', 'draft');

        $data['tech_stack'] = $this->parseTextarea($request->tech_stack);
        $data['features']   = $this->parseTextarea($request->features);
        
        // Handle image uploads
        $imageUrls = [];
        
        // Process uploaded files
        if ($request->hasFile('image_files')) {
            foreach ($request->file('image_files') as $file) {
                try {
                    $path = $file->store('projects', config('filesystems.default'));
                    $url = \Storage::url($path);
                    $imageUrls[] = $url;
                } catch (\Exception $e) {
                    \Log::error('Error uploading project image: ' . $e->getMessage());
                }
            }
        }
        
        // Add URLs from textarea (if any)
        $textareaUrls = $this->parseTextarea($request->images);
        $imageUrls = array_merge($imageUrls, $textareaUrls);
        
        $data['images'] = $imageUrls;

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
            'image_files.*'     => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240', // 10MB max
        ]);

        $data = $request->except(['tech_stack', 'features', 'images', 'image_files', '_token', '_method']);
        $data['slug']        = Str::slug($request->title);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['is_for_sale'] = $request->boolean('is_for_sale');
        $data['status']      = $request->input('status', 'draft');

        $data['tech_stack'] = $this->parseTextarea($request->tech_stack);
        $data['features']   = $this->parseTextarea($request->features);
        
        // Handle image uploads
        $imageUrls = [];
        
        // Process uploaded files
        if ($request->hasFile('image_files')) {
            foreach ($request->file('image_files') as $file) {
                try {
                    $path = $file->store('projects', config('filesystems.default'));
                    $url = \Storage::url($path);
                    $imageUrls[] = $url;
                } catch (\Exception $e) {
                    \Log::error('Error uploading project image: ' . $e->getMessage());
                }
            }
        }
        
        // Add URLs from textarea (if any)
        $textareaUrls = $this->parseTextarea($request->images);
        
        // If textarea has URLs, use them (replaces existing)
        // If textarea is empty but files were uploaded, add to existing
        // If both empty, keep existing
        if (!empty($textareaUrls)) {
            $imageUrls = array_merge($imageUrls, $textareaUrls);
        } elseif (empty($imageUrls)) {
            // Keep existing images if no new ones provided
            $imageUrls = $project->images ?? [];
        } else {
            // Add new uploads to existing images
            $imageUrls = array_merge($project->images ?? [], $imageUrls);
        }
        
        $data['images'] = $imageUrls;

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
