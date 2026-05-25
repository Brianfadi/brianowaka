<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingTier;
use Illuminate\Http\Request;

class PricingTierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricingTiers = PricingTier::ordered()->get();
        return view('admin.pricing-tiers.index', compact('pricingTiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pricing-tiers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'is_featured' => 'boolean',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        PricingTier::create($validated);

        return redirect()->route('admin.pricing-tiers.index')
            ->with('success', 'Pricing tier created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PricingTier $pricingTier)
    {
        return view('admin.pricing-tiers.show', compact('pricingTier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PricingTier $pricingTier)
    {
        return view('admin.pricing-tiers.edit', compact('pricingTier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PricingTier $pricingTier)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'description' => 'required|string',
            'is_featured' => 'boolean',
            'order' => 'required|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['is_featured'] = $request->has('is_featured');
        $validated['is_active'] = $request->has('is_active');

        $pricingTier->update($validated);

        return redirect()->route('admin.pricing-tiers.index')
            ->with('success', 'Pricing tier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PricingTier $pricingTier)
    {
        $pricingTier->delete();

        return redirect()->route('admin.pricing-tiers.index')
            ->with('success', 'Pricing tier deleted successfully.');
    }
}
