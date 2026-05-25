<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    public function index()
    {
        $education = Education::ordered()->paginate(20);
        return view('admin.education.index', compact('education'));
    }

    public function create()
    {
        return view('admin.education.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string',
            'grade' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('education', 'public');
        }

        $validated['is_current'] = $request->has('is_current');
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        // If is_current is true, set end_date to null
        if ($validated['is_current']) {
            $validated['end_date'] = null;
        }

        Education::create($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record created successfully.');
    }

    public function edit(Education $education)
    {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'is_current' => 'boolean',
            'description' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*' => 'string',
            'grade' => 'nullable|string|max:50',
            'logo' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            if ($education->logo) {
                Storage::disk('public')->delete($education->logo);
            }
            $validated['logo'] = $request->file('logo')->store('education', 'public');
        }

        $validated['is_current'] = $request->has('is_current');
        $validated['is_active'] = $request->has('is_active');
        $validated['order'] = $validated['order'] ?? 0;

        // If is_current is true, set end_date to null
        if ($validated['is_current']) {
            $validated['end_date'] = null;
        }

        $education->update($validated);

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record updated successfully.');
    }

    public function destroy(Education $education)
    {
        if ($education->logo) {
            Storage::disk('public')->delete($education->logo);
        }

        $education->delete();

        return redirect()->route('admin.education.index')
            ->with('success', 'Education record deleted successfully.');
    }
}
