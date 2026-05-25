<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertisements = Advertisement::ordered()->paginate(10);
        
        return view('admin.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'badge_text' => 'nullable|string|max:100',
            'badge_icon' => 'nullable|string|max:50',
            'theme_color' => 'required|in:blue,emerald,pink,indigo',
            'original_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'primary_button_text' => 'required|string|max:100',
            'primary_button_url' => 'required|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'showcase_items' => 'nullable|array',
            'showcase_items.*.icon' => 'nullable|string|max:50',
            'showcase_items.*.title' => 'nullable|string|max:100',
            'visual_type' => 'required|in:grid,mockup,icon,custom',
            'custom_visual_html' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        
        // Filter out empty features and showcase items
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features'], function($feature) {
                return !empty(trim($feature));
            });
        }
        
        if (isset($data['showcase_items'])) {
            $data['showcase_items'] = array_filter($data['showcase_items'], function($item) {
                return !empty(trim($item['title'] ?? ''));
            });
        }

        Advertisement::create($data);

        return redirect()->route('admin.advertisements.index')
            ->with('success', 'Advertisement created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        return view('admin.advertisements.show', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'badge_text' => 'nullable|string|max:100',
            'badge_icon' => 'nullable|string|max:50',
            'theme_color' => 'required|in:blue,emerald,pink,indigo',
            'original_price' => 'nullable|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'price_label' => 'nullable|string|max:100',
            'primary_button_text' => 'required|string|max:100',
            'primary_button_url' => 'required|string|max:255',
            'secondary_button_text' => 'nullable|string|max:100',
            'secondary_button_url' => 'nullable|string|max:255',
            'features' => 'nullable|array',
            'features.*' => 'string|max:255',
            'showcase_items' => 'nullable|array',
            'showcase_items.*.icon' => 'nullable|string|max:50',
            'showcase_items.*.title' => 'nullable|string|max:100',
            'visual_type' => 'required|in:grid,mockup,icon,custom',
            'custom_visual_html' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        
        // Filter out empty features and showcase items
        if (isset($data['features'])) {
            $data['features'] = array_filter($data['features'], function($feature) {
                return !empty(trim($feature));
            });
        }
        
        if (isset($data['showcase_items'])) {
            $data['showcase_items'] = array_filter($data['showcase_items'], function($item) {
                return !empty(trim($item['title'] ?? ''));
            });
        }

        $advertisement->update($data);

        return redirect()->route('admin.advertisements.index')
            ->with('success', 'Advertisement updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        $advertisement->delete();

        return redirect()->route('admin.advertisements.index')
            ->with('success', 'Advertisement deleted successfully!');
    }

    /**
     * Toggle advertisement status
     */
    public function toggle(Advertisement $advertisement)
    {
        $advertisement->update([
            'is_active' => !$advertisement->is_active
        ]);

        $status = $advertisement->is_active ? 'activated' : 'deactivated';
        
        return redirect()->back()
            ->with('success', "Advertisement {$status} successfully!");
    }
}
