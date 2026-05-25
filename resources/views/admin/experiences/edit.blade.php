@extends('layouts.admin')
@section('page-title', 'Edit Experience')
@section('page-subtitle', $experience->role . ' at ' . $experience->company)

@section('content')

<div class="max-w-2xl">
    <a href="{{ route('admin.experiences.index') }}"
       class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Experiences
    </a>

    @if(session('success'))
        <div class="mb-4 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">
        @csrf @method('PUT')
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            @include('admin.experiences.form')
        </div>
        <div class="flex items-center gap-3 mt-5">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Update Experience
            </button>
            <a href="{{ route('admin.experiences.index') }}"
               class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm rounded-lg transition-colors">
                Cancel
            </a>
            <form action="{{ route('admin.experiences.destroy', $experience) }}" method="POST" class="ml-auto">
                @csrf @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this experience?')"
                        class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-900/40 hover:bg-red-900/70 text-red-400 hover:text-red-300 text-sm rounded-lg border border-red-800/50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete
                </button>
            </form>
        </div>
    </form>
</div>

@endsection
