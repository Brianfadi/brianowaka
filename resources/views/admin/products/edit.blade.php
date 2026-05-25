@extends('layouts.admin')
@section('page-title', 'Edit Product')
@section('page-subtitle', $product->name)

@section('content')

<div class="mb-4 flex items-center justify-between">
    <a href="{{ route('admin.products.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Products</a>
    <a href="{{ route('admin.products.show', $product) }}"
       class="inline-flex items-center gap-1.5 text-sm text-gray-400 hover:text-white transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>
        Preview
    </a>
</div>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Basic Info</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Product Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                           class="form-input" oninput="generateSlug(this.value)">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug', $product->slug) }}"
                           class="form-input font-mono text-xs text-gray-400">
                </div>
                <div>
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-input">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                    <input type="text" name="short_description" value="{{ old('short_description', $product->short_description) }}"
                           maxlength="500" class="form-input">
                </div>
                <div>
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" rows="5" required class="form-input">{{ old('description', $product->description) }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Key Features <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="features" rows="5" class="form-input text-xs">{{ old('features', is_array($product->features) ? implode("\n", $product->features) : '') }}</textarea>
                </div>
                <div>
                    <label class="form-label">Technologies Used <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="technologies" rows="4" class="form-input font-mono text-xs">{{ old('technologies', is_array($product->technologies) ? implode("\n", $product->technologies) : '') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Media --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Screenshots / Media</h2>
            @if($product->images && count($product->images) > 0)
            <div class="grid grid-cols-3 sm:grid-cols-4 gap-2 mb-4">
                @foreach($product->images as $img)
                <div class="aspect-video bg-gray-800 rounded-lg overflow-hidden">
                    <img src="{{ $img }}" alt="" class="w-full h-full object-cover">
                </div>
                @endforeach
            </div>
            @endif
            <div>
                <label class="form-label">Image URLs <span class="text-gray-600">(one per line — replaces current)</span></label>
                <textarea name="images" rows="4" class="form-input font-mono text-xs">{{ old('images', is_array($product->images) ? implode("\n", $product->images) : '') }}</textarea>
            </div>
        </div>

        {{-- Files --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Downloadable Files</h2>
            <p class="text-xs text-gray-600 mb-4">Upload a new file to replace the existing one.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">System File <span class="text-gray-600">(ZIP / RAR)</span></label>
                    @if($product->file_path)
                        <div class="flex items-center gap-2 mb-2 px-3 py-2 bg-blue-900/20 border border-blue-800/40 rounded-lg">
                            <svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-xs text-blue-400 truncate">{{ basename($product->file_path) }}</span>
                        </div>
                    @endif
                    <input type="file" name="file" accept=".zip,.rar"
                           class="w-full text-sm text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-700 file:text-gray-300 hover:file:bg-gray-600 file:cursor-pointer">
                </div>
                <div>
                    <label class="form-label">Documentation <span class="text-gray-600">(PDF)</span></label>
                    @if($product->documentation_path)
                        <div class="flex items-center gap-2 mb-2 px-3 py-2 bg-orange-900/20 border border-orange-800/40 rounded-lg">
                            <svg class="w-4 h-4 text-orange-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="text-xs text-orange-400 truncate">{{ basename($product->documentation_path) }}</span>
                        </div>
                    @endif
                    <input type="file" name="documentation" accept=".pdf"
                           class="w-full text-sm text-gray-400 file:mr-3 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-gray-700 file:text-gray-300 hover:file:bg-gray-600 file:cursor-pointer">
                </div>
            </div>
        </div>

        {{-- Demo & Links --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Demo & Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Live Demo URL</label>
                    <input type="url" name="demo_link" value="{{ old('demo_link', $product->demo_link) }}" class="form-input">
                </div>
                <div>
                    <label class="form-label">Demo Credentials</label>
                    <input type="text" name="demo_credentials" value="{{ old('demo_credentials', $product->demo_credentials) }}"
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
                           {{ old('status', $product->status) === 'draft' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Draft</p>
                        <p class="text-xs text-gray-500">Not visible to buyers</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-green-600 transition-colors">
                    <input type="radio" name="status" value="published"
                           class="text-green-500 focus:ring-green-500 focus:ring-offset-gray-900"
                           {{ old('status', $product->status) === 'published' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Published</p>
                        <p class="text-xs text-gray-500">Live in the store</p>
                    </div>
                </label>
            </div>
            <div class="mt-4 pt-4 border-t border-gray-800">
                <button type="submit"
                        class="w-full px-3 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Update Product
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
                        <option value="fixed"   {{ old('pricing_type', $product->pricing_type) === 'fixed'   ? 'selected' : '' }}>Fixed Price</option>
                        <option value="contact" {{ old('pricing_type', $product->pricing_type) === 'contact' ? 'selected' : '' }}>Contact for Price</option>
                    </select>
                </div>
                <div id="price_fields">
                    <div class="mb-3">
                        <label class="form-label">Price (KES)</label>
                        <input type="number" name="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" class="form-input">
                    </div>
                    <div>
                        <label class="form-label">Discount Price <span class="text-gray-600">(optional)</span></label>
                        <input type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" step="0.01" min="0" class="form-input">
                    </div>
                </div>
            </div>
        </div>

        {{-- Visibility --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Visibility</h2>
            <div class="space-y-3">
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-purple-600 focus:ring-purple-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Featured Product</p>
                        <p class="text-xs text-gray-600">Highlighted on homepage</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-green-600 focus:ring-green-500 focus:ring-offset-gray-900">
                    <div>
                        <p class="text-sm text-gray-300">Active</p>
                        <p class="text-xs text-gray-600">Visible in store listings</p>
                    </div>
                </label>
            </div>
        </div>

        {{-- Stats --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Stats</h2>
            <dl class="space-y-2 text-sm">
                <div class="flex justify-between">
                    <dt class="text-gray-500">Downloads</dt>
                    <dd class="text-white font-medium">{{ number_format($product->downloads) }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Created</dt>
                    <dd class="text-gray-300">{{ $product->created_at->format('M d, Y') }}</dd>
                </div>
                <div class="flex justify-between">
                    <dt class="text-gray-500">Updated</dt>
                    <dd class="text-gray-300">{{ $product->updated_at->diffForHumans() }}</dd>
                </div>
            </dl>
        </div>

    </div>
</div>

</form>

{{-- Delete (outside update form) --}}
<div class="mt-6 xl:grid xl:grid-cols-3 xl:gap-6">
    <div class="xl:col-span-2"></div>
    <div>
        <div class="bg-gray-900 border border-red-900/40 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-red-500/70 uppercase tracking-wider mb-3">Danger Zone</h2>
            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                  onsubmit="return confirm('Permanently delete \'{{ addslashes($product->name) }}\'?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-900/40 hover:bg-red-900/70 text-red-400 text-sm font-medium rounded-lg transition-colors">
                    Delete Product
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
function generateSlug(name) {
    document.getElementById('slug').value = name.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '').replace(/\s+/g, '-').replace(/-+/g, '-').trim();
}
document.addEventListener('DOMContentLoaded', function() {
    const pt = document.getElementById('pricing_type');
    if (pt) document.getElementById('price_fields').style.display = pt.value === 'contact' ? 'none' : 'block';
});
</script>

@endsection
