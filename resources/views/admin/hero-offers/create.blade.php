@extends('layouts.admin')
@section('page-title', 'Add Hero Offer')
@section('page-subtitle', 'Create a new Premium Web Solutions card for the homepage hero')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.hero-offers.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Hero Offers</a>
</div>

<form action="{{ route('admin.hero-offers.store') }}" method="POST" id="heroOfferForm">
@csrf

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Header Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Header</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Badge Text *</label>
                    <input type="text" name="badge_text" value="{{ old('badge_text', '🔥 LIMITED TIME OFFER') }}" required class="form-input" placeholder="🔥 LIMITED TIME OFFER">
                    @error('badge_text')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">The small badge shown above the title (e.g., "🔥 LIMITED TIME OFFER")</p>
                </div>
                <div>
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title', 'Premium Web Solutions') }}" required class="form-input" placeholder="Premium Web Solutions">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Subtitle *</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', 'Transform your business with cutting-edge technology') }}" required class="form-input" placeholder="Transform your business with cutting-edge technology">
                    @error('subtitle')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Features Grid --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Feature Grid (2×2 Cards)</h2>
            <p class="text-xs text-gray-600 mb-4">One feature per line. Format: <code class="text-purple-400">emoji|Title|gradient-from|gradient-to</code></p>
            <textarea name="features" rows="6" required class="form-input font-mono text-xs"
                      placeholder="🚀|Fast Deploy|blue-500|cyan-500&#10;⚡|High Performance|green-500|emerald-500&#10;🔒|Secure|purple-500|pink-500&#10;📱|Responsive|orange-500|red-500">{{ old('features', "🚀|Fast Deploy|blue-500|cyan-500\n⚡|High Performance|green-500|emerald-500\n🔒|Secure|purple-500|pink-500\n📱|Responsive|orange-500|red-500") }}</textarea>
            @error('features')<p class="form-error">{{ $message }}</p>@enderror
            <p class="text-xs text-gray-600 mt-1">Tailwind color names only (e.g., blue-500, green-400, purple-600)</p>
        </div>

        {{-- Benefits List --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Benefits / Offer Details</h2>
            <p class="text-xs text-gray-600 mb-4">One benefit per line — shown as checkmark list items</p>
            <textarea name="benefits" rows="5" required class="form-input"
                      placeholder="Custom Web Application Development&#10;Mobile-First Responsive Design&#10;SEO Optimization & Performance">{{ old('benefits', "Custom Web Application Development\nMobile-First Responsive Design\nSEO Optimization & Performance") }}</textarea>
            @error('benefits')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        {{-- Pricing --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Pricing</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Regular Price <span class="text-gray-600">(optional, shown struck-through)</span></label>
                    <input type="text" name="regular_price" value="{{ old('regular_price', 'KES 150,000') }}" class="form-input" placeholder="KES 150,000">
                    @error('regular_price')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Offer Price *</label>
                    <input type="text" name="offer_price" value="{{ old('offer_price', 'KES 99,000') }}" required class="form-input" placeholder="KES 99,000">
                    @error('offer_price')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
            <div class="mt-4">
                <label class="form-label">Savings Text <span class="text-gray-600">(optional)</span></label>
                <input type="text" name="savings_text" value="{{ old('savings_text', 'Save KES 51,000 - Limited Time Only!') }}" class="form-input" placeholder="Save KES 51,000 - Limited Time Only!">
                @error('savings_text')<p class="form-error">{{ $message }}</p>@enderror
            </div>
        </div>

        {{-- CTA Buttons --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Call to Action Buttons</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Primary Button Text *</label>
                    <input type="text" name="cta_text" value="{{ old('cta_text', '🚀 Get Started Now') }}" required class="form-input" placeholder="🚀 Get Started Now">
                    @error('cta_text')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Primary Button Link *</label>
                    <input type="text" name="cta_link" value="{{ old('cta_link', '#contact') }}" required class="form-input" placeholder="#contact or /contact">
                    @error('cta_link')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Secondary Button Text <span class="text-gray-600">(optional)</span></label>
                    <input type="text" name="secondary_cta_text" value="{{ old('secondary_cta_text', 'View Portfolio') }}" class="form-input" placeholder="View Portfolio">
                </div>
                <div>
                    <label class="form-label">Secondary Button Link <span class="text-gray-600">(optional)</span></label>
                    <input type="text" name="secondary_cta_link" value="{{ old('secondary_cta_link', '/portfolio') }}" class="form-input" placeholder="/portfolio">
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
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Show on homepage hero section</p>
                    </div>
                </label>
            </div>
            <div class="mt-4">
                <label class="form-label">Display Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" min="0" class="form-input">
                <p class="text-xs text-gray-600 mt-1">Only the first active offer is shown</p>
            </div>
        </div>

        {{-- Preview Note --}}
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
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Create Hero Offer
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

<style>
.form-label { display: block; font-size: 0.75rem; font-weight: 500; color: #9ca3af; margin-bottom: 0.375rem; }
.form-input { width: 100%; background: #1f2937; border: 1px solid #374151; color: #fff; border-radius: 0.5rem; padding: 0.625rem 0.75rem; font-size: 0.875rem; }
.form-input:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 1px #3b82f6; }
.form-error { margin-top: 0.25rem; font-size: 0.75rem; color: #f87171; }
</style>

@endsection
