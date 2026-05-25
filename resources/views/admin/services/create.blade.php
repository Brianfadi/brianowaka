@extends('layouts.admin')
@section('page-title', 'Add Service')
@section('page-subtitle', 'Create a new service offering')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Services</a>
</div>

<form action="{{ route('admin.services.store') }}" method="POST">
@csrf

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Basic Info</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Service Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="form-input" placeholder="e.g. Custom Web Application Development"
                           oninput="generateSlug(this.value)">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="form-input font-mono text-xs text-gray-400">
                    <p class="text-xs text-gray-600 mt-1">Auto-generated. Edit if needed.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Icon Class <span class="text-gray-600">(FontAwesome)</span></label>
                        <input type="text" name="icon" value="{{ old('icon') }}"
                               class="form-input font-mono text-xs" placeholder="fas fa-code">
                        <p class="text-xs text-gray-600 mt-1">e.g. fas fa-code, fas fa-paint-brush</p>
                    </div>
                    <div>
                        <label class="form-label">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                               class="form-input">
                        <p class="text-xs text-gray-600 mt-1">Lower = shown first</p>
                    </div>
                </div>
                <div>
                    <label class="form-label">Banner Image URL <span class="text-gray-600">(optional)</span></label>
                    <input type="url" name="image" value="{{ old('image') }}"
                           class="form-input" placeholder="https://example.com/service-banner.jpg">
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Description</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Short Description</label>
                    <input type="text" name="short_description" value="{{ old('short_description') }}" maxlength="500"
                           class="form-input" placeholder="One-line summary shown in service cards">
                </div>
                <div>
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" rows="5" required class="form-input"
                              placeholder="Detailed description of what this service includes...">{{ old('description') }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Features --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Features / What's Included</h2>
            <p class="text-xs text-gray-600 mb-4">These appear as bullet points on the services page.</p>
            <textarea name="features" rows="7" class="form-input text-xs"
                      placeholder="Custom system development&#10;Secure authentication&#10;API integrations&#10;Mobile responsive design&#10;6 months support">{{ old('features') }}</textarea>
            <p class="text-xs text-gray-600 mt-1">One feature per line.</p>
        </div>

    </div>

    {{-- ===== RIGHT ===== --}}
    <div class="space-y-5">

        {{-- Status --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Status</h2>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-yellow-600 transition-colors">
                    <input type="radio" name="status" value="draft"
                           class="text-yellow-500 focus:ring-yellow-500 focus:ring-offset-gray-900"
                           {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Draft</p>
                        <p class="text-xs text-gray-500">Not visible on services page</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-green-600 transition-colors">
                    <input type="radio" name="status" value="published"
                           class="text-green-500 focus:ring-green-500 focus:ring-offset-gray-900"
                           {{ old('status') === 'published' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Published</p>
                        <p class="text-xs text-gray-500">Live on services page</p>
                    </div>
                </label>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-800 flex gap-2">
                <button type="submit" name="status" value="draft"
                        class="flex-1 px-3 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                    Save Draft
                </button>
                <button type="submit" name="status" value="published"
                        class="flex-1 px-3 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Publish
                </button>
            </div>
        </div>

        {{-- Pricing --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Pricing</h2>
            <div class="space-y-3">
                <div>
                    <label class="form-label">Pricing Type</label>
                    <select name="pricing_type" id="pricing_type" class="form-input"
                            onchange="handlePricingType(this.value)">
                        <option value="fixed"   {{ old('pricing_type', 'fixed') === 'fixed'   ? 'selected' : '' }}>Fixed Price</option>
                        <option value="from"    {{ old('pricing_type') === 'from'    ? 'selected' : '' }}>Starting From</option>
                        <option value="hourly"  {{ old('pricing_type') === 'hourly'  ? 'selected' : '' }}>Hourly Rate</option>
                        <option value="contact" {{ old('pricing_type') === 'contact' ? 'selected' : '' }}>Contact for Price</option>
                        <option value="custom"  {{ old('pricing_type') === 'custom'  ? 'selected' : '' }}>Custom Pricing</option>
                    </select>
                </div>

                <div id="price_field">
                    <label class="form-label" id="price_label">Price (KES)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" class="form-input">
                </div>

                <div id="starting_field" style="display:none">
                    <label class="form-label">Starting From Text</label>
                    <input type="text" name="starting_price" value="{{ old('starting_price') }}"
                           class="form-input" placeholder="From KES 10,000">
                </div>
            </div>
        </div>

        {{-- Visibility --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Visibility</h2>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-purple-600 focus:ring-purple-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Featured Service</p>
                        <p class="text-xs text-gray-600">Highlighted on homepage</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Visible in services listing</p>
                    </div>
                </label>
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

<script>
function generateSlug(title) {
    document.getElementById('slug').value = title.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
}

function handlePricingType(type) {
    const priceField    = document.getElementById('price_field');
    const startingField = document.getElementById('starting_field');
    const priceLabel    = document.getElementById('price_label');

    priceField.style.display    = ['fixed','hourly'].includes(type) ? 'block' : 'none';
    startingField.style.display = type === 'from' ? 'block' : 'none';
    priceLabel.textContent      = type === 'hourly' ? 'Hourly Rate (KES)' : 'Price (KES)';
}

document.addEventListener('DOMContentLoaded', () => handlePricingType(document.getElementById('pricing_type').value));
</script>

@endsection
