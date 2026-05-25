@extends('layouts.admin')
@section('page-title', 'Reviews')
@section('page-subtitle', 'Approve or reject client reviews')

@section('content')

@if(session('success'))
<div class="mb-5 px-4 py-3 bg-green-900/40 border border-green-700/50 text-green-400 text-sm rounded-lg flex items-center gap-2">
    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
    </svg>
    {{ session('success') }}
</div>
@endif

{{-- Filter tabs --}}
<div class="flex gap-2 mb-6">
    @foreach(['all' => 'All', 'pending' => 'Pending', 'approved' => 'Approved', 'rejected' => 'Rejected'] as $val => $label)
    <a href="{{ request()->fullUrlWithQuery(['status' => $val]) }}"
       class="px-4 py-1.5 rounded-lg text-xs font-semibold transition-colors
              {{ request('status', 'all') === $val
                  ? 'bg-blue-600 text-white'
                  : 'bg-gray-800 text-gray-400 hover:text-white border border-gray-700' }}">
        {{ $label }}
    </a>
    @endforeach
</div>

<div class="space-y-4">
    @forelse($reviews as $review)
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 flex flex-col sm:flex-row sm:items-start gap-4">

        {{-- Avatar --}}
        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
            {{ strtoupper(substr($review->name, 0, 2)) }}
        </div>

        {{-- Content --}}
        <div class="flex-1 min-w-0">
            <div class="flex flex-wrap items-center gap-2 mb-1">
                <span class="text-white font-semibold text-sm">{{ $review->name }}</span>
                @if($review->role)
                <span class="text-gray-500 text-xs">· {{ $review->role }}</span>
                @endif
                <span class="text-gray-600 text-xs">· {{ $review->email }}</span>
                {{-- Status badge --}}
                <span class="ml-auto px-2 py-0.5 rounded-full text-[10px] font-bold
                    {{ $review->status === 'approved' ? 'bg-green-900/50 text-green-400 border border-green-700/50' :
                       ($review->status === 'rejected' ? 'bg-red-900/50 text-red-400 border border-red-700/50' :
                       'bg-yellow-900/50 text-yellow-400 border border-yellow-700/50') }}">
                    {{ ucfirst($review->status) }}
                </span>
            </div>

            {{-- Stars --}}
            <div class="flex gap-0.5 mb-2">
                @for($i = 1; $i <= 5; $i++)
                <svg class="w-3.5 h-3.5 {{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-700' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                @endfor
            </div>

            <p class="text-gray-400 text-sm leading-relaxed">{{ $review->body }}</p>
            <p class="text-gray-600 text-xs mt-2">{{ $review->created_at->diffForHumans() }}</p>
        </div>

        {{-- Actions --}}
        <div class="flex gap-2 flex-shrink-0">
            @if($review->status === 'pending')
            <form action="{{ route('admin.reviews.approve', $review) }}" method="POST">
                @csrf @method('PATCH')
                <button class="px-3 py-1.5 bg-green-600/20 hover:bg-green-600/30 text-green-400 text-xs font-semibold rounded-lg border border-green-600/30 transition-colors">
                    Approve
                </button>
            </form>
            <form action="{{ route('admin.reviews.reject', $review) }}" method="POST">
                @csrf @method('PATCH')
                <button class="px-3 py-1.5 bg-yellow-600/20 hover:bg-yellow-600/30 text-yellow-400 text-xs font-semibold rounded-lg border border-yellow-600/30 transition-colors">
                    Reject
                </button>
            </form>
            @endif
            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST"
                  onsubmit="return confirm('Delete this review?')">
                @csrf @method('DELETE')
                <button class="px-3 py-1.5 bg-red-600/20 hover:bg-red-600/30 text-red-400 text-xs font-semibold rounded-lg border border-red-600/30 transition-colors">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @empty
    <div class="text-center py-16 text-gray-500 text-sm">No reviews found.</div>
    @endforelse
</div>

{{ $reviews->links() }}

@endsection
