@extends('layouts.admin')

@section('page-title', 'Edit File')
@section('page-subtitle', 'Update file information')

@section('content')

<div class="max-w-3xl">
    <form action="{{ route('admin.files.update', $file) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Current File --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">Current File</h3>
            
            <div class="flex items-center gap-4 p-4 bg-gray-800 rounded-lg">
                <div class="w-12 h-12 rounded-lg bg-gray-700 flex items-center justify-center flex-shrink-0">
                    @if($file->file_type === 'image')
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    @elseif($file->file_type === 'document')
                        <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    @else
                        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    @endif
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-white">{{ $file->title }}</p>
                    <p class="text-xs text-gray-500">{{ $file->file_extension }} • {{ $file->file_size_formatted }}</p>
                </div>
                <a href="{{ Storage::url($file->file_path) }}" target="_blank"
                   class="px-3 py-1.5 bg-gray-700 hover:bg-gray-600 text-gray-300 text-sm rounded-lg transition-colors">
                    View
                </a>
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-300 mb-2">Replace File (Optional)</label>
                <input type="file" name="file"
                       class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-600 file:text-white hover:file:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="mt-1 text-xs text-gray-500">Leave empty to keep current file. Maximum: 50MB</p>
                @error('file')
                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- File Information --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            <h3 class="text-sm font-semibold text-white uppercase tracking-wider mb-4">File Information</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $file->title) }}" required
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
                              class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $file->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Category</label>
                        <input type="text" name="category" value="{{ old('category', $file->category) }}"
                               placeholder="e.g., Certificates, Documents"
                               class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('category')
                            <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-2">Tags</label>
                        <input type="text" name="tags" value="{{ old('tags', $file->tags ? implode(', ', $file->tags) : '') }}"
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
                    <input type="number" name="order" value="{{ old('order', $file->order) }}" min="0"
                           class="w-full px-4 py-2.5 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                    @error('order')
                        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_public" id="is_public" value="1" {{ old('is_public', $file->is_public) ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_public" class="text-sm font-medium text-gray-300">
                            Public (Visible to everyone)
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_downloadable" id="is_downloadable" value="1" {{ old('is_downloadable', $file->is_downloadable) ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_downloadable" class="text-sm font-medium text-gray-300">
                            Downloadable
                        </label>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $file->is_active) ? 'checked' : '' }}
                               class="w-4 h-4 bg-gray-800 border-gray-700 rounded text-blue-600 focus:ring-2 focus:ring-blue-500">
                        <label for="is_active" class="text-sm font-medium text-gray-300">
                            Active
                        </label>
                    </div>
                </div>

                <div class="p-4 bg-gray-800 rounded-lg">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-400">Total Downloads:</span>
                        <span class="text-white font-medium">{{ number_format($file->download_count) }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
                Update File
            </button>
            <a href="{{ route('admin.files.index') }}"
               class="px-6 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
