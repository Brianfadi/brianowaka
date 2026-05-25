@extends('layouts.admin')
@section('page-title', 'Add Project')
@section('page-subtitle', 'Create a new portfolio project')

@section('content')

<div class="mb-4">
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Projects</a>
</div>

<form action="{{ route('admin.projects.store') }}" method="POST">
@csrf

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ===== LEFT: Main Fields ===== --}}
    <div class="xl:col-span-2 space-y-5">

        {{-- Basic Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Basic Info</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Project Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required
                           class="form-input" placeholder="e.g. School Management System"
                           oninput="generateSlug(this.value)">
                    @error('title')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                           class="form-input font-mono text-xs text-gray-400" placeholder="auto-generated">
                    <p class="text-xs text-gray-600 mt-1">Auto-generated from title. Edit if needed.</p>
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
                           class="form-input" placeholder="One-line summary shown in cards and listings">
                    @error('short_description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Full Description *</label>
                    <textarea name="description" rows="5" required
                              class="form-input" placeholder="Detailed project description...">{{ old('description') }}</textarea>
                    @error('description')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        {{-- Project Details --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Project Details</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Tech Stack <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="tech_stack" rows="5" class="form-input font-mono text-xs"
                              placeholder="Laravel&#10;React&#10;MySQL&#10;TailwindCSS">{{ old('tech_stack') }}</textarea>
                </div>
                <div>
                    <label class="form-label">Key Features <span class="text-gray-600">(one per line)</span></label>
                    <textarea name="features" rows="5" class="form-input text-xs"
                              placeholder="User authentication&#10;Role-based access&#10;Reports & analytics">{{ old('features') }}</textarea>
                </div>
            </div>
        </div>

        {{-- Media --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Media</h2>
            <div>
                <label class="form-label">Image URLs <span class="text-gray-600">(one per line — first is featured)</span></label>
                <textarea name="images" rows="4" class="form-input font-mono text-xs"
                          placeholder="https://example.com/screenshot1.jpg&#10;https://example.com/screenshot2.jpg">{{ old('images') }}</textarea>
                <p class="text-xs text-gray-600 mt-1">The first URL will be used as the featured/cover image.</p>
            </div>
        </div>

        {{-- Links --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Demo & Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Demo Link</label>
                    <input type="url" name="demo_link" value="{{ old('demo_link') }}"
                           class="form-input" placeholder="https://demo.example.com">
                    @error('demo_link')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">GitHub Link <span class="text-gray-600">(optional)</span></label>
                    <input type="url" name="github_link" value="{{ old('github_link') }}"
                           class="form-input" placeholder="https://github.com/you/repo">
                    @error('github_link')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

    </div>

    {{-- ===== RIGHT: Sidebar Options ===== --}}
    <div class="space-y-5">

        {{-- Publish --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Status</h2>
            <div class="space-y-2">
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-yellow-600 transition-colors
                              {{ old('status', 'draft') === 'draft' ? 'border-yellow-600 bg-yellow-900/10' : '' }}">
                    <input type="radio" name="status" value="draft" class="text-yellow-500 focus:ring-yellow-500 focus:ring-offset-gray-900"
                           {{ old('status', 'draft') === 'draft' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Draft</p>
                        <p class="text-xs text-gray-500">Not visible on frontend</p>
                    </div>
                </label>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-700 cursor-pointer hover:border-green-600 transition-colors
                              {{ old('status') === 'published' ? 'border-green-600 bg-green-900/10' : '' }}">
                    <input type="radio" name="status" value="published" class="text-green-500 focus:ring-green-500 focus:ring-offset-gray-900"
                           {{ old('status') === 'published' ? 'checked' : '' }}>
                    <div>
                        <p class="text-sm font-medium text-white">Published</p>
                        <p class="text-xs text-gray-500">Visible on portfolio page</p>
                    </div>
                </label>
            </div>

            <div class="mt-4 pt-4 border-t border-gray-800 flex gap-2">
                <button type="submit" name="status" value="draft"
                        class="flex-1 px-3 py-2.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                    Save Draft
                </button>
                <button type="submit" name="status" value="published"
                        class="flex-1 px-3 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                    Publish
                </button>
            </div>
        </div>

        {{-- Pricing --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Pricing</h2>
            <div class="space-y-3">
                <div>
                    <label class="form-label">Price (KES)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" min="0"
                           class="form-input" placeholder="0.00">
                    @error('price')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <label class="flex items-center gap-3 cursor-pointer">
                    <input type="checkbox" name="is_for_sale" value="1" {{ old('is_for_sale') ? 'checked' : '' }}
                           class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-blue-600 focus:ring-blue-500 focus:ring-offset-gray-900">
                    <span class="text-sm text-gray-300">Available for Sale</span>
                </label>
            </div>
        </div>

        {{-- Visibility --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Visibility</h2>
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                       class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-purple-600 focus:ring-purple-500 focus:ring-offset-gray-900">
                <div>
                    <p class="text-sm text-gray-300">Featured Project</p>
                    <p class="text-xs text-gray-600">Highlighted on homepage</p>
                </div>
            </label>
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
    const slug = title.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-')
        .trim();
    document.getElementById('slug').value = slug;
}
</script>

@endsection
