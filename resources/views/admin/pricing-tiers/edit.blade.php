@extends('layouts.admin')
@section('page-title', 'Edit Pricing Tier')
@section('page-subtitle', 'Update pricing tier information')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.pricing-tiers.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Pricing Tiers</a>
</div>

<form action="{{ route('admin.pricing-tiers.update', $pricingTier) }}" method="POST" id="updateForm">
@csrf
@method('PUT')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Tier Information</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Tier Name *</label>
                    <input type="text" name="name" value="{{ old('name', $pricingTier->name) }}" required
                           class="form-input" placeholder="e.g. Basic, Standard, Enterprise">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">The name of the pricing tier (e.g., Basic, Standard, Enterprise)</p>
                </div>

                <div>
                    <label class="form-label">Price Range *</label>
                    <input type="text" name="price" value="{{ old('price', $pricingTier->price) }}" required
                           class="form-input" placeholder="e.g. KES 25K – 50K">
                    @error('price')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">The price or price range (e.g., KES 25K – 50K, KES 100K+)</p>
                </div>

                <div>
                    <label class="form-label">Description *</label>
                    <textarea name="description" rows="3" required class="form-input"
                              placeholder="Brief description of what's included in this tier...">{{ old('description', $pricingTier->description) }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">Short description of services included (e.g., UI/UX Design, Graphics, Small APIs)</p>
                </div>

                <div>
                    <label class="form-label">Display Order *</label>
                    <input type="number" name="order" value="{{ old('order', $pricingTier->order) }}" min="0" required
                           class="form-input">
                    @error('order')<p class="form-error">{{ $message }}</p>@enderror
                    <p class="text-xs text-gray-600 mt-1">Lower numbers appear first (0, 1, 2...)</p>
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
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $pricingTier->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-yellow-600 focus:ring-yellow-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Featured / Most Popular</p>
                        <p class="text-xs text-gray-600">Highlight this tier with special styling</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $pricingTier->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Show on services page</p>
                    </div>
                </label>
            </div>
        </div>

        {{-- Actions --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Actions</h2>
            <div class="flex flex-col gap-2">
                <button type="submit" form="updateForm"
                        class="w-full px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Update Pricing Tier
                </button>
                <a href="{{ route('admin.pricing-tiers.index') }}"
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
            <form action="{{ route('admin.pricing-tiers.destroy', $pricingTier) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this pricing tier?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Delete Pricing Tier
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
