@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('page-subtitle', 'Here\'s what\'s happening with your portfolio')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-4 mb-6">

    @php
        $cards = [
            ['label' => 'Projects',        'value' => $stats['projects_count'],       'color' => 'from-blue-500 to-blue-600',    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>'],
            ['label' => 'Products',        'value' => $stats['products_count'],       'color' => 'from-green-500 to-emerald-600','icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>'],
            ['label' => 'Services',        'value' => $stats['services_count'],       'color' => 'from-purple-500 to-violet-600','icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>'],
            ['label' => 'Total Messages',  'value' => $stats['messages_count'],       'color' => 'from-yellow-500 to-orange-500','icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>'],
            ['label' => 'Unread Messages', 'value' => $stats['unread_messages_count'],'color' => 'from-red-500 to-rose-600',    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>'],
        ];
    @endphp

    @foreach($cards as $card)
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 flex items-center gap-4">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $card['color'] }} flex items-center justify-center flex-shrink-0 shadow-lg">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                {!! $card['icon'] !!}
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-white">{{ $card['value'] }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $card['label'] }}</p>
        </div>
    </div>
    @endforeach

</div>

{{-- Quick Actions --}}
<div class="bg-gray-900 border border-gray-800 rounded-xl p-5 mb-6">
    <h2 class="text-sm font-semibold text-gray-300 uppercase tracking-wider mb-4">Quick Actions</h2>
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.projects.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Project
        </a>
        <a href="{{ route('admin.products.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Product
        </a>
        <a href="{{ route('admin.services.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add Service
        </a>
        <a href="{{ route('admin.messages.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            View Messages
            @if($stats['unread_messages_count'] > 0)
                <span class="bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full">{{ $stats['unread_messages_count'] }}</span>
            @endif
        </a>
        <a href="{{ route('admin.settings.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-gray-700 hover:bg-gray-600 text-white text-sm font-medium rounded-lg transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Settings
        </a>
    </div>
</div>

{{-- Recent Activity --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Recent Messages --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-800 flex items-center justify-between">
            <h3 class="text-sm font-semibold text-white">Recent Messages</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-xs text-blue-400 hover:text-blue-300">View all →</a>
        </div>
        <div class="divide-y divide-gray-800">
            @forelse($recentMessages as $message)
            <div class="px-5 py-4 flex items-start gap-3">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-yellow-500 to-orange-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr($message->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <p class="text-sm font-medium text-white truncate">{{ $message->name }}</p>
                        <span class="text-xs px-2 py-0.5 rounded-full flex-shrink-0
                            {{ $message->status === 'unread' ? 'bg-red-900/60 text-red-400' : 'bg-gray-800 text-gray-400' }}">
                            {{ $message->status }}
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $message->email }}</p>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-1">{{ Str::limit($message->message, 60) }}</p>
                    <a href="{{ route('admin.messages.show', $message) }}" class="text-xs text-blue-400 hover:text-blue-300 mt-1 inline-block">View →</a>
                </div>
            </div>
            @empty
            <div class="px-5 py-8 text-center text-gray-600 text-sm">No messages yet</div>
            @endforelse
        </div>
    </div>

    {{-- Recent Projects --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-800 flex items-center justify-between">
            <h3 class="text-sm font-semibold text-white">Recent Projects</h3>
            <a href="{{ route('admin.projects.index') }}" class="text-xs text-blue-400 hover:text-blue-300">View all →</a>
        </div>
        <div class="divide-y divide-gray-800">
            @forelse($recentProjects as $project)
            <div class="px-5 py-4 flex items-start gap-3">
                <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr($project->title, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between gap-2">
                        <p class="text-sm font-medium text-white truncate">{{ $project->title }}</p>
                        @if($project->is_featured)
                            <span class="text-xs px-2 py-0.5 rounded-full bg-yellow-900/60 text-yellow-400 flex-shrink-0">Featured</span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $project->created_at->format('M j, Y') }}</p>
                    <p class="text-xs text-gray-400 mt-1 line-clamp-1">{{ Str::limit($project->description, 60) }}</p>
                    <a href="{{ route('admin.projects.edit', $project) }}" class="text-xs text-blue-400 hover:text-blue-300 mt-1 inline-block">Edit →</a>
                </div>
            </div>
            @empty
            <div class="px-5 py-8 text-center text-gray-600 text-sm">No projects yet</div>
            @endforelse
        </div>
    </div>

</div>

@endsection
