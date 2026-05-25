@extends('layouts.admin')
@section('page-title', 'Skills')
@section('page-subtitle', 'Manage your technical skills and proficiency levels')

@section('content')

{{-- Flash --}}
@if(session('success'))
    <div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg">
        {{ session('success') }}
    </div>
@endif

{{-- Stats + Add button --}}
<div class="flex items-center justify-between mb-6">
    <div class="flex items-center gap-4">
        <div class="bg-gray-900 border border-gray-800 rounded-xl px-4 py-2.5 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                <span class="text-white font-bold text-xs">{{ $counts['total'] }}</span>
            </div>
            <span class="text-sm text-gray-400">Total</span>
        </div>
        <div class="bg-gray-900 border border-gray-800 rounded-xl px-4 py-2.5 flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
                <span class="text-white font-bold text-xs">{{ $counts['active'] }}</span>
            </div>
            <span class="text-sm text-gray-400">Active</span>
        </div>
    </div>
    <a href="{{ route('admin.skills.create') }}"
       class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Skill
    </a>
</div>

{{-- Skills grouped by category --}}
@forelse($skills as $category => $group)
<div class="mb-8">
    {{-- Category header --}}
    <div class="flex items-center gap-3 mb-4">
        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest">
            {{ $category ?: 'Uncategorised' }}
        </h3>
        <div class="flex-1 h-px bg-gray-800"></div>
        <span class="text-xs text-gray-600">{{ $group->count() }} skill{{ $group->count() !== 1 ? 's' : '' }}</span>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-3">
        @foreach($group as $skill)
        @php
            $levelConfig = match($skill->level) {
                'expert'       => ['label' => 'Expert',       'bar' => 'from-green-500 to-emerald-400',  'badge' => 'bg-green-900/60 text-green-400 border-green-800/50'],
                'advanced'     => ['label' => 'Advanced',     'bar' => 'from-blue-500 to-cyan-400',      'badge' => 'bg-blue-900/60 text-blue-400 border-blue-800/50'],
                'intermediate' => ['label' => 'Intermediate', 'bar' => 'from-yellow-500 to-orange-400',  'badge' => 'bg-yellow-900/60 text-yellow-400 border-yellow-800/50'],
                default        => ['label' => 'Beginner',     'bar' => 'from-gray-500 to-gray-400',      'badge' => 'bg-gray-800 text-gray-400 border-gray-700'],
            };
        @endphp
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-4 hover:border-gray-700 transition-colors group {{ !$skill->is_active ? 'opacity-50' : '' }}">
            <div class="flex items-start justify-between gap-2 mb-3">
                <div class="flex items-center gap-2.5 min-w-0">
                    @if($skill->icon)
                        <span class="text-xl flex-shrink-0">{{ $skill->icon }}</span>
                    @else
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-gray-700 to-gray-600 flex items-center justify-center flex-shrink-0">
                            <span class="text-white text-xs font-bold">{{ strtoupper(substr($skill->name, 0, 2)) }}</span>
                        </div>
                    @endif
                    <div class="min-w-0">
                        <p class="text-white text-sm font-medium truncate">{{ $skill->name }}</p>
                        <span class="text-xs px-1.5 py-0.5 rounded-full border {{ $levelConfig['badge'] }}">{{ $levelConfig['label'] }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-1 flex-shrink-0 opacity-0 group-hover:opacity-100 transition-opacity">
                    <a href="{{ route('admin.skills.edit', $skill) }}"
                       class="p-1.5 text-gray-500 hover:text-blue-400 hover:bg-blue-900/20 rounded-lg transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>
                    <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete {{ addslashes($skill->name) }}?')"
                                class="p-1.5 text-gray-500 hover:text-red-400 hover:bg-red-900/20 rounded-lg transition-colors">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Progress bar --}}
            <div class="flex items-center gap-2">
                <div class="flex-1 h-1.5 bg-gray-800 rounded-full overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r {{ $levelConfig['bar'] }} transition-all duration-500"
                         style="width: {{ $skill->percentage }}%"></div>
                </div>
                <span class="text-xs text-gray-500 w-8 text-right flex-shrink-0">{{ $skill->percentage }}%</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@empty
<div class="bg-gray-900 border border-gray-800 rounded-xl px-5 py-16 text-center">
    <div class="flex flex-col items-center gap-3 text-gray-600">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
        </svg>
        <p class="text-sm">No skills yet.</p>
        <a href="{{ route('admin.skills.create') }}" class="text-blue-400 hover:text-blue-300 text-sm">Add your first skill →</a>
    </div>
</div>
@endforelse

@endsection
