@extends('layouts.admin')
@section('page-title', $project->title)
@section('page-subtitle', 'Project Preview')

@section('content')

{{-- Top bar --}}
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">← Back to Projects</a>
    <div class="flex items-center gap-3">
        @if($project->demo_link)
        <a href="{{ $project->demo_link }}" target="_blank"
           class="inline-flex items-center gap-2 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
            </svg>
            Live Demo
        </a>
        @endif
        <a href="{{ route('admin.projects.edit', $project) }}"
           class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
            </svg>
            Edit Project
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- Main Content --}}
    <div class="lg:col-span-2 space-y-5">

        {{-- Image Gallery --}}
        @if($project->images && count($project->images) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
            {{-- Featured image --}}
            <div class="aspect-video bg-gray-800">
                <img src="{{ $project->images[0] }}" alt="{{ $project->title }}" class="w-full h-full object-cover" id="featured-img" loading="eager">
            </div>
            {{-- Thumbnails --}}
            @if(count($project->images) > 1)
            <div class="flex gap-2 p-3 overflow-x-auto">
                @foreach($project->images as $i => $img)
                <img src="{{ $img }}" alt="" loading="lazy"
                     onclick="document.getElementById('featured-img').src='{{ $img }}'"
                     class="w-16 h-12 object-cover rounded-lg cursor-pointer flex-shrink-0 opacity-70 hover:opacity-100 transition-opacity {{ $i === 0 ? 'ring-2 ring-blue-500 opacity-100' : '' }}">
                @endforeach
            </div>
            @endif
        </div>
        @endif

        {{-- Description --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Description</h2>
            @if($project->short_description)
                <p class="text-gray-300 font-medium mb-3">{{ $project->short_description }}</p>
            @endif
            <p class="text-gray-400 text-sm leading-relaxed">{{ $project->description }}</p>
        </div>

        {{-- Features --}}
        @if($project->features && count($project->features) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Key Features</h2>
            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                @foreach($project->features as $feature)
                <li class="flex items-start gap-2 text-sm text-gray-400">
                    <svg class="w-4 h-4 text-green-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $feature }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Tech Stack --}}
        @if($project->tech_stack && count($project->tech_stack) > 0)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Tech Stack</h2>
            <div class="flex flex-wrap gap-2">
                @foreach($project->tech_stack as $tech)
                <span class="px-3 py-1.5 bg-blue-900/40 text-blue-400 border border-blue-800/50 rounded-full text-xs font-medium">{{ $tech }}</span>
                @endforeach
            </div>
        </div>
        @endif

    </div>

    {{-- Sidebar --}}
    <div class="space-y-4">

        {{-- Status & Badges --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Status</h2>
            <div class="flex flex-wrap gap-2">
                <span class="px-3 py-1 text-xs font-semibold rounded-full
                    {{ $project->status === 'published' ? 'bg-green-900/50 text-green-400' : 'bg-yellow-900/50 text-yellow-400' }}">
                    {{ ucfirst($project->status) }}
                </span>
                @if($project->is_featured)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-purple-900/50 text-purple-400">Featured</span>
                @endif
                @if($project->is_for_sale)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-900/50 text-emerald-400">For Sale</span>
                @endif
            </div>
        </div>

        {{-- Info --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-4">Details</h2>
            <dl class="space-y-3 text-sm">
                <div>
                    <dt class="text-xs text-gray-500">Category</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $project->category?->name ?? '—' }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Price</dt>
                    <dd class="text-gray-300 mt-0.5 font-medium">{{ $project->formatted_price }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Slug</dt>
                    <dd class="text-gray-500 mt-0.5 font-mono text-xs">{{ $project->slug }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Created</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $project->created_at->format('M d, Y') }}</dd>
                </div>
                <div>
                    <dt class="text-xs text-gray-500">Last Updated</dt>
                    <dd class="text-gray-300 mt-0.5">{{ $project->updated_at->diffForHumans() }}</dd>
                </div>
            </dl>
        </div>

        {{-- Links --}}
        @if($project->demo_link || $project->github_link)
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5">
            <h2 class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Links</h2>
            <div class="space-y-2">
                @if($project->demo_link)
                <a href="{{ $project->demo_link }}" target="_blank"
                   class="flex items-center gap-2 text-sm text-blue-400 hover:text-blue-300 transition-colors truncate">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Live Demo
                </a>
                @endif
                @if($project->github_link)
                <a href="{{ $project->github_link }}" target="_blank"
                   class="flex items-center gap-2 text-sm text-blue-400 hover:text-blue-300 transition-colors truncate">
                    <svg class="w-4 h-4 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                    </svg>
                    GitHub Repository
                </a>
                @endif
            </div>
        </div>
        @endif

        {{-- Actions --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 space-y-2">
            <a href="{{ route('portfolio.show', $project) }}" target="_blank"
               class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View on Portfolio
            </a>
            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                  onsubmit="return confirm('Permanently delete this project?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="w-full px-4 py-2.5 bg-red-900/30 hover:bg-red-900/60 text-red-400 text-sm font-medium rounded-lg transition-colors">
                    Delete Project
                </button>
            </form>
        </div>

    </div>
</div>

@endsection
