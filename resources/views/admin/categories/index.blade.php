@extends('layouts.admin')
@section('page-title', 'Categories')
@section('page-subtitle', 'Organise your projects, products and services')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6" x-data="categoryManager()">

    {{-- ===== LEFT: Create / Edit Panel ===== --}}
    <div class="xl:col-span-1">
        <div class="bg-gray-900 border border-gray-800 rounded-xl sticky top-6">

            {{-- Panel header --}}
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-800">
                <div>
                    <h2 class="text-sm font-semibold text-white" x-text="editing ? 'Edit Category' : 'New Category'"></h2>
                    <p class="text-xs text-gray-500 mt-0.5" x-text="editing ? 'Update the selected category' : 'Fill in the details below'"></p>
                </div>
                <button x-show="editing" @click="resetForm()"
                        class="text-xs text-gray-500 hover:text-white transition-colors px-2 py-1 rounded bg-gray-800 hover:bg-gray-700">
                    Cancel
                </button>
            </div>

            {{-- Create form --}}
            <form id="category-form" method="POST" :action="formAction" class="p-5 space-y-4">
                @csrf
                <input type="hidden" name="_method" x-bind:value="editing ? 'PUT' : 'POST'">

                {{-- Name --}}
                <div>
                    <label class="form-label">Category Name *</label>
                    <input type="text" name="name" x-model="form.name" required
                           class="form-input" placeholder="e.g. Web Development"
                           @input="generateSlug(form.name)">
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                {{-- Slug --}}
                <div>
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" x-model="form.slug"
                           class="form-input font-mono text-xs text-gray-400">
                </div>

                {{-- Description --}}
                <div>
                    <label class="form-label">Description <span class="text-gray-600">(optional)</span></label>
                    <textarea name="description" x-model="form.description" rows="2"
                              class="form-input text-xs" placeholder="Short description..."></textarea>
                </div>

                {{-- Color + Icon --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="form-label">Color</label>
                        <div class="flex items-center gap-2">
                            <input type="color" name="color" x-model="form.color"
                                   class="w-10 h-9 rounded-lg border border-gray-700 bg-gray-800 cursor-pointer p-0.5">
                            <input type="text" x-model="form.color"
                                   class="form-input font-mono text-xs flex-1" placeholder="#6366f1">
                            {{-- hidden real color input synced --}}
                        </div>
                    </div>
                    <div>
                        <label class="form-label">Icon <span class="text-gray-600">(FA class)</span></label>
                        <input type="text" name="icon" x-model="form.icon"
                               class="form-input font-mono text-xs" placeholder="fas fa-code">
                    </div>
                </div>

                {{-- Order + Active --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="form-label">Display Order</label>
                        <input type="number" name="order" x-model="form.order" min="0"
                               class="form-input">
                    </div>
                    <div class="flex items-end pb-1">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="is_active" value="1"
                                   x-bind:checked="form.is_active"
                                   @change="form.is_active = $event.target.checked"
                                   class="w-4 h-4 rounded border-gray-600 bg-gray-800 text-indigo-600 focus:ring-indigo-500 focus:ring-offset-gray-900">
                            <span class="text-sm text-gray-300">Active</span>
                        </label>
                    </div>
                </div>

                {{-- Preview swatch --}}
                <div class="flex items-center gap-3 px-3 py-2.5 bg-gray-800 rounded-lg">
                    <div class="w-8 h-8 rounded-lg flex items-center justify-center flex-shrink-0 transition-colors"
                         :style="'background-color:' + form.color">
                        <i :class="form.icon || 'fas fa-tag'" class="text-white text-xs"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-white" x-text="form.name || 'Category Name'"></p>
                        <p class="text-xs text-gray-500 font-mono" x-text="form.slug || 'slug'"></p>
                    </div>
                </div>

                <button type="submit"
                        class="w-full py-2.5 rounded-lg text-sm font-medium transition-colors"
                        :class="editing
                            ? 'bg-indigo-600 hover:bg-indigo-700 text-white'
                            : 'bg-indigo-600 hover:bg-indigo-700 text-white'">
                    <span x-text="editing ? 'Update Category' : 'Create Category'"></span>
                </button>
            </form>
        </div>
    </div>

    {{-- ===== RIGHT: Categories Table ===== --}}
    <div class="xl:col-span-2">

        {{-- Search --}}
        <form method="GET" action="{{ route('admin.categories.index') }}" class="flex gap-2 mb-4">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Search categories..."
                   class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 flex-1 focus:outline-none focus:border-indigo-500">
            <button type="submit" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm rounded-lg transition-colors">Search</button>
            @if(request('search'))
                <a href="{{ route('admin.categories.index') }}"
                   class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 text-sm rounded-lg transition-colors">Clear</a>
            @endif
        </form>

        {{-- Stats row --}}
        <div class="grid grid-cols-3 gap-3 mb-4">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-white">{{ $categories->total() }}</p>
                <p class="text-xs text-gray-500 mt-0.5">Total</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-400">{{ $categories->getCollection()->where('is_active', true)->count() }}</p>
                <p class="text-xs text-gray-500 mt-0.5">Active</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-gray-400">{{ $categories->getCollection()->where('is_active', false)->count() }}</p>
                <p class="text-xs text-gray-500 mt-0.5">Inactive</p>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                            <th class="px-5 py-3 text-left">Category</th>
                            <th class="px-5 py-3 text-left">Projects</th>
                            <th class="px-5 py-3 text-left">Order</th>
                            <th class="px-5 py-3 text-left">Status</th>
                            <th class="px-5 py-3 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-800">
                        @forelse($categories as $category)
                        <tr class="hover:bg-gray-800/40 transition-colors group">

                            {{-- Category --}}
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-lg flex items-center justify-center flex-shrink-0"
                                         style="background-color: {{ $category->color ?? '#6366f1' }}">
                                        @if($category->icon)
                                            <i class="{{ $category->icon }} text-white text-xs"></i>
                                        @else
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-medium text-white">{{ $category->name }}</p>
                                        <p class="text-xs text-gray-600 font-mono mt-0.5">{{ $category->slug }}</p>
                                        @if($category->description)
                                            <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($category->description, 40) }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            {{-- Projects count --}}
                            <td class="px-5 py-4">
                                <a href="{{ route('admin.projects.index', ['category' => $category->id]) }}"
                                   class="inline-flex items-center gap-1.5 text-xs text-gray-400 hover:text-indigo-400 transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                    {{ $category->projects_count }} project{{ $category->projects_count !== 1 ? 's' : '' }}
                                </a>
                            </td>

                            {{-- Order --}}
                            <td class="px-5 py-4 text-gray-500 text-xs">#{{ $category->order }}</td>

                            {{-- Status --}}
                            <td class="px-5 py-4">
                                <span class="inline-flex px-2 py-0.5 text-xs rounded-full
                                    {{ $category->is_active ? 'bg-green-900/50 text-green-400' : 'bg-gray-800 text-gray-500' }}">
                                    {{ $category->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    {{-- Edit: populate the left panel --}}
                                    <button type="button"
                                            @click="editCategory({
                                                id: {{ $category->id }},
                                                name: '{{ addslashes($category->name) }}',
                                                slug: '{{ $category->slug }}',
                                                description: '{{ addslashes($category->description ?? '') }}',
                                                color: '{{ $category->color ?? '#6366f1' }}',
                                                icon: '{{ $category->icon ?? '' }}',
                                                order: {{ $category->order }},
                                                is_active: {{ $category->is_active ? 'true' : 'false' }}
                                            })"
                                            class="text-indigo-400 hover:text-indigo-300 transition-colors p-1.5 rounded hover:bg-gray-800" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>

                                    {{-- Delete --}}
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Delete \'{{ addslashes($category->name) }}\'? This cannot be undone.')"
                                                class="text-red-500 hover:text-red-400 transition-colors p-1.5 rounded hover:bg-gray-800"
                                                title="Delete"
                                                {{ $category->projects_count > 0 ? 'disabled' : '' }}>
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-5 py-16 text-center">
                                <div class="flex flex-col items-center gap-3 text-gray-600">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <p class="text-sm">No categories yet.</p>
                                    <p class="text-xs">Use the form on the left to create your first one.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($categories->hasPages())
            <div class="px-5 py-4 border-t border-gray-800">
                {{ $categories->links() }}
            </div>
            @endif
        </div>

        {{-- Tip --}}
        <div class="mt-4 flex items-start gap-2 px-4 py-3 bg-indigo-900/20 border border-indigo-800/40 rounded-xl">
            <svg class="w-4 h-4 text-indigo-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <p class="text-xs text-indigo-300">
                Categories with assigned projects cannot be deleted. Reassign or delete those projects first.
                The <span class="font-mono text-indigo-400">order</span> field controls display sequence — lower numbers appear first.
            </p>
        </div>

    </div>
</div>

<style>
.form-label { display: block; font-size: 0.75rem; font-weight: 500; color: #9ca3af; margin-bottom: 0.375rem; }
.form-input { width: 100%; background: #1f2937; border: 1px solid #374151; color: #fff; border-radius: 0.5rem; padding: 0.5rem 0.75rem; font-size: 0.875rem; }
.form-input:focus { outline: none; border-color: #6366f1; box-shadow: 0 0 0 1px #6366f1; }
.form-error { margin-top: 0.25rem; font-size: 0.75rem; color: #f87171; }
</style>

<script>
function categoryManager() {
    return {
        editing: false,
        editId: null,
        formAction: '{{ route('admin.categories.store') }}',

        form: {
            name: '',
            slug: '',
            description: '',
            color: '#6366f1',
            icon: '',
            order: 0,
            is_active: true,
        },

        generateSlug(name) {
            this.form.slug = name.toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-')
                .trim();
        },

        editCategory(cat) {
            this.editing  = true;
            this.editId   = cat.id;
            this.formAction = `/admin/categories/${cat.id}`;
            this.form = {
                name:        cat.name,
                slug:        cat.slug,
                description: cat.description,
                color:       cat.color,
                icon:        cat.icon,
                order:       cat.order,
                is_active:   cat.is_active,
            };
            // Scroll to form on mobile
            document.getElementById('category-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
        },

        resetForm() {
            this.editing    = false;
            this.editId     = null;
            this.formAction = '{{ route('admin.categories.store') }}';
            this.form = { name: '', slug: '', description: '', color: '#6366f1', icon: '', order: 0, is_active: true };
        },
    }
}
</script>

@endsection
