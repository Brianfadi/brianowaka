@extends('layouts.admin')
@section('page-title', 'Add Skill')
@section('page-subtitle', 'Add a new skill to your profile')

@section('content')

<div class="max-w-2xl">
    <a href="{{ route('admin.skills.index') }}"
       class="inline-flex items-center gap-2 text-sm text-gray-400 hover:text-white mb-6 transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Back to Skills
    </a>

    <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
            @include('admin.skills.form')
        </div>
        <div class="flex items-center gap-3 mt-5">
            <button type="submit"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Save Skill
            </button>
            <a href="{{ route('admin.skills.index') }}"
               class="px-5 py-2.5 bg-gray-800 hover:bg-gray-700 text-gray-300 text-sm rounded-lg transition-colors">
                Cancel
            </a>
        </div>
    </form>
</div>

@endsection
