@extends('layouts.app')

@section('title', 'Portfolio - My Projects & Work')

@section('content')
<div class="min-h-screen bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300" x-data="portfolioApp()">
    {{-- ── SCROLL PROGRESS BAR ──────────────────────────────────────────────── --}}
    <div class="fixed top-0 left-0 right-0 h-1 bg-gray-200 z-50">
        <div class="h-full bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 transition-all duration-300 ease-out"
             :style="`width: ${scrollProgress}%`"></div>
    </div>
    {{-- ── HERO ──────────────────────────────────────────────────────────── --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 pt-24 pb-20">
        <!-- Enhanced Background with Animated Elements -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-32 -left-32 w-[600px] h-[600px] rounded-full bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/5 blur-3xl hero-glow"></div>
            <div class="absolute -bottom-32 -right-32 w-[600px] h-[600px] rounded-full bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/5 blur-3xl hero-glow"></div>
            <!-- Floating Particles -->
            <div class="absolute top-20 left-10 w-2 h-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/20 rounded-full hero-particle"></div>
            <div class="absolute top-40 right-20 w-3 h-3 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/15 rounded-full hero-particle" style="animation-delay: 1s"></div>
            <div class="absolute bottom-40 left-20 w-2 h-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/25 rounded-full hero-particle" style="animation-delay: 2s"></div>
            <div class="absolute bottom-20 right-10 w-4 h-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 rounded-full hero-particle" style="animation-delay: 3s"></div>
            <div class="absolute top-60 left-1/2 w-2 h-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/20 rounded-full hero-particle" style="animation-delay: 1.5s"></div>
            <div class="absolute top-1/3 left-1/4 w-3 h-3 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/15 rounded-full hero-particle" style="animation-delay: 2.5s"></div>
            <div class="absolute bottom-1/3 right-1/4 w-2 h-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/20 rounded-full hero-particle" style="animation-delay: 3.5s"></div>
        </div>

        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 xl:px-16 text-center">
            <div class="animate-fade-in-up">
                <p class="text-sm font-semibold tracking-widest text-blue-200 uppercase mb-3 slide-and-fade">Portfolio</p>
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-4 text-white hero-shimmer bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent bounce-in">
                    My Creative Work
                </h1>
                <p class="text-xl text-blue-100 font-medium mb-8 max-w-2xl mx-auto slide-and-fade" style="animation-delay: 0.2s">
                    A curated collection of innovative systems, applications, and digital solutions I've designed and built.
                </p>
                <div class="flex flex-wrap gap-3 justify-center mb-8">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm border border-white/20 rounded-full text-sm hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300/20 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white">{{ $projects->total() }}+ Projects</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm border border-white/20 rounded-full text-sm hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300/20 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white">Proven Results</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm border border-white/20 rounded-full text-sm hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300/20 transition-all duration-300 transform hover:scale-105 cursor-pointer">
                        <svg class="w-4 h-4 text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"/>
                        </svg>
                        <span class="text-white">Client Focused</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
            </svg>
        </div>
    </section>

    {{-- ── STATS ──────────────────────────────────────────────────────── --}}
    <section class="py-16 bg-gradient-to-r from-blue-50 to-purple-50">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
                <div class="text-center animate-slide-in-up observe-me">
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300 mb-2" data-counter="{{ $projects->total() }}">0+</div>
                    <div class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300">Projects Completed</div>
                </div>
                <div class="text-center animate-slide-in-up observe-me" style="animation-delay: 0.1s">
                    <div class="text-4xl font-bold text-green-600 mb-2" data-counter="50">0+</div>
                    <div class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300">Happy Clients</div>
                </div>
                <div class="text-center animate-slide-in-up observe-me" style="animation-delay: 0.2s">
                    <div class="text-4xl font-bold text-purple-600 mb-2" data-counter="15">0+</div>
                    <div class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300">Technologies</div>
                </div>
                <div class="text-center animate-slide-in-up observe-me" style="animation-delay: 0.3s">
                    <div class="text-4xl font-bold text-orange-600 mb-2" data-counter="5">0+</div>
                    <div class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300">Years Experience</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── FEATURED ──────────────────────────────────────────────────────── --}}
    @if($featuredProjects->count() > 0)
    <section class="py-20 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 animate-fade-in-up">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Highlights</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Featured Projects</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProjects as $index => $project)
                @php
                    $imgs = is_string($project->images) ? (json_decode($project->images, true) ?? []) : ($project->images ?? []);
                @endphp
                <a href="{{ route('portfolio.show', $project) }}"
                   class="group relative bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-2xl shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 overflow-hidden hover-lift dashboard-card animate-slide-in-up project-card glow-on-hover" style="animation-delay: {{ $index * 0.1 }}s">
                    {{-- Image --}}
                    <div class="h-56 relative overflow-hidden cursor-pointer" @click.prevent="openLightbox('{{ !empty($imgs) ? $imgs[0] : '' }}')">
                        @if(!empty($imgs))
                            <img src="{{ $imgs[0] }}" alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center">
                                <div class="w-20 h-20 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform pulse-ring">
                                    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2V2M7 7h10"/>
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                        {{-- Badges --}}
                        <div class="absolute top-4 right-4 flex gap-2">
                            <span class="px-3 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold rounded-full flex items-center gap-1 float-badge">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Featured
                            </span>
                            @if($project->is_for_sale)
                            <span class="px-3 py-1 bg-green-500 text-white text-xs font-bold rounded-full flex items-center gap-1 float-badge" style="animation-delay: 0.2s">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                For Sale
                            </span>
                            @endif
                        </div>
                        {{-- Quick Actions --}}
                        <div class="absolute inset-0 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank"
                               class="w-12 h-12 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300 transition-all"
                               title="Live Demo" onclick="event.stopPropagation()">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            @endif
                            @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank"
                               class="w-12 h-12 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300 transition-all"
                               title="Source Code" onclick="event.stopPropagation()">
                                <svg class="w-6 h-6 text-gray-700 dark:text-slate-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                    {{-- Body --}}
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $project->title }}</h3>
                            @if($project->category)
                            <span class="flex-shrink-0 text-xs px-2 py-1 bg-blue-50 dark:bg-blue-900/50 transition-colors duration-300 text-blue-600 dark:text-blue-400 transition-colors duration-300 border border-blue-100 rounded-full font-semibold">{{ $project->category->name }}</span>
                            @endif
                        </div>
                        <p class="text-gray-600 dark:text-slate-400 transition-colors duration-300 mb-4 line-clamp-2">{{ Str::limit($project->description, 120) }}</p>
                        @if($project->price)
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-lg font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300">{{ $project->formatted_price }}</div>
                            <div class="flex items-center gap-2">
                                <div class="flex text-yellow-400">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    @endfor
                                </div>
                                <span class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300">({{ rand(10, 50) }} reviews)</span>
                            </div>
                        </div>
                        @endif
                        <div class="flex gap-3">
                            <a href="{{ route('portfolio.show', $project) }}"
                               class="flex-1 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white py-2.5 rounded-xl transition-all duration-200 hover:scale-105 text-center font-semibold btn-ripple relative overflow-hidden">
                                View Details
                            </a>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ── FILTER & SEARCH ──────────────────────────────────────────────── --}}
    <section class="py-10 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border-y border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 sticky top-0 z-20 backdrop-blur-sm bg-gray-50/95 transition-all duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="flex flex-col lg:flex-row gap-6 items-center justify-between">
                {{-- Search --}}
                <form method="GET" action="{{ route('portfolio') }}" class="relative w-full lg:w-96 group">
                    <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                           placeholder="Search projects, technologies, description…"
                           class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl text-sm text-gray-900 dark:text-slate-100 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 hover:border-blue-300">
                </form>

                {{-- Category pills --}}
                @if($categories->count() > 0)
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('portfolio') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-105 {{ !$selectedCategory ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300' : 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 text-gray-600 dark:text-slate-400 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 hover:border-blue-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 hover:shadow-md' }}">
                        All Projects
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('portfolio', ['category' => $category->id]) }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-300 transform hover:scale-105 {{ $selectedCategory == $category->id ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300' : 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 text-gray-600 dark:text-slate-400 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 hover:border-blue-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 hover:shadow-md' }}">
                        {{ $category->name }}
                    </a>
                    @endforeach
                </div>
                @endif
                
                {{-- Sort dropdown --}}
                <div class="relative group">
                    <select class="appearance-none bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl px-4 py-2.5 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 hover:border-blue-300 cursor-pointer">
                        <option>Sort by: Latest</option>
                        <option>Sort by: Popular</option>
                        <option>Sort by: Name</option>
                    </select>
                    <svg class="absolute right-2 top-3 w-4 h-4 text-gray-400 pointer-events-none group-focus-within:text-blue-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    {{-- ── PROJECTS GRID ──────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            @if($projects->count() > 0)

            @if($search || $selectedCategory)
            <div class="mb-8 animate-fade-in-up">
                <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300">
                    Showing <span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">{{ $projects->total() }}</span> result{{ $projects->total() != 1 ? 's' : '' }}
                    @if($search) for "<span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">{{ $search }}</span>"@endif
                    @if($selectedCategory) in "<span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">{{ $categories->firstWhere('id', $selectedCategory)->name }}</span>"@endif
                </p>
            </div>
            @endif

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($projects as $index => $project)
                @php
                    $imgs = is_string($project->images) ? (json_decode($project->images, true) ?? []) : ($project->images ?? []);
                    $techs = is_string($project->tech_stack) ? (json_decode($project->tech_stack, true) ?? []) : ($project->tech_stack ?? []);
                @endphp
                <div class="group bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-2xl shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 overflow-hidden hover-lift dashboard-card animate-slide-in-up project-card observe-me" style="animation-delay: {{ $index * 0.05 }}s">
                    {{-- Thumbnail --}}
                    <div class="h-52 relative overflow-hidden flex-shrink-0 cursor-pointer" @click.prevent="openLightbox('{{ !empty($imgs) ? $imgs[0] : '' }}')">
                        @if(!empty($imgs))
                            <img src="{{ $imgs[0] }}" alt="{{ $project->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 via-purple-600 to-pink-600 flex items-center justify-center">
                                <div class="w-16 h-16 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform pulse-ring">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        {{-- Badges --}}
                        <div class="absolute top-4 left-4 flex gap-2">
                            @if($project->is_featured)
                            <span class="px-2.5 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold rounded-full flex items-center gap-1 float-badge">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                Featured
                            </span>
                            @endif
                            @if($project->is_for_sale)
                            <span class="px-2.5 py-1 bg-green-500 text-white text-xs font-bold rounded-full flex items-center gap-1 float-badge" style="animation-delay: 0.2s">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                For Sale
                            </span>
                            @endif
                        </div>
                        {{-- Quick Actions Overlay --}}
                        <div class="absolute inset-0 flex items-center justify-center gap-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            @if($project->demo_link)
                            <a href="{{ $project->demo_link }}" target="_blank"
                               class="w-12 h-12 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300 hover:scale-110 transition-all"
                               title="Live Demo" onclick="event.stopPropagation()">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            @endif
                            @if($project->github_link)
                            <a href="{{ $project->github_link }}" target="_blank"
                               class="w-12 h-12 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300 hover:scale-110 transition-all"
                               title="Source Code" onclick="event.stopPropagation()">
                                <svg class="w-6 h-6 text-gray-700 dark:text-slate-300 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>

                    {{-- Body --}}
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-start justify-between gap-3 mb-3">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $project->title }}</h3>
                            @if($project->category)
                            <span class="flex-shrink-0 text-xs px-2 py-1 bg-blue-50 dark:bg-blue-900/50 transition-colors duration-300 text-blue-600 dark:text-blue-400 transition-colors duration-300 border border-blue-100 rounded-full font-semibold">{{ $project->category->name }}</span>
                            @endif
                        </div>

                        <p class="text-gray-600 dark:text-slate-400 transition-colors duration-300 mb-4 line-clamp-3">{{ Str::limit($project->description, 120) }}</p>

                        @if(!empty($techs))
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($techs, 0, 4) as $tech)
                            <span class="px-2 py-1 bg-gradient-to-r from-gray-50 to-gray-100 text-gray-700 dark:text-slate-300 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 text-xs rounded-full tech-pill">{{ $tech }}</span>
                            @endforeach
                            @if(count($techs) > 4)
                            <span class="px-2 py-1 bg-gray-100 text-gray-500 dark:text-slate-400 transition-colors duration-300 text-xs rounded-full">+{{ count($techs) - 4 }} more</span>
                            @endif
                        </div>
                        @endif

                        <div class="flex items-center justify-between mt-auto pt-4 border-t border-gray-100">
                            @if($project->price)
                            <div>
                                <div class="text-lg font-bold text-blue-600 dark:text-blue-400 transition-colors duration-300">{{ $project->formatted_price }}</div>
                                <div class="flex items-center gap-1 mt-1">
                                    <div class="flex text-yellow-400">
                                        @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        @endfor
                                    </div>
                                    <span class="text-xs text-gray-500 dark:text-slate-400 transition-colors duration-300">({{ rand(10, 50) }} reviews)</span>
                                </div>
                            </div>
                            @else
                            <span class="text-xs text-gray-400">Open project</span>
                            @endif
                            <a href="{{ route('portfolio.show', $project) }}"
                               class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 dark:text-blue-400 transition-colors duration-300 hover:text-blue-700 transition-colors">
                                View Details
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-14">
                {{ $projects->links() }}
            </div>

            @else
            {{-- Empty state --}}
            <div class="text-center py-24 animate-fade-in-up">
                <div class="w-32 h-32 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mx-auto mb-8 flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-4 bg-gradient-to-r from-gray-600 to-gray-800 bg-clip-text text-transparent">No Projects Found</h3>
                <p class="text-gray-600 dark:text-slate-400 transition-colors duration-300 text-lg mb-8 max-w-md mx-auto">No projects match your current filters. Try adjusting your search or browse all categories.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('portfolio') }}"
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold rounded-xl shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v12a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2z"/>
                        </svg>
                        Browse All Projects
                    </a>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center px-8 py-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 hover:bg-gray-50 dark:hover:bg-slate-700/80 transition-colors duration-300 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 font-bold rounded-xl border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 hover:border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 shadow-sm transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Request Custom Project
                    </a>
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- ── CTA ───────────────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border-t border-gray-200 dark:border-indigo-500/20 transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 p-10 lg:p-16 text-center shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300">
                <div class="pointer-events-none absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/5 blur-2xl hero-glow"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/5 blur-2xl hero-glow"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4 hero-shimmer bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent">Ready to Start Your Project?</h2>
                    <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">I build custom solutions that drive business growth. Let's discuss how I can help bring your ideas to life.</p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 text-blue-700 font-bold rounded-xl hover:bg-blue-50 dark:bg-blue-900/50 transition-colors duration-300 transition-all duration-200 hover:scale-105 shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 btn-ripple relative overflow-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hire Me
                        </a>
                        <a href="{{ route('store') }}"
                           class="inline-flex items-center gap-2 px-8 py-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 text-white font-semibold rounded-xl border border-white/20 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300/20 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707L17 13z"/>
                            </svg>
                            Browse Solutions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

{{-- ── IMAGE LIGHTBOX MODAL ──────────────────────────────────────────────── --}}
<div x-show="showLightbox" 
     x-cloak
     @click="showLightbox = false"
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/90 backdrop-blur-sm"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0">
    <div class="relative max-w-7xl mx-auto px-4">
        <button @click.stop="showLightbox = false" 
                class="absolute top-4 right-4 w-12 h-12 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 hover:bg-white dark:hover:bg-slate-600/80 transition-colors duration-300/20 rounded-full flex items-center justify-center text-white transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <img :src="lightboxImage" 
             @click.stop
             class="max-h-[90vh] w-auto rounded-2xl shadow-2xl"
             alt="Project preview">
    </div>
</div>

{{-- ── BACK TO TOP BUTTON ──────────────────────────────────────────────── --}}
<button @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        x-show="window.pageYOffset > 300"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-4"
        class="fixed bottom-8 right-8 z-40 w-14 h-14 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white rounded-full shadow-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 neon-glow cursor-pointer"
        title="Back to Top">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
function portfolioApp() {
    return {
        showLightbox: false,
        lightboxImage: '',
        scrollProgress: 0,
        
        openLightbox(imageSrc) {
            if (imageSrc) {
                this.lightboxImage = imageSrc;
                this.showLightbox = true;
            }
        },
        
        init() {
            // Animated counter for stats
            this.animateCounters();
            
            // Parallax effect on scroll
            window.addEventListener('scroll', () => {
                this.handleParallax();
                this.updateScrollProgress();
            });
            
            // Intersection Observer for scroll animations
            this.observeElements();
            
            // Add magnetic effect to buttons
            this.addMagneticEffect();
        },
        
        updateScrollProgress() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            this.scrollProgress = (winScroll / height) * 100;
        },
        
        animateCounters() {
            const counters = document.querySelectorAll('[data-counter]');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px'
            };
            
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                        entry.target.classList.add('counted');
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-counter'));
                        const duration = 2000;
                        const step = target / (duration / 16);
                        let current = 0;
                        
                        const timer = setInterval(() => {
                            current += step;
                            if (current >= target) {
                                counter.textContent = target + '+';
                                clearInterval(timer);
                            } else {
                                counter.textContent = Math.floor(current) + '+';
                            }
                        }, 16);
                    }
                });
            }, observerOptions);
            
            counters.forEach(counter => counterObserver.observe(counter));
        },
        
        handleParallax() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('[data-parallax]');
            
            parallaxElements.forEach(el => {
                const speed = el.getAttribute('data-parallax') || 0.5;
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });
        },
        
        observeElements() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            document.querySelectorAll('.observe-me').forEach(el => {
                observer.observe(el);
            });
        },
        
        addMagneticEffect() {
            const magneticButtons = document.querySelectorAll('.magnetic-btn');
            
            magneticButtons.forEach(btn => {
                btn.addEventListener('mousemove', (e) => {
                    const rect = btn.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    btn.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px) scale(1.05)`;
                });
                
                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = 'translate(0, 0) scale(1)';
                });
            });
        }
    }
}

// Smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add ripple effect to buttons
    document.querySelectorAll('.btn-ripple').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple-effect');
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
    
    // Lazy load images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                        imageObserver.unobserve(img);
                    }
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
});
</script>

<style>
[x-cloak] { display: none !important; }

.ripple-effect {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.6);
    transform: scale(0);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
}

@keyframes ripple-animation {
    to {
        transform: scale(4);
        opacity: 0;
    }
}

.animate-in {
    animation: fadeInUp 0.6s ease-out forwards;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Enhanced card hover effects */
.project-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
}

.project-card::before {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: 1rem;
    padding: 2px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    opacity: 0;
    transition: opacity 0.4s;
}

.project-card:hover::before {
    opacity: 1;
}

/* Glowing effect on hover */
.glow-on-hover {
    position: relative;
    overflow: hidden;
}

.glow-on-hover::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(99, 102, 241, 0.3) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.5s;
    pointer-events: none;
}

.glow-on-hover:hover::after {
    opacity: 1;
}

/* Skeleton loading animation */
@keyframes skeleton-loading {
    0% {
        background-position: -200% 0;
    }
    100% {
        background-position: 200% 0;
    }
}

.skeleton {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
}

/* Floating animation for badges */
@keyframes float-badge {
    0%, 100% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-5px);
    }
}

.float-badge {
    animation: float-badge 2s ease-in-out infinite;
}

/* Pulse animation for featured items */
@keyframes pulse-ring {
    0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(99, 102, 241, 0.7);
    }
    70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(99, 102, 241, 0);
    }
    100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(99, 102, 241, 0);
    }
}

.pulse-ring {
    animation: pulse-ring 2s infinite;
}
</style>
@endpush

@endsection
