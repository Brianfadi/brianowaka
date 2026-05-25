@extends('layouts.admin')
@section('page-title', 'Edit Service')
@section('page-subtitle', $service->title)

@section('content')

<div class="mb-4 flex items-center justify-between">
    <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Services</a>
    <a href="{{ route('admin.services.show', $service) }}"
       class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-white transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
        Preview
    </a>
</div>

<form action="{{ route('admin.services.update', $service) }}" method="POST">
@csrf @method('PUT')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Basic Info</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Service Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required
                           class="form-input" oninput="generateSlug(this.value)">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}"
                           class="form-input font-mono text-xs text-gray-400">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Icon Class <span class="text-gray-600">(FontAwesome)</span></label>
                        <input type="text" name="icon" value="{{ old('icon', $service->icon) }}"
                               class="form-input font-mono text-xs" placeholder="fas fa-code">
                    </div>
                    <div>
                        <label class="form-label">Display Order</label>
                        <input type="number" name="order" value="{{ old('order', $service->order) }}" min="0" class="form-input">
                    </div>
                </div>
                <div>
                    <label class="form-label">Banner Image URL</label>
                    <input type="url" name="image" value="{{ old('image', $service->image) }}" class="form-input">
                    @if($service->image)
                        <div class="mt-2 h-24 bg-gray-800 rounded-lg overflow-hidden">
                            <img src="{{ $service->image }}" alt="" class="w-full h-full object-cover">
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Description --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Description</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Short Description</label>
                    <input type="text" name="short_description" value="{{ old('short_description', $service->short_description) }}"
                           maxlength="500" class="form-input">
                </div>
                <div>
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" rows="5" required class="form-input">{{ old('description', $service->description) }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Features --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Features / What's Included</h2>
            <p class="text-xs text-gray-600 mb-4">One feature per line.</p>
            <textarea name="features" rows="7" class="form-input text-xs">{{ old('features', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
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
                           {{ old('status', $service->status) === 'draft' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Draft</p>
                        <p class="text-xs text-gray-500">Not visible on services page</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-green-600 transition-colors">
                    <input type="radio" name="status" value="published"
                           class="text-green-500 focus:ring-green-500 focus:ring-offset-gray-900"
                           {{ old('status', $service->status) === 'published' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Published</p>
                        <p class="text-xs text-gray-500">Live on services page</p>
                    </div>
                </label>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-800">
                <button type="submit"
                        class="w-full px-3 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Update Service
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
                        <option value="fixed"   {{ old('pricing_type', $service->pricing_type) === 'fixed'   ? 'selected' : '' }}>Fixed Price</option>
                        <option value="from"    {{ old('pricing_type', $service->pricing_type) === 'from'    ? 'selected' : '' }}>Starting From</option>
                        <option value="hourly"  {{ old('pricing_type', $service->pricing_type) === 'hourly'  ? 'selected' : '' }}>Hourly Rate</option>
                        <option value="contact" {{ old('pricing_type', $service->pricing_type) === 'contact' ? 'selected' : '' }}>Contact for Price</option>
                        <option value="custom"  {{ old('pricing_type', $service->pricing_type) === 'custom'  ? 'selected' : '' }}>Custom Pricing</option>
                    </select>
                </div>
                <div id="price_field">
                    <label class="form-label" id="price_label">Price (KES)</label>
                    <input type="number" name="price" value="{{ old('price', $service->price) }}" step="0.01" min="0" class="form-input">
                </div>
                <div id="starting_field">
                    <label class="form-label">Starting From Text</label>
                    <input type="text" name="starting_price" value="{{ old('starting_price', $service->starting_price) }}"
                           class="form-input" placeholder="From KES 10,000">
                </div>
            </div>
        </div>

        {{-- Visibility --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Visibility</h2>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-purple-600 focus:ring-purple-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Featured Service</p>
                        <p class="text-xs text-gray-600">Highlighted on homepage</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}
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

{{-- Delete --}}
<div class="mt-6 xl:grid xl:grid-cols-3 xl:gap-6">
    <div class="xl:col-span-2"></div>
    <div>
        <div class="bg-gray-900 border border-red-900/40 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-red-500/70 uppercase tracking-wider mb-3">Danger Zone</h2>
            <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                  onsubmit="return confirm('Permanently delete \'{{ addslashes($service->title) }}\'?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-900/40 hover:bg-red-900/70 text-red-400 text-sm font-medium rounded-lg transition-colors">
                    Delete Service
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

<script>
function generateSlug(title) {
    document.getElementById('slug').value = title.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
}
function handlePricingType(type) {
    document.getElementById('price_field').style.display    = ['fixed','hourly'].includes(type) ? 'block' : 'none';
    document.getElementById('starting_field').style.display = type === 'from' ? 'block' : 'none';
    document.getElementById('price_label').textContent      = type === 'hourly' ? 'Hourly Rate (KES)' : 'Price (KES)';
}
document.addEventListener('DOMContentLoaded', () => handlePricingType(document.getElementById('pricing_type').value));
</script>

@endsection
