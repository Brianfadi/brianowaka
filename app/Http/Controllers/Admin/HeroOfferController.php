<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroOffer;
use Illuminate\Http\Request;

class HeroOfferController extends Controller
{
    public function index()
    {
        $heroOffers = HeroOffer::ordered()->get();
        return view('admin.hero-offers.index', compact('heroOffers'));
    }

    public function create()
    {
        return view('admin.hero-offers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'badge_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'features' => 'required|string',
            'benefits' => 'required|string',
            'regular_price' => 'nullable|string|max:50',
            'offer_price' => 'required|string|max:50',
            'savings_text' => 'nullable|string|max:255',
            'cta_text' => 'required|string|max:100',
            'cta_link' => 'required|string|max:255',
            'secondary_cta_text' => 'nullable|string|max:100',
            'secondary_cta_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'required|integer|min:0',
        ]);

        // Parse features and benefits from textarea
        $validated['features'] = $this->parseFeatures($request->features);
        $validated['benefits'] = array_filter(array_map('trim', explode("\n", $request->benefits)));
        $validated['is_active'] = $request->has('is_active');

        HeroOffer::create($validated);

        return redirect()->route('admin.hero-offers.index')
            ->with('success', 'Hero offer created successfully.');
    }

    public function edit(HeroOffer $heroOffer)
    {
        return view('admin.hero-offers.edit', compact('heroOffer'));
    }

    public function update(Request $request, HeroOffer $heroOffer)
    {
        $validated = $request->validate([
            'badge_text' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:500',
            'features' => 'required|string',
            'benefits' => 'required|string',
            'regular_price' => 'nullable|string|max:50',
            'offer_price' => 'required|string|max:50',
            'savings_text' => 'nullable|string|max:255',
            'cta_text' => 'required|string|max:100',
            'cta_link' => 'required|string|max:255',
            'secondary_cta_text' => 'nullable|string|max:100',
            'secondary_cta_link' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'order' => 'required|integer|min:0',
        ]);

        // Parse features and benefits from textarea
        $validated['features'] = $this->parseFeatures($request->features);
        $validated['benefits'] = array_filter(array_map('trim', explode("\n", $request->benefits)));
        $validated['is_active'] = $request->has('is_active');

        $heroOffer->update($validated);

        return redirect()->route('admin.hero-offers.index')
            ->with('success', 'Hero offer updated successfully.');
    }

    public function destroy(HeroOffer $heroOffer)
    {
        $heroOffer->delete();

        return redirect()->route('admin.hero-offers.index')
            ->with('success', 'Hero offer deleted successfully.');
    }

    /**
     * Parse features from textarea format
     * Format: emoji|title|gradient-from|gradient-to
     */
    private function parseFeatures($featuresText)
    {
        $lines = array_filter(array_map('trim', explode("\n", $featuresText)));
        $features = [];

        foreach ($lines as $line) {
            $parts = array_map('trim', explode('|', $line));
            if (count($parts) >= 2) {
                $features[] = [
                    'icon' => $parts[0] ?? '🚀',
                    'title' => $parts[1] ?? '',
                    'gradient_from' => $parts[2] ?? 'blue-500',
                    'gradient_to' => $parts[3] ?? 'cyan-500',
                ];
            }
        }

        return $features;
    }
}
