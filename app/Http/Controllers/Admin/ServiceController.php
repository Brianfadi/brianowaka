<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::latest();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $services = $query->paginate(10)->withQueryString();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'icon'              => 'nullable|string|max:100',
        ]);

        $data = $request->except(['features', '_token']);
        $data['slug']        = Str::slug($request->title);
        $data['is_active']   = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status']      = $request->input('status', 'draft');
        $data['pricing_type']= $request->input('pricing_type', 'fixed');
        $data['order']       = $request->input('order', 0);
        $data['features']    = $this->parseTextarea($request->features);

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string|max:500',
            'description'       => 'required|string',
            'price'             => 'nullable|numeric|min:0',
            'icon'              => 'nullable|string|max:100',
        ]);

        $data = $request->except(['features', '_token', '_method']);
        $data['slug']        = Str::slug($request->title);
        $data['is_active']   = $request->boolean('is_active', true);
        $data['is_featured'] = $request->boolean('is_featured');
        $data['status']      = $request->input('status', 'draft');
        $data['pricing_type']= $request->input('pricing_type', 'fixed');
        $data['order']       = $request->input('order', 0);
        $data['features']    = $this->parseTextarea($request->features);

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    private function parseTextarea(?string $value): array
    {
        if (empty($value)) return [];
        return array_values(array_filter(array_map('trim', explode("\n", $value))));
    }
}
