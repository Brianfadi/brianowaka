@extends('layouts.app')

@section('content')
@php
    $showImages  = is_string($project->images)    ? (json_decode($project->images, true)    ?? []) : ($project->images    ?? []);
    $showFeatures = is_string($project->features)  ? (json_decode($project->features, true)  ?? []) : ($project->features  ?? []);
    $showTechs   = is_string($project->tech_stack) ? (json_decode($project->tech_stack, true) ?? []) : ($project->tech_stack ?? []);
@endphp
<div class="min-h-screen bg-gray-100 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 py-8">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
        {{-- Breadcrumb --}}
        <div class="mb-6">
            <a href="{{ route('portfolio') }}"
               class="inline-flex items-center gap-1.5 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 text-sm font-medium transition-all duration-300 hover:gap-2 group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Portfolio
            </a>
        </div>

        {{-- Main Card Container --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 animate-slide-in-up">
            
            {{-- Project Header Inside Card --}}
            <div class="p-8 lg:p-10 border-b border-gray-200 dark:border-indigo-500/20">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    @if($project->category)
                    <span class="px-4 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-semibold rounded-full border border-blue-200 dark:border-blue-500/30">
                        {{ $project->category->name }}
                    </span>
                    @endif
                    @if($project->is_featured)
                    <span class="px-4 py-1.5 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 text-sm font-bold rounded-full flex items-center gap-1.5 border border-yellow-200 dark:border-yellow-500/30">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        Featured
                    </span>
                    @endif
                    @if($project->is_for_sale)
                    <span class="px-4 py-1.5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm font-bold rounded-full flex items-center gap-1.5 border border-green-200 dark:border-green-500/30">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        For Sale
                    </span>
                    @endif
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-3 leading-tight">
                    {{ $project->title }}
                </h1>
                <p class="text-gray-600 dark:text-slate-400 text-base lg:text-lg leading-relaxed mb-6">
                    {{ $project->description }}
                </p>

                @if($project->demo_link || $project->github_link)
                <div class="flex flex-wrap gap-3">
                    @if($project->demo_link)
                    <a href="{{ $project->demo_link }}" target="_blank"
                       class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg text-sm relative overflow-hidden">
                        <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                        <svg class="w-4 h-4 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                        </svg>
                        <span class="relative z-10">Live Demo</span>
                    </a>
                    @endif
                    @if($project->github_link)
                    <a href="{{ $project->github_link }}" target="_blank"
                       class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gray-800 dark:bg-slate-700 hover:bg-gray-700 dark:hover:bg-slate-600 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 text-sm relative overflow-hidden">
                        <span class="absolute inset-0 bg-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                        <svg class="w-4 h-4 relative z-10 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                        </svg>
                        <span class="relative z-10">Source Code</span>
                    </a>
                    @endif
                </div>
                @endif
            </div>

            {{-- Content Area --}}
            <div class="p-8 lg:p-10">
                <div class="flex flex-col lg:flex-row gap-10">

                {{-- Left: main content --}}
                <div class="flex-1 min-w-0 space-y-8">

                    {{-- Images Gallery --}}
                    @if(!empty($showImages))
                    <div class="group bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl dark:shadow-indigo-900/30 transition-all duration-500 animate-slide-in-up">
                        <div class="aspect-video relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 dark:from-slate-800 dark:to-slate-900">
                            <img src="{{ $showImages[0] }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            
                            {{-- Image overlay badge --}}
                            <div class="absolute top-4 right-4 px-3 py-1.5 bg-black/50 backdrop-blur-sm text-white text-xs font-semibold rounded-lg flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ count($showImages) }} {{ count($showImages) === 1 ? 'Image' : 'Images' }}
                            </div>
                        </div>
                        @if(count($showImages) > 1)
                        <div class="grid grid-cols-4 gap-3 p-4 bg-white/50 dark:bg-slate-800/50">
                            @foreach(array_slice($showImages, 1, 4) as $img)
                            <div class="group/thumb aspect-video rounded-xl overflow-hidden bg-gray-200 dark:bg-slate-700 shadow-md hover:shadow-xl transition-all duration-300 cursor-pointer border-2 border-transparent hover:border-blue-500 dark:hover:border-blue-400">
                                <img src="{{ $img }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover/thumb:scale-110 transition-transform duration-500">
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @else
                    <div class="aspect-video bg-gradient-to-br from-blue-500 via-purple-500 to-purple-600 dark:from-blue-900 dark:via-indigo-900 dark:to-purple-900 rounded-2xl flex items-center justify-center shadow-xl relative overflow-hidden animate-slide-in-up">
                        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItaDJ2LTJoLTJ6bTAgNGgtMnYyaDJ2LTJ6bS0yLTJoLTJ2Mmgydi0yem0wLTJoMnYtMmgtMnYyem0tMiAydi0yaC0ydjJoMnptMi00di0yaC0ydjJoMnptMC00aDJ2LTJoLTJ2MnoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"></div>
                        <svg class="w-24 h-24 text-white/40 relative z-10 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    @endif

                    {{-- About --}}
                    <div class="bg-gradient-to-br from-gray-50 to-blue-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.1s;">
                        <div class="flex items-center gap-3 mb-5">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">About This Project</h2>
                        </div>
                        <p class="text-gray-700 dark:text-slate-300 transition-colors duration-300 leading-relaxed text-lg">{{ $project->description }}</p>
                    </div>

                    {{-- Features --}}
                    @if(!empty($showFeatures))
                    <div class="bg-gradient-to-br from-green-50/50 to-emerald-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.2s;">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Key Features</h2>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4">
                            @foreach($showFeatures as $index => $feature)
                            <div class="group flex items-start gap-3 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-xl p-4 hover:shadow-lg hover:border-green-300 dark:hover:border-green-500/50 transition-all duration-300 hover:-translate-y-1 animate-fade-in" style="animation-delay: {{ $index * 0.05 }}s;">
                                <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 flex items-center justify-center flex-shrink-0 mt-0.5 group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </div>
                                <span class="text-gray-700 dark:text-slate-300 transition-colors duration-300 text-sm leading-relaxed font-medium">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Tech stack --}}
                    @if(!empty($showTechs))
                    <div class="bg-gradient-to-br from-purple-50/50 to-indigo-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.3s;">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Technology Stack</h2>
                        </div>
                        <div class="flex flex-wrap gap-3">
                            @foreach($showTechs as $index => $tech)
                            <span class="group px-5 py-2.5 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border-2 border-purple-200 dark:border-indigo-500/30 transition-colors duration-300 text-purple-700 dark:text-purple-300 rounded-xl text-sm font-bold hover:bg-purple-50 dark:hover:bg-purple-900/30 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:border-purple-400 dark:hover:border-purple-500 cursor-default animate-fade-in" style="animation-delay: {{ $index * 0.03 }}s;">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    {{-- Related projects --}}
                    @if($relatedProjects->count() > 0)
                    <div class="animate-slide-in-up" style="animation-delay: 0.4s;">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center shadow-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Related Projects</h2>
                        </div>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                            @foreach($relatedProjects as $index => $rel)
                            @php $relImgs = is_string($rel->images) ? (json_decode($rel->images, true) ?? []) : ($rel->images ?? []); @endphp
                            <a href="{{ route('portfolio.show', $rel) }}"
                               class="group bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl overflow-hidden hover:border-blue-400 dark:hover:border-blue-500 hover:shadow-2xl dark:hover:shadow-indigo-500/30 transition-all duration-300 hover:-translate-y-2 animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="h-40 overflow-hidden relative">
                                    @if(!empty($relImgs))
                                    <img src="{{ $relImgs[0] }}" alt="{{ $rel->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-400 via-purple-500 to-pink-500"></div>
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                                <div class="p-5">
                                    <h3 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors text-base mb-2">{{ $rel->title }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300 line-clamp-2 mb-3">{{ Str::limit($rel->description, 80) }}</p>
                                    <div class="flex items-center gap-2 text-blue-600 dark:text-blue-400 text-sm font-semibold group-hover:gap-3 transition-all">
                                        <span>View Project</span>
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Right: sidebar --}}
                <div class="w-full lg:w-80 flex-shrink-0">
                    <div class="sticky top-6 space-y-5">

                        {{-- Project details card --}}
                        <div class="bg-gradient-to-br from-white to-blue-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border-2 border-gray-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-2xl p-6 shadow-xl hover:shadow-2xl dark:shadow-indigo-900/30 transition-all duration-300 animate-slide-in-right">
                            <div class="flex items-center gap-2 mb-5">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <h3 class="font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Project Details</h3>
                            </div>
                            <div class="space-y-4">
                                @if($project->price)
                                <div class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 group hover:border-blue-300 dark:hover:border-blue-500/50 transition-colors">
                                    <span class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 font-medium">Price</span>
                                    <span class="font-extrabold text-blue-600 dark:text-blue-400 transition-colors duration-300 text-xl group-hover:scale-110 transition-transform">{{ $project->formatted_price }}</span>
                                </div>
                                @endif
                                @if($project->category)
                                <div class="flex justify-between items-center py-3 border-b border-gray-200 dark:border-indigo-500/20 transition-colors duration-300">
                                    <span class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 font-medium">Category</span>
                                    <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-bold rounded-lg">{{ $project->category->name }}</span>
                                </div>
                                @endif
                                @if(!empty($showTechs))
                                <div class="py-3">
                                    <span class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 block mb-3 font-medium">Technologies</span>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach(array_slice($showTechs, 0, 5) as $tech)
                                        <span class="px-3 py-1.5 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 text-xs rounded-lg font-semibold hover:border-blue-400 dark:hover:border-blue-500 hover:shadow-md transition-all duration-300">{{ $tech }}</span>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        {{-- Demo --}}
                        @if($project->demo_link)
                        <div class="bg-gradient-to-br from-blue-50 to-blue-100/50 dark:from-blue-900/30 dark:to-indigo-900/30 border-2 border-blue-200 dark:border-blue-500/30 transition-colors duration-300 rounded-2xl p-6 shadow-lg hover:shadow-xl dark:shadow-blue-900/30 transition-all duration-300 hover:scale-[1.02] animate-slide-in-right" style="animation-delay: 0.1s;">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                <h4 class="font-bold text-blue-900 dark:text-blue-100">Live Demo</h4>
                            </div>
                            <p class="text-sm text-blue-700 dark:text-blue-300 transition-colors duration-300 mb-4">Experience this project live in action</p>
                            <a href="{{ $project->demo_link }}" target="_blank"
                               class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-bold rounded-xl transition-all duration-300 text-sm shadow-lg hover:shadow-xl hover:scale-105 relative overflow-hidden">
                                <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <span class="relative z-10">View Live Demo</span>
                            </a>
                        </div>
                        @endif

                        {{-- Purchase --}}
                        @if($project->is_for_sale)
                        <div class="bg-gradient-to-br from-green-50 to-emerald-100/50 dark:from-green-900/30 dark:to-emerald-900/30 border-2 border-green-200 dark:border-green-500/30 rounded-2xl p-6 shadow-lg hover:shadow-xl dark:shadow-green-900/30 transition-all duration-300 hover:scale-[1.02] animate-slide-in-right" style="animation-delay: 0.2s;">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <h4 class="font-bold text-green-900 dark:text-green-100">Purchase</h4>
                            </div>
                            @if($project->price)
                            <div class="text-3xl font-extrabold text-green-600 dark:text-green-400 mb-1">{{ $project->formatted_price }}</div>
                            <p class="text-sm text-green-700 dark:text-green-300 mb-4 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                One-time purchase · full source code
                            </p>
                            @else
                            <p class="text-sm text-green-700 dark:text-green-300 mb-4">Contact for pricing</p>
                            @endif
                            <a href="{{ route('contact') }}"
                               class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-bold rounded-xl transition-all duration-300 text-sm shadow-lg hover:shadow-xl hover:scale-105 relative overflow-hidden">
                                <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <span class="relative z-10">Purchase Project</span>
                            </a>
                        </div>
                        @endif

                        {{-- GitHub --}}
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank"
                           class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border-2 border-gray-300 dark:border-indigo-500/30 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 font-bold rounded-xl hover:border-gray-900 dark:hover:border-indigo-400 hover:bg-gray-50 dark:hover:bg-slate-700/80 transition-all duration-300 text-sm shadow-md hover:shadow-lg hover:scale-105 animate-slide-in-right relative overflow-hidden" style="animation-delay: 0.3s;">
                            <span class="absolute inset-0 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-slate-700 dark:to-slate-600 translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                            <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                            </svg>
                            <span class="relative z-10">View Source Code</span>
                        </a>
                        @endif

                        {{-- CTA --}}
                        <div class="bg-gradient-to-br from-gray-50 to-purple-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border-2 border-gray-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-2xl p-6 shadow-lg hover:shadow-xl dark:shadow-indigo-900/30 transition-all duration-300 animate-slide-in-right" style="animation-delay: 0.4s;">
                            <div class="flex items-center gap-2 mb-2">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                                <h4 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300">Need something similar?</h4>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300 mb-4">I can build a custom version tailored to your specific needs and requirements.</p>
                            <a href="{{ route('contact') }}"
                               class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 hover:from-blue-500 hover:via-purple-500 hover:to-pink-500 text-white font-bold rounded-xl transition-all duration-300 text-sm shadow-lg hover:shadow-2xl hover:scale-105 relative overflow-hidden">
                                <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <span class="relative z-10">Get In Touch</span>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
