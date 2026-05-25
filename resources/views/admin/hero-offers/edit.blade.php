@extends('layouts.admin')
@section('page-title', 'Edit Hero Offer')
@section('page-subtitle', 'Update the Premium Web Solutions card')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.hero-offers.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Hero Offers</a>
</div>

@php
    // Convert features array back to textarea format
    $featuresText = collect($heroOffer->features ?? [])->map(fn($f) =>
        ($f['icon'] ?? '🚀') . '|' . ($f['title'] ?? '') . '|' . ($f['gradient_from'] ?? 'blue-500') . '|' . ($f['gradient_to'] ?? 'cyan-500')
    )->implode("\n");

    // Convert benefits array back to textarea format
    $benefitsText = implode("\n", $heroOffer->benefits ?? []);
@endphp

<form action="{{ route('admin.hero-offers.update', $heroOffer) }}" method="POST" id="heroOfferForm">
@csrf
@method('PUT')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Header Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Header</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Badge Text *</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', $heroOffer->badge_text) }}" required class="form-input" placeholder="🔥 LIMITED TIME OFFER">
                    @error('badge_text')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">The small badge shown above the title</p>
                </div>
                <div>
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $heroOffer->title) }}" required class="form-input">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Subtitle *</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $heroOffer->subtitle) }}" required class="form-input">
                    @error('subtitle')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Features Grid --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Feature Grid (2×2 Cards)</h2>
            <p class="text-xs text-gray-600 mb-4">One feature per line. Format: <code class="text-purple-400">emoji|Title|gradient-from|gradient-to</code></p>
            <textarea name="features" rows="6" required class="form-input font-mono text-xs">{{ old('features', $featuresText) }}</textarea>
            @error('features')<p class="form-error">{{ $message }}</p>@enderror
            <p class="text-xs text-gray-600 mt-1">Tailwind color names only (e.g., blue-500, green-400, purple-600)</p>
        </div>

        {{-- Benefits List --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Benefits / Offer Details</h2>
            <p class="text-xs text-gray-600 mb-4">One benefit per line — shown as checkmark list items</p>
            <textarea name="benefits" rows="5" required class="form-input">{{ old('benefits', $benefitsText) }}</textarea>
            @error('benefits')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        {{-- Pricing --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Pricing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Regular Price <span class="text-gray-600">(optional, shown struck-through)</span></label>
                    <input type="text" name="regular_price" value="{{ old('regular_price', $heroOffer->regular_price) }}" class="form-input" placeholder="KES 150,000">
                </div>
                <div>
                    <label class="form-label">Offer Price *</label>
                    <input type="text" name="offer_price" value="{{ old('offer_price', $heroOffer->offer_price) }}" required class="form-input" placeholder="KES 99,000">
                    @error('offer_price')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-4">
                <label class="form-label">Savings Text <span class="text-gray-600">(optional)</span></label>
                <input type="text" name="savings_text" value="{{ old('savings_text', $heroOffer->savings_text) }}" class="form-input" placeholder="Save KES 51,000 - Limited Time Only!">
            </div>
        </div>

        {{-- CTA Buttons --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Call to Action Buttons</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Primary Button Text *</label>
                    <input type="text" name="cta_text" value="{{ old('cta_text', $heroOffer->cta_text) }}" required class="form-input">
                    @error('cta_text')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Primary Button Link *</label>
                    <input type="text" name="cta_link" value="{{ old('cta_link', $heroOffer->cta_link) }}" required class="form-input">
                    @error('cta_link')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Secondary Button Text <span class="text-gray-600">(optional)</span></label>
                    <input type="text" name="secondary_cta_text" value="{{ old('secondary_cta_text', $heroOffer->secondary_cta_text) }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">Secondary Button Link <span class="text-gray-600">(optional)</span></label>
                    <input type="text" name="secondary_cta_link" value="{{ old('secondary_cta_link', $heroOffer->secondary_cta_link) }}" class="form-input">
                </div>
            </div>
        </div>

    </div>

    {{-- ===== RIGHT ===== --}}
    <div class="space-y-5">

        {{-- Settings --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Settings</h2>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $heroOffer->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Show on homepage hero section</p>
                    </div>
                </label>
            </div>
            <div class="mt-4">
                <label class="form-label">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $heroOffer->order) }}" min="0" class="form-input">
                <p class="text-xs text-gray-600 mt-1">Only the first active offer is shown</p>
            </div>
        </div>

        {{-- Format Guide --}}
        <div class="bg-gray-900 border border-yellow-800/40 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-yellow-500 uppercase tracking-wider mb-3">💡 Format Guide</h2>
            <div class="space-y-2 text-xs text-gray-400">
                <p><span class="text-yellow-400 font-semibold">Features format:</span></p>
                <code class="block bg-gray-800 rounded p-2 text-purple-300 leading-relaxed">
                    🚀|Fast Deploy|blue-500|cyan-500<br>
                    ⚡|High Performance|green-500|emerald-500<br>
                    🔒|Secure|purple-500|pink-500<br>
                    📱|Responsive|orange-500|red-500
                </code>
                <p class="mt-2"><span class="text-yellow-400 font-semibold">Benefits format:</span></p>
                <code class="block bg-gray-800 rounded p-2 text-purple-300 leading-relaxed">
                    Custom Web Development<br>
                    Mobile-First Design<br>
                    SEO Optimization
                </code>
            </div>
        </div>

        {{-- Actions --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Actions</h2>
            <div class="flex flex-col gap-2">
                <button type="submit" form="heroOfferForm"
                        class="w-full px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Update Hero Offer
                </button>
                <a href="{{ route('admin.hero-offers.index') }}"
                   class="w-full px-4 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-sm font-medium rounded-lg transition-colors text-center">
                    Cancel
                </a>
            </div>
        </div>

    </div>
</div>

</form>

{{-- Delete Form (Separate) --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-6">
    <div class="xl:col-span-2"></div>
    <div>
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-red-400 uppercase tracking-wider mb-4">Danger Zone</h2>
            <form action="{{ route('admin.hero-offers.destroy', $heroOffer) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this hero offer?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Delete Hero Offer
                </button>
            </form>
        </div>
    </div>
</div>

<style>
.form-label { display: block; font-size: 0.75rem; font-weight: 500; color: #9ca3af; margin-bottom: 0.375rem; }
.form-input { width: 100%; background: #1f2937; border: 1px solid #374151; color: #fff; border-radius: 0.5rem; padding: 0.625rem 0.75rem; font-size: 0.875rem; }
.form-input:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 1px #3b82f6; }
.form-error { margin-top: 0.25rem; font-size: 0.75rem; color: #f87171; }
</style>

@endsection
