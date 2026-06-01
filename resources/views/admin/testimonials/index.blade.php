@extends('layouts.admin')

@section('page-title', 'Testimonials')
@section('page-subtitle', 'Manage customer testimonials and reviews')

@section('content')

{{-- Actions Bar --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl p-4 mb-6 flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-3">
        <h2 class="text-sm font-semibold text-white">All Testimonials</h2>
        <span class="text-xs text-gray-500">{{ $testimonials->total() }} total</span>
    </div>
    <a href="{{ route('admin.testimonials.create') }}" 
       class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Add Testimonial
    </a>
</div>

{{-- Testimonials Grid --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @forelse($testimonials as $testimonial)
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-700 transition-colors">
        {{-- Header --}}
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center gap-3">
                @if($testimonial->avatar)
                <img src="{{ Storage::url($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover" loading="lazy">
                @else
                <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-400 to-purple-500 flex items-center justify-center text-white font-bold text-lg">
                    {{ $testimonial->initials }}
                </div>
                @endif
                <div>
                    <h3 class="text-sm font-semibold text-white">{{ $testimonial->name }}</h3>
                    <p class="text-xs text-gray-400">{{ $testimonial->role }}@if($testimonial->company), {{ $testimonial->company }}@endif</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @if($testimonial->is_active)
                <span class="px-2 py-1 bg-emerald-900/60 text-emerald-400 text-xs font-semibold rounded-full">Active</span>
                @else
                <span class="px-2 py-1 bg-gray-800 text-gray-400 text-xs font-semibold rounded-full">Inactive</span>
                @endif
            </div>
        </div>

        {{-- Rating --}}
        <div class="flex gap-1 mb-3">
            @for($i = 0; $i < 5; $i++)
                @if($i < $testimonial->rating)
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                @else
                <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                @endif
            @endfor
        </div>

        {{-- Content --}}
        <p class="text-sm text-gray-300 leading-relaxed mb-4 italic">"{{ $testimonial->content }}"</p>

        {{-- Meta --}}
        <div class="flex items-center justify-between pt-4 border-t border-gray-800">
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Order: {{ $testimonial->order }}
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                   class="text-blue-400 hover:text-blue-300 text-sm font-medium transition-colors">
                    Edit
                </a>
                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-400 hover:text-red-300 text-sm font-medium transition-colors">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-2 bg-gray-900 border border-gray-800 rounded-xl p-12">
        <div class="flex flex-col items-center gap-4 text-center">
            <div class="w-20 h-20 rounded-full bg-gray-800 flex items-center justify-center">
                <svg class="w-10 h-10 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                </svg>
            </div>
            <div>
                <p class="text-gray-400 font-medium text-lg">No testimonials yet</p>
                <p class="text-gray-600 text-sm mt-1">Add your first customer testimonial to get started</p>
            </div>
            <a href="{{ route('admin.testimonials.create') }}" 
               class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors mt-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add First Testimonial
            </a>
        </div>
    </div>
    @endforelse
</div>

{{-- Pagination --}}
@if($testimonials->hasPages())
<div class="mt-6">
    {{ $testimonials->links() }}
</div>
@endif

@endsection
