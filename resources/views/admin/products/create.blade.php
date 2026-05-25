@extends('layouts.admin')
@section('page-title', 'Add Product')
@section('page-subtitle', 'Create a new product or system for sale')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Products</a>
</div>

<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Basic Info</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                           class="form-input" placeholder="e.g. School Management System"
                           oninput="generateSlug(this.value)">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="form-input font-mono text-xs text-gray-400">
                    <p class="text-xs text-gray-600 mt-1">Auto-generated. Edit if needed.</p>
                </div>
                <div>
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-input">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
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
                           class="form-input" placeholder="One-line summary shown in listings">
                </div>
                <div>
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" rows="5" required class="form-input"
                              placeholder="Detailed product description...">{{ old('description') }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Key Features <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="features" rows="5" class="form-input text-xs"
                              placeholder="Student registration&#10;Grade management&#10;Parent portal&#10;Fee management">{{ old('features') }}</textarea>
                </div>
                <div>
                    <label class="form-label">Technologies Used <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="technologies" rows="4" class="form-input font-mono text-xs"
                              placeholder="Laravel&#10;Vue.js&#10;MySQL&#10;TailwindCSS">{{ old('technologies') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Media --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Screenshots / Media</h2>
            <div>
                <label class="form-label">Image URLs <span class="text-gray-600">(one per line — first is featured)</span></label>
                <textarea name="images" rows="4" class="form-input font-mono text-xs"
                          placeholder="https://example.com/screenshot1.jpg&#10;https://example.com/screenshot2.jpg">{{ old('images') }}</textarea>
            </div>
        </div>

        {{-- Files --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Downloadable Files</h2>
            <p class="text-xs text-gray-600 mb-4">Files are stored securely and only delivered after purchase.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">System File <span class="text-gray-600">(ZIP / RAR, max 100MB)</span></label>
                    <input type="file" name="file" accept=".zip,.rar"
                           class="w-full text-sm text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-700 file:text-gray-300 hover:file:bg-gray-600 file:cursor-pointer">
                    @error('file')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Documentation <span class="text-gray-600">(PDF, max 20MB)</span></label>
                    <input type="file" name="documentation" accept=".pdf"
                           class="w-full text-sm text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-700 file:text-gray-300 hover:file:bg-gray-600 file:cursor-pointer">
                    @error('documentation')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Demo & Links --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Demo & Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Live Demo URL</label>
                    <input type="url" name="demo_link" value="{{ old('demo_link') }}"
                           class="form-input" placeholder="https://demo.example.com">
                    @error('demo_link')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Demo Credentials <span class="text-gray-600">(optional)</span></label>
                    <input type="text" name="demo_credentials" value="{{ old('demo_credentials') }}"
                           class="form-input" placeholder="admin / password123">
                </div>
            </div>
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
                        <p class="text-xs text-gray-500">Not visible to buyers</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-green-600 transition-colors">
                    <input type="radio" name="status" value="published"
                           class="text-green-500 focus:ring-green-500 focus:ring-offset-gray-900"
                           {{ old('status') === 'published' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Published</p>
                        <p class="text-xs text-gray-500">Live in the store</p>
                    </div>
                </label>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-800 flex gap-2">
                <button type="submit" name="status" value="draft"
                        class="flex-1 px-3 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                    Save Draft
                </button>
                <button type="submit" name="status" value="published"
                        class="flex-1 px-3 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
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
                    <select name="pricing_type" class="form-input" id="pricing_type"
                            onchange="document.getElementById('price_fields').style.display = this.value === 'contact' ? 'none' : 'block'">
                        <option value="fixed"   {{ old('pricing_type', 'fixed') === 'fixed'   ? 'selected' : '' }}>Fixed Price</option>
                        <option value="contact" {{ old('pricing_type') === 'contact' ? 'selected' : '' }}>Contact for Price</option>
                    </select>
                </div>
                <div id="price_fields">
                    <div class="mb-3">
                        <label class="form-label">Price (KES)</label>
                        <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0" class="form-input">
                        @error('price')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Discount Price <span class="text-gray-600">(optional)</span></label>
                        <input type="number" name="discount_price" value="{{ old('discount_price') }}" step="0.01" min="0" class="form-input">
                    </div>
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
                        <p class="text-sm text-gray-300">Featured Product</p>
                        <p class="text-xs text-gray-600">Highlighted on homepage</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Visible in store listings</p>
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
function generateSlug(name) {
    document.getElementById('slug').value = name.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
}
// Init pricing type visibility
document.addEventListener('DOMContentLoaded', function() {
    const pt = document.getElementById('pricing_type');
    if (pt) document.getElementById('price_fields').style.display = pt.value === 'contact' ? 'none' : 'block';
});
</script>

@endsection
