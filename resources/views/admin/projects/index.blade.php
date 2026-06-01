@extends('layouts.admin')
@section('page-title', 'Projects')
@section('page-subtitle', 'Manage your portfolio projects')

@section('content')

{{-- Toolbar --}}
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <form method="GET" action="{{ route('admin.projects.index') }}" class="flex flex-wrap gap-2">
        <input type="text" name="search" value="{{ request('search') }}"
               placeholder="Search projects..."
               class="bg-gray-800 border border-gray-700 text-white text-sm rounded-lg px-3 py-2 w-48 focus:outline-none focus:border-blue-500">

        <select name="category"
                class="bg-gray-800 border border-gray-700 text-gray-300 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            <option value="">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>

        <select name="status"
                class="bg-gray-800 border border-gray-700 text-gray-300 text-sm rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500">
            <option value="">All Status</option>
            <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
            <option value="draft"     {{ request('status') === 'draft'     ? 'selected' : '' }}>Draft</option>
        </select>

        <button type="submit"
                class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white text-sm rounded-lg transition-colors">Filter</button>

        @if(request()->hasAny(['search','category','status']))
            <a href="{{ route('admin.projects.index') }}"
               class="px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-400 text-sm rounded-lg transition-colors">Clear</a>
        @endif
    </form>

    <a href="{{ route('admin.projects.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors flex-shrink-0">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add New Project
    </a>
</div>

{{-- Table --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-800 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-5 py-3 text-left">Project</th>
                    <th class="px-5 py-3 text-left">Category</th>
                    <th class="px-5 py-3 text-left">Tech Stack</th>
                    <th class="px-5 py-3 text-left">Price</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-800">
                @forelse($projects as $project)
                <tr class="hover:bg-gray-800/40 transition-colors">

                    {{-- Project --}}
                    <td class="px-5 py-4">
                        <div class="flex items-center gap-3">
                            @if($project->images && count($project->images) > 0)
                                <img src="{{ $project->images[0] }}" alt="{{ $project->title }}"
                                     class="w-10 h-10 rounded-lg object-cover flex-shrink-0 bg-gray-800" loading="lazy">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                                    {{ strtoupper(substr($project->title, 0, 1)) }}
                                </div>
                            @endif
                            <div>
                                <p class="font-medium text-white">{{ $project->title }}</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ Str::limit($project->short_description ?? $project->description, 45) }}</p>
                            </div>
                        </div>
                    </td>

                    {{-- Category --}}
                    <td class="px-5 py-4">
                        @if($project->category)
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-900/50 text-blue-400">{{ $project->category->name }}</span>
                        @else
                            <span class="text-gray-600 text-xs">—</span>
                        @endif
                    </td>

                    {{-- Tech Stack --}}
                    <td class="px-5 py-4">
                        <div class="flex flex-wrap gap-1">
                            @foreach(array_slice($project->tech_stack ?? [], 0, 3) as $tech)
                                <span class="px-1.5 py-0.5 text-xs rounded bg-gray-800 text-gray-400">{{ $tech }}</span>
                            @endforeach
                            @if(count($project->tech_stack ?? []) > 3)
                                <span class="text-xs text-gray-600">+{{ count($project->tech_stack) - 3 }}</span>
                            @endif
                        </div>
                    </td>

                    {{-- Price --}}
                    <td class="px-5 py-4 text-gray-300 text-xs">{{ $project->formatted_price }}</td>

                    {{-- Status --}}
                    <td class="px-5 py-4">
                        <div class="flex flex-col gap-1">
                            <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full
                                {{ $project->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                                {{ ucfirst($project->status) }}
                            </span>
                            @if($project->is_featured)
                                <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                            @endif
                            @if($project->is_for_sale)
                                <span class="inline-flex w-fit px-2 py-0.5 text-xs rounded-full bg-emerald-900/50 text-emerald-400">For Sale</span>
                            @endif
                        </div>
                    </td>

                    {{-- Actions --}}
                    <td class="px-5 py-4 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.projects.show', $project) }}"
                               class="text-xs text-gray-400 hover:text-white transition-colors" title="Preview">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="text-xs text-blue-400 hover:text-blue-300 transition-colors" title="Edit">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete \'{{ addslashes($project->title) }}\'?')"
                                        class="text-red-500 hover:text-red-400 transition-colors" title="Delete">
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
                    <td colspan="6" class="px-5 py-16 text-center">
                        <div class="flex flex-col items-center gap-3 text-gray-600">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <p class="text-sm">No projects found.</p>
                            <a href="{{ route('admin.projects.create') }}" class="text-blue-400 hover:text-blue-300 text-sm">Create your first project →</a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($projects->hasPages())
    <div class="px-5 py-4 border-t border-gray-800">
        {{ $projects->links() }}
    </div>
    @endif
</div>

<p class="text-xs text-gray-600 mt-3">Showing {{ $projects->firstItem() }}–{{ $projects->lastItem() }} of {{ $projects->total() }} projects</p>

@endsection
