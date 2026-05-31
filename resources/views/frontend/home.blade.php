@extends('layouts.app')

@section('title', 'Home - Full Stack Developer & Web Solutions')

@section('content')
<div class="bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 text-gray-900 dark:text-slate-100 transition-colors duration-300">

{{-- ═══════════════════════════════════════════════════════════════════════
     1. HERO SECTION
════════════════════════════════════════════════════════════════════════ --}}
<section class="relative dark:bg-slate-800/80 dark:backdrop-blur-sm pt-4 pb-2 sm:pt-6 sm:pb-3 lg:pt-8 lg:pb-4 overflow-hidden transition-colors duration-300">

    <div class="relative z-10 w-full px-3 sm:px-4 md:px-6 lg:px-8 xl:px-16">

        {{-- First Row: 2 Columns --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8 xl:gap-12 mb-4 sm:mb-6 md:mb-8 xl:mb-12">

            {{-- ── LEFT CARD CONTAINER (for rotation) ── --}}
            <div class="relative min-h-[500px] sm:min-h-[550px] md:min-h-[600px] lg:min-h-[650px] hero-card-container">
                
                {{-- ── PROFILE CARD (Always first) ── --}}
                <div id="hero-card-0" class="hero-card active relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border border-blue-200 dark:border-gray-700 p-4 sm:p-6 md:p-8 lg:p-10 bg-gradient-to-br from-blue-50 via-white to-violet-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-black dark:to-indigo-950 transition-all duration-1000 page-load-animate hero-profile">
                    
                    {{-- Animated Background Pattern --}}
                    <div class="absolute inset-0 opacity-5 dark:opacity-10" style="background-image: radial-gradient(circle at 2px 2px, currentColor 1px, transparent 0); background-size: 32px 32px;"></div>
                    
                    <div class="relative z-10">
                        {{-- Top Status Bar --}}
                        <div class="flex items-center justify-between mb-4">
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] sm:text-xs font-bold bg-gradient-to-r from-green-400 to-emerald-500 text-white shadow-lg">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                                </span>
                                Online Now
                            </div>
                            <div class="flex gap-1.5">
                                <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-[10px] font-bold rounded-full border border-blue-300 dark:border-blue-700">🏆 Verified</span>
                                <span class="px-2 py-1 bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-300 text-[10px] font-bold rounded-full border border-yellow-300 dark:border-yellow-700">⭐ Pro</span>
                            </div>
                        </div>

                        {{-- Enhanced profile photo with 3D effect --}}
                        <div class="relative group mb-4">
                            <div class="absolute inset-0 rounded-2xl sm:rounded-3xl bg-gradient-to-br from-blue-400 via-violet-500 to-pink-500 blur-2xl opacity-40 scale-110 group-hover:scale-125 group-hover:opacity-60 transition-all duration-500 animate-pulse"></div>
                            <div class="relative w-28 h-28 sm:w-36 sm:h-36 md:w-44 md:h-44 lg:w-52 lg:h-52 rounded-2xl sm:rounded-3xl overflow-hidden border-4 border-white dark:border-gray-800 shadow-2xl mx-auto ring-4 ring-blue-100 dark:ring-blue-900/30 group-hover:ring-8 transition-all duration-500">
                                @if($settings['profile_photo'] ?? null)
                                    <img src="{{ $settings['profile_photo'] }}" alt="{{ $settings['site_name'] ?? 'Profile' }}"
                                         class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-600 via-violet-600 to-pink-600 flex flex-col items-center justify-center gap-1 sm:gap-2 group-hover:from-blue-500 group-hover:via-violet-500 group-hover:to-pink-500 transition-all duration-500">
                                        <svg class="w-10 h-10 sm:w-14 sm:h-14 md:w-18 md:h-18 text-white/40 group-hover:text-white/60 transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        <span class="text-white/60 text-[10px] sm:text-xs font-medium px-2 sm:px-4 text-center group-hover:text-white/80 transition-colors duration-500">Upload photo in Admin → Settings</span>
                                    </div>
                                @endif
                                {{-- Enhanced live dot with glow --}}
                                <div class="absolute -bottom-2 -right-2 w-8 h-8 sm:w-10 sm:h-10 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full shadow-xl flex items-center justify-center border-4 border-white dark:border-gray-900 group-hover:scale-110 transition-transform duration-300">
                                    <span class="relative flex h-4 w-4">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-4 w-4 bg-white"></span>
                                    </span>
                                </div>
                                {{-- Enhanced name badge --}}
                                <div class="absolute -top-3 left-1/2 -translate-x-1/2 whitespace-nowrap bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 rounded-full px-3 py-1.5 shadow-2xl border-2 border-white dark:border-gray-800 text-xs sm:text-sm font-bold text-white group-hover:shadow-2xl group-hover:scale-105 transition-all duration-300">
                                    {{ $settings['site_name'] ?? 'Brian Owaka' }}
                                </div>
                                {{-- Floating badges --}}
                                <div class="absolute -top-8 right-0 opacity-0 group-hover:opacity-100 transition-all duration-300 transform group-hover:-translate-y-1">
                                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-[10px] sm:text-xs font-bold px-2 py-1 rounded-full shadow-lg animate-bounce">⭐ Top Rated</span>
                                </div>
                                <div class="absolute -top-8 left-0 opacity-0 group-hover:opacity-100 transition-all duration-300 delay-100 transform group-hover:-translate-y-1">
                                    <span class="bg-gradient-to-r from-blue-400 to-cyan-500 text-white text-[10px] sm:text-xs font-bold px-2 py-1 rounded-full shadow-lg animate-bounce">🚀 Fast</span>
                                </div>
                            </div>
                        </div>

                        {{-- Professional Title & Description --}}
                        <div class="text-center mb-4">
                            <h3 class="text-lg sm:text-xl md:text-2xl font-extrabold bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent mb-2">
                                Full Stack Developer
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-400 max-w-md mx-auto leading-relaxed">
                                Crafting scalable web applications with modern technologies. Specialized in Laravel, React, and cloud solutions.
                            </p>
                        </div>

                        {{-- Quick Stats Grid --}}
                        <div class="grid grid-cols-3 gap-2 mb-4">
                            <div class="bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900/30 dark:to-blue-800/30 rounded-xl p-2.5 border border-blue-300 dark:border-blue-700 text-center hover:scale-105 transition-transform duration-300">
                                <div class="text-xl sm:text-2xl font-extrabold text-blue-700 dark:text-blue-300">50+</div>
                                <div class="text-[9px] sm:text-xs text-blue-600 dark:text-blue-400 font-medium">Projects</div>
                            </div>
                            <div class="bg-gradient-to-br from-violet-100 to-violet-200 dark:from-violet-900/30 dark:to-violet-800/30 rounded-xl p-2.5 border border-violet-300 dark:border-violet-700 text-center hover:scale-105 transition-transform duration-300">
                                <div class="text-xl sm:text-2xl font-extrabold text-violet-700 dark:text-violet-300">5+</div>
                                <div class="text-[9px] sm:text-xs text-violet-600 dark:text-violet-400 font-medium">Years</div>
                            </div>
                            <div class="bg-gradient-to-br from-pink-100 to-pink-200 dark:from-pink-900/30 dark:to-pink-800/30 rounded-xl p-2.5 border border-pink-300 dark:border-pink-700 text-center hover:scale-105 transition-transform duration-300">
                                <div class="text-xl sm:text-2xl font-extrabold text-pink-700 dark:text-pink-300">100%</div>
                                <div class="text-[9px] sm:text-xs text-pink-600 dark:text-pink-400 font-medium">Quality</div>
                            </div>
                        </div>

                        {{-- Core Skills Pills --}}
                        <div class="flex flex-wrap gap-1.5 justify-center mb-4">
                            @foreach(['Laravel', 'React', 'Vue.js', 'Python', 'Docker', 'AWS'] as $skill)
                            <span class="px-2.5 py-1 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 text-[10px] font-bold rounded-full hover:scale-110 hover:shadow-lg transition-all duration-300 cursor-pointer">
                                {{ $skill }}
                            </span>
                            @endforeach
                        </div>

                        {{-- Enhanced mini dashboard with animations --}}
                        <div class="relative w-full group hero-dashboard page-load-animate">
                            <div class="relative rounded-xl sm:rounded-2xl bg-gradient-to-br from-gray-800 to-gray-900 border border-gray-700 shadow-2xl overflow-hidden">
                                {{-- Terminal Header --}}
                                <div class="flex items-center gap-1.5 px-3 py-2 bg-gradient-to-r from-gray-800 to-gray-900 border-b border-gray-700">
                                    <div class="flex gap-1.5">
                                        <div class="w-3 h-3 rounded-full bg-red-500 hover:bg-red-600 transition-colors cursor-pointer shadow-lg"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-500 hover:bg-yellow-600 transition-colors cursor-pointer shadow-lg"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-500 hover:bg-green-600 transition-colors cursor-pointer shadow-lg"></div>
                                    </div>
                                    <div class="flex-1 text-center text-[10px] text-gray-300 font-mono">Performance Dashboard</div>
                                    <div class="w-5 h-4 border border-gray-600 rounded-sm bg-gray-700"></div>
                                </div>
                                
                                {{-- Stats Content --}}
                                <div class="p-3 sm:p-4 space-y-2.5">
                                    @php
                                        $statColors = [
                                            ['value' => 'text-green-400', 'bar' => 'from-green-500 to-emerald-600', 'glow' => 'shadow-green-500/50'],
                                            ['value' => 'text-blue-400',  'bar' => 'from-blue-500 to-violet-600', 'glow' => 'shadow-blue-500/50'],
                                            ['value' => 'text-violet-400','bar' => 'from-violet-500 to-pink-600', 'glow' => 'shadow-violet-500/50'],
                                            ['value' => 'text-pink-400',  'bar' => 'from-pink-500 to-rose-600', 'glow' => 'shadow-pink-500/50'],
                                            ['value' => 'text-amber-400', 'bar' => 'from-amber-500 to-orange-600', 'glow' => 'shadow-amber-500/50'],
                                        ];
                                    @endphp
                                    @foreach($heroStats as $i => $stat)
                                    @php $color = $statColors[$i % count($statColors)]; @endphp
                                    <div class="stagger-child">
                                        <div class="flex items-center justify-between mb-1">
                                            <span class="text-[10px] sm:text-xs font-semibold text-gray-400">{{ $stat['label'] }}</span>
                                            <span class="text-[10px] sm:text-xs font-bold {{ $color['value'] }}">{{ $stat['value'] }}</span>
                                        </div>
                                        <div class="w-full bg-gray-700 rounded-full h-2 border border-gray-600 skill-bar overflow-hidden">
                                            <div class="bg-gradient-to-r {{ $color['bar'] }} h-2 rounded-full skill-progress shadow-lg {{ $color['glow'] }} relative" data-width="{{ $stat['percent'] }}%" style="width: 0%">
                                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="flex gap-2 mt-4">
                            <a href="{{ route('portfolio') }}" class="flex-1 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 hover:from-blue-500 hover:via-violet-500 hover:to-pink-500 text-white text-xs sm:text-sm font-bold py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-center">
                                View Portfolio
                            </a>
                            <a href="#contact" class="flex-1 bg-white dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:border-blue-500 dark:hover:border-blue-500 text-xs sm:text-sm font-bold py-2.5 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-center">
                                Hire Me
                            </a>
                        </div>
                    </div>
                </div>

                {{-- ── DYNAMIC ADVERTISEMENT CARDS ── --}}
                @foreach($advertisementCards as $index => $card)
                @php
                    $cardIndex = $index + 1;
                    $themeClasses = $card->getThemeClasses();
                @endphp
                <div id="hero-card-{{ $cardIndex }}" class="hero-card relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border-2 {{ $themeClasses['border'] }} p-4 sm:p-6 md:p-8 lg:p-10 {{ $themeClasses['background'] }} transition-all duration-1000 page-load-animate hero-advertisement" style="opacity: 0; transform: translateX(-100%);">
                    
                    {{-- Animated Background Pattern --}}
                    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 32px 32px;"></div>
                    
                    {{-- Floating Decorative Elements --}}
                    <div class="absolute top-10 right-10 w-32 h-32 {{ $themeClasses['glow'] }} rounded-full blur-3xl opacity-20 animate-pulse"></div>
                    <div class="absolute bottom-10 left-10 w-40 h-40 {{ $themeClasses['glow'] }} rounded-full blur-3xl opacity-20 animate-pulse" style="animation-delay: 1s;"></div>
                    
                    <div class="relative z-10">
                        {{-- Top Status Bar --}}
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex gap-1.5">
                                <span class="px-2 py-0.5 bg-white/20 backdrop-blur-sm text-white text-[9px] font-bold rounded-full border border-white/30">🔥 Hot</span>
                                @if($card->original_price && $card->sale_price)
                                @php $discount = round((($card->original_price - $card->sale_price) / $card->original_price) * 100); @endphp
                                <span class="px-2 py-0.5 bg-red-500 text-white text-[9px] font-bold rounded-full animate-pulse">-{{ $discount }}%</span>
                                @endif
                            </div>
                            <div class="flex gap-1">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <div class="w-2 h-2 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.2s;"></div>
                                <div class="w-2 h-2 bg-red-400 rounded-full animate-pulse" style="animation-delay: 0.4s;"></div>
                            </div>
                        </div>

                        {{-- Advertisement Header --}}
                        <div class="text-center mb-4">
                            @if($card->badge_text)
                            <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] sm:text-xs font-bold mb-3 {{ $themeClasses['badge'] }} text-black shadow-xl {{ $card->theme_color === 'pink' ? 'animate-pulse' : '' }}">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-600 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                </span>
                                @if($card->badge_icon){{ $card->badge_icon }} @endif{{ $card->badge_text }}
                            </div>
                            @endif
                            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-white mb-2 leading-tight">
                                <span class="{{ $themeClasses['title'] }}">
                                    {{ $card->title }}
                                </span>
                            </h2>
                            @if($card->subtitle)
                            <p class="{{ $themeClasses['subtitle'] }} text-xs sm:text-sm leading-relaxed">{{ $card->subtitle }}</p>
                            @endif
                            @if($card->description)
                            <p class="text-white/80 text-[10px] sm:text-xs mt-2 leading-relaxed max-w-md mx-auto">{{ Str::limit($card->description, 120) }}</p>
                            @endif
                        </div>

                        {{-- Visual Content --}}
                        @if($card->visual_type === 'grid' && $card->showcase_items && count($card->showcase_items) > 0)
                        <div class="relative mb-4 group">
                            <div class="absolute inset-0 {{ $themeClasses['glow'] }} rounded-2xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 via-slate-900/90 to-black/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 {{ $themeClasses['visualBorder'] }} border-2">
                                <div class="grid {{ count($card->showcase_items) === 3 ? 'grid-cols-3' : 'grid-cols-2' }} gap-3 mb-4">
                                    @foreach($card->showcase_items as $itemIndex => $item)
                                    <div class="{{ $themeClasses['showcaseItem'] }} rounded-xl p-3 text-center hover:scale-105 transition-transform duration-300 border border-white/10" style="animation-delay: {{ $itemIndex * 0.1 }}s;">
                                        <div class="text-3xl mb-2">{{ $item['icon'] ?? '⭐' }}</div>
                                        <div class="text-white text-xs font-bold mb-1">{{ $item['title'] }}</div>
                                        @if(isset($item['description']))
                                        <div class="text-white/70 text-[9px]">{{ Str::limit($item['description'], 30) }}</div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-center">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 {{ $themeClasses['badge'] }} rounded-full text-black text-xs font-bold shadow-lg">
                                        <span class="relative flex h-2 w-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-600 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                        </span>
                                        Modern Tech Stack
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($card->visual_type === 'mockup')
                        <div class="relative mb-4 group">
                            <div class="absolute inset-0 {{ $themeClasses['glow'] }} rounded-2xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 via-slate-900/90 to-black/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 {{ $themeClasses['visualBorder'] }} border-2">
                                <div class="flex justify-center mb-4">
                                    <div class="bg-gradient-to-b from-gray-800 to-gray-900 rounded-3xl p-3 border-4 border-gray-600 shadow-2xl hover:scale-105 transition-transform duration-500">
                                        <div class="w-36 h-64 sm:w-44 sm:h-72 {{ $themeClasses['mockup'] }} rounded-2xl relative overflow-hidden shadow-inner">
                                            {{-- Phone Notch --}}
                                            <div class="absolute top-3 left-1/2 transform -translate-x-1/2 w-16 h-1.5 bg-gray-800 rounded-full"></div>
                                            {{-- Screen Content --}}
                                            <div class="p-4 pt-8">
                                                <div class="grid grid-cols-3 gap-2 mb-4">
                                                    @foreach($card->showcase_items ?? [['icon' => '📊'], ['icon' => '💬'], ['icon' => '🔔']] as $item)
                                                    <div class="bg-white/20 backdrop-blur-sm rounded-xl h-10 flex items-center justify-center hover:bg-white/30 transition-colors">
                                                        <span class="text-white text-lg">{{ $item['icon'] ?? '⭐' }}</span>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="space-y-3">
                                                    <div class="bg-white/10 backdrop-blur-sm rounded-lg h-4 animate-pulse"></div>
                                                    <div class="bg-white/10 backdrop-blur-sm rounded-lg h-4 w-4/5 animate-pulse" style="animation-delay: 0.2s;"></div>
                                                    <div class="bg-white/10 backdrop-blur-sm rounded-lg h-4 w-3/5 animate-pulse" style="animation-delay: 0.4s;"></div>
                                                    <div class="mt-4 space-y-2">
                                                        <div class="flex gap-2">
                                                            <div class="bg-white/20 rounded-full w-8 h-8"></div>
                                                            <div class="flex-1 space-y-1">
                                                                <div class="bg-white/10 rounded h-2"></div>
                                                                <div class="bg-white/10 rounded h-2 w-2/3"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 {{ $themeClasses['badge'] }} rounded-full text-black text-xs font-bold shadow-lg">
                                        <span class="relative flex h-2 w-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-600 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                        </span>
                                        Cross-Platform Ready
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($card->visual_type === 'icon')
                        <div class="relative mb-4 group">
                            <div class="absolute inset-0 {{ $themeClasses['glow'] }} rounded-2xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 via-slate-900/90 to-black/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 {{ $themeClasses['visualBorder'] }} border-2">
                                <div class="flex justify-center mb-4">
                                    <div class="relative">
                                        <div class="w-24 h-24 sm:w-28 sm:h-28 {{ $themeClasses['showcaseItem'] }} rounded-full flex items-center justify-center relative overflow-hidden shadow-2xl border-4 border-white/20 hover:scale-110 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent animate-shimmer"></div>
                                            <span class="text-4xl sm:text-5xl relative z-10">{{ $card->showcase_items[0]['icon'] ?? '⚡' }}</span>
                                        </div>
                                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                                            <span class="text-sm">⚡</span>
                                        </div>
                                        <div class="absolute -bottom-2 -left-2 w-8 h-8 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full flex items-center justify-center shadow-lg animate-pulse">
                                            <span class="text-sm">✓</span>
                                        </div>
                                    </div>
                                </div>
                                @if($card->showcase_items && count($card->showcase_items) > 1)
                                <div class="grid grid-cols-{{ min(count($card->showcase_items) - 1, 3) }} gap-2 mb-4">
                                    @foreach(array_slice($card->showcase_items, 1) as $itemIndex => $item)
                                    <div class="{{ $themeClasses['showcaseItem'] }} rounded-xl p-2.5 text-center hover:scale-105 transition-transform duration-300 border border-white/10" style="animation-delay: {{ $itemIndex * 0.1 }}s;">
                                        <div class="text-2xl mb-1">{{ $item['icon'] ?? '⭐' }}</div>
                                        <div class="text-white text-[10px] font-bold">{{ $item['title'] }}</div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <div class="text-center">
                                    <div class="inline-flex items-center gap-2 px-3 py-1.5 {{ $themeClasses['badge'] }} rounded-full text-black text-xs font-bold shadow-lg">
                                        <span class="relative flex h-2 w-2">
                                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-purple-600 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-purple-500"></span>
                                        </span>
                                        {{ $card->showcase_items[0]['title'] ?? 'Advanced Features' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        {{-- Default visual for cards without specific visual type --}}
                        <div class="relative mb-4 group">
                            <div class="absolute inset-0 {{ $themeClasses['glow'] }} rounded-2xl blur-2xl opacity-40 group-hover:opacity-60 transition-opacity duration-500"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 via-slate-900/90 to-black/90 backdrop-blur-sm rounded-2xl p-6 {{ $themeClasses['visualBorder'] }} border-2">
                                <div class="text-center">
                                    <div class="text-5xl mb-4 animate-bounce">{{ $card->badge_icon ?? '🚀' }}</div>
                                    <p class="text-white text-sm leading-relaxed">{{ Str::limit($card->description, 150) }}</p>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Features --}}
                        @if($card->features && count($card->features) > 0)
                        <div class="bg-white/5 backdrop-blur-sm rounded-xl p-4 mb-4 border border-white/10">
                            <h3 class="text-white font-bold text-sm mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                What's Included
                            </h3>
                            <div class="space-y-2.5">
                                @foreach($card->features as $featureIndex => $feature)
                                <div class="flex items-start gap-2.5 text-white group hover:translate-x-1 transition-transform duration-300" style="animation-delay: {{ $featureIndex * 0.1 }}s;">
                                    <div class="w-6 h-6 {{ $themeClasses['featureIcon'] }} rounded-lg flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                    <span class="text-xs font-medium leading-relaxed">{{ $feature }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Stats/Metrics (if available) --}}
                        @if($card->showcase_items && count($card->showcase_items) > 0)
                        <div class="grid grid-cols-3 gap-2 mb-4">
                            @foreach(array_slice($card->showcase_items, 0, 3) as $stat)
                            <div class="bg-white/5 backdrop-blur-sm rounded-lg p-2 text-center border border-white/10 hover:bg-white/10 transition-colors duration-300">
                                <div class="text-lg font-bold text-white">{{ $stat['icon'] ?? '⭐' }}</div>
                                <div class="text-[9px] text-white/80 font-medium">{{ Str::limit($stat['title'], 15) }}</div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- Pricing & CTA --}}
                        <div class="text-center">
                            @if($card->original_price || $card->sale_price)
                            <div class="bg-white/5 backdrop-blur-sm rounded-xl p-4 mb-4 border border-white/10">
                                @if($card->original_price && $card->sale_price)
                                <div class="flex items-center justify-center gap-2 mb-2">
                                    <span class="text-white/60 text-sm line-through">Was ${{ number_format($card->original_price, 0) }}</span>
                                    @php $savings = $card->original_price - $card->sale_price; @endphp
                                    <span class="px-2 py-0.5 bg-red-500 text-white text-[10px] font-bold rounded-full">Save ${{ number_format($savings, 0) }}</span>
                                </div>
                                @endif
                                @if($card->sale_price)
                                <div class="flex items-center justify-center gap-2 mb-2">
                                    <span class="text-4xl font-extrabold text-white">
                                        <span class="{{ $themeClasses['price'] }}">${{ number_format($card->sale_price, 0) }}</span>
                                    </span>
                                </div>
                                @endif
                                @if($card->price_label)
                                <div class="{{ $themeClasses['subtitle'] }} text-xs">{{ $card->price_label }}</div>
                                @endif
                                
                                {{-- Value Proposition --}}
                                <div class="mt-3 pt-3 border-t border-white/10">
                                    <div class="flex items-center justify-center gap-4 text-[10px] text-white/80">
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            Money-back guarantee
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <svg class="w-3 h-3 text-blue-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                                            Secure payment
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                            <div class="space-y-2.5">
                                <a href="{{ $card->primary_button_url }}" 
                                   class="block w-full py-3 px-6 {{ $themeClasses['primaryButton'] }} text-black font-bold rounded-xl shadow-2xl hover:shadow-2xl hover:scale-105 transition-all duration-300 text-sm relative overflow-hidden group">
                                    <span class="relative z-10 flex items-center justify-center gap-2">
                                        {{ $card->primary_button_text }}
                                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    </span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-700"></div>
                                </a>
                                @if($card->secondary_button_text && $card->secondary_button_url)
                                <a href="{{ $card->secondary_button_url }}" 
                                   class="block w-full py-2.5 px-6 border-2 {{ $themeClasses['secondaryButton'] }} font-semibold rounded-xl transition-all duration-300 text-sm hover:scale-105 backdrop-blur-sm">
                                    {{ $card->secondary_button_text }}
                                </a>
                                @endif
                            </div>
                        </div>

                        {{-- Countdown Timer (only for first ad card) --}}
                        @if($index === 0)
                        <div class="mt-4 bg-gradient-to-r from-red-500/20 to-pink-500/20 backdrop-blur-sm rounded-xl p-3 border border-red-500/30">
                            <div class="text-center">
                                <div class="{{ $themeClasses['subtitle'] }} text-xs mb-2 flex items-center justify-center gap-1">
                                    <svg class="w-3 h-3 animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Offer expires in:
                                </div>
                                <div id="countdown-timer" class="flex justify-center gap-2 text-white font-bold">
                                    <div class="bg-gradient-to-br from-red-500 to-pink-600 px-3 py-2 rounded-lg shadow-lg min-w-[50px]">
                                        <div class="text-xl" id="days">23</div>
                                        <div class="text-[9px] opacity-80">DAYS</div>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-500 to-pink-600 px-3 py-2 rounded-lg shadow-lg min-w-[50px]">
                                        <div class="text-xl" id="hours">15</div>
                                        <div class="text-[9px] opacity-80">HRS</div>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-500 to-pink-600 px-3 py-2 rounded-lg shadow-lg min-w-[50px]">
                                        <div class="text-xl" id="minutes">42</div>
                                        <div class="text-[9px] opacity-80">MIN</div>
                                    </div>
                                    <div class="bg-gradient-to-br from-red-500 to-pink-600 px-3 py-2 rounded-lg shadow-lg min-w-[50px]">
                                        <div class="text-xl" id="seconds">18</div>
                                        <div class="text-[9px] opacity-80">SEC</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        {{-- Trust Indicators --}}
                        <div class="mt-4 flex items-center justify-center gap-3 text-[10px] text-white/60">
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                4.9/5 Rating
                            </span>
                            <span>•</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3 h-3 text-green-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                500+ Happy Clients
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            {{-- ── RIGHT CARD: Main Content ── --}}
            <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border border-purple-200 dark:border-gray-700 p-4 sm:p-6 md:p-8 lg:p-10 bg-white dark:bg-black transition-colors duration-300">
                <div class="relative z-10">
                @if($heroOffer)
                    {{-- Header --}}
                    <div class="mb-4 sm:mb-6">
                        <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3 sm:px-4 py-1.5 sm:py-2 rounded-full text-[10px] sm:text-xs font-bold mb-3 sm:mb-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-black shadow-lg animate-pulse">
                            <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 bg-red-500 rounded-full animate-ping"></span>
                            {{ $heroOffer->badge_text }}
                        </div>
                        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-extrabold text-white mb-1.5 sm:mb-2 leading-tight">
                            <span class="bg-gradient-to-r from-yellow-300 via-pink-300 to-purple-300 bg-clip-text text-transparent">
                                {{ $heroOffer->title }}
                            </span>
                        </h2>
                        <p class="text-purple-200 text-xs sm:text-sm md:text-base mb-4">{{ $heroOffer->subtitle }}</p>

                        {{-- Tech Features Grid --}}
                        @if(!empty($heroOffer->features))
                        <div class="grid grid-cols-2 gap-2 sm:gap-3">
                            @foreach(array_slice($heroOffer->features, 0, 4) as $feature)
                            <div class="bg-gradient-to-r from-{{ $feature['gradient_from'] }} to-{{ $feature['gradient_to'] }} rounded-lg p-2 sm:p-3 text-center">
                                <div class="text-white font-bold text-sm sm:text-lg">{{ $feature['icon'] }}</div>
                                <div class="text-white text-[10px] sm:text-xs font-semibold">{{ $feature['title'] }}</div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    {{-- Offer Details / Benefits --}}
                    @if(!empty($heroOffer->benefits))
                    <div class="space-y-2.5 sm:space-y-4 mb-4 sm:mb-6">
                        @php
                            $benefitGradients = [
                                'from-green-400 to-emerald-500',
                                'from-blue-400 to-purple-500',
                                'from-pink-400 to-red-500',
                                'from-yellow-400 to-orange-500',
                                'from-teal-400 to-cyan-500',
                            ];
                        @endphp
                        @foreach($heroOffer->benefits as $i => $benefit)
                        <div class="flex items-center gap-2 sm:gap-3 text-white">
                            <div class="w-5 h-5 sm:w-6 sm:h-6 bg-gradient-to-r {{ $benefitGradients[$i % count($benefitGradients)] }} rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-2.5 h-2.5 sm:w-3 sm:h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-xs sm:text-sm font-medium">{{ $benefit }}</span>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- Pricing & CTA --}}
                    <div class="text-center">
                        <div class="mb-3 sm:mb-4">
                            @if($heroOffer->regular_price)
                            <div class="text-gray-400 text-xs sm:text-sm line-through">Regular Price: {{ $heroOffer->regular_price }}</div>
                            @endif
                            <div class="text-2xl sm:text-3xl font-extrabold text-white mb-1">
                                <span class="bg-gradient-to-r from-yellow-300 to-orange-400 bg-clip-text text-transparent">{{ $heroOffer->offer_price }}</span>
                            </div>
                            @if($heroOffer->savings_text)
                            <div class="text-purple-200 text-[10px] sm:text-xs">{{ $heroOffer->savings_text }}</div>
                            @endif
                        </div>

                        <div class="space-y-2 sm:space-y-3">
                            <a href="{{ $heroOffer->cta_link }}"
                               class="block w-full py-2.5 sm:py-3 px-4 sm:px-6 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 hover:from-yellow-300 hover:via-orange-400 hover:to-red-400 text-black font-bold rounded-lg sm:rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-xs sm:text-sm">
                                {{ $heroOffer->cta_text }}
                            </a>
                            @if($heroOffer->secondary_cta_text)
                            <a href="{{ $heroOffer->secondary_cta_link ?? route('portfolio') }}"
                               class="block w-full py-2 sm:py-2 px-4 sm:px-6 border-2 border-purple-400 hover:border-purple-300 text-purple-200 hover:text-white font-semibold rounded-lg sm:rounded-xl transition-all duration-300 text-xs sm:text-sm">
                                {{ $heroOffer->secondary_cta_text }}
                            </a>
                            @endif
                        </div>
                    </div>
                @else
                    {{-- Fallback when no active offer --}}
                    <div class="text-center py-8">
                        <div class="text-4xl mb-4">🚀</div>
                        <h2 class="text-2xl font-extrabold text-white mb-2">Ready to Build Something?</h2>
                        <p class="text-purple-200 text-sm mb-6">Let's create something amazing together.</p>
                        <a href="{{ route('contact') }}"
                           class="inline-block py-3 px-8 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-bold rounded-xl hover:scale-105 transition-all duration-300 text-sm">
                            Get In Touch
                        </a>
                    </div>
                @endif

                    {{-- Countdown Timer --}}
                    <div class="mt-4 sm:mt-6 text-center">
                        <div class="text-purple-200 text-[10px] sm:text-xs mb-1.5 sm:mb-2">Offer expires in:</div>
                        <div id="countdown-timer" class="flex justify-center gap-1.5 sm:gap-2 text-white font-bold text-xs sm:text-sm">
                            <div class="bg-gradient-to-r from-red-500 to-pink-500 px-1.5 sm:px-2 py-1 rounded">
                                <span id="days">23</span><span class="text-[10px] sm:text-xs">d</span>
                            </div>
                            <div class="bg-gradient-to-r from-red-500 to-pink-500 px-1.5 sm:px-2 py-1 rounded">
                                <span id="hours">15</span><span class="text-[10px] sm:text-xs">h</span>
                            </div>
                            <div class="bg-gradient-to-r from-red-500 to-pink-500 px-1.5 sm:px-2 py-1 rounded">
                                <span id="minutes">42</span><span class="text-[10px] sm:text-xs">m</span>
                            </div>
                            <div class="bg-gradient-to-r from-red-500 to-pink-500 px-1.5 sm:px-2 py-1 rounded">
                                <span id="seconds">18</span><span class="text-[10px] sm:text-xs">s</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>{{-- End LIMITED TIME OFFER Card --}}

        </div>{{-- End First Row Grid --}}

        {{-- Second Row: Full Width Text Card --}}
        <div class="mb-4 sm:mb-6 md:mb-8 xl:mb-12">
            {{-- ── TEXT CARD: Main Content (Full Width) ── --}}
            <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border border-purple-200 dark:border-gray-700 p-4 sm:p-6 md:p-8 lg:p-10 bg-white dark:bg-black transition-colors duration-300">
                
                {{-- Grid Layout: Left content + Right stats --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                    
                    {{-- LEFT: Main Content (2 columns) --}}
                    <div class="lg:col-span-2 relative z-10">
                    {{-- Enhanced status pill with hover effect --}}
                    <div class="inline-flex items-center gap-1.5 sm:gap-2 px-2.5 sm:px-3.5 py-1 sm:py-1.5 rounded-full text-[10px] sm:text-xs font-semibold mb-4 sm:mb-6
                                bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 text-blue-600 dark:text-blue-300 shadow-sm hover:bg-gray-200 dark:hover:bg-gray-900 hover:shadow-md hover:scale-105 transition-all duration-300 cursor-pointer page-load-animate hero-status">
                        <span class="relative flex h-1.5 w-1.5 sm:h-2 sm:w-2">
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 sm:h-2 sm:w-2 bg-green-500"></span>
                    </span>
                        <span class="group-hover:text-blue-800 dark:group-hover:text-blue-200 transition-colors">Available for new projects</span>
                    </div>

                    {{-- Enhanced headline with sliding text effects --}}
                    <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-extrabold leading-[1.15] text-gray-900 dark:text-slate-100 mb-4 sm:mb-6 tracking-tight transition-colors duration-300 page-load-animate hero-headline">
                        <div class="overflow-hidden mb-1 sm:mb-2">
                            <span class="inline-block hover:scale-105 transition-transform duration-300">{{ $settings['hero_line1'] }}</span>
                        </div>
                        <div class="overflow-hidden mb-1 sm:mb-2">
                            <span class="relative inline-block group">
                                <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-500 bg-clip-text text-transparent hover:from-blue-500 hover:via-violet-500 hover:to-pink-400 transition-all duration-300"> {{ $settings['hero_line2'] }}</span>
                                <svg class="absolute -bottom-0.5 sm:-bottom-1 left-0 w-full group-hover:scale-x-110 transition-transform duration-300" viewBox="0 0 300 8" fill="none" preserveAspectRatio="none">
                                <path d="M1 5.5 Q75 1 150 5.5 Q225 10 299 5.5" stroke="url(#heroUL)" stroke-width="2.5" stroke-linecap="round"/>
                                    <defs><linearGradient id="heroUL" x1="0" y1="0" x2="300" y2="0" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#2563eb"/><stop offset=".5" stop-color="#7c3aed"/><stop offset="1" stop-color="#ec4899"/>
                                    </linearGradient></defs>
                                </svg>
                            </span>
                        </div>
                        <div class="overflow-hidden">
                            <span class="inline-block hover:scale-105 transition-transform duration-300">{{ $settings['hero_line3'] }}</span>
                        </div>
                    </h1>

                    {{-- Sliding text marquee for additional messaging --}}
                    <div class="relative overflow-hidden mb-4 sm:mb-6 md:mb-8 page-load-animate hero-marquee">
                        <div class="flex animate-slide-marquee whitespace-nowrap">
                            <span class="text-gray-500 dark:text-slate-400 text-xs sm:text-sm md:text-base lg:text-lg leading-relaxed inline-flex items-center gap-2 sm:gap-4 transition-colors duration-300">
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    Full Stack Developer
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-violet-500" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/></svg>
                                    Scalable Applications
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-pink-500" fill="currentColor" viewBox="0 0 20 20"><path d="M13 7H7v6h6V7z"/><path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2z" clip-rule="evenodd"/></svg>
                                    Business Solutions
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/></svg>
                                    Real Results
                                </span>
                            </span>
                            <span class="text-gray-500 dark:text-slate-400 text-xs sm:text-sm transition-colors duration-300 md:text-base lg:text-lg leading-relaxed inline-flex items-center gap-2 sm:gap-4 ml-4 sm:ml-8">
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    Full Stack Developer
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-violet-500" fill="currentColor" viewBox="0 0 20 20"><path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/></svg>
                                    Scalable Applications
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-pink-500" fill="currentColor" viewBox="0 0 20 20"><path d="M13 7H7v6h6V7z"/><path fill-rule="evenodd" d="M7 2a1 1 0 012 0v1h2V2a1 1 0 112 0v1h2a2 2 0 012 2v2h1a1 1 0 110 2h-1v2h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-2v1a1 1 0 11-2 0v-1H9v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h2V2z" clip-rule="evenodd"/></svg>
                                    Business Solutions
                                </span>
                                <span class="text-gray-300 hidden sm:inline">•</span>
                                <span class="inline-flex items-center gap-1 sm:gap-2">
                                    <svg class="w-3 h-3 sm:w-4 sm:h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"/><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"/></svg>
                                    Real Results
                                </span>
                            </span>
                        </div>
                    </div>

                    {{-- Enhanced subtext with sliding animation --}}
                    <div class="overflow-hidden mb-4 sm:mb-6 md:mb-8 page-load-animate hero-subtext">
                        <p class="text-gray-500 dark:text-slate-400 text-xs sm:text-sm md:text-base lg:text-lg leading-relaxed transition-colors duration-300">
                            Specializing in <span class="font-semibold text-blue-600">scalable applications</span>, <span class="font-semibold text-violet-600">business systems</span>, and <span class="font-semibold text-pink-600">digital solutions</span> that deliver real results.
                        </p>
                    </div>

                    {{-- Enhanced CTA buttons with ripple effect --}}
                    <div class="flex flex-col sm:flex-row flex-wrap gap-2 sm:gap-3 mb-4 sm:mb-6 md:mb-8">
                        <a href="{{ route('portfolio') }}"
                           class="btn-ripple group relative inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-gradient-to-r from-blue-600 to-violet-600 text-white text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-violet-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="relative flex items-center gap-1.5 sm:gap-2">
                                View My Work
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </span>
                        </a>
                        <a href="{{ route('store') }}"
                           class="group relative inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-gray-100 dark:bg-black hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-700 dark:text-slate-200 text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl border border-gray-800 shadow-sm transition-all duration-300 hover:scale-105 hover:shadow-md overflow-hidden">
                            <span class="relative flex items-center gap-1.5 sm:gap-2">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-violet-500 group-hover:text-violet-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v4m0 0H5m4 0h10M9 7v10a2 2 0 002 2h6a2 2 0 002-2V7"/></svg>
                                Explore Systems
                            </span>
                        </a>
                        <a href="#contact"
                           class="group relative inline-flex items-center justify-center gap-1.5 sm:gap-2 px-4 sm:px-6 py-2.5 sm:py-3 bg-gray-100 dark:bg-black hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-700 dark:text-slate-200 text-xs sm:text-sm font-bold rounded-lg sm:rounded-xl border border-gray-800 shadow-sm transition-all duration-300 hover:scale-105 hover:shadow-md overflow-hidden">
                            <span class="relative flex items-center gap-1.5 sm:gap-2">
                                <svg class="w-3 h-3 sm:w-4 sm:h-4 text-green-500 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Hire Me
                            </span>
                        </a>
                    </div>

                    {{-- Enhanced tech pills with sliding animations --}}
                    <div class="flex flex-wrap gap-1.5 sm:gap-2 mb-4 sm:mb-6 page-load-animate hero-tech-pills">
                        @foreach(['Laravel','Django','React','Vue.js','MySQL','REST APIs','Docker','Tailwind'] as $index => $tech)
                        <span class="px-2 sm:px-3 py-1 sm:py-1.5 bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-slate-200 text-[10px] sm:text-xs font-medium rounded-full shadow-sm hover:bg-gray-200 dark:hover:bg-gray-900 hover:shadow-md hover:scale-105 hover:text-blue-400 dark:hover:text-blue-300 transition-all duration-300 cursor-pointer">{{ $tech }}</span>
                        @endforeach
                    </div>

                    {{-- Enhanced social links with 3D effects --}}
                    <div class="flex gap-2 sm:gap-3">
                        @if($settings['social_github'] ?? null)
                        <a href="{{ $settings['social_github'] }}" target="_blank" title="GitHub"
                           class="group w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 flex items-center justify-center text-gray-600 dark:text-slate-300 hover:text-white hover:bg-gray-700 dark:hover:bg-gray-900 hover:border-gray-700 dark:hover:border-gray-600 hover:shadow-lg hover:shadow-gray-900/30 hover:scale-105 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                        @endif
                        @if($settings['social_linkedin'] ?? null)
                        <a href="{{ $settings['social_linkedin'] }}" target="_blank" title="LinkedIn"
                           class="group w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 flex items-center justify-center text-blue-500 dark:text-blue-400 hover:bg-blue-600 dark:hover:bg-gray-900 hover:text-white hover:border-blue-600 dark:hover:border-blue-500 hover:shadow-lg hover:shadow-blue-600/30 hover:scale-105 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        @endif
                        @if($settings['social_twitter'] ?? null)
                        <a href="{{ $settings['social_twitter'] }}" target="_blank" title="Twitter/X"
                           class="group w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 flex items-center justify-center text-sky-500 dark:text-sky-400 hover:bg-sky-500 dark:hover:bg-sky-400 hover:text-white hover:border-sky-500 dark:hover:border-sky-400 hover:shadow-lg hover:shadow-sky-500/30 hover:scale-105 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </a>
                        @endif
                        <a href="#contact" title="Email"
                           class="group w-8 h-8 sm:w-10 sm:h-10 rounded-lg sm:rounded-xl bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-700 flex items-center justify-center text-gray-600 dark:text-slate-400 hover:bg-gradient-to-br hover:from-blue-500 hover:to-violet-600 hover:text-white hover:border-transparent hover:shadow-lg hover:shadow-blue-500/30 hover:scale-105 transition-all duration-300 shadow-sm">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </a>
                    </div>
                </div>{{-- End Left Content --}}
                
                {{-- RIGHT: Stats & Achievements (1 column) --}}
                <div class="relative z-10 space-y-4">
                    
                    {{-- Quick Stats Grid --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-gradient-to-br from-blue-100 to-violet-100 dark:from-blue-900/50 dark:to-violet-900/50 rounded-xl p-4 border border-blue-300 dark:border-blue-500/20 hover:border-blue-400 dark:hover:border-blue-500/40 transition-all duration-300">
                            <div class="text-3xl font-extrabold text-blue-900 dark:text-white mb-1">50+</div>
                            <div class="text-xs text-blue-700 dark:text-blue-200">Projects Completed</div>
                        </div>
                        <div class="bg-gradient-to-br from-violet-100 to-purple-100 dark:from-violet-900/50 dark:to-purple-900/50 rounded-xl p-4 border border-violet-300 dark:border-violet-500/20 hover:border-violet-400 dark:hover:border-violet-500/40 transition-all duration-300">
                            <div class="text-3xl font-extrabold text-violet-900 dark:text-white mb-1">5+</div>
                            <div class="text-xs text-violet-700 dark:text-violet-200">Years Experience</div>
                        </div>
                        <div class="bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/50 dark:to-teal-900/50 rounded-xl p-4 border border-emerald-300 dark:border-emerald-500/20 hover:border-emerald-400 dark:hover:border-emerald-500/40 transition-all duration-300">
                            <div class="text-3xl font-extrabold text-emerald-900 dark:text-white mb-1">100%</div>
                            <div class="text-xs text-emerald-700 dark:text-emerald-200">Client Satisfaction</div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-100 to-rose-100 dark:from-pink-900/50 dark:to-rose-900/50 rounded-xl p-4 border border-pink-300 dark:border-pink-500/20 hover:border-pink-400 dark:hover:border-pink-500/40 transition-all duration-300">
                            <div class="text-3xl font-extrabold text-pink-900 dark:text-white mb-1">24/7</div>
                            <div class="text-xs text-pink-700 dark:text-pink-200">Support Available</div>
                        </div>
                    </div>
                    
                    {{-- Key Highlights --}}
                    <div class="bg-gradient-to-br from-gray-100 to-gray-200 dark:from-slate-800/50 dark:to-slate-900/50 rounded-xl p-4 border border-gray-300 dark:border-gray-700">
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-yellow-500 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            Key Highlights
                        </h3>
                        <div class="space-y-2">
                            <div class="flex items-start gap-2 text-xs text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Enterprise-grade solutions</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Agile development process</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Modern tech stack</span>
                            </div>
                            <div class="flex items-start gap-2 text-xs text-gray-700 dark:text-gray-300">
                                <svg class="w-4 h-4 text-green-600 dark:text-green-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>Continuous support</span>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Certifications/Badges --}}
                    <div class="bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-indigo-900/50 dark:to-blue-900/50 rounded-xl p-4 border border-indigo-300 dark:border-indigo-500/20">
                        <h3 class="text-sm font-bold text-indigo-900 dark:text-white mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            Verified Skills
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2 py-1 bg-indigo-200 dark:bg-indigo-500/20 text-indigo-800 dark:text-indigo-200 text-[10px] font-semibold rounded-full border border-indigo-400 dark:border-indigo-500/30">Full Stack</span>
                            <span class="px-2 py-1 bg-blue-200 dark:bg-blue-500/20 text-blue-800 dark:text-blue-200 text-[10px] font-semibold rounded-full border border-blue-400 dark:border-blue-500/30">Cloud Expert</span>
                            <span class="px-2 py-1 bg-violet-200 dark:bg-violet-500/20 text-violet-800 dark:text-violet-200 text-[10px] font-semibold rounded-full border border-violet-400 dark:border-violet-500/30">DevOps</span>
                            <span class="px-2 py-1 bg-purple-200 dark:bg-purple-500/20 text-purple-800 dark:text-purple-200 text-[10px] font-semibold rounded-full border border-purple-400 dark:border-purple-500/30">API Design</span>
                        </div>
                    </div>
                    
                </div>{{-- End Right Stats --}}
                
                </div>{{-- End Grid Layout --}}
            </div>{{-- End Text Card --}}
        </div>{{-- End Second Row --}}

        {{-- Third Row: Static Info Cards --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 md:gap-8 xl:gap-12">
            
            {{-- Why Choose Me Card --}}
                <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border border-emerald-200 dark:border-gray-700 p-4 sm:p-6 md:p-8 bg-gradient-to-br from-emerald-900 via-teal-900 to-cyan-900 transition-all duration-500 hover:shadow-emerald-500/30">
                    
                    {{-- Background Pattern --}}
                    <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
                    
                    {{-- Content --}}
                    <div class="relative z-10">
                        {{-- Badge --}}
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold mb-3 bg-gradient-to-r from-emerald-400 to-teal-400 text-black shadow-lg">
                            <span class="w-1.5 h-1.5 bg-green-600 rounded-full animate-pulse"></span>
                            ✨ Why Choose Me
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="text-xl sm:text-2xl font-extrabold text-white mb-3 leading-tight">
                            <span class="bg-gradient-to-r from-emerald-300 via-teal-300 to-cyan-300 bg-clip-text text-transparent">
                                Delivering Excellence
                            </span>
                        </h3>
                        
                        <p class="text-emerald-100 text-xs sm:text-sm mb-4">
                            I combine technical expertise with business acumen to create solutions that drive real results.
                        </p>
                        
                        {{-- Features List --}}
                        <div class="space-y-3 mb-4">
                            <div class="flex items-start gap-2 text-white">
                                <div class="w-5 h-5 bg-gradient-to-r from-emerald-400 to-teal-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs sm:text-sm">Clean, Maintainable Code</h4>
                                    <p class="text-emerald-200 text-[10px] sm:text-xs">Following best practices</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2 text-white">
                                <div class="w-5 h-5 bg-gradient-to-r from-teal-400 to-cyan-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs sm:text-sm">Scalable Architecture</h4>
                                    <p class="text-emerald-200 text-[10px] sm:text-xs">Built to grow with you</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2 text-white">
                                <div class="w-5 h-5 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xs sm:text-sm">Timely Delivery</h4>
                                    <p class="text-emerald-200 text-[10px] sm:text-xs">Meeting deadlines</p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- CTA Button --}}
                        <a href="#contact" 
                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-400 to-teal-400 hover:from-emerald-300 hover:to-teal-300 text-black font-bold rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-xs">
                            Let's Work Together
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
                
                {{-- My Process Card --}}
                <div class="relative rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl sm:shadow-2xl border border-orange-200 dark:border-gray-700 p-4 sm:p-6 md:p-8 bg-gradient-to-br from-orange-900 via-amber-900 to-yellow-900 transition-all duration-500 hover:shadow-orange-500/30">
                    
                    {{-- Background Pattern --}}
                    <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
                    
                    {{-- Content --}}
                    <div class="relative z-10">
                        {{-- Badge --}}
                        <div class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold mb-3 bg-gradient-to-r from-orange-400 to-amber-400 text-black shadow-lg">
                            <span class="w-1.5 h-1.5 bg-orange-600 rounded-full animate-pulse"></span>
                            🚀 My Process
                        </div>
                        
                        {{-- Title --}}
                        <h3 class="text-xl sm:text-2xl font-extrabold text-white mb-3 leading-tight">
                            <span class="bg-gradient-to-r from-orange-300 via-amber-300 to-yellow-300 bg-clip-text text-transparent">
                                From Idea to Launch
                            </span>
                        </h3>
                        
                        <p class="text-orange-100 text-xs sm:text-sm mb-4">
                            A proven development process that ensures your project succeeds.
                        </p>
                        
                        {{-- Process Steps --}}
                        <div class="space-y-3 mb-4">
                            <div class="flex items-start gap-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-orange-400 to-amber-500 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-black text-xs">
                                    1
                                </div>
                                <div class="text-white">
                                    <h4 class="font-bold text-xs sm:text-sm">Discovery & Planning</h4>
                                    <p class="text-orange-200 text-[10px] sm:text-xs">Understanding your goals</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-black text-xs">
                                    2
                                </div>
                                <div class="text-white">
                                    <h4 class="font-bold text-xs sm:text-sm">Design & Architecture</h4>
                                    <p class="text-orange-200 text-[10px] sm:text-xs">Creating blueprints</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-black text-xs">
                                    3
                                </div>
                                <div class="text-white">
                                    <h4 class="font-bold text-xs sm:text-sm">Development & Testing</h4>
                                    <p class="text-orange-200 text-[10px] sm:text-xs">Building with quality</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-2">
                                <div class="w-6 h-6 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center flex-shrink-0 font-bold text-black text-xs">
                                    4
                                </div>
                                <div class="text-white">
                                    <h4 class="font-bold text-xs sm:text-sm">Launch & Support</h4>
                                    <p class="text-orange-200 text-[10px] sm:text-xs">Deployment & maintenance</p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Tech Stack Pills --}}
                        <div class="mb-4">
                            <p class="text-orange-100 text-[10px] font-semibold mb-2 uppercase tracking-wider">Core Tech</p>
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2 py-1 bg-black/40 border border-orange-400/30 text-orange-200 text-[10px] font-medium rounded-full">Laravel</span>
                                <span class="px-2 py-1 bg-black/40 border border-orange-400/30 text-orange-200 text-[10px] font-medium rounded-full">React</span>
                                <span class="px-2 py-1 bg-black/40 border border-orange-400/30 text-orange-200 text-[10px] font-medium rounded-full">Vue.js</span>
                                <span class="px-2 py-1 bg-black/40 border border-orange-400/30 text-orange-200 text-[10px] font-medium rounded-full">MySQL</span>
                                <span class="px-2 py-1 bg-black/40 border border-orange-400/30 text-orange-200 text-[10px] font-medium rounded-full">Docker</span>
                            </div>
                        </div>
                        
                        {{-- CTA Button --}}
                        <a href="{{ route('services') }}" 
                           class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-orange-400 to-amber-400 hover:from-orange-300 hover:to-amber-300 text-black font-bold rounded-lg shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 text-xs">
                            View Services
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                    </div>
                </div>
                
            </div>{{-- End My Process Card --}}

        </div>{{-- End Third Row Grid --}}
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     2. FEATURED IMAGE CARD SECTION
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 sm:py-12 scroll-animate">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
        
        {{-- Main Card Container --}}
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-blue-200 dark:border-gray-700 bg-gradient-to-br from-white via-blue-50/30 to-purple-50/30 dark:from-slate-900 dark:via-indigo-950/50 dark:to-slate-900 backdrop-blur-sm transition-all duration-500 hover:shadow-blue-500/20 dark:hover:shadow-indigo-500/30 scroll-animate-scale group">
            
            {{-- Animated top bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
                
                {{-- Left: Image Side --}}
                <div class="relative h-64 sm:h-80 lg:h-96 overflow-hidden bg-gradient-to-br from-blue-900 via-indigo-900 to-purple-900">
                    
                    {{-- Background Pattern --}}
                    <div class="absolute inset-0 opacity-10" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 32px 32px;"></div>
                    
                    {{-- Floating Particles --}}
                    <div class="absolute top-10 left-20 w-2 h-2 bg-blue-400/40 rounded-full floating"></div>
                    <div class="absolute top-20 right-32 w-3 h-3 bg-violet-400/30 rounded-full floating" style="animation-delay: 1s;"></div>
                    <div class="absolute bottom-16 left-1/3 w-2 h-2 bg-pink-400/25 rounded-full floating" style="animation-delay: 2s;"></div>
                    <div class="absolute bottom-32 right-20 w-4 h-4 bg-blue-300/40 rounded-full floating" style="animation-delay: 3s;"></div>
                    
                    {{-- Main Image/Graphic --}}
                    <div class="absolute inset-0 flex items-center justify-center p-8">
                        @if($settings['profile_photo'] ?? null)
                            <div class="relative group/img">
                                <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-violet-600 rounded-3xl blur-2xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                                <img src="{{ $settings['profile_photo'] }}" 
                                     alt="{{ $settings['site_name'] ?? 'Profile' }}"
                                     class="relative w-full h-full max-w-sm max-h-80 object-cover rounded-3xl shadow-2xl border-4 border-white/20 group-hover:scale-105 transition-transform duration-700">
                            </div>
                        @else
                            {{-- Placeholder Graphic --}}
                            <div class="relative w-full max-w-sm">
                                {{-- Central Icon --}}
                                <div class="relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-violet-600 rounded-full blur-3xl opacity-50 animate-pulse"></div>
                                    <div class="relative w-48 h-48 mx-auto bg-gradient-to-br from-blue-600 to-violet-700 rounded-full flex items-center justify-center shadow-2xl border-4 border-white/20 group-hover:scale-110 transition-transform duration-700">
                                        <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                        </svg>
                                    </div>
                                </div>
                                
                                {{-- Floating Tech Icons --}}
                                <div class="absolute top-0 left-0 w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-xl transform -rotate-12 group-hover:rotate-0 transition-transform duration-500">
                                    <span class="text-2xl">⚡</span>
                                </div>
                                <div class="absolute top-0 right-0 w-16 h-16 bg-gradient-to-br from-pink-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-xl transform rotate-12 group-hover:rotate-0 transition-transform duration-500">
                                    <span class="text-2xl">🚀</span>
                                </div>
                                <div class="absolute bottom-0 left-8 w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-xl transform rotate-6 group-hover:rotate-0 transition-transform duration-500">
                                    <span class="text-2xl">💡</span>
                                </div>
                                <div class="absolute bottom-0 right-8 w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center shadow-xl transform -rotate-6 group-hover:rotate-0 transition-transform duration-500">
                                    <span class="text-2xl">🎯</span>
                                </div>
                            </div>
                        @endif
                    </div>
                    
                    {{-- Gradient Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent lg:bg-gradient-to-r lg:from-transparent lg:via-transparent lg:to-black/20"></div>
                </div>

                {{-- Right: Content Side --}}
                <div class="relative p-6 sm:p-8 lg:p-10 xl:p-12 flex flex-col justify-center bg-white/50 dark:bg-slate-900/50 backdrop-blur-sm">
                    
                    {{-- Badge --}}
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold mb-4 bg-gradient-to-r from-blue-600 to-violet-600 text-white shadow-lg w-fit scroll-animate-scale hover-dance">
                        <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                        ✨ Featured Showcase
                    </div>
                    
                    {{-- Heading --}}
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-4 leading-tight scroll-animate-left">
                        <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">
                            Crafting Digital Excellence
                        </span>
                    </h2>
                    
                    {{-- Description --}}
                    <p class="text-gray-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed mb-6 scroll-animate-right">
                        Transforming ideas into powerful digital solutions. With expertise in modern web technologies and a passion for innovation, I deliver scalable applications that drive business growth and user engagement.
                    </p>
                    
                    {{-- Stats Grid --}}
                    <div class="grid grid-cols-3 gap-4 mb-6 scroll-animate-scale">
                        <div class="text-center p-3 rounded-xl bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-blue-950/30 dark:to-indigo-950/30 border border-blue-200 dark:border-blue-800/30 hover:scale-105 transition-transform duration-300">
                            <div class="text-2xl sm:text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-violet-600 bg-clip-text text-transparent mb-1">50+</div>
                            <div class="text-xs text-gray-600 dark:text-slate-400 font-medium">Projects</div>
                        </div>
                        <div class="text-center p-3 rounded-xl bg-gradient-to-br from-violet-50 to-purple-50 dark:from-violet-950/30 dark:to-purple-950/30 border border-violet-200 dark:border-violet-800/30 hover:scale-105 transition-transform duration-300">
                            <div class="text-2xl sm:text-3xl font-extrabold bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent mb-1">5+</div>
                            <div class="text-xs text-gray-600 dark:text-slate-400 font-medium">Years Exp</div>
                        </div>
                        <div class="text-center p-3 rounded-xl bg-gradient-to-br from-pink-50 to-rose-50 dark:from-pink-950/30 dark:to-rose-950/30 border border-pink-200 dark:border-pink-800/30 hover:scale-105 transition-transform duration-300">
                            <div class="text-2xl sm:text-3xl font-extrabold bg-gradient-to-r from-pink-600 to-rose-600 bg-clip-text text-transparent mb-1">100%</div>
                            <div class="text-xs text-gray-600 dark:text-slate-400 font-medium">Satisfaction</div>
                        </div>
                    </div>
                    
                    {{-- Key Features --}}
                    <div class="space-y-3 mb-6 scroll-animate-left">
                        <div class="flex items-center gap-3 text-gray-700 dark:text-slate-300">
                            <div class="w-6 h-6 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-sm font-medium">Full-Stack Development Expertise</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-700 dark:text-slate-300">
                            <div class="w-6 h-6 bg-gradient-to-r from-violet-500 to-purple-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-sm font-medium">Modern Tech Stack & Best Practices</span>
                        </div>
                        <div class="flex items-center gap-3 text-gray-700 dark:text-slate-300">
                            <div class="w-6 h-6 bg-gradient-to-r from-pink-500 to-rose-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-sm font-medium">Scalable & Performance-Optimized</span>
                        </div>
                    </div>
                    
                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-3 scroll-animate-scale">
                        <a href="{{ route('portfolio') }}"
                           class="group/btn inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300">
                            <svg class="w-4 h-4 group-hover/btn:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                            View Portfolio
                        </a>
                        <a href="#contact"
                           class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-white dark:bg-slate-800 hover:bg-gray-50 dark:hover:bg-slate-700 text-gray-900 dark:text-slate-100 text-sm font-bold rounded-xl border-2 border-gray-200 dark:border-gray-700 hover:border-blue-300 dark:hover:border-blue-600 transition-all duration-300 hover:scale-105">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            Get In Touch
                        </a>
                    </div>
                </div>
            </div>
            
            {{-- Corner Accents --}}
            <div class="absolute top-2 left-0 pointer-events-none">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>
        </div>
    </div>
</section>


{{-- ═══════════════════════════════════════════════════════════════════════
     3. FEATURED PROJECTS
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-6 scroll-animate" id="projects">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ ENHANCED FEATURED PROJECTS CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-blue-200 dark:border-gray-700 bg-white dark:bg-black backdrop-blur-sm transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-5 sm:px-8 lg:px-10 py-7 sm:py-9">

                {{-- Header --}}
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-6 scroll-animate stagger-child">
                    <div class="flex-1 scroll-animate-left stagger-child">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                            Portfolio Showcase
                        </div>
                        <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-900 mb-1.5 leading-tight scroll-animate-flip stagger-child">
                            Featured <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Projects</span>
                        </h2>
                        <p class="text-gray-600 text-sm max-w-2xl leading-relaxed scroll-animate stagger-child">Innovative web applications, business systems, and digital solutions built with modern practices.</p>
                        <div class="mt-3 flex items-center gap-3 scroll-animate-right stagger-child">
                            <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                            <span class="text-xs text-gray-500 font-medium">{{ $featuredProjects->count() }} Projects Featured</span>
                        </div>
                    </div>
                    <a href="{{ route('portfolio') }}"
                       class="group inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-xs font-bold rounded-xl shadow-md shadow-blue-500/25 hover:scale-105 transition-all duration-300 flex-shrink-0 scroll-animate-scale stagger-child hover-spin">
                        View All
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>

                {{-- Enhanced Project cards grid --}}
                @if($featuredProjects->count() > 0)
                {{-- Scroll controls --}}
                <div class="flex items-center justify-end gap-2 mb-4 scroll-animate-right stagger-child">
                    <button id="proj-prev"
                            class="w-8 h-8 rounded-full bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-800 shadow-sm flex items-center justify-center text-gray-500 hover:text-blue-600 hover:border-blue-300 hover:shadow-md transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed hover-spin">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button id="proj-next"
                            class="w-8 h-8 rounded-full bg-gray-100 dark:bg-black border border-gray-300 dark:border-gray-800 shadow-sm flex items-center justify-center text-gray-500 hover:text-blue-600 hover:border-blue-300 hover:shadow-md transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed hover-spin">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>

                {{-- Scrollable track --}}
                <div id="proj-track"
                     class="flex gap-4 overflow-x-auto scroll-smooth pb-3 scroll-animate
                            [&::-webkit-scrollbar]:h-1.5
                            [&::-webkit-scrollbar-track]:bg-black [&::-webkit-scrollbar-track]:rounded-full
                            [&::-webkit-scrollbar-thumb]:bg-gradient-to-r [&::-webkit-scrollbar-thumb]:from-blue-400 [&::-webkit-scrollbar-thumb]:to-violet-400 [&::-webkit-scrollbar-thumb]:rounded-full">
                    @foreach($featuredProjects as $project)
                    @php
                        $thumbGrads = ['from-blue-600 via-blue-500 to-violet-700','from-green-600 via-emerald-500 to-teal-700','from-orange-600 via-amber-500 to-red-700','from-pink-600 via-rose-500 to-rose-700','from-cyan-600 via-sky-500 to-blue-700','from-indigo-600 via-purple-500 to-purple-700'];
                        $tg = $thumbGrads[$loop->index % count($thumbGrads)];
                    @endphp
                    <div class="group relative rounded-xl bg-white dark:bg-black border border-blue-200 dark:border-gray-700
                                hover:border-blue-300 dark:hover:border-gray-600 hover:shadow-lg hover:shadow-blue-500/15 dark:hover:shadow-black/40
                                transition-all duration-400 flex flex-col flex-shrink-0 w-60 sm:w-64 transform hover:-translate-y-1 project-card animate-card hover-dance"
                         style="opacity: 0; transform: translateY(30px) scale(0.9);">

                        {{-- Thumbnail --}}
                        <div class="relative h-32 bg-gradient-to-br {{ $tg }} overflow-hidden flex-shrink-0">
                            @if($project->images && count($project->images) > 0)
                                <img src="{{ Storage::url($project->images[0]) }}" alt="{{ $project->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-400">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent group-hover:from-black/80 transition-all duration-700"></div>
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-1000 transform translate-x-[-100%] group-hover:translate-x-[100%]"></div>
                            @else
                                <div class="w-full h-full flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 opacity-[0.1]"
                                         style="background-image:linear-gradient(rgba(255,255,255,.7) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.7) 1px,transparent 1px);background-size:32px 32px"></div>
                                    <svg class="w-20 h-20 text-white/50 group-hover:text-white/80 transition-all duration-500 group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            @endif

                            <div class="absolute top-2.5 left-2.5 flex gap-2 z-10">
                                @if($project->is_featured)
                                <span class="px-2 py-0.5 bg-gradient-to-r from-yellow-400 to-orange-400 text-yellow-900 text-[9px] font-bold rounded-full flex items-center gap-1 pulse-glow hover-dance">
                                    <span class="w-1.5 h-1.5 bg-yellow-600 rounded-full animate-pulse"></span>Featured
                                </span>
                                @endif
                                @if($project->is_for_sale)
                                <span class="px-2 py-0.5 bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-[9px] font-bold rounded-full flex items-center gap-1 pulse-glow hover-dance">
                                    <span class="w-1.5 h-1.5 bg-black dark:bg-black rounded-full animate-pulse"></span>For Sale
                                </span>
                                @endif
                            </div>
                            @if($project->price && $project->is_for_sale)
                            <div class="absolute top-2.5 right-2.5 z-10">
                                <span class="px-2 py-0.5 bg-black backdrop-blur-sm text-blue-700 text-xs font-bold rounded-full shadow-md border border-blue-100 font-mono wiggle pulse-glow">{{ $project->formatted_price }}</span>
                            </div>
                            @endif

                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-400 flex items-end justify-center pb-3">
                                <div class="text-white text-center transform translate-y-2 group-hover:translate-y-0 transition-transform duration-400">
                                    <div class="w-10 h-10 bg-black backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-all duration-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </div>
                                    <p class="text-xs font-semibold">Explore Project</p>
                                </div>
                            </div>
                        </div>

                        {{-- Body --}}
                        <div class="p-4 flex flex-col flex-1 bg-white dark:bg-black transition-colors duration-300">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-1.5">
                                    <div class="w-1 h-1 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                                    <span class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Project</span>
                                </div>
                                @if($project->created_at)
                                <span class="text-[10px] text-gray-400">{{ $project->created_at->format('M Y') }}</span>
                                @endif
                            </div>
                            <h3 class="text-base font-bold text-gray-900 dark:text-slate-100 mb-1.5 group-hover:text-blue-600 dark:group-hover:text-indigo-400 transition-colors duration-400 leading-tight">{{ $project->title }}</h3>
                            <p class="text-gray-600 dark:text-slate-400 text-xs leading-relaxed mb-3 flex-1 line-clamp-2">{{ $project->short_description }}</p>

                            @if($project->tech_stack && count($project->tech_stack) > 0)
                            <div class="flex flex-wrap gap-1 mb-3">
                                @foreach(array_slice($project->tech_stack, 0, 4) as $tech)
                                <span class="px-2 py-0.5 bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 text-[10px] font-semibold rounded-full hover-dance">{{ $tech }}</span>
                                @endforeach
                                @if(count($project->tech_stack) > 4)
                                <span class="px-2 py-0.5 bg-gray-200 dark:bg-gray-900 text-gray-600 text-[10px] font-semibold rounded-full hover-dance">+{{ count($project->tech_stack) - 4 }}</span>
                                @endif
                            </div>
                            @endif

                            <div class="flex items-center gap-2 pt-3 border-t border-gray-800 dark:border-gray-700">
                                @if($project->demo_link)
                                <a href="{{ $project->demo_link }}" target="_blank"
                                   class="flex-1 inline-flex items-center justify-center gap-1.5 px-2.5 py-2 bg-gray-100 dark:bg-black hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-700 dark:text-slate-300 text-xs font-bold rounded-lg border border-gray-300 dark:border-gray-800 transition-all duration-300 hover:scale-105 hover-spin">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    Live Demo
                                </a>
                                @endif
                                @if($project->github_link)
                                <a href="{{ $project->github_link }}" target="_blank"
                                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-gray-100 dark:bg-black hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-600 dark:text-slate-300 hover:text-white border border-gray-300 dark:border-gray-800 transition-all duration-300 hover:scale-110 hover-spin" title="GitHub">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                </a>
                                @endif
                                <a href="{{ route('portfolio.show', $project->slug) }}"
                                   class="flex-1 inline-flex items-center justify-center gap-1.5 px-2.5 py-2 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-xs font-bold rounded-lg transition-all duration-300 shadow-sm hover:scale-105 pulse-glow">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Footer CTA --}}
                <div class="text-center mt-6 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Want to see more?</span>
                    </div>
                    <a href="{{ route('portfolio') }}"
                       class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-base font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 scroll-animate-flip stagger-child pulse-glow">
                        Explore Complete Portfolio
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 mt-3 scroll-animate stagger-child">Discover {{ \App\Models\Project::count() }}+ projects and growing</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     4. SERVICES SNAPSHOT
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="services">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ SERVICES CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-purple-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-10 lg:px-14 py-10 sm:py-12">

                {{-- Header --}}
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-10 scroll-animate stagger-child">
                    <div class="flex-1 scroll-animate-left stagger-child">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                            What I Offer
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 leading-tight scroll-animate-flip stagger-child">
                            Services <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Snapshot</span>
                        </h2>
                        <p class="text-gray-500 dark:text-slate-400 text-sm max-w-xl leading-relaxed scroll-animate stagger-child transition-colors duration-300">From idea to deployment — I cover the full spectrum of modern web development.</p>
                        <div class="mt-3 flex items-center gap-3 scroll-animate-right stagger-child">
                            <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                            <span class="text-xs text-gray-500 font-medium">{{ $services->count() > 0 ? $services->count() : '5' }} Core Services</span>
                        </div>
                    </div>
                    <a href="{{ route('services') }}"
                       class="group inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-sm font-bold rounded-xl shadow-md shadow-blue-500/25 hover:scale-105 transition-all duration-300 flex-shrink-0 scroll-animate-scale stagger-child hover-spin">
                        View All Services
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>

                @php
                $defaultServices = [
                    ['Web Development','Building fast, responsive websites and web apps with modern frameworks like Laravel and React.','from-blue-500 to-blue-600','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                    ['System Development','Custom business systems — ERPs, CRMs, POS, inventory, and management platforms.','from-purple-500 to-purple-600','M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v4m0 0H5m4 0h10M9 7v10a2 2 0 002 2h6a2 2 0 002-2V7'],
                    ['API Integration','Connecting systems and third-party services with robust, well-documented REST APIs.','from-green-500 to-emerald-600','M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'],
                    ['UI/UX Design','Clean, intuitive interfaces that users love — wireframes, prototypes, and pixel-perfect UI.','from-pink-500 to-rose-600','M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'],
                    ['Consulting & Support','Technical guidance, architecture planning, code reviews, and ongoing maintenance.','from-orange-500 to-orange-600','M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'],
                ];
                @endphp

                {{-- Service cards --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4 scroll-animate">
                    @if($services->count() > 0)
                        @foreach($services as $index => $service)
                        @php
                            $grads = ['from-blue-500 to-blue-600','from-purple-500 to-purple-600','from-green-500 to-emerald-600','from-pink-500 to-rose-600','from-orange-500 to-orange-600'];
                            $icons = ['M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4','M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v4m0 0H5m4 0h10M9 7v10a2 2 0 002 2h6a2 2 0 002-2V7','M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z','M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01','M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z'];
                            $g = $grads[$index % count($grads)];
                            $ic = $icons[$index % count($icons)];
                        @endphp
                        <div class="group bg-white dark:bg-black border border-purple-200 dark:border-gray-700 rounded-2xl p-6 hover:bg-gray-100 dark:hover:bg-gray-900 service-card animate-card hover-dance stagger-child"
                             style="opacity: 0; transform: translateY(30px) scale(0.9);">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $g }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md dark:shadow-black/50 transition-shadow duration-300 pulse-glow">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $ic }}"/></svg>
                            </div>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-slate-100 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">{{ $service->title }}</h3>
                            <p class="text-gray-500 dark:text-slate-400 text-xs leading-relaxed flex-1 transition-colors duration-300">{{ $service->short_description }}</p>
                        </div>
                        @endforeach
                    @else
                        @foreach($defaultServices as [$title,$desc,$grad,$icon])
                        <div class="group bg-white dark:bg-black border border-purple-200 dark:border-gray-700 rounded-2xl p-6 hover:bg-gray-100 dark:hover:bg-gray-900 service-card animate-card hover-dance stagger-child"
                             style="opacity: 0; transform: translateY(30px) scale(0.9);">
                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $grad }} flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md dark:shadow-black/50 transition-shadow duration-300 pulse-glow">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                            </div>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-slate-100 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">{{ $title }}</h3>
                            <p class="text-gray-500 dark:text-slate-400 text-xs leading-relaxed flex-1 transition-colors duration-300">{{ $desc }}</p>
                        </div>
                        @endforeach
                    @endif
                </div>

                {{-- Footer CTA --}}
                <div class="text-center mt-8 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Need a custom solution?</span>
                    </div>
                    <a href="{{ route('services') }}"
                       class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-base font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 scroll-animate-flip stagger-child pulse-glow">
                        Explore All Services
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 mt-3 scroll-animate stagger-child">Custom solutions tailored to your business needs</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     5. AVAILABLE ITEMS IN MY STORE
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-4 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="products">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ PRODUCTS CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-emerald-200 dark:border-gray-700 bg-gradient-to-br from-white via-blue-50/30 to-violet-50/30 dark:bg-gradient-to-br dark:from-black dark:via-slate-900 dark:to-indigo-950/50 transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-5 sm:px-8 lg:px-10 py-7 sm:py-8">

                {{-- Header --}}
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-6 scroll-animate stagger-child">
                    <div class="flex-1 scroll-animate-left stagger-child">
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-semibold bg-gradient-to-r from-blue-600 to-violet-600 text-white border border-blue-500/30 mb-3 scroll-animate-scale stagger-child hover-dance shadow-lg">
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                            </span>
                            🛍️ Digital Store
                        </div>
                        <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 transition-colors duration-300 scroll-animate-flip stagger-child">
                            Available Items in <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">My Store</span>
                        </h2>
                        <p class="text-gray-600 dark:text-slate-400 text-sm transition-colors duration-300 max-w-xl scroll-animate stagger-child leading-relaxed">
                            Ready-to-deploy business systems and digital products you can purchase and use immediately. Built with modern technologies for maximum efficiency.
                        </p>
                        <div class="mt-3 flex items-center gap-4 scroll-animate-right stagger-child">
                            <div class="flex items-center gap-2">
                                <div class="w-10 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                                <span class="text-xs text-gray-600 dark:text-gray-400 font-semibold">{{ $products->count() > 0 ? $products->count() : '3' }} Items Available</span>
                            </div>
                            <div class="flex items-center gap-1.5 text-xs text-gray-500 dark:text-gray-400">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                Instant Access
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('store') }}"
                       class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 hover:from-blue-500 hover:via-violet-500 hover:to-pink-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-violet-500/40 hover:scale-105 transition-all duration-300 flex-shrink-0 scroll-animate-scale stagger-child hover-spin">
                        Browse All Items
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                </div>

                {{-- Product cards --}}
                @if($products->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 scroll-animate">
                    @foreach($products as $index => $product)
                    <div class="group relative bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:to-slate-800 border-2 border-gray-200 dark:border-gray-700 rounded-2xl overflow-hidden hover:border-blue-400 dark:hover:border-blue-500 hover:shadow-2xl hover:shadow-blue-500/20 transition-all duration-500 product-card animate-card stagger-child">

                        {{-- Hover Glow Effect --}}
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/0 via-violet-500/0 to-pink-500/0 group-hover:from-blue-500/5 group-hover:via-violet-500/5 group-hover:to-pink-500/5 transition-all duration-500 pointer-events-none"></div>

                        {{-- Badge --}}
                        @if($product->is_featured)
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-3 py-1.5 bg-gradient-to-r from-yellow-400 to-orange-500 text-white text-xs font-bold rounded-full shadow-lg floating pulse-glow flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                Popular
                            </span>
                        </div>
                        @elseif($index === 0)
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white text-xs font-bold rounded-full shadow-lg floating pulse-glow flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                                New Arrival
                            </span>
                        </div>
                        @endif

                        {{-- Thumbnail --}}
                        <div class="relative h-48 bg-gradient-to-br {{ ['from-indigo-600 to-purple-700','from-blue-600 to-cyan-700','from-green-600 to-teal-700'][$index % 3] }} overflow-hidden flex-shrink-0 group-hover:h-52 transition-all duration-500">
                            @if($product->images && count($product->images) > 0)
                                <img src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            @else
                                <div class="w-full h-full flex items-center justify-center relative overflow-hidden">
                                    <div class="absolute inset-0 opacity-[0.08]"
                                         style="background-image:linear-gradient(rgba(255,255,255,.5) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.5) 1px,transparent 1px);background-size:20px 20px"></div>
                                    <div class="relative z-10 text-center">
                                        <svg class="w-20 h-20 text-white/50 mx-auto mb-2 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                        <p class="text-white/60 text-xs font-medium">{{ $product->name }}</p>
                                    </div>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                            
                            {{-- Price Badge --}}
                            <div class="absolute bottom-3 right-3">
                                @if($product->discount_price)
                                <div class="text-right backdrop-blur-md bg-white/10 rounded-xl p-2 border border-white/20">
                                    <div class="text-xs text-white/80 line-through mb-0.5">KES {{ number_format($product->price, 0) }}</div>
                                    <div class="text-lg font-extrabold text-white flex items-center gap-1">
                                        KES {{ number_format($product->discount_price, 0) }}
                                    </div>
                                    @php $savings = round((($product->price - $product->discount_price) / $product->price) * 100); @endphp
                                    <div class="text-[10px] text-green-300 font-bold">Save {{ $savings }}%</div>
                                </div>
                                @else
                                <div class="backdrop-blur-md bg-white/10 rounded-xl px-3 py-2 border border-white/20">
                                    <div class="text-lg font-extrabold text-white">
                                        {{ $product->price ? 'KES '.number_format($product->price, 0) : 'Free' }}
                                    </div>
                                </div>
                                @endif
                            </div>

                            {{-- Quick View Badge --}}
                            <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="backdrop-blur-md bg-white/10 rounded-lg p-2 border border-white/20">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="relative p-5 flex flex-col flex-1">
                            {{-- Category Badge --}}
                            @if($product->category_id && $product->category)
                            <div class="mb-2">
                                <span class="inline-flex items-center gap-1 px-2 py-0.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-700 text-[10px] font-bold rounded-full">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                    {{ $product->category->name }}
                                </span>
                            </div>
                            @endif

                            <h3 class="text-base font-extrabold text-gray-900 dark:text-slate-100 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300 leading-tight">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-slate-400 text-xs transition-colors duration-300 leading-relaxed mb-4 flex-1">
                                {{ $product->short_description ?? \Illuminate\Support\Str::limit($product->description, 100) }}
                            </p>

                            {{-- Technologies --}}
                            @if($product->technologies && count($product->technologies) > 0)
                            <div class="flex flex-wrap gap-1.5 mb-4">
                                @foreach(array_slice($product->technologies, 0, 4) as $tech)
                                <span class="px-2 py-1 bg-gradient-to-r from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-900 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-700 text-[10px] font-semibold rounded-lg transition-all duration-300 hover:scale-110 hover:shadow-md">
                                    {{ $tech }}
                                </span>
                                @endforeach
                                @if(count($product->technologies) > 4)
                                <span class="px-2 py-1 bg-gradient-to-r from-blue-100 to-violet-100 dark:from-blue-900/30 dark:to-violet-900/30 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-700 text-[10px] font-semibold rounded-lg">
                                    +{{ count($product->technologies) - 4 }}
                                </span>
                                @endif
                            </div>
                            @endif

                            {{-- Features Preview --}}
                            @if($product->features && count($product->features) > 0)
                            <div class="mb-4 space-y-1.5">
                                @foreach(array_slice($product->features, 0, 2) as $feature)
                                <div class="flex items-center gap-2 text-xs text-gray-600 dark:text-gray-400">
                                    <svg class="w-3.5 h-3.5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                    <span>{{ Str::limit($feature, 40) }}</span>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            {{-- Action Buttons --}}
                            <div class="flex gap-2 pt-4 border-t border-gray-200 dark:border-gray-700 transition-colors duration-300">
                                <a href="{{ route('store.show', $product->slug) }}"
                                   class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-700 text-gray-700 dark:text-slate-200 text-xs font-bold rounded-xl border-2 border-gray-300 dark:border-gray-600 transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    View Details
                                </a>
                                <a href="{{ route('store.show', $product->slug) }}"
                                   class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 hover:from-blue-500 hover:via-violet-500 hover:to-pink-500 text-white text-xs font-bold rounded-xl transition-all shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-violet-500/40 hover:scale-105 pulse-glow">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                {{-- No Products Message --}}
                <div class="text-center py-12">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-100 to-violet-100 dark:from-blue-900/30 dark:to-violet-900/30 rounded-full mb-4">
                        <svg class="w-10 h-10 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">No Products Available Yet</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6 max-w-md mx-auto">
                        Products will be added soon. Check back later or contact us for custom solutions.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Contact Us
                    </a>
                </div>
                @endif

                {{-- Footer CTA --}}
                <div class="text-center mt-6 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Ready-to-use business systems</span>
                    </div>
                    <a href="{{ route('store') }}"
                       class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-base font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 scroll-animate-flip stagger-child pulse-glow">
                        Browse All Systems
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 mt-3 scroll-animate stagger-child">Purchase, download, and deploy instantly</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     6. ABOUT PREVIEW
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="about">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ ABOUT CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-violet-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-10 lg:px-14 py-10 sm:py-12">
                <div class="flex flex-col lg:flex-row items-start gap-12 scroll-animate">

                    {{-- ── LEFT: photo + quick facts ── --}}
                    <div class="flex-shrink-0 w-full lg:w-auto flex flex-col items-center lg:items-start gap-5 scroll-animate-left stagger-child">

                        {{-- Profile photo --}}
                        <div class="relative mx-auto lg:mx-0 scroll-animate-scale stagger-child">
                            {{-- Glow ring --}}
                            <div class="absolute inset-0 rounded-3xl bg-gradient-to-br from-blue-400 to-violet-500 blur-xl opacity-25 scale-110 floating"></div>

                            {{-- Photo --}}
                            <div class="relative w-52 h-52 lg:w-60 lg:h-60 rounded-3xl overflow-hidden border-4 border-white shadow-2xl group hover:scale-105 transition-transform duration-500">
                                @if($settings['profile_photo'] ?? null)
                                    <img src="{{ $settings['profile_photo'] }}"
                                         alt="{{ $settings['site_name'] ?? 'Profile' }}"
                                         class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-blue-600 to-violet-700 flex items-center justify-center group-hover:from-blue-500 group-hover:to-violet-600 transition-all duration-500">
                                        <span class="text-5xl font-extrabold text-white/80 tracking-tight floating">
                                            {{ strtoupper(substr($settings['site_name'] ?? 'BO', 0, 2)) }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Status badge --}}
                            <div class="absolute -bottom-3 -right-3 bg-black dark:bg-black rounded-2xl px-3 py-2 shadow-lg dark:shadow-black/50 border border-gray-800 dark:border-gray-700 flex items-center gap-2 transition-colors duration-300 pulse-glow">
                                <span class="relative flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                                </span>
                                <span class="text-xs font-bold text-gray-800 dark:text-slate-200 transition-colors duration-300">{{ $settings['about_status_text'] ?? 'Open to Work' }}</span>
                            </div>

                            {{-- Experience badge --}}
                            <div class="absolute -top-3 -left-3 bg-gradient-to-br from-blue-600 to-violet-600 rounded-2xl px-3 py-2 shadow-lg text-white text-center floating">
                                <div class="text-lg font-extrabold leading-none">{{ $settings['about_years_exp'] ?? '5+' }}</div>
                                <div class="text-[9px] font-medium opacity-80 leading-tight">Years<br>Exp.</div>
                            </div>
                        </div>

                        {{-- Quick fact pills --}}
                        <div class="flex flex-wrap gap-2 justify-center lg:justify-start max-w-[260px] scroll-animate stagger-child">
                            @foreach($aboutTags as $index => $tag)
                            <span class="px-2.5 py-1 bg-gray-900 dark:bg-blue-900/30 border border-blue-100 dark:border-gray-700 text-blue-700 dark:text-blue-400 text-[10px] font-semibold rounded-full transition-colors duration-300 hover-dance"
                                  style="animation-delay: {{ $index * 100 }}ms;">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- ── RIGHT: content ── --}}
                    <div class="flex-1 scroll-animate-right stagger-child">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                            <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                            {{ $settings['about_section_label'] ?? 'About Me' }}
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-4 leading-tight transition-colors duration-300 scroll-animate-flip stagger-child">
                            I'm <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">{{ $settings['site_name'] ?? 'Brian Owaka' }}</span>,
                            <br class="hidden sm:block">{{ $settings['about_heading_suffix'] ?? 'Full Stack Developer' }}
                        </h2>

                        <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 leading-relaxed mb-7 scroll-animate stagger-child">
                            {{ $settings['about_bio'] ?? 'Passionate developer creating innovative solutions for modern businesses.' }}
                        </p>

                        {{-- Stat cards --}}
                        @php
                            $cardGrads = ['from-blue-500 to-blue-600','from-violet-500 to-violet-600','from-green-500 to-emerald-600','from-pink-500 to-rose-600','from-amber-500 to-orange-600'];
                            $cardIcons = ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z','M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10','M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z','M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z','M13 10V3L4 14h7v7l9-11h-7z'];
                        @endphp
                        <div class="grid grid-cols-3 gap-3 mb-7 scroll-animate stagger-child">
                            @foreach($aboutStatCards as $ci => $card)
                            @php $grad = $cardGrads[$ci % count($cardGrads)]; $icon = $cardIcons[$ci % count($cardIcons)]; @endphp
                            <div class="group text-center p-4 rounded-2xl bg-white dark:bg-black border border-violet-200 dark:border-gray-700 hover:bg-gray-900 dark:hover:bg-gray-900 hover-dance pulse-glow stagger-child"
                                 style="animation-delay: {{ $ci * 200 }}ms;">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br {{ $grad }} flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition-transform shadow-sm floating">
                                    <svg class="w-[18px] h-[18px] text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                                </div>
                                <div class="text-xl font-extrabold bg-gradient-to-r {{ $grad }} bg-clip-text text-transparent">{{ $card['num'] }}</div>
                                <div class="text-[10px] text-gray-500 dark:text-slate-500 font-medium mt-0.5 transition-colors duration-300">{{ $card['label'] }}</div>
                            </div>
                            @endforeach
                        </div>

                        {{-- What I do list --}}
                        <div class="grid sm:grid-cols-2 gap-2.5 mb-7">
                            @foreach($aboutServices as $svc)
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white dark:bg-black border border-violet-200 dark:border-gray-700 hover:bg-gray-900 dark:hover:bg-gray-900">
                                <div class="w-5 h-5 rounded-full bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center flex-shrink-0 mt-0.5 shadow-sm">
                                    <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <div>
                                    <div class="text-xs font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300">{{ $svc['title'] }}</div>
                                    <div class="text-[10px] text-gray-400 dark:text-slate-500 mt-0.5 transition-colors duration-300">{{ $svc['desc'] }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Experience timeline --}}
                        @if($experiences->count() > 0)
                        <div class="space-y-2 mb-7">
                            <p class="text-[10px] font-semibold text-gray-400 dark:text-slate-500 uppercase tracking-widest mb-3 transition-colors duration-300">Recent Experience</p>
                            @foreach($experiences->take(2) as $exp)
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white dark:bg-black border border-violet-200 dark:border-gray-700 hover:bg-gray-900 dark:hover:bg-gray-900">
                                <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-blue-500 to-violet-600 flex items-center justify-center flex-shrink-0 shadow-sm">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="font-semibold text-gray-900 dark:text-slate-100 text-sm truncate transition-colors duration-300">{{ $exp->role }}</div>
                                    <div class="text-xs text-blue-600 dark:text-blue-400 font-medium transition-colors duration-300">{{ $exp->company }}</div>
                                    <div class="text-[10px] text-gray-400 dark:text-slate-500 transition-colors duration-300">{{ $exp->formatted_duration }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif

                        {{-- CTAs --}}
                        <div class="flex flex-wrap gap-3">
                            <a href="{{ route('about') }}"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/20 hover:scale-105 transition-all duration-300">
                                {{ $settings['about_cta_primary'] }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            <a href="#contact"
                               class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 dark:bg-black hover:bg-gray-200 dark:hover:bg-gray-900 text-gray-700 dark:text-slate-200 text-sm font-bold rounded-xl border border-gray-800 dark:border-gray-700 shadow-sm hover:scale-105 transition-all duration-300">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                Hire Me
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     7. SKILLS & TECH STACK
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="skills">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ SKILLS CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-cyan-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-10 lg:px-14 py-10 sm:py-12">

                {{-- Header --}}
                <div class="mb-10 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                        Expertise
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 transition-colors duration-300 scroll-animate-flip stagger-child">
                        Skills & <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Tech Stack</span>
                    </h2>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 max-w-xl scroll-animate stagger-child">The tools and technologies I use to build powerful solutions.</p>
                    <div class="mt-3 flex items-center gap-3 scroll-animate-right stagger-child">
                        <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 font-medium">{{ $skills->count() > 0 ? $skills->count() : '12+' }} Technologies</span>
                    </div>
                </div>

                {{-- Skill bars --}}
                @if($skills->count() > 0)
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 mb-8 scroll-animate">
                    @foreach($skills as $skill)
                    @php
                        $colors = ['bg-blue-500','bg-purple-500','bg-green-500','bg-orange-500','bg-pink-500','bg-cyan-500','bg-indigo-500','bg-teal-500'];
                        $c = $colors[$loop->index % count($colors)];
                    @endphp
                    <div class="bg-white dark:bg-black border border-cyan-200 dark:border-gray-700 rounded-xl p-4 hover:bg-gray-900 dark:hover:bg-gray-900 stagger-child hover-dance pulse-glow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-semibold text-gray-900 dark:text-slate-100 text-sm group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">{{ $skill->name }}</span>
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-gray-900 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-gray-700 capitalize transition-colors duration-300">{{ $skill->level }}</span>
                        </div>
                        <div class="w-full bg-black dark:bg-black rounded-full h-1.5 border border-gray-800 transition-colors duration-300 skill-bar">
                            <div class="{{ $c }} h-1.5 rounded-full skill-progress" data-width="{{ $skill->percentage }}%" style="width: 0%"></div>
                        </div>
                        <div class="text-right mt-1 text-xs text-gray-400 dark:text-slate-500 transition-colors duration-300">{{ $skill->percentage }}%</div>
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Divider --}}
                <div class="border-t border-gray-800 dark:border-gray-700 mb-8 transition-colors duration-300 scroll-animate stagger-child"></div>

                {{-- Tech tag cloud --}}
                <div class="scroll-animate stagger-child">
                    <p class="text-xs font-semibold text-gray-400 dark:text-slate-500 uppercase tracking-widest mb-5 text-center transition-colors duration-300 scroll-animate-flip stagger-child">Technologies I Work With</p>
                    <div class="flex flex-wrap gap-2.5 justify-center">
                        @foreach([
                            ['Laravel','from-red-500 to-orange-500'],
                            ['Django','from-green-600 to-green-700'],
                            ['React','from-cyan-500 to-blue-500'],
                            ['Vue.js','from-green-500 to-teal-500'],
                            ['PHP','from-indigo-500 to-purple-500'],
                            ['Python','from-blue-500 to-yellow-500'],
                            ['MySQL','from-orange-500 to-orange-600'],
                            ['PostgreSQL','from-blue-600 to-blue-700'],
                            ['REST APIs','from-purple-500 to-pink-500'],
                            ['Docker','from-blue-500 to-cyan-500'],
                            ['Tailwind CSS','from-cyan-400 to-blue-500'],
                            ['JavaScript','from-yellow-400 to-yellow-500'],
                            ['Node.js','from-green-500 to-green-600'],
                            ['Git','from-orange-600 to-red-600'],
                            ['Linux','from-gray-600 to-gray-700'],
                            ['Redis','from-red-500 to-red-600'],
                        ] as $index => [$tech,$grad])
                        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white dark:bg-black border border-cyan-200 dark:border-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-slate-200 hover:bg-gray-900 dark:hover:bg-gray-900 hover-dance stagger-child"
                              style="animation-delay: {{ $index * 100 }}ms;">
                            <span class="w-2 h-2 rounded-full bg-gradient-to-r {{ $grad }} flex-shrink-0 pulse-glow"></span>
                            {{ $tech }}
                        </span>
                        @endforeach
                    </div>
                </div>

                {{-- Footer CTA --}}
                <div class="text-center mt-8 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Always learning new technologies</span>
                    </div>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 scroll-animate stagger-child">Staying current with the latest tools and best practices</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     8. HOW I WORK (PROCESS)
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ PROCESS CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-pink-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-10 lg:px-14 py-10 sm:py-12">

                {{-- Header --}}
                <div class="mb-10 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                        My Process
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 transition-colors duration-300 scroll-animate-flip stagger-child">
                        How I <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Work</span>
                    </h2>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 max-w-xl scroll-animate stagger-child">A simple, transparent process that keeps you in the loop from start to finish.</p>
                    <div class="mt-3 flex items-center gap-3 scroll-animate-right stagger-child">
                        <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 font-medium">4 Simple Steps</span>
                    </div>
                </div>

                {{-- Steps grid --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5 relative scroll-animate">
                    {{-- Enhanced connector line (desktop) --}}
                    <div class="hidden lg:block absolute top-9 left-[12.5%] right-[12.5%] h-px bg-gradient-to-r from-blue-200 via-violet-200 to-pink-200 z-0 scroll-animate-scale stagger-child"></div>

                    @foreach([
                        ['01','Consultation','We discuss your goals, requirements, and vision. I ask the right questions to fully understand your needs.','from-blue-500 to-blue-600','M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
                        ['02','Planning','I create a detailed project plan, architecture design, and timeline so you know exactly what to expect.','from-violet-500 to-purple-600','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                        ['03','Development','I build your solution with clean, scalable code — with regular updates and demos throughout the process.','from-green-500 to-emerald-600','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4'],
                        ['04','Delivery','Testing, deployment, training, and handover. Plus ongoing support to make sure everything runs perfectly.','from-orange-500 to-orange-600','M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                    ] as [$step,$title,$desc,$grad,$icon])
                    <div class="relative z-10 group bg-white dark:bg-black border border-pink-200 dark:border-gray-700 rounded-2xl p-6 hover:bg-gray-900 dark:hover:bg-gray-900 process-step animate-card hover-dance pulse-glow stagger-child"
                         style="opacity: 0; transform: translateY(30px) scale(0.9);">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br {{ $grad }} flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform shadow-md dark:shadow-black/50 transition-shadow duration-300 floating">
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/></svg>
                        </div>
                        <div class="text-[10px] font-bold text-gray-300 dark:text-slate-600 mb-1.5 tracking-widest transition-colors duration-300">STEP {{ $step }}</div>
                        <h3 class="text-base font-bold text-gray-900 dark:text-slate-100 mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors duration-300">{{ $title }}</h3>
                        <p class="text-xs text-gray-500 dark:text-slate-400 leading-relaxed transition-colors duration-300">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>

                {{-- Footer CTA --}}
                <div class="text-center mt-8 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Ready to start your project?</span>
                    </div>
                    <a href="{{ route('contact') }}"
                       class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-base font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 scroll-animate-flip stagger-child pulse-glow">
                        Let's Work Together
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 mt-3 scroll-animate stagger-child">From consultation to launch — I've got you covered</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     9. TESTIMONIALS / SOCIAL PROOF
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ TESTIMONIALS CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-amber-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-5 sm:px-8 lg:px-10 py-7 sm:py-8">

                {{-- Header --}}
                <div class="mb-6 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                        Social Proof
                    </div>
                    <h2 class="text-2xl lg:text-3xl font-extrabold text-gray-900 dark:text-slate-100 mb-1.5 transition-colors duration-300 scroll-animate-flip stagger-child">
                        What <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Clients Say</span>
                    </h2>
                    <div class="mt-2.5 flex items-center gap-3 scroll-animate-right stagger-child">
                        <div class="w-10 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 font-medium">Real feedback from real projects</span>
                    </div>
                </div>

                {{-- Testimonial cards --}}
                @php
                    $gradients = ['from-blue-500 to-blue-600','from-violet-500 to-purple-600','from-green-500 to-emerald-600','from-pink-500 to-rose-600','from-amber-500 to-orange-500','from-cyan-500 to-blue-500'];
                    $fallback = [
                        ['body' => 'Brian delivered our school management system on time and beyond expectations. The system has transformed how we manage student records and fees.', 'name' => 'Sarah M.', 'role' => 'School Principal, Nairobi', 'rating' => 5],
                        ['body' => 'Exceptional work on our e-commerce platform. Sales increased by 40% after launch. Brian truly understands business needs, not just code.', 'name' => 'James K.', 'role' => 'CEO, RetailPro Kenya', 'rating' => 5],
                        ['body' => 'The POS system Brian built for us is fast, reliable, and easy to use. Our staff picked it up in minutes. Highly recommended!', 'name' => 'Grace W.', 'role' => 'Business Owner, Mombasa', 'rating' => 5],
                    ];
                    $displayReviews = $reviews->count() ? $reviews : collect($fallback);
                @endphp
                <div class="grid md:grid-cols-3 gap-5 scroll-animate">
                    @foreach($displayReviews as $i => $review)
                    @php
                        $grad     = $gradients[$i % count($gradients)];
                        $name     = is_array($review) ? $review['name']   : $review->name;
                        $role     = is_array($review) ? $review['role']   : $review->role;
                        $body     = is_array($review) ? $review['body']   : $review->body;
                        $rating   = is_array($review) ? $review['rating'] : $review->rating;
                        $initials = strtoupper(substr($name, 0, 2));
                    @endphp
                    <div class="bg-white dark:bg-black border border-amber-200 dark:border-gray-700 rounded-2xl p-4 hover:bg-gray-900 dark:hover:bg-gray-900 testimonial-card animate-card floating hover-dance stagger-child"
                         style="opacity: 0; transform: translateY(30px) rotateY(10deg);">
                        <div class="flex gap-0.5 mb-3">
                            @for($s = 1; $s <= 5; $s++)
                            <svg class="w-3.5 h-3.5 {{ $s <= $rating ? 'text-yellow-400 pulse-glow' : 'text-gray-300 dark:text-slate-600' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-slate-400 text-xs leading-relaxed mb-4 transition-colors duration-300">"{{ $body }}"</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $grad }} flex items-center justify-center text-white text-xs font-bold shadow-sm floating">
                                {{ $initials }}
                            </div>
                            <div>
                                <div class="font-semibold text-gray-900 dark:text-slate-100 text-sm transition-colors duration-300">{{ $name }}</div>
                                <div class="text-gray-400 dark:text-slate-500 text-[10px] transition-colors duration-300">{{ $role }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Footer CTA --}}
                <div class="text-center mt-6 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-3 px-4 py-2 bg-gray-100 dark:bg-gray-900 rounded-full border border-blue-200 mb-4 scroll-animate-scale stagger-child pulse-glow">
                        <svg class="w-5 h-5 text-blue-600 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-blue-700 text-sm font-medium">Join satisfied clients</span>
                    </div>
                    <a href="{{ route('contact') }}"
                       class="group inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-base font-bold rounded-xl shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40 hover:scale-105 transition-all duration-300 scroll-animate-flip stagger-child pulse-glow">
                        Start Your Project
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 mt-3 scroll-animate stagger-child">Experience the same quality and dedication</p>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     10. STRONG CTA SECTION
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-6">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        <div class="relative rounded-3xl overflow-hidden shadow-2xl border border-blue-900/40 bg-gradient-to-br from-slate-900 via-blue-950 to-violet-950">

            {{-- Glowing orbs --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-blue-600/25 blur-3xl"></div>
                <div class="absolute -bottom-24 -right-24 w-72 h-72 rounded-full bg-violet-600/25 blur-3xl"></div>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-48 h-48 rounded-full bg-pink-600/10 blur-2xl"></div>
                {{-- Subtle grid --}}
                <div class="absolute inset-0 opacity-[0.04]"
                     style="background-image:linear-gradient(rgba(255,255,255,.6) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.6) 1px,transparent 1px);background-size:40px 40px"></div>
            </div>

            {{-- Gradient top border --}}
            <div class="h-1 w-full bg-gradient-to-r from-blue-500 via-violet-500 to-pink-500"></div>

            {{-- Corner accents --}}
            <div class="absolute top-1 left-0 pointer-events-none">
                <div class="w-16 h-px bg-gradient-to-r from-blue-400/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-400/60 to-transparent"></div>
            </div>
            <div class="absolute top-1 right-0 pointer-events-none flex flex-col items-end">
                <div class="w-16 h-px bg-gradient-to-l from-violet-400/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-400/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none">
                <div class="w-16 h-px bg-gradient-to-r from-violet-400/40 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-400/40 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end">
                <div class="w-16 h-px bg-gradient-to-l from-pink-400/40 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-pink-400/40 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-12 lg:px-16 py-12 sm:py-14 text-center">

                {{-- Status pill --}}
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-black border border-white/15 rounded-full text-xs text-blue-200 font-semibold mb-6 backdrop-blur-sm">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Currently accepting new projects
                </div>

                {{-- Heading --}}
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white mb-4 leading-tight">
                    Have an idea or need a system<br class="hidden sm:block">
                    for your <span class="bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 bg-clip-text text-transparent">business?</span>
                </h2>

                <p class="text-slate-300 text-base max-w-xl mx-auto mb-8 leading-relaxed">
                    Let's turn your vision into a powerful digital product. From consultation to launch — I've got you covered.
                </p>

                {{-- Feature pills --}}
                <div class="flex flex-wrap justify-center gap-2 mb-8">
                    @foreach(['Fast Delivery','Clean Code','Scalable Systems','24h Support','Free Consultation'] as $feat)
                    <span class="px-3 py-1 bg-black border border-white/15 text-white/80 text-xs font-medium rounded-full backdrop-blur-sm">{{ $feat }}</span>
                    @endforeach
                </div>

                {{-- CTA buttons --}}
                <div class="flex flex-wrap gap-3 justify-center">
                    <a href="{{ route('contact') }}"
                       class="group inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-violet-600 hover:from-blue-400 hover:to-violet-500 text-white text-sm font-bold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Hire Me
                        <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                    </a>
                    <a href="{{ route('contact') }}?service=quote"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-black hover:bg-black text-white text-sm font-bold rounded-xl border border-white/20 backdrop-blur-sm hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        Request a Quote
                    </a>
                    <a href="{{ route('portfolio') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-black hover:bg-black text-white text-sm font-bold rounded-xl border border-white/20 backdrop-blur-sm hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        View Portfolio
                    </a>
                </div>

            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     11. CONTACT SECTION
════════════════════════════════════════════════════════════════════════ --}}
<section class="py-8 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="contact">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">

        {{-- ══ CONTACT CARD ══ --}}
        <div class="relative rounded-3xl overflow-hidden shadow-xl border border-green-200 dark:border-gray-700 bg-white dark:bg-black transition-colors duration-300 scroll-animate-scale">

            {{-- Enhanced animated top colour bar --}}
            <div class="h-2 w-full bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 relative overflow-hidden scroll-animate-left stagger-child">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 via-violet-400 to-pink-400 animate-pulse" style="animation-duration: 3s;"></div>
            </div>

            {{-- Enhanced background with animated elements --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                {{-- Floating particles --}}
                <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
                <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
                <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
                <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
                <div class="absolute inset-0 opacity-[0.35]"
                     style="background-image:radial-gradient(rgba(99,102,241,.15) 1px,transparent 1px);background-size:28px 28px"></div>
            </div>

            {{-- Enhanced corner accents with glow --}}
            <div class="absolute top-2 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-blue-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-blue-500/60 to-transparent"></div>
            </div>
            <div class="absolute top-2 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-violet-500/60 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-b from-violet-500/60 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 left-0 pointer-events-none scroll-animate-left stagger-child">
                <div class="w-16 h-px bg-gradient-to-r from-violet-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-violet-500/50 to-transparent"></div>
            </div>
            <div class="absolute bottom-0 right-0 pointer-events-none flex flex-col items-end scroll-animate-right stagger-child">
                <div class="w-16 h-px bg-gradient-to-l from-blue-500/50 to-transparent"></div>
                <div class="w-px h-16 bg-gradient-to-t from-blue-500/50 to-transparent"></div>
            </div>

            <div class="relative z-10 px-6 sm:px-10 lg:px-14 py-10 sm:py-12">

                {{-- Header --}}
                <div class="mb-10 scroll-animate stagger-child">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 dark:bg-black text-blue-600 dark:text-blue-300 border border-gray-300 dark:border-gray-700 mb-2 scroll-animate-scale stagger-child hover-dance">
                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full pulse-glow"></span>
                        Get In Touch
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 transition-colors duration-300 scroll-animate-flip stagger-child">
                        Contact <span class="bg-gradient-to-r from-blue-600 via-violet-600 to-pink-600 bg-clip-text text-transparent">Me</span>
                    </h2>
                    <p class="text-gray-500 dark:text-slate-400 text-sm transition-colors duration-300 max-w-xl scroll-animate stagger-child">Have a project in mind? Let's talk. I respond within 24 hours.</p>
                    <div class="mt-3 flex items-center gap-3 scroll-animate-right stagger-child">
                        <div class="w-12 h-0.5 bg-gradient-to-r from-blue-500 to-violet-500 rounded-full"></div>
                        <span class="text-xs text-gray-500 font-medium">Quick response guaranteed</span>
                    </div>
                </div>

                <div class="grid lg:grid-cols-5 gap-8 scroll-animate">

                    {{-- Contact info --}}
                    <div class="lg:col-span-2 space-y-5 scroll-animate-left stagger-child">

                        {{-- Info card --}}
                        <div class="bg-white dark:bg-black rounded-2xl p-5 border border-green-200 dark:border-gray-700 transition-colors duration-300 hover-dance pulse-glow">
                            <h3 class="text-sm font-bold text-gray-900 dark:text-slate-100 mb-4 transition-colors duration-300">Contact Information</h3>
                            <div class="space-y-4">
                                <div class="flex items-start gap-3 stagger-child">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center flex-shrink-0 shadow-sm floating">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] text-gray-400 dark:text-slate-500 font-medium mb-0.5">Email</div>
                                        <a href="mailto:{{ $settings['contact_email'] ?? 'brian@brianowaka.com' }}" class="text-gray-800 dark:text-slate-200 font-semibold hover:text-blue-600 dark:hover:text-indigo-400 transition-colors text-sm">{{ $settings['contact_email'] ?? 'brian@brianowaka.com' }}</a>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 stagger-child">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center flex-shrink-0 shadow-sm floating">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] text-gray-400 dark:text-slate-500 font-medium mb-0.5">Phone</div>
                                        <a href="tel:{{ $settings['contact_phone'] ?? '+254712345678' }}" class="text-gray-800 dark:text-slate-200 font-semibold hover:text-blue-600 dark:hover:text-indigo-400 transition-colors text-sm">{{ $settings['contact_phone'] ?? '+254 712 345 678' }}</a>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3 stagger-child">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-violet-500 to-purple-600 flex items-center justify-center flex-shrink-0 shadow-sm floating">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-[10px] text-gray-400 dark:text-slate-500 font-medium mb-0.5">Location</div>
                                        <div class="text-gray-800 dark:text-slate-200 font-semibold text-sm">Nairobi, Kenya</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Availability card --}}
                        <div class="bg-gradient-to-br from-blue-600 to-violet-700 rounded-2xl p-5 text-white hover-dance pulse-glow">
                            <div class="flex items-center gap-2 mb-2.5">
                                <span class="relative flex h-2.5 w-2.5">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-green-400"></span>
                                </span>
                                <span class="font-bold text-sm">Available for Work</span>
                            </div>
                            <p class="text-blue-100 text-xs leading-relaxed">Open to freelance projects, full-time roles, and long-term collaborations.</p>
                            <div class="mt-4 pt-3 border-t border-white/20 text-xs text-blue-200">
                                Response time: <span class="font-semibold text-white">within 24 hours</span>
                            </div>
                        </div>
                    </div>

                    {{-- Contact form --}}
                    <div class="lg:col-span-3 scroll-animate-right stagger-child">
                        <div class="bg-white dark:bg-black rounded-2xl border border-green-200 dark:border-gray-700 p-6 hover-dance">

                            @if(session('success'))
                            <div class="mb-5 p-4 bg-black dark:bg-black border border-green-500 dark:border-green-400 rounded-xl flex items-center gap-3 pulse-glow">
                                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <p class="text-green-400 dark:text-green-300 text-sm font-medium">{{ session('success') }}</p>
                            </div>
                            @endif

                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                                @csrf
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div class="stagger-child">
                                        <label class="block text-xs font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Full Name <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your full name" required
                                            class="w-full px-3.5 py-2.5 bg-black dark:bg-black border border-gray-800 dark:border-gray-700 dark:text-slate-100 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all @error('name') border-red-400 @enderror hover-dance">
                                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="stagger-child">
                                        <label class="block text-xs font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Email Address <span class="text-red-500">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required
                                            class="w-full px-3.5 py-2.5 bg-black dark:bg-black border border-gray-800 dark:border-gray-700 dark:text-slate-100 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all @error('email') border-red-400 @enderror hover-dance">
                                        @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="grid sm:grid-cols-2 gap-4">
                                    <div class="stagger-child">
                                        <label class="block text-xs font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Phone Number</label>
                                        <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+254 7XX XXX XXX"
                                            class="w-full px-3.5 py-2.5 bg-black dark:bg-black border border-gray-800 dark:border-gray-700 dark:text-slate-100 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all hover-dance">
                                    </div>
                                    <div class="stagger-child">
                                        <label class="block text-xs font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Subject</label>
                                        <input type="text" name="subject" value="{{ old('subject') }}" placeholder="Project inquiry, quote..."
                                            class="w-full px-3.5 py-2.5 bg-black dark:bg-black border border-gray-800 dark:border-gray-700 dark:text-slate-100 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all hover-dance">
                                    </div>
                                </div>
                                <div class="stagger-child">
                                    <label class="block text-xs font-semibold text-gray-700 dark:text-slate-300 mb-1.5">Message <span class="text-red-500">*</span></label>
                                    <textarea name="message" rows="5" placeholder="Tell me about your project, what you need, your timeline and budget..." required
                                        class="w-full px-3.5 py-2.5 bg-black dark:bg-black border border-gray-800 dark:border-gray-700 dark:text-slate-100 dark:placeholder-slate-400 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all resize-none @error('message') border-red-400 @enderror hover-dance">{{ old('message') }}</textarea>
                                    @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                                </div>
                                <button type="submit"
                                    class="w-full inline-flex items-center justify-center gap-2 px-6 py-3.5 bg-gradient-to-r from-blue-600 to-violet-600 hover:from-blue-500 hover:to-violet-500 text-white text-sm font-bold rounded-xl transition-all duration-300 hover:scale-[1.02] shadow-lg shadow-blue-500/20 pulse-glow hover-spin">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

</div>
@push('styles')
<style>
/* ═══════════════════════════════════════════════════════════════════════
   HERO CARD ROTATION STYLES
════════════════════════════════════════════════════════════════════════ */

.hero-card {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transition: all 1000ms cubic-bezier(0.4, 0, 0.2, 1);
    z-index: 1;
}

.hero-card.active {
    z-index: 2;
}

.hero-card:first-child {
    position: relative;
}

/* Mobile-specific adjustments */
@media (max-width: 640px) {
    .hero-card {
        min-height: 500px;
    }
    
    .hero-profile .relative.group {
        margin-bottom: 1rem;
    }
    
    .hero-dashboard {
        margin-top: 1rem;
    }
}

/* Advertisement card specific styles */
.hero-advertisement {
    background: linear-gradient(135deg, #1e1b4b 0%, #312e81 25%, #1e40af  50%, #3730a3 75%, #1e1b4b 100%);
    border: 2px solid transparent;
    background-clip: padding-box;
}

.hero-advertisement::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: inherit;
    padding: 2px;
    background: linear-gradient(45deg, #8b5cf6, #ec4899, #f59e0b, #10b981, #3b82f6, #8b5cf6);
    mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
    mask-composite: exclude;
    z-index: -1;
    animation: borderRotate 3s linear infinite;
}

/* E-Commerce card styles */
.hero-ecommerce {
    background: linear-gradient(135deg, #064e3b 0%, #0f766e 25%, #0891b2 50%, #0f766e 75%, #064e3b 100%);
}

.hero-ecommerce::before {
    background: linear-gradient(45deg, #10b981, #06b6d4, #3b82f6, #10b981);
    animation: borderRotate 4s linear infinite;
}

/* Mobile app card styles */
.hero-mobile {
    background: linear-gradient(135deg, #881337 0%, #be185d 25%, #dc2626 50%, #be185d 75%, #881337 100%);
}

.hero-mobile::before {
    background: linear-gradient(45deg, #ec4899, #f43f5e, #ef4444, #ec4899);
    animation: borderRotate 3.5s linear infinite;
}

/* AI card styles */
.hero-ai {
    background: linear-gradient(135deg, #312e81 0%, #5b21b6 25%, #7c3aed 50%, #5b21b6 75%, #312e81 100%);
}

.hero-ai::before {
    background: linear-gradient(45deg, #6366f1, #8b5cf6, #a855f7, #6366f1);
    animation: borderRotate 2.5s linear infinite;
}

@keyframes borderRotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Countdown timer animations */
#countdown-timer > div {
    animation: pulse 2s infinite;
}

#countdown-timer > div:nth-child(1) { animation-delay: 0s; }
#countdown-timer > div:nth-child(2) { animation-delay: 0.5s; }
#countdown-timer > div:nth-child(3) { animation-delay: 1s; }
#countdown-timer > div:nth-child(4) { animation-delay: 1.5s; }

/* Mobile marquee optimization */
@media (max-width: 640px) {
    .hero-marquee .animate-slide-marquee {
        animation-duration: 20s;
    }
    
    .hero-marquee span {
        gap: 0.5rem;
    }
    
    .hero-tech-pills {
        max-height: 4rem;
        overflow-y: auto;
    }
}

/* Touch-friendly buttons on mobile */
@media (max-width: 640px) {
    .btn-ripple,
    .hero-card a[class*="bg-gradient"],
    .hero-card a[class*="border"] {
        min-height: 44px;
        touch-action: manipulation;
    }
}

/* ═══════════════════════════════════════════════════════════════════════
   BEAUTIFUL DYNAMIC ANIMATIONS - MULTI-DIRECTIONAL POP-INS
════════════════════════════════════════════════════════════════════════ */

/* SPECTACULAR PAGE LOAD ANIMATIONS */

/* From Top Edge - Dramatic Drop */
@keyframes dropFromTop {
    0% {
        opacity: 0;
        transform: translateY(-100vh) rotate(180deg) scale(0.3);
    }
    60% {
        opacity: 1;
        transform: translateY(20px) rotate(-10deg) scale(1.1);
    }
    80% {
        transform: translateY(-10px) rotate(5deg) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) rotate(0deg) scale(1);
    }
}

/* From Bottom Edge - Rocket Launch */
@keyframes rocketFromBottom {
    0% {
        opacity: 0;
        transform: translateY(100vh) rotate(-180deg) scale(0.2);
    }
    50% {
        opacity: 1;
        transform: translateY(-30px) rotate(15deg) scale(1.2);
    }
    70% {
        transform: translateY(15px) rotate(-8deg) scale(0.9);
    }
    100% {
        opacity: 1;
        transform: translateY(0) rotate(0deg) scale(1);
    }
}

/* From Left Edge - Spinning Slide */
@keyframes spinFromLeft {
    0% {
        opacity: 0;
        transform: translateX(-100vw) rotate(-360deg) scale(0.1);
    }
    60% {
        opacity: 1;
        transform: translateX(30px) rotate(20deg) scale(1.15);
    }
    80% {
        transform: translateX(-15px) rotate(-10deg) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateX(0) rotate(0deg) scale(1);
    }
}

/* From Right Edge - Whirlwind Entry */
@keyframes whirlFromRight {
    0% {
        opacity: 0;
        transform: translateX(100vw) rotate(360deg) scale(0.1);
    }
    60% {
        opacity: 1;
        transform: translateX(-30px) rotate(-20deg) scale(1.15);
    }
    80% {
        transform: translateX(15px) rotate(10deg) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateX(0) rotate(0deg) scale(1);
    }
}

/* From Center - Explosive Pop */
@keyframes explosiveCenter {
    0% {
        opacity: 0;
        transform: scale(0) rotate(0deg);
    }
    30% {
        opacity: 0.7;
        transform: scale(1.5) rotate(180deg);
    }
    60% {
        opacity: 1;
        transform: scale(0.8) rotate(360deg);
    }
    80% {
        transform: scale(1.1) rotate(380deg);
    }
    100% {
        opacity: 1;
        transform: scale(1) rotate(360deg);
    }
}

/* Diagonal Entries */
@keyframes diagonalTopLeft {
    0% {
        opacity: 0;
        transform: translate(-100vw, -100vh) rotate(-45deg) scale(0.3);
    }
    70% {
        opacity: 1;
        transform: translate(20px, 20px) rotate(10deg) scale(1.1);
    }
    100% {
        opacity: 1;
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
}

@keyframes diagonalTopRight {
    0% {
        opacity: 0;
        transform: translate(100vw, -100vh) rotate(45deg) scale(0.3);
    }
    70% {
        opacity: 1;
        transform: translate(-20px, 20px) rotate(-10deg) scale(1.1);
    }
    100% {
        opacity: 1;
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
}

@keyframes diagonalBottomLeft {
    0% {
        opacity: 0;
        transform: translate(-100vw, 100vh) rotate(45deg) scale(0.3);
    }
    70% {
        opacity: 1;
        transform: translate(20px, -20px) rotate(-10deg) scale(1.1);
    }
    100% {
        opacity: 1;
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
}

@keyframes diagonalBottomRight {
    0% {
        opacity: 0;
        transform: translate(100vw, 100vh) rotate(-45deg) scale(0.3);
    }
    70% {
        opacity: 1;
        transform: translate(-20px, -20px) rotate(10deg) scale(1.1);
    }
    100% {
        opacity: 1;
        transform: translate(0, 0) rotate(0deg) scale(1);
    }
}

/* Spiral Animations */
@keyframes spiralIn {
    0% {
        opacity: 0;
        transform: rotate(0deg) scale(0) translateX(200px);
    }
    50% {
        opacity: 0.8;
        transform: rotate(180deg) scale(0.5) translateX(100px);
    }
    80% {
        opacity: 1;
        transform: rotate(300deg) scale(1.1) translateX(20px);
    }
    100% {
        opacity: 1;
        transform: rotate(360deg) scale(1) translateX(0);
    }
}

/* Bounce Variations */
@keyframes megaBounce {
    0% {
        opacity: 0;
        transform: scale(0) rotate(0deg);
    }
    25% {
        opacity: 0.5;
        transform: scale(1.5) rotate(90deg);
    }
    50% {
        opacity: 0.8;
        transform: scale(0.7) rotate(180deg);
    }
    75% {
        opacity: 1;
        transform: scale(1.2) rotate(270deg);
    }
    90% {
        transform: scale(0.9) rotate(350deg);
    }
    100% {
        opacity: 1;
        transform: scale(1) rotate(360deg);
    }
}

/* Flip Animations */
@keyframes flipIn {
    0% {
        opacity: 0;
        transform: perspective(400px) rotateY(-90deg) scale(0.5);
    }
    40% {
        transform: perspective(400px) rotateY(-10deg) scale(1.1);
    }
    70% {
        transform: perspective(400px) rotateY(10deg) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: perspective(400px) rotateY(0deg) scale(1);
    }
}

@keyframes flipInX {
    0% {
        opacity: 0;
        transform: perspective(400px) rotateX(-90deg) scale(0.5);
    }
    40% {
        transform: perspective(400px) rotateX(-10deg) scale(1.1);
    }
    70% {
        transform: perspective(400px) rotateX(10deg) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: perspective(400px) rotateX(0deg) scale(1);
    }
}

/* Elastic Animations */
@keyframes elasticIn {
    0% {
        opacity: 0;
        transform: scale(0) rotate(0deg);
    }
    50% {
        opacity: 1;
        transform: scale(1.3) rotate(180deg);
    }
    75% {
        transform: scale(0.8) rotate(270deg);
    }
    90% {
        transform: scale(1.1) rotate(340deg);
    }
    100% {
        opacity: 1;
        transform: scale(1) rotate(360deg);
    }
}

/* ANIMATION CLASSES - FASTER & SMOOTHER */
.animate-drop-from-top { animation: dropFromTop 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-rocket-from-bottom { animation: rocketFromBottom 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-spin-from-left { animation: spinFromLeft 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-whirl-from-right { animation: whirlFromRight 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-explosive-center { animation: explosiveCenter 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-diagonal-top-left { animation: diagonalTopLeft 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-diagonal-top-right { animation: diagonalTopRight 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-diagonal-bottom-left { animation: diagonalBottomLeft 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-diagonal-bottom-right { animation: diagonalBottomRight 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-spiral-in { animation: spiralIn 1s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-mega-bounce { animation: megaBounce 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-flip-in { animation: flipIn 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-flip-in-x { animation: flipInX 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }
.animate-elastic-in { animation: elasticIn 0.9s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards; }

/* SCROLL ANIMATIONS - Enhanced & Balanced Speed */
.scroll-animate {
    opacity: 0;
    transform: translateY(50px) rotate(5deg) scale(0.8);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.scroll-animate.animate {
    opacity: 1;
    transform: translateY(0) rotate(0deg) scale(1);
}

.scroll-animate-left {
    opacity: 0;
    transform: translateX(-80px) rotate(-15deg) scale(0.7);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.scroll-animate-left.animate {
    opacity: 1;
    transform: translateX(0) rotate(0deg) scale(1);
}

.scroll-animate-right {
    opacity: 0;
    transform: translateX(80px) rotate(15deg) scale(0.7);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.scroll-animate-right.animate {
    opacity: 1;
    transform: translateX(0) rotate(0deg) scale(1);
}

.scroll-animate-scale {
    opacity: 0;
    transform: scale(0.3) rotate(180deg);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.scroll-animate-scale.animate {
    opacity: 1;
    transform: scale(1) rotate(0deg);
}

.scroll-animate-flip {
    opacity: 0;
    transform: perspective(400px) rotateY(90deg) scale(0.5);
    transition: all 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.scroll-animate-flip.animate {
    opacity: 1;
    transform: perspective(400px) rotateY(0deg) scale(1);
}

/* STAGGERED DELAYS - Balanced */
.delay-100 { animation-delay: 0.15s; transition-delay: 0.15s; }
.delay-200 { animation-delay: 0.3s; transition-delay: 0.3s; }
.delay-300 { animation-delay: 0.45s; transition-delay: 0.45s; }
.delay-400 { animation-delay: 1.2s; transition-delay: 1.2s; }
.delay-500 { animation-delay: 1.5s; transition-delay: 1.5s; }
.delay-600 { animation-delay: 1.8s; transition-delay: 1.8s; }
.delay-700 { animation-delay: 2.1s; transition-delay: 2.1s; }
.delay-800 { animation-delay: 2.4s; transition-delay: 2.4s; }
.delay-900 { animation-delay: 2.7s; transition-delay: 2.7s; }
.delay-1000 { animation-delay: 3s; transition-delay: 3s; }
.delay-1100 { animation-delay: 3.3s; transition-delay: 3.3s; }
.delay-1200 { animation-delay: 3.6s; transition-delay: 3.6s; }
.delay-1300 { animation-delay: 3.9s; transition-delay: 3.9s; }
.delay-1400 { animation-delay: 4.2s; transition-delay: 4.2s; }
.delay-1500 { animation-delay: 4.5s; transition-delay: 4.5s; }

/* SPECIAL EFFECTS - Enhanced & Slower */
.floating {
    animation: float 8s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-8px) rotate(0.5deg); }
    50% { transform: translateY(-15px) rotate(0deg); }
    75% { transform: translateY(-8px) rotate(-0.5deg); }
}

.pulse-glow {
    animation: pulseGlow 3s ease-in-out infinite;
}

@keyframes pulseGlow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 60px rgba(147, 51, 234, 0.4);
        transform: scale(1.01);
    }
}

.wiggle {
    animation: wiggle 4s ease-in-out infinite;
}

@keyframes wiggle {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(0.5deg); }
    75% { transform: rotate(-0.5deg); }
}

/* HIDE ELEMENTS INITIALLY */
.page-load-animate {
    opacity: 0;
}

.page-loaded .page-load-animate {
    opacity: 1;
}

/* HOVER ENHANCEMENTS */
.hover-dance:hover {
    animation: dance 0.5s ease-in-out;
}

@keyframes dance {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    25% { transform: translateY(-5px) rotate(2deg); }
    50% { transform: translateY(-10px) rotate(0deg); }
    75% { transform: translateY(-5px) rotate(-2deg); }
}

.hover-spin:hover {
    animation: quickSpin 0.6s ease-in-out;
}

@keyframes quickSpin {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.1); }
    100% { transform: rotate(360deg) scale(1); }
}
</style>

<style>
/* Hero Card Rotation Styles */
.hero-card-container {
    position: relative;
}

.hero-card {
    transition: all 1000ms cubic-bezier(0.4, 0, 0.2, 1);
}

.hero-card:not(.hero-profile) {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
}

.hero-card.active {
    z-index: 2;
}

.hero-card:not(.active) {
    z-index: 1;
}
</style>
@endpush

@push('scripts')
<script>
// ═══════════════════════════════════════════════════════════════════════
// SPECTACULAR MULTI-DIRECTIONAL ANIMATION SYSTEM
// ═══════════════════════════════════════════════════════════════════════

document.addEventListener('DOMContentLoaded', function() {
    
    // ═══ SPECTACULAR PAGE LOAD ANIMATIONS ═══
    function initSpectacularPageLoadAnimations() {
        // Mark page as loaded
        document.body.classList.add('page-loaded');
        
        // HERO SECTION - Multi-directional spectacular entries (FASTER)
        const heroAnimations = [
            // Profile comes from top with dramatic drop
            { selector: '.hero-profile', animation: 'animate-drop-from-top', delay: 100 },
            
            // Dashboard spins in from left
            { selector: '.hero-dashboard', animation: 'animate-spin-from-left', delay: 250 },
            
            // Status pill rockets from bottom
            { selector: '.hero-status', animation: 'animate-rocket-from-bottom', delay: 400 },
            
            // Main headline explodes from center
            { selector: '.hero-headline', animation: 'animate-explosive-center', delay: 550 },
            
            // Marquee whirls from right
            { selector: '.hero-marquee', animation: 'animate-whirl-from-right', delay: 700 },
            
            // Subtext flips in
            { selector: '.hero-subtext', animation: 'animate-flip-in', delay: 850 },
            
            // Buttons mega bounce
            { selector: '.hero-buttons', animation: 'animate-mega-bounce', delay: 1000 },
            
            // Tech pills spiral in
            { selector: '.hero-tech-pills', animation: 'animate-spiral-in', delay: 1150 },
            
            // Social links elastic bounce
            { selector: '.hero-social', animation: 'animate-elastic-in', delay: 1300 }
        ];
        
        heroAnimations.forEach(({ selector, animation, delay }) => {
            const element = document.querySelector(selector);
            if (element) {
                element.style.animationDelay = `${delay}ms`;
                element.classList.add(animation);
            }
        });
        
        // TECH PILLS - Individual diagonal entries (FASTER)
        const techPills = document.querySelectorAll('.hero-tech-pills span');
        const diagonalAnimations = [
            'animate-diagonal-top-left',
            'animate-diagonal-top-right', 
            'animate-diagonal-bottom-left',
            'animate-diagonal-bottom-right'
        ];
        
        techPills.forEach((pill, index) => {
            const animationClass = diagonalAnimations[index % diagonalAnimations.length];
            pill.style.animationDelay = `${1150 + (index * 100)}ms`;
            pill.classList.add(animationClass);
            pill.classList.add('hover-dance'); // Add hover effect
        });
        
        // SOCIAL LINKS - Different spectacular entries (FASTER)
        const socialLinks = document.querySelectorAll('.hero-social a');
        const socialAnimations = [
            'animate-flip-in',
            'animate-mega-bounce',
            'animate-spiral-in',
            'animate-elastic-in'
        ];
        
        socialLinks.forEach((link, index) => {
            const animationClass = socialAnimations[index % socialAnimations.length];
            link.style.animationDelay = `${1300 + (index * 120)}ms`;
            link.classList.add(animationClass);
            link.classList.add('hover-spin'); // Add hover effect
        });
        
        // DASHBOARD STATS - Staggered bounces (FASTER)
        const dashboardStats = document.querySelectorAll('.hero-dashboard .stagger-child');
        dashboardStats.forEach((stat, index) => {
            stat.style.animationDelay = `${300 + (index * 100)}ms`;
            stat.classList.add('animate-mega-bounce');
        });
    }
    
    // ═══ ENHANCED SCROLL ANIMATIONS ═══
    function initSpectacularScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    
                    // Add animate class with enhanced effects
                    element.classList.add('animate');
                    
                    // STAGGERED CHILDREN - Multi-directional (Balanced Speed)
                    const children = element.querySelectorAll('.stagger-child');
                    const childAnimations = [
                        'scroll-animate-left',
                        'scroll-animate-right', 
                        'scroll-animate-scale',
                        'scroll-animate-flip'
                    ];
                    
                    children.forEach((child, index) => {
                        const animationClass = childAnimations[index % childAnimations.length];
                        child.classList.add(animationClass);
                        setTimeout(() => {
                            child.classList.add('animate');
                        }, index * 150);
                    });
                    
                    // PROJECT CARDS - Spectacular entries (Balanced Speed)
                    const projectCards = element.querySelectorAll('.project-card');
                    const projectAnimations = [
                        { transform: 'translateY(0) scale(1) rotate(0deg)', delay: 0 },
                        { transform: 'translateY(0) scale(1) rotate(0deg)', delay: 150 },
                        { transform: 'translateY(0) scale(1) rotate(0deg)', delay: 300 },
                        { transform: 'translateY(0) scale(1) rotate(0deg)', delay: 450 }
                    ];
                    
                    projectCards.forEach((card, index) => {
                        const animation = projectAnimations[index % projectAnimations.length];
                        setTimeout(() => {
                            card.style.transform = animation.transform;
                            card.style.opacity = '1';
                            card.classList.add('wiggle'); // Add continuous wiggle
                        }, animation.delay);
                    });
                    
                    // SERVICE CARDS - Rotating entries (Balanced Speed)
                    const serviceCards = element.querySelectorAll('.service-card');
                    serviceCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.transform = 'translateY(0) scale(1) rotate(0deg)';
                            card.style.opacity = '1';
                            card.classList.add('hover-dance'); // Add hover dance
                        }, index * 180);
                    });
                    
                    // SKILL BARS - Animated progress with rotation (FASTER)
                    const skillBars = element.querySelectorAll('.skill-bar');
                    skillBars.forEach((bar, index) => {
                        setTimeout(() => {
                            const progress = bar.querySelector('.skill-progress');
                            if (progress) {
                                const width = progress.dataset.width || '0%';
                                progress.style.width = width;
                                progress.style.transform = 'rotate(0deg)';
                            }
                        }, index * 300);
                    });
                    
                    // TESTIMONIAL CARDS - 3D Spectacular (SLOWER)
                    const testimonialCards = element.querySelectorAll('.testimonial-card');
                    testimonialCards.forEach((card, index) => {
                        setTimeout(() => {
                            card.style.transform = 'translateY(0) rotateY(0deg) scale(1)';
                            card.style.opacity = '1';
                            card.classList.add('floating'); // Add floating effect
                        }, index * 600);
                    });
                    
                    // PROCESS STEPS - Mega spectacular (SLOWER)
                    const processSteps = element.querySelectorAll('.process-step');
                    processSteps.forEach((step, index) => {
                        setTimeout(() => {
                            step.style.transform = 'translateY(0) scale(1) rotate(0deg)';
                            step.style.opacity = '1';
                            step.classList.add('pulse-glow'); // Add glow effect
                        }, index * 500);
                    });
                    
                    // Unobserve after animation
                    observer.unobserve(element);
                }
            });
        }, observerOptions);
        
        // Observe all sections with enhanced detection
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            observer.observe(section);
        });
        
        // Observe specific elements
        const animateElements = document.querySelectorAll('.scroll-animate, .scroll-animate-left, .scroll-animate-right, .scroll-animate-scale, .scroll-animate-flip');
        animateElements.forEach(element => {
            observer.observe(element);
        });
    }
    
    // ═══ SPECTACULAR SPECIAL EFFECTS ═══
    function initSpectacularEffects() {
        // Enhanced floating for profile photo
        const profilePhoto = document.querySelector('.hero-profile img, .hero-profile > div');
        if (profilePhoto) {
            profilePhoto.classList.add('floating');
        }
        
        // Enhanced pulse glow for CTA buttons
        const ctaButtons = document.querySelectorAll('.btn-ripple, .hero-buttons a:first-child');
        ctaButtons.forEach(button => {
            button.addEventListener('mouseenter', () => {
                button.classList.add('pulse-glow');
            });
            button.addEventListener('mouseleave', () => {
                button.classList.remove('pulse-glow');
            });
        });
        
        // Enhanced parallax with rotation
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax-bg');
            
            parallaxElements.forEach(element => {
                const speed = element.dataset.speed || 0.5;
                const rotation = scrolled * 0.05;
                element.style.transform = `translateY(${scrolled * speed}px) rotate(${rotation}deg)`;
            });
        });
        
        // Add random wiggle to cards on hover
        const cards = document.querySelectorAll('.project-card, .service-card, .testimonial-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.add('wiggle');
            });
            card.addEventListener('mouseleave', () => {
                setTimeout(() => {
                    card.classList.remove('wiggle');
                }, 2000);
            });
        });
    }
    
    // ═══ PROJECT CAROUSEL WITH ENHANCED EFFECTS ═══
    function initEnhancedProjectCarousel() {
        const track = document.getElementById('proj-track');
        const prev = document.getElementById('proj-prev');
        const next = document.getElementById('proj-next');
        if (!track) return;

        const step = () => track.querySelector('div')?.offsetWidth + 16 || 320;

        const update = () => {
            prev.disabled = track.scrollLeft <= 0;
            next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 1;
        };

        // Enhanced scroll with rotation effect
        prev.addEventListener('click', () => { 
            track.scrollBy({ left: -step(), behavior: 'smooth' });
            // Add rotation effect to visible cards
            const visibleCards = track.querySelectorAll('.project-card');
            visibleCards.forEach(card => {
                card.style.transform += ' rotate(-2deg)';
                setTimeout(() => {
                    card.style.transform = card.style.transform.replace(' rotate(-2deg)', '');
                }, 300);
            });
        });
        
        next.addEventListener('click', () => { 
            track.scrollBy({ left: step(), behavior: 'smooth' });
            // Add rotation effect to visible cards
            const visibleCards = track.querySelectorAll('.project-card');
            visibleCards.forEach(card => {
                card.style.transform += ' rotate(2deg)';
                setTimeout(() => {
                    card.style.transform = card.style.transform.replace(' rotate(2deg)', '');
                }, 300);
            });
        });
        
        track.addEventListener('scroll', update, { passive: true });
        update();
    }
    
    // ═══ INITIALIZE ALL SPECTACULAR ANIMATIONS ═══
    setTimeout(initSpectacularPageLoadAnimations, 100);
    setTimeout(initSpectacularScrollAnimations, 200);
    setTimeout(initSpectacularEffects, 300);
    initEnhancedProjectCarousel();
    
    // ═══ PERFORMANCE OPTIMIZATION ═══
    // Reduce animations on slower devices
    if (navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4) {
        document.documentElement.style.setProperty('--animation-duration', '0.6s');
    }
    
    // Respect user's motion preferences
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.documentElement.style.setProperty('--animation-duration', '0.2s');
        const animatedElements = document.querySelectorAll('[class*="animate"]');
        animatedElements.forEach(el => {
            el.style.animation = 'none';
            el.style.transition = 'opacity 0.3s ease';
        });
    }
});

// ═══ ENHANCED SMOOTH SCROLL ═══
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            // Add rotation effect during scroll
            target.style.transform = 'rotate(1deg)';
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            setTimeout(() => {
                target.style.transform = 'rotate(0deg)';
            }, 1000);
        }
    });
});

// ═══════════════════════════════════════════════════════════════════════
// HERO CARD ROTATION SYSTEM
// ═══════════════════════════════════════════════════════════════════════

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.hero-card');
    let currentCard = 0;
    const rotationInterval = 5000; // 5 seconds
    let rotationTimer;
    let isUserInteracting = false;

    // Initialize cards - ensure proper stacking
    cards.forEach((card, index) => {
        // Set absolute positioning for all cards except the first (profile card)
        if (index > 0) {
            card.style.position = 'absolute';
            card.style.top = '0';
            card.style.left = '0';
            card.style.right = '0';
            card.style.bottom = '0';
            card.style.zIndex = '1';
        }
        
        if (index === 0) {
            card.classList.add('active');
            card.style.opacity = '1';
            card.style.transform = 'translateX(0)';
            card.style.zIndex = '2';
        } else {
            card.classList.remove('active');
            card.style.opacity = '0';
            card.style.transform = 'translateX(-100%)';
        }
    });

    // Card rotation function
    function rotateCards() {
        if (cards.length <= 1 || isUserInteracting) return;

        const currentCardElement = cards[currentCard];
        const nextCard = (currentCard + 1) % cards.length;
        const nextCardElement = cards[nextCard];

        // Set z-index for proper layering
        currentCardElement.style.zIndex = '1';
        nextCardElement.style.zIndex = '2';

        // Animate out current card
        currentCardElement.style.transition = 'all 1000ms cubic-bezier(0.4, 0, 0.2, 1)';
        currentCardElement.style.opacity = '0';
        currentCardElement.style.transform = 'translateX(100%)';
        currentCardElement.classList.remove('active');

        // Animate in next card
        setTimeout(() => {
            nextCardElement.style.transition = 'all 1000ms cubic-bezier(0.4, 0, 0.2, 1)';
            nextCardElement.style.opacity = '1';
            nextCardElement.style.transform = 'translateX(0)';
            nextCardElement.classList.add('active');
            
            currentCard = nextCard;
        }, 100);
    }

    // Start automatic rotation
    function startRotation() {
        if (cards.length > 1) {
            rotationTimer = setInterval(rotateCards, rotationInterval);
        }
    }

    // Stop rotation
    function stopRotation() {
        if (rotationTimer) {
            clearInterval(rotationTimer);
        }
    }

    // Pause rotation on user interaction
    function pauseRotation() {
        isUserInteracting = true;
        stopRotation();
        setTimeout(() => {
            isUserInteracting = false;
            startRotation();
        }, 10000); // Resume after 10 seconds
    }

    // Touch/swipe support for mobile
    let startX = 0;
    let startY = 0;
    let endX = 0;
    let endY = 0;

    cards.forEach(card => {
        // Touch events
        card.addEventListener('touchstart', function(e) {
            startX = e.touches[0].clientX;
            startY = e.touches[0].clientY;
            pauseRotation();
        }, { passive: true });

        card.addEventListener('touchend', function(e) {
            endX = e.changedTouches[0].clientX;
            endY = e.changedTouches[0].clientY;
            handleSwipe();
        }, { passive: true });

        // Mouse events for desktop
        card.addEventListener('mouseenter', pauseRotation);
    });

    function handleSwipe() {
        const deltaX = endX - startX;
        const deltaY = endY - startY;
        const minSwipeDistance = 50;

        // Check if it's a horizontal swipe
        if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > minSwipeDistance) {
            if (deltaX > 0) {
                // Swipe right - go to previous card
                rotateCards();
            } else {
                // Swipe left - go to next card
                rotateCards();
            }
        }
    }

    // Keyboard controls
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft' || e.key === 'ArrowRight') {
            e.preventDefault();
            pauseRotation();
            rotateCards();
        }
    });

    // Pause rotation when page is not visible
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            stopRotation();
        } else {
            startRotation();
        }
    });

    // Start the rotation
    startRotation();
});

// ═══════════════════════════════════════════════════════════════════════
// COUNTDOWN TIMER
// ═══════════════════════════════════════════════════════════════════════

document.addEventListener('DOMContentLoaded', function() {
    const countdownTimer = document.getElementById('countdown-timer');
    if (!countdownTimer) return;

    const daysElement = document.getElementById('days');
    const hoursElement = document.getElementById('hours');
    const minutesElement = document.getElementById('minutes');
    const secondsElement = document.getElementById('seconds');

    // Set target date (30 days from now)
    const targetDate = new Date();
    targetDate.setDate(targetDate.getDate() + 30);

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = targetDate.getTime() - now;

        if (distance < 0) {
            // Timer expired, reset to 30 days
            targetDate.setTime(now + (30 * 24 * 60 * 60 * 1000));
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if (daysElement) daysElement.textContent = days.toString().padStart(2, '0');
        if (hoursElement) hoursElement.textContent = hours.toString().padStart(2, '0');
        if (minutesElement) minutesElement.textContent = minutes.toString().padStart(2, '0');
        if (secondsElement) secondsElement.textContent = seconds.toString().padStart(2, '0');
    }

    // Update countdown every second
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>
@endpush
@endsection
