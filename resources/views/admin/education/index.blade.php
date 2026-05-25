@extends('layouts.admin')

@section('page-title', 'Education')
@section('page-subtitle', 'Manage your educational background')

@section('content')

{{-- Actions Bar --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-6 flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-3">
        <h2 class="text-sm font-semibold text-white">All Education Records</h2>
        <span class="text-xs text-gray-500">{{ $education->total() }} total</span>
    </div>
    <a href="{{ route('admin.education.create') }}" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Education
    </a>
</div>

{{-- Education Timeline --}}
<div class="space-y-6">
    @forelse($education as $edu)
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-700 transition-colors">
        <div class="flex items-start gap-4">
            {{-- Logo --}}
            <div class="flex-shrink-0">
                @if($edu->logo)
                <img src="{{ Storage::url($edu->logo) }}" alt="{{ $edu->institution }}" class="w-16 h-16 rounded-lg object-cover">
                @else
                <div class="w-16 h-16 rounded-lg bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    </svg>
                </div>
                @endif
            </div>

            {{-- Content --}}
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-4 mb-2">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $edu->degree }}</h3>
                        <p class="text-sm text-emerald-400 font-medium">{{ $edu->institution }}</p>
                        <p class="text-sm text-gray-400 mt-1">{{ $edu->field_of_study }}</p>
                    </div>
                    <div class="flex items-center gap-2 flex-shrink-0">
                        @if($edu->is_current)
                        <span class="px-2.5 py-1 bg-emerald-900/60 text-emerald-400 text-xs font-semibold rounded-full">Current</span>
                        @endif
                        @if($edu->is_active)
                        <span class="px-2.5 py-1 bg-blue-900/60 text-blue-400 text-xs font-semibold rounded-full">Active</span>
                        @else
                        <span class="px-2.5 py-1 bg-gray-800 text-gray-400 text-xs font-semibold rounded-full">Inactive</span>
                        @endif
                    </div>
                </div>

                {{-- Details --}}
                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-400 mb-3">
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span>{{ $edu->duration }}</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span>{{ $edu->years }}</span>
                    </div>
                    @if($edu->location)
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $edu->location }}</span>
                    </div>
                    @endif
                    @if($edu->grade)
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        <span>Grade: {{ $edu->grade }}</span>
                    </div>
                    @endif
                    <div class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                        </svg>
                        <span>Order: {{ $edu->order }}</span>
                    </div>
                </div>

                {{-- Description --}}
                @if($edu->description)
                <p class="text-sm text-gray-300 leading-relaxed mb-3">{{ $edu->description }}</p>
                @endif

                {{-- Achievements --}}
                @if($edu->achievements && count($edu->achievements) > 0)
                <div class="mb-3">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Achievements</p>
                    <ul class="space-y-1.5">
                        @foreach($edu->achievements as $achievement)
                        <li class="flex items-start gap-2 text-sm text-gray-300">
                            <svg class="w-4 h-4 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                            <span>{{ $achievement }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{-- Actions --}}
                <div class="flex items-center gap-3 pt-3 border-t border-gray-800">
                    <a href="{{ route('admin.education.edit', $edu) }}" 
                       class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors">
                        Edit
                    </a>
                    <form action="{{ route('admin.education.destroy', $edu) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this education record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-12">
        <div class="flex flex-col items-center gap-4 text-center">
            <div class="w-20 h-20 rounded-full bg-gray-800 flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                </svg>
            </div>
            <div>
                <p class="text-gray-400 font-medium text-lg">No education records yet</p>
                <p class="text-gray-600 text-sm mt-1">Add your educational background to showcase your qualifications</p>
            </div>
            <a href="{{ route('admin.education.create') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors mt-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add First Education Record
            </a>
        </div>
    </div>
    @endforelse
</div>

{{-- Pagination --}}
@if($education->hasPages())
<div class="mt-6">
    {{ $education->links() }}
</div>
@endif

@endsection
