@extends('layouts.admin')

@section('page-title', 'Files')
@section('page-subtitle', 'Manage your files and documents')

@section('content')

{{-- Statistics --}}
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl p-5 text-white">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm font-medium opacity-90">Total Files</p>
            <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
            </svg>
        </div>
        <p class="text-3xl font-bold">{{ number_format($stats['total']) }}</p>
    </div>

    <div class="bg-gradient-to-br from-emerald-600 to-emerald-700 rounded-xl p-5 text-white">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm font-medium opacity-90">Public Files</p>
            <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <p class="text-3xl font-bold">{{ number_format($stats['public']) }}</p>
    </div>

    <div class="bg-gradient-to-br from-purple-600 to-purple-700 rounded-xl p-5 text-white">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm font-medium opacity-90">Total Downloads</p>
            <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
        </div>
        <p class="text-3xl font-bold">{{ number_format($stats['downloads']) }}</p>
    </div>

    <div class="bg-gradient-to-br from-orange-600 to-orange-700 rounded-xl p-5 text-white">
        <div class="flex items-center justify-between mb-2">
            <p class="text-sm font-medium opacity-90">Storage Used</p>
            <svg class="w-8 h-8 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
            </svg>
        </div>
        <p class="text-3xl font-bold">
            @php
                $bytes = $stats['storage'];
                $units = ['B', 'KB', 'MB', 'GB'];
                for ($i = 0; $bytes > 1024 && $i < count($units) - 1; $i++) {
                    $bytes /= 1024;
                }
                echo round($bytes, 2) . ' ' . $units[$i];
            @endphp
        </p>
    </div>
</div>

{{-- Filters & Actions --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-6">
    <div class="flex flex-col md:flex-row gap-4 items-start md:items-center justify-between">
        <form method="GET" class="flex-1 flex flex-col md:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search files..."
                   class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500">
            
            <select name="category" onchange="this.form.submit()"
                    class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat }}" {{ request('category') === $cat ? 'selected' : '' }}>
                        {{ ucfirst($cat) }}
                    </option>
                @endforeach
            </select>

            <select name="type" onchange="this.form.submit()"
                    class="px-4 py-2 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">All Types</option>
                <option value="document" {{ request('type') === 'document' ? 'selected' : '' }}>Documents</option>
                <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Images</option>
                <option value="video" {{ request('type') === 'video' ? 'selected' : '' }}>Videos</option>
                <option value="audio" {{ request('type') === 'audio' ? 'selected' : '' }}>Audio</option>
                <option value="other" {{ request('type') === 'other' ? 'selected' : '' }}>Other</option>
            </select>

            @if(request()->hasAny(['search', 'category', 'type']))
                <a href="{{ route('admin.files.index') }}"
                   class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 rounded-lg transition-colors text-center">
                    Clear
                </a>
            @endif
        </form>

        <a href="{{ route('admin.files.create') }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors whitespace-nowrap">
            + Upload File
        </a>
    </div>
</div>

{{-- Files List --}}
@if($files->count() > 0)
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-800 border-b border-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">File</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Size</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Downloads</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-400 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800">
                    @foreach($files as $file)
                    <tr class="hover:bg-gray-800/50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center flex-shrink-0">
                                    @if($file->file_type === 'image')
                                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    @elseif($file->file_type === 'video')
                                        <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                        </svg>
                                    @elseif($file->file_type === 'document')
                                        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-white">{{ $file->title }}</p>
                                    <p class="text-xs text-gray-500">{{ $file->file_extension }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($file->category)
                                <span class="px-2 py-1 bg-gray-800 text-gray-300 text-xs rounded-full">
                                    {{ ucfirst($file->category) }}
                                </span>
                            @else
                                <span class="text-gray-600 text-xs">—</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-400">{{ ucfirst($file->file_type) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-400">{{ $file->file_size_formatted }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-400">{{ number_format($file->download_count) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                @if($file->is_active)
                                    <span class="px-2 py-1 bg-emerald-900/50 text-emerald-400 text-xs rounded-full inline-flex items-center gap-1 w-fit">
                                        <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full"></span>
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-gray-800 text-gray-500 text-xs rounded-full inline-flex items-center gap-1 w-fit">
                                        <span class="w-1.5 h-1.5 bg-gray-500 rounded-full"></span>
                                        Inactive
                                    </span>
                                @endif
                                @if($file->is_public)
                                    <span class="px-2 py-1 bg-blue-900/50 text-blue-400 text-xs rounded-full w-fit">Public</span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ Storage::url($file->file_path) }}" target="_blank"
                                   class="p-2 text-gray-400 hover:text-blue-400 hover:bg-gray-800 rounded-lg transition-colors"
                                   title="View">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.files.edit', $file) }}"
                                   class="p-2 text-gray-400 hover:text-yellow-400 hover:bg-gray-800 rounded-lg transition-colors"
                                   title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form action="{{ route('admin.files.destroy', $file) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this file?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="p-2 text-gray-400 hover:text-red-400 hover:bg-gray-800 rounded-lg transition-colors"
                                            title="Delete">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $files->links() }}
    </div>
@else
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-12 text-center">
        <svg class="w-16 h-16 text-gray-700 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
        </svg>
        <h3 class="text-lg font-semibold text-gray-400 mb-2">No files found</h3>
        <p class="text-sm text-gray-600 mb-6">Upload your first file to get started</p>
        <a href="{{ route('admin.files.create') }}"
           class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Upload File
        </a>
    </div>
@endif

@endsection
