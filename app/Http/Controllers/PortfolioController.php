<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::active()->ordered()->get();
        $selectedCategory = $request->get('category');
        $search = $request->get('search');
        
        $query = Project::with('category');
        
        // Filter by category
        if ($selectedCategory) {
            $query->where('category_id', $selectedCategory);
        }
        
        // Search functionality
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('tech_stack', 'like', '%' . $search . '%');
            });
        }
        
        $projects = $query->latest()->paginate(12);
        
        // Get featured projects
        $featuredProjects = Project::with('category')
            ->featured()
            ->latest()
            ->take(3)
            ->get();
        
        return view('frontend.portfolio.index', compact(
            'projects', 
            'categories', 
            'selectedCategory', 
            'search',
            'featuredProjects'
        ));
    }
    
    public function show(Project $project)
    {
        // Add slug generation if not present
        if (!$project->slug) {
            $project->slug = Str::slug($project->title);
            $project->save();
        }
        
        $relatedProjects = Project::where('id', '!=', $project->id)
            ->where('category_id', $project->category_id)
            ->take(3)
            ->get();
        
        return view('frontend.portfolio.show', compact('project', 'relatedProjects'));
    }
}
