@extends('layouts.admin')
@section('page-title', 'Experiences')
@section('page-subtitle', 'Manage your work history and career timeline')

@section('content')

{{-- Flash --}}
@if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif

{{-- Toolbar --}}
<div class="flex items-center justify-between mb-6">
    <p class="text-sm text-gray-500">{{ $experiences->count() }} experience{{ $experiences->count() !== 1 ? 's' : '' }}</p>
    <a href="{{ route('admin.experiences.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Experience
    </a>
</div>

{{-- Timeline --}}
@forelse($experiences as $experience)
<div class="relative flex gap-5 mb-4 group">

    {{-- Timeline line --}}
    @if(!$loop->last)
    <div class="absolute left-5 top-12 bottom-0 w-px bg-gray-800 -translate-x-1/2"></div>
    @endif

    {{-- Dot --}}
    <div class="flex-shrink-0 w-10 h-10 rounded-full flex items-center justify-center z-10 mt-1
                {{ $experience->is_current ? 'bg-gradient-to-br from-green-500 to-emerald-600 ring-4 ring-green-900/40' : 'bg-gradient-to-br from-blue-500 to-purple-600' }}">
        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
    </div>

    {{-- Card --}}
    <div class="flex-1 bg-gray-900 border border-gray-800 rounded-xl p-5 hover:border-gray-700 transition-colors">
        <div class="flex flex-wrap items-start justify-between gap-3">

            {{-- Left --}}
            <div class="flex-1 min-w-0">
                <div class="flex flex-wrap items-center gap-2 mb-1">
                    <h3 class="text-white font-semibold text-base">{{ $experience->role }}</h3>
                    @if($experience->is_current)
                        <span class="px-2 py-0.5 text-xs rounded-full bg-green-900/60 text-green-400 border border-green-800/50">Current</span>
                    @endif
                </div>
                <p class="text-blue-400 text-sm font-medium">{{ $experience->company }}</p>
                <div class="flex flex-wrap items-center gap-3 mt-2 text-xs text-gray-500">
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $experience->duration }}
                    </span>
                    @if($experience->location)
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $experience->location }}
                    </span>
                    @endif
                    <span class="flex items-center gap-1">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                        </svg>
                        Order: {{ $experience->order }}
                    </span>
                </div>

                @if($experience->description)
                    <p class="text-gray-400 text-sm mt-3 leading-relaxed">{{ $experience->description }}</p>
                @endif

                @if($experience->achievements && count($experience->achievements) > 0)
                    <ul class="mt-3 space-y-1">
                        @foreach($experience->achievements as $achievement)
                            <li class="flex items-start gap-2 text-sm text-gray-400">
                                <span class="w-1.5 h-1.5 rounded-full bg-blue-500 flex-shrink-0 mt-1.5"></span>
                                {{ $achievement }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="{{ route('admin.experiences.edit', $experience) }}"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gray-800 hover:bg-gray-700 text-gray-300 hover:text-white text-xs rounded-lg transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this experience?')"
                            class="p-1.5 text-gray-600 hover:text-red-400 hover:bg-red-900/20 rounded-lg transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@empty
<div class="bg-gray-900 border border-gray-800 rounded-xl px-5 py-16 text-center">
    <div class="flex flex-col items-center gap-3 text-gray-600">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
        </svg>
        <p class="text-sm">No experiences yet.</p>
        <a href="{{ route('admin.experiences.create') }}" class="text-blue-400 hover:text-blue-300 text-sm">Add your first experience →</a>
    </div>
</div>
@endforelse

@endsection
