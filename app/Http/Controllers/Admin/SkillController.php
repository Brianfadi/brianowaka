<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('order')->orderBy('category')->get()->groupBy('category');
        $counts = [
            'total'  => Skill::count(),
            'active' => Skill::active()->count(),
        ];
        return view('admin.skills.index', compact('skills', 'counts'));
    }

    public function create()
    {
        $categories = Skill::whereNotNull('category')->distinct()->pluck('category')->sort()->values();
        return view('admin.skills.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'level'      => 'required|in:beginner,intermediate,advanced,expert',
            'percentage' => 'required|integer|min:0|max:100',
            'category'   => 'nullable|string|max:100',
            'icon'       => 'nullable|string|max:255',
            'order'      => 'nullable|integer|min:0',
        ]);

        Skill::create([
            'name'       => $request->name,
            'level'      => $request->level,
            'percentage' => $request->percentage,
            'category'   => $request->category ?: null,
            'icon'       => $request->icon ?: null,
            'is_active'  => $request->boolean('is_active', true),
            'order'      => $request->input('order', 0),
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill added.');
    }

    public function edit(Skill $skill)
    {
        $categories = Skill::whereNotNull('category')->distinct()->pluck('category')->sort()->values();
        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'level'      => 'required|in:beginner,intermediate,advanced,expert',
            'percentage' => 'required|integer|min:0|max:100',
            'category'   => 'nullable|string|max:100',
            'icon'       => 'nullable|string|max:255',
            'order'      => 'nullable|integer|min:0',
        ]);

        $skill->update([
            'name'       => $request->name,
            'level'      => $request->level,
            'percentage' => $request->percentage,
            'category'   => $request->category ?: null,
            'icon'       => $request->icon ?: null,
            'is_active'  => $request->boolean('is_active', true),
            'order'      => $request->input('order', 0),
        ]);

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted.');
    }
}
