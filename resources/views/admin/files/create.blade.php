@extends('layouts.admin')

@section('page-title', 'Upload File')
@section('page-subtitle', 'Upload a new file or document')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- File Upload --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">File Upload</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">File *</label>
                    <input type="file" name="file" required
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Maximum file size: 50MB</p>
                    @error('file')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- File Information --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">File Information</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                           placeholder="e.g., Project Proposal 2026"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('title')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              placeholder="Brief description of the file..."
                              class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <input type="text" name="category" value="{{ old('category') }}"
                               placeholder="e.g., Certificates, Documents"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('category')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
                        <input type="text" name="tags" value="{{ old('tags') }}"
                               placeholder="e.g., important, 2026, client"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <p class="mt-1 text-xs text-gray-500">Separate tags with commas</p>
                        @error('tags')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        {{-- Settings --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Settings</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Display Order</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" min="0"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_public" id="is_public" value="1" {{ old('is_public') ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_public" class="text-sm font-medium text-gray-300">
                            Public (Visible to everyone)
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_downloadable" id="is_downloadable" value="1" {{ old('is_downloadable', true) ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_downloadable" class="text-sm font-medium text-gray-300">
                            Downloadable
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_active" class="text-sm font-medium text-gray-300">
                            Active
                        </label>
                    </div>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                Upload File
            </button>
            <a href="{{ route('admin.files.index') }}"
               class="px-6 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
