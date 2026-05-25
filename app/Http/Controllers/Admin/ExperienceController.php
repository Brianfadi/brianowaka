<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order')->orderByDesc('start_date')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company'      => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'location'     => 'nullable|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
            'achievements' => 'nullable|string',
            'order'        => 'nullable|integer|min:0',
        ]);

        $data['is_current']   = $request->boolean('is_current');
        $data['achievements'] = $this->parseTextarea($request->achievements);
        $data['duration']     = $this->buildDuration($data);

        if ($data['is_current']) {
            $data['end_date'] = null;
        }

        Experience::create($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience added.');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'company'      => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'location'     => 'nullable|string|max:255',
            'start_date'   => 'required|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
            'achievements' => 'nullable|string',
            'order'        => 'nullable|integer|min:0',
        ]);

        $data['is_current']   = $request->boolean('is_current');
        $data['achievements'] = $this->parseTextarea($request->achievements);
        $data['duration']     = $this->buildDuration($data);

        if ($data['is_current']) {
            $data['end_date'] = null;
        }

        $experience->update($data);

        return redirect()->route('admin.experiences.index')->with('success', 'Experience updated.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experiences.index')->with('success', 'Experience deleted.');
    }

    private function parseTextarea(?string $value): array
    {
        if (empty($value)) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $value))));
    }

    private function buildDuration(array $data): string
    {
        $start = \Carbon\Carbon::parse($data['start_date'])->format('M Y');
        $end   = $data['is_current'] ? 'Present' : \Carbon\Carbon::parse($data['end_date'])->format('M Y');
        return "$start – $end";
    }
}
