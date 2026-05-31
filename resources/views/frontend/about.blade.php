@extends('layouts.app')

@section('title', 'About Me - Background & Experience')

@section('content')
<div class="min-h-screen bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 text-gray-900 dark:text-slate-100" x-data="aboutApp()">
    {{-- ── SCROLL PROGRESS BAR ──────────────────────────────────────────────── --}}
    <div class="fixed top-0 left-0 right-0 h-1 bg-gray-200 dark:bg-slate-800 z-50 transition-colors duration-300">
        <div class="h-full bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 transition-all duration-300 ease-out"
             :style="`width: ${scrollProgress}%`"></div>
    </div>

    {{-- ── HERO ──────────────────────────────────────────────────────────── --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 pt-24 pb-20 transition-colors duration-300 scroll-animate">
        <!-- Enhanced Background with Animated Elements -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-32 -left-32 w-[600px] h-[600px] rounded-full bg-white/5 dark:bg-indigo-500/5 blur-3xl hero-glow floating"></div>
            <div class="absolute -bottom-32 -right-32 w-[600px] h-[600px] rounded-full bg-white/5 dark:bg-indigo-500/5 blur-3xl hero-glow floating" style="animation-delay: 2s;"></div>
            <!-- Enhanced Floating Particles -->
            <div class="absolute top-20 left-10 w-2 h-2 bg-white/20 dark:bg-indigo-400/20 rounded-full floating pulse-glow"></div>
            <div class="absolute top-40 right-20 w-3 h-3 bg-white/15 dark:bg-indigo-400/15 rounded-full floating pulse-glow" style="animation-delay: 1s"></div>
            <div class="absolute bottom-40 left-20 w-2 h-2 bg-white/25 dark:bg-indigo-400/25 rounded-full floating pulse-glow" style="animation-delay: 2s"></div>
            <div class="absolute bottom-20 right-10 w-4 h-4 bg-white/10 dark:bg-indigo-400/10 rounded-full floating pulse-glow" style="animation-delay: 3s"></div>
            <div class="absolute top-60 left-1/2 w-2 h-2 bg-white/20 dark:bg-indigo-400/20 rounded-full floating pulse-glow" style="animation-delay: 1.5s"></div>
        </div>

        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="flex flex-col lg:flex-row items-center gap-14">

                {{-- Avatar --}}
                <div class="flex-shrink-0 page-load-animate hero-profile">
                    <div class="relative profile-photo-3d">
                        @if(!empty($settings['profile_photo']))
                            <div class="w-44 h-44 rounded-3xl overflow-hidden border border-white/30 dark:border-indigo-500/30 shadow-2xl dark:shadow-indigo-900/50 hero-card-3d transition-colors duration-300 hover-dance pulse-glow">
                                <img src="{{ $settings['profile_photo'] }}" alt="Profile" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-44 h-44 rounded-3xl bg-white/20 dark:bg-slate-800/80 backdrop-blur-sm border border-white/30 dark:border-indigo-500/30 flex items-center justify-center shadow-2xl dark:shadow-indigo-900/50 text-6xl font-extrabold text-white tracking-tight hero-card-3d transition-colors duration-300 hover-dance pulse-glow">
                                BO
                            </div>
                        @endif
                        <span class="absolute -bottom-3 -right-3 flex h-7 w-7">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-60"></span>
                            <span class="relative inline-flex rounded-full h-7 w-7 bg-green-500 border-2 border-white items-center justify-center pulse-glow">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>

                {{-- Copy --}}
                <div class="text-center lg:text-left flex-1 page-load-animate hero-content">
                    <p class="text-sm font-semibold tracking-widest text-blue-200 uppercase mb-3 scroll-animate-left stagger-child">About Me</p>
                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-4 text-white hero-shimmer bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent scroll-animate-flip stagger-child">
                        {{ $settings['full_name'] ?? 'Brian Owaka' }}
                    </h1>
                    <p class="text-xl text-blue-100 font-medium mb-5 scroll-animate-right stagger-child">{{ $settings['professional_title'] ?? 'Full Stack Developer' }}</p>
                    <p class="text-blue-100/80 text-lg leading-relaxed max-w-2xl mb-8 scroll-animate stagger-child">
                        {{ $settings['bio'] ?? 'I am a passionate full-stack developer with expertise in modern web technologies.' }}
                    </p>

                    <div class="flex flex-wrap gap-3 justify-center lg:justify-start scroll-animate-scale stagger-child">
                        @if($settings['cv_url'] ?? null)
                        <a href="{{ route('cv.download') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white dark:bg-slate-800/80 dark:backdrop-blur-xl text-blue-700 dark:text-blue-400 font-semibold rounded-xl shadow-lg dark:shadow-indigo-900/50 hover:bg-blue-50 dark:hover:bg-slate-700/80 border border-transparent dark:border-indigo-500/20 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden hover-dance pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download CV
                        </a>
                        @endif
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white/15 dark:bg-slate-800/80 dark:backdrop-blur-xl hover:bg-white/25 dark:hover:bg-slate-700/80 text-white font-semibold rounded-xl border border-white/30 dark:border-indigo-500/30 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden hover-dance pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hire Me
                        </a>
                        <a href="{{ route('portfolio') }}"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-white/15 dark:bg-slate-800/80 dark:backdrop-blur-xl hover:bg-white/25 dark:hover:bg-slate-700/80 text-white font-semibold rounded-xl border border-white/30 dark:border-indigo-500/30 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden hover-dance pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            View Work
                        </a>
                    </div>
                </div>
            </div>

            {{-- Enhanced Stats bar --}}
            <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-4 scroll-animate">
                <div class="bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm dark:backdrop-blur-xl border border-white/20 dark:border-indigo-500/20 rounded-2xl p-5 text-center hover:bg-white/20 dark:hover:bg-slate-700/80 transition-all hover-lift dashboard-card observe-me cursor-pointer stagger-child hover-dance pulse-glow" @click="animateCounter($el, {{ $settings['projects_completed'] ?? 50 }})">
                    <div class="text-3xl mb-2 floating">🚀</div>
                    <div class="text-3xl font-extrabold text-white" data-counter="{{ $settings['projects_completed'] ?? 50 }}">0+</div>
                    <div class="text-xs text-blue-200 dark:text-slate-300 mt-1 font-medium uppercase tracking-wide">Projects Completed</div>
                </div>
                <div class="bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm dark:backdrop-blur-xl border border-white/20 dark:border-indigo-500/20 rounded-2xl p-5 text-center hover:bg-white/20 dark:hover:bg-slate-700/80 transition-all hover-lift dashboard-card observe-me cursor-pointer stagger-child hover-dance pulse-glow" style="animation-delay: 0.1s" @click="animateCounter($el, {{ $settings['years_experience'] ?? 5 }})">
                    <div class="text-3xl mb-2 floating" style="animation-delay: 0.5s;">💡</div>
                    <div class="text-3xl font-extrabold text-white" data-counter="{{ $settings['years_experience'] ?? 5 }}">0+</div>
                    <div class="text-xs text-blue-200 dark:text-slate-300 mt-1 font-medium uppercase tracking-wide">Years Experience</div>
                </div>
                <div class="bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm dark:backdrop-blur-xl border border-white/20 dark:border-indigo-500/20 rounded-2xl p-5 text-center hover:bg-white/20 dark:hover:bg-slate-700/80 transition-all hover-lift dashboard-card observe-me cursor-pointer stagger-child hover-dance pulse-glow" style="animation-delay: 0.2s" @click="animateCounter($el, {{ $settings['client_satisfaction'] ?? 100 }})">
                    <div class="text-3xl mb-2 floating" style="animation-delay: 1s;">⭐</div>
                    <div class="text-3xl font-extrabold text-white" data-counter="{{ $settings['client_satisfaction'] ?? 100 }}">0%</div>
                    <div class="text-xs text-blue-200 dark:text-slate-300 mt-1 font-medium uppercase tracking-wide">Client Satisfaction</div>
                </div>
                <div class="bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm dark:backdrop-blur-xl border border-white/20 dark:border-indigo-500/20 rounded-2xl p-5 text-center hover:bg-white/20 dark:hover:bg-slate-700/80 transition-all hover-lift dashboard-card observe-me cursor-pointer stagger-child hover-dance pulse-glow" style="animation-delay: 0.3s" @click="animateCounter($el, {{ $settings['technologies_count'] ?? 20 }})">
                    <div class="text-3xl mb-2 floating" style="animation-delay: 1.5s;">🛠️</div>
                    <div class="text-3xl font-extrabold text-white" data-counter="{{ $settings['technologies_count'] ?? 20 }}">0+</div>
                    <div class="text-xs text-blue-200 dark:text-slate-300 mt-1 font-medium uppercase tracking-wide">Technologies</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── MY STORY ──────────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate" id="my-journey">
        
        {{-- Enhanced background with animated elements --}}
        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            {{-- Floating particles --}}
            <div class="absolute top-10 left-20 w-1 h-1 bg-blue-400/30 rounded-full floating"></div>
            <div class="absolute top-20 right-32 w-1.5 h-1.5 bg-violet-400/25 rounded-full floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-16 left-1/3 w-1 h-1 bg-pink-400/20 rounded-full floating" style="animation-delay: 2s;"></div>
            <div class="absolute bottom-32 right-20 w-2 h-2 bg-blue-300/35 rounded-full floating" style="animation-delay: 3s;"></div>
        </div>
        
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16 relative z-10">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Background</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">My Journey</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
                <div class="space-y-5 scroll-animate-left">
                    <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-6 hover:shadow-xl dark:shadow-indigo-900/50 hover-lift dashboard-card transition-all duration-300 stagger-child hover-dance pulse-glow animate-card" style="opacity: 0; transform: translateY(30px) scale(0.9);">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-3 floating pulse-glow">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 dark:text-white transition-colors duration-300">Personal Story</h3>
                        </div>
                        <p class="text-gray-600 dark:text-slate-200 transition-colors duration-300 leading-relaxed">{{ $settings['personal_story'] ?? 'My journey into technology began during my university years, where I discovered my passion for building solutions that solve real-world problems.' }}</p>
                    </div>
                    <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-6 hover:shadow-xl dark:shadow-indigo-900/50 hover-lift dashboard-card transition-all duration-300 stagger-child hover-dance pulse-glow animate-card" style="opacity: 0; transform: translateY(30px) scale(0.9); animation-delay: 0.5s;">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center mr-3 floating pulse-glow" style="animation-delay: 0.5s;">
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                                </svg>
                            </div>
                            <h3 class="font-bold text-gray-900 dark:text-white transition-colors duration-300">Work Philosophy</h3>
                        </div>
                        <p class="text-gray-600 dark:text-slate-200 transition-colors duration-300 leading-relaxed">{{ $settings['work_philosophy'] ?? 'I focus on building scalable and maintainable systems that prioritize user experience and performance.' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 scroll-animate-right">
                    @foreach([
                        ['from-blue-500','to-blue-600','M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253','Continuous Learning','Always expanding knowledge','📚'],
                        ['from-purple-500','to-purple-600','M13 10V3L4 14h7v7l9-11h-7z','Problem Solver','Turning challenges into solutions','⚡'],
                        ['from-green-500','to-green-600','M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z','Quality Focused','Clean, maintainable code','✨'],
                        ['from-orange-500','to-orange-600','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z','Client Centered','Delivering real value','🤝'],
                    ] as $index => [$from,$to,$icon,$title,$desc,$emoji])
                    <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-5 hover:border-blue-300 dark:hover:border-indigo-400/40 hover:shadow-lg dark:shadow-indigo-900/50 transition-all group hover-lift dashboard-card stagger-child hover-dance pulse-glow animate-card" style="opacity: 0; transform: translateY(30px) scale(0.9); animation-delay: {{ $index * 0.1 }}s;">
                        <div class="text-2xl mb-2 floating" style="animation-delay: {{ $index * 0.2 }}s;">{{ $emoji }}</div>
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $from }} {{ $to }} flex items-center justify-center mb-3 group-hover:scale-110 transition-transform floating pulse-glow" style="animation-delay: {{ $index * 0.3 }}s;">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                            </svg>
                        </div>
                        <h4 class="font-bold text-gray-900 dark:text-white text-sm mb-1 transition-colors duration-300">{{ $title }}</h4>
                        <p class="text-xs text-gray-500 dark:text-slate-300 transition-colors duration-300">{{ $desc }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- ── EDUCATION ─────────────────────────────────────────────────────── --}}
    @if($educations->count() > 0)
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Academic</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">Education</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            <div class="space-y-6 scroll-animate">
                @foreach($educations as $index => $education)
                <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-8 flex flex-col sm:flex-row items-start gap-8 hover:border-blue-300 dark:hover:border-indigo-400/40 hover:shadow-xl dark:shadow-indigo-900/50 transition-all hover-lift dashboard-card observe-me stagger-child hover-dance pulse-glow" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="w-16 h-16 flex-shrink-0 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg dark:shadow-indigo-900/50 group-hover:scale-110 transition-transform pulse-ring floating">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-1 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $education->degree }}</h3>
                        <p class="text-blue-600 dark:text-blue-300 font-semibold mb-4 transition-colors duration-300">{{ $education->institution }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="px-3 py-1 bg-gradient-to-r from-blue-50 to-blue-100 dark:bg-slate-700/90 text-blue-700 dark:text-blue-200 border border-blue-200 dark:border-indigo-500/40 rounded-full text-sm font-medium tech-pill transition-colors duration-300 hover-dance">{{ $education->formatted_duration }}</span>
                            @if($education->grade)
                            <span class="px-3 py-1 bg-gradient-to-r from-purple-50 to-purple-100 dark:bg-slate-700/90 text-purple-700 dark:text-purple-200 border border-purple-200 dark:border-indigo-500/40 rounded-full text-sm font-medium tech-pill transition-colors duration-300 hover-dance">{{ $education->grade }}</span>
                            @endif
                            @if($education->honors)
                            <span class="px-3 py-1 bg-gradient-to-r from-green-50 to-green-100 dark:bg-slate-700/90 text-green-700 dark:text-green-200 border border-green-200 dark:border-indigo-500/40 rounded-full text-sm font-medium tech-pill transition-colors duration-300 hover-dance">{{ $education->honors }}</span>
                            @endif
                        </div>
                        @if($education->description)
                        <p class="text-gray-600 dark:text-slate-200 leading-relaxed transition-colors duration-300">{{ $education->description }}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    {{-- ── EXPERIENCE ────────────────────────────────────────────────────── --}}
    @if($experiences->count() > 0)
    <section class="py-20 bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Career</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">Experience</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            <div class="relative scroll-animate">
                <div class="absolute left-6 top-0 bottom-0 w-px bg-gradient-to-b from-blue-400 via-purple-400 to-transparent hidden sm:block pulse-glow"></div>
                <div class="space-y-8">
                    @foreach($experiences as $experience)
                    <div class="relative sm:pl-16 scroll-animate-scale stagger-child" style="animation-delay: {{ $loop->index * 0.2 }}s">
                        <div class="absolute left-4 top-6 w-5 h-5 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 border-2 border-white dark:border-slate-800 shadow-md hidden sm:block floating pulse-glow"></div>
                        <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-7 hover:border-blue-300 dark:hover:border-indigo-400/40 hover:shadow-xl dark:shadow-indigo-900/50 transition-all group hover-lift dashboard-card hover-dance pulse-glow">
                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $experience->role }}</h3>
                                    <p class="text-blue-600 dark:text-blue-300 font-semibold transition-colors duration-300">{{ $experience->company }}</p>
                                    @if($experience->location)
                                    <p class="text-sm text-gray-500 dark:text-slate-300 flex items-center gap-1 mt-1 transition-colors duration-300">
                                        <svg class="w-3.5 h-3.5 floating" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        {{ $experience->location }}
                                    </p>
                                    @endif
                                </div>
                                <span class="flex-shrink-0 px-4 py-1.5 bg-gradient-to-r from-blue-100 to-purple-100 dark:bg-slate-700 text-blue-600 dark:text-blue-200 rounded-full text-sm font-medium border border-blue-200 dark:border-indigo-500/40 transition-colors duration-300 hover-dance pulse-glow">
                                    {{ $experience->formatted_duration }}
                                </span>
                            </div>
                            @if($experience->description)
                            <p class="text-gray-600 dark:text-slate-200 leading-relaxed mb-4 transition-colors duration-300">{{ $experience->description }}</p>
                            @endif
                            @if($experience->achievements && count($experience->achievements) > 0)
                            <ul class="grid sm:grid-cols-2 gap-2">
                                @foreach($experience->achievements as $index => $ach)
                                <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-300 transition-colors duration-300 stagger-child" style="animation-delay: {{ $index * 0.1 }}s;">
                                    <span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 flex-shrink-0 pulse-glow"></span>
                                    {{ $ach }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif
    {{-- ── SKILLS ────────────────────────────────────────────────────────── --}}
    @if($skills->count() > 0)
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Expertise</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">Skills & Technologies</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            @foreach($skillsByCategory as $category => $categorySkills)
            <div class="mb-12 scroll-animate-scale stagger-child" style="animation-delay: {{ $loop->index * 0.2 }}s">
                <h3 class="text-xs font-semibold tracking-widest text-gray-400 dark:text-slate-400 uppercase mb-5 scroll-animate-left stagger-child">{{ $category }}</h3>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 scroll-animate">
                    @foreach($categorySkills as $skill)
                    <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-xl p-5 hover:border-blue-300 dark:hover:border-indigo-400/40 hover:shadow-xl dark:shadow-indigo-900/50 transition-all group hover-lift dashboard-card stagger-child hover-dance pulse-glow" style="animation-delay: {{ $loop->index * 0.1 }}s;">
                        <div class="flex items-center justify-between mb-3">
                            <span class="font-semibold text-gray-900 dark:text-white group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $skill->name }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full bg-gradient-to-r from-blue-50 to-blue-100 dark:bg-slate-700/90 text-blue-600 dark:text-blue-200 border border-blue-200 dark:border-indigo-500/40 capitalize tech-pill transition-colors duration-300 hover-dance">{{ $skill->level }}</span>
                        </div>
                        <div class="w-full bg-gray-100 dark:bg-slate-700/60 rounded-full h-1.5 skill-bar">
                            <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-1.5 rounded-full progress-animated skill-progress pulse-glow" data-width="{{ $skill->percentage }}%" style="width: 0%;"></div>
                        </div>
                        <div class="text-right mt-1">
                            <span class="text-xs text-gray-400 dark:text-slate-400">{{ $skill->percentage }}%</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    {{-- ── WHAT I DO ─────────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Services</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">What I Do</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 scroll-animate">
                @foreach($services as $index => $service)
                <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-6 hover:border-blue-300 dark:hover:border-indigo-400/40 hover:shadow-xl dark:shadow-indigo-900/50 transition-all group hover-lift dashboard-card stagger-child hover-dance pulse-glow" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-md dark:shadow-indigo-900/30 floating">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $service['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">{{ $service['title'] }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-200 leading-relaxed transition-colors duration-300">{{ $service['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ── ACHIEVEMENTS ──────────────────────────────────────────────────── --}}
    @if(count($achievements) > 0)
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="mb-12 scroll-animate stagger-child">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2 scroll-animate-left stagger-child">Milestones</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">Achievements</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer scroll-animate-right stagger-child"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 scroll-animate">
                @foreach($achievements as $index => $achievement)
                <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-5 text-center hover:border-blue-300 hover:shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 transition-all group hover-lift dashboard-card stagger-child hover-dance pulse-glow" style="animation-delay: {{ $index * 0.1 }}s">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform floating">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-700 dark:text-slate-300 transition-colors duration-300 font-medium">{{ $achievement }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ── CV DOWNLOAD ───────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 dark:from-indigo-900 dark:via-purple-900 dark:to-slate-900 p-10 lg:p-14 shadow-xl dark:shadow-indigo-900/50 hover-lift dashboard-card transition-all duration-300 scroll-animate-scale">
                <div class="pointer-events-none absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/5 dark:bg-indigo-500/5 blur-2xl hero-glow floating"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-white/5 dark:bg-indigo-500/5 blur-2xl hero-glow floating" style="animation-delay: 2s;"></div>
                <!-- Enhanced Floating Particles -->
                <div class="absolute top-10 left-10 w-2 h-2 bg-white/20 dark:bg-indigo-400/20 rounded-full floating pulse-glow"></div>
                <div class="absolute top-20 right-20 w-3 h-3 bg-white/15 dark:bg-indigo-400/15 rounded-full floating pulse-glow" style="animation-delay: 1s"></div>
                <div class="absolute bottom-20 left-20 w-2 h-2 bg-white/25 dark:bg-indigo-400/25 rounded-full floating pulse-glow" style="animation-delay: 2s"></div>

                <div class="relative z-10 flex flex-col lg:flex-row items-center gap-10">
                    <div class="flex-shrink-0 w-24 h-24 rounded-2xl bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm border border-white/20 dark:border-indigo-500/30 flex items-center justify-center group-hover:scale-110 transition-transform floating pulse-glow">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>

                    <div class="flex-1 text-center lg:text-left scroll-animate-right stagger-child">
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-3 hero-shimmer">Download My CV</h2>
                        <p class="text-blue-100 dark:text-slate-300 text-lg leading-relaxed">
                            Get a full overview of my experience, skills, education, and projects in a clean, detailed PDF.
                        </p>
                    </div>

                    <div class="flex-shrink-0 flex flex-col sm:flex-row lg:flex-col gap-3 scroll-animate-scale stagger-child">
                        @if($settings['cv_url'] ?? null)
                        <a href="{{ route('cv.download') }}"
                           class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white dark:bg-slate-800/80 dark:backdrop-blur-xl text-blue-700 dark:text-blue-400 font-bold rounded-xl hover:bg-blue-50 dark:hover:bg-slate-700/80 border border-transparent dark:border-indigo-500/20 transition-all duration-200 hover:scale-105 shadow-lg dark:shadow-indigo-900/50 whitespace-nowrap btn-ripple relative overflow-hidden hover-dance pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Download CV
                        </a>
                        @else
                        <span class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white/20 dark:bg-slate-800/50 text-white/60 font-bold rounded-xl border border-white/20 dark:border-indigo-500/20 cursor-not-allowed whitespace-nowrap text-sm">
                            CV not available yet
                        </span>
                        @endif
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center justify-center gap-2.5 px-7 py-3.5 bg-white/10 dark:bg-slate-800/80 dark:backdrop-blur-xl text-white font-semibold rounded-xl border border-white/20 dark:border-indigo-500/30 hover:bg-white/20 dark:hover:bg-slate-700/80 transition-all duration-200 hover:scale-105 whitespace-nowrap btn-ripple relative overflow-hidden hover-dance pulse-glow">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Get In Touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CTA ───────────────────────────────────────────────────────────── --}}
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 scroll-animate">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16 text-center">
            <div class="scroll-animate stagger-child">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-5 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent scroll-animate-flip stagger-child">Ready to work together?</h2>
                <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 text-lg mb-10 scroll-animate stagger-child">Let's build something great. I'm open to freelance projects, full-time roles, and collaborations.</p>
                <div class="flex flex-wrap gap-4 justify-center scroll-animate-scale stagger-child">
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold rounded-xl shadow-lg dark:shadow-indigo-900/50 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden magnetic-btn hover-dance pulse-glow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Start a Conversation
                    </a>
                    <a href="{{ route('portfolio') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-xl hover:bg-gray-50 dark:hover:bg-slate-700/80 text-gray-700 dark:text-slate-200 font-bold rounded-xl border border-gray-200 dark:border-indigo-500/20 hover:border-gray-300 dark:hover:border-indigo-400/30 shadow-sm transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden magnetic-btn hover-dance pulse-glow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        See My Portfolio
                    </a>
                </div>
            </div>
        </div>
    </section>

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
    function aboutApp() {
        return {
            scrollProgress: 0,
            countersAnimated: false,
            
            init() {
                console.log('About app initialized');
                
                // Initialize all animation systems
                this.initializeAnimations();
                
                // Update scroll progress
                window.addEventListener('scroll', () => {
                    this.updateScrollProgress();
                });
                
                // Intersection Observer for scroll animations
                this.observeElements();
                
                // Add magnetic effect to buttons
                this.addMagneticEffect();
                
                // Animate counters when stats section is visible
                this.setupCounterObserver();
                
                // Initialize skill progress bars
                this.initSkillBars();
                
                // Initialize scroll animations
                this.initScrollAnimations();
            },
            
            initializeAnimations() {
                // Force trigger animations after a short delay to ensure DOM is ready
                setTimeout(() => {
                    this.triggerAllAnimations();
                }, 100);
            },
            
            triggerAllAnimations() {
                console.log('Triggering all animations');
                
                // Initialize all scroll-based animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            console.log('Element entering viewport:', entry.target);
                            this.animateElement(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                // Observe all animatable elements
                const animatableElements = document.querySelectorAll(
                    '.scroll-animate, .scroll-animate-scale, .scroll-animate-left, .scroll-animate-right, .scroll-animate-flip, .animate-card, .stagger-child, section'
                );
                
                animatableElements.forEach(el => {
                    observer.observe(el);
                });
                
                console.log(`Observing ${animatableElements.length} elements for animations`);
            },
            
            animateElement(element) {
                // Add animate-in class
                element.classList.add('animate-in');
                
                // Handle specific animation types
                if (element.classList.contains('animate-card')) {
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0) scale(1)';
                }
                
                // Handle stagger children
                const staggerChildren = element.querySelectorAll('.stagger-child');
                staggerChildren.forEach((child, index) => {
                    setTimeout(() => {
                        child.classList.add('animate-in');
                        if (child.classList.contains('animate-card')) {
                            child.style.opacity = '1';
                            child.style.transform = 'translateY(0) scale(1)';
                        }
                    }, index * 200);
                });
            },
            
            updateScrollProgress() {
                const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
                const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                this.scrollProgress = (winScroll / height) * 100;
            },
            
            animateCounter(element, target) {
                const counterElement = element.querySelector('[data-counter]');
                if (!counterElement) return;
                
                const duration = 2000;
                const step = target / (duration / 16);
                let current = 0;
                
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        if (target === 100) {
                            counterElement.textContent = target + '%';
                        } else {
                            counterElement.textContent = target + '+';
                        }
                        clearInterval(timer);
                    } else {
                        if (target === 100) {
                            counterElement.textContent = Math.floor(current) + '%';
                        } else {
                            counterElement.textContent = Math.floor(current) + '+';
                        }
                    }
                }, 16);
            },
            
            setupCounterObserver() {
                const statsSection = document.querySelector('[data-counter]')?.closest('section');
                if (!statsSection) return;
                
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting && !this.countersAnimated) {
                            this.countersAnimated = true;
                            document.querySelectorAll('[data-counter]').forEach(counter => {
                                const target = parseInt(counter.getAttribute('data-counter'));
                                this.animateCounter(counter.parentElement, target);
                            });
                        }
                    });
                }, {
                    threshold: 0.3
                });
                
                observer.observe(statsSection);
            },
            
            initSkillBars() {
                const skillBars = document.querySelectorAll('.skill-progress');
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const bar = entry.target;
                            const width = bar.getAttribute('data-width');
                            setTimeout(() => {
                                bar.style.width = width;
                            }, 200);
                        }
                    });
                }, { threshold: 0.5 });
                
                skillBars.forEach(bar => observer.observe(bar));
            },
            
            initScrollAnimations() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry, index) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animate-in');
                            
                            // Stagger child animations
                            const staggerChildren = entry.target.querySelectorAll('.stagger-child');
                            staggerChildren.forEach((child, childIndex) => {
                                setTimeout(() => {
                                    child.classList.add('animate-in');
                                }, childIndex * 400);
                            });
                            
                            // Animate cards with special handling
                            const animateCards = entry.target.querySelectorAll('.animate-card');
                            animateCards.forEach((card, cardIndex) => {
                                setTimeout(() => {
                                    card.style.opacity = '1';
                                    card.style.transform = 'translateY(0) scale(1)';
                                }, cardIndex * 200);
                            });
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                });
                
                // Observe all scroll-animate elements
                document.querySelectorAll('.scroll-animate, .scroll-animate-scale, .scroll-animate-left, .scroll-animate-right, .scroll-animate-flip').forEach(el => {
                    observer.observe(el);
                });
                
                // Initialize card animations specifically
                this.initCardAnimations();
            },
            
            initCardAnimations() {
                const cardObserver = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const cards = entry.target.querySelectorAll('.animate-card');
                            cards.forEach((card, index) => {
                                setTimeout(() => {
                                    card.style.opacity = '1';
                                    card.style.transform = 'translateY(0) scale(1)';
                                    card.classList.add('animate-in');
                                }, index * 200);
                            });
                        }
                    });
                }, {
                    threshold: 0.2,
                    rootMargin: '0px 0px -30px 0px'
                });
                
                // Observe sections with animate-card elements
                document.querySelectorAll('section').forEach(section => {
                    if (section.querySelector('.animate-card')) {
                        cardObserver.observe(section);
                    }
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
                        
                        btn.style.transform = `translate(${x * 0.2}px, ${y * 0.2}px) scale(1.05)`;
                    });
                    
                    btn.addEventListener('mouseleave', () => {
                        btn.style.transform = 'translate(0, 0) scale(1)';
                    });
                });
            }
        }
    }
    
    // Enhanced DOM ready initialization
    document.addEventListener('DOMContentLoaded', () => {
        console.log('DOM loaded, initializing animations...');
        
        // Smooth scroll for anchor links
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
        
        // Force animation initialization after Alpine.js loads
        setTimeout(() => {
            console.log('Initializing scroll animations...');
            
            // Create a comprehensive animation observer
            const globalObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const element = entry.target;
                        element.classList.add('animate-in');
                        
                        // Handle animate-card elements
                        if (element.classList.contains('animate-card')) {
                            element.style.opacity = '1';
                            element.style.transform = 'translateY(0) scale(1)';
                        }
                        
                        // Handle stagger children
                        const staggerChildren = element.querySelectorAll('.stagger-child');
                        staggerChildren.forEach((child, index) => {
                            setTimeout(() => {
                                child.classList.add('animate-in');
                                if (child.classList.contains('animate-card')) {
                                    child.style.opacity = '1';
                                    child.style.transform = 'translateY(0) scale(1)';
                                }
                            }, index * 200);
                        });
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe all animatable elements
            const elements = document.querySelectorAll('.scroll-animate, .scroll-animate-scale, .scroll-animate-left, .scroll-animate-right, .scroll-animate-flip, .animate-card, section');
            elements.forEach(el => globalObserver.observe(el));
            
            console.log(`Global observer watching ${elements.length} elements`);
        }, 500);
    });
    </script>

    <style>
    [x-cloak] { display: none !important; }
    
    /* Page Load Animations */
    .page-load-animate {
        animation-fill-mode: both;
    }
    
    .hero-profile {
        animation: dropFromTop 3s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.3s both;
    }
    
    .hero-content {
        animation: spinFromLeft 3.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) 0.8s both;
    }
    
    @keyframes dropFromTop {
        0% { opacity: 0; transform: translateY(-100vh) scale(0.5); }
        70% { opacity: 1; transform: translateY(20px) scale(1.05); }
        100% { opacity: 1; transform: translateY(0) scale(1); }
    }
    
    @keyframes spinFromLeft {
        0% { opacity: 0; transform: translateX(-100vw) rotate(-720deg) scale(0.3); }
        70% { opacity: 1; transform: translateX(10px) rotate(10deg) scale(1.05); }
        100% { opacity: 1; transform: translateX(0) rotate(0deg) scale(1); }
    }
    
    /* Scroll Animations */
    .scroll-animate {
        opacity: 0;
        transform: translateY(50px);
        transition: all 2.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .scroll-animate-scale {
        opacity: 0;
        transform: scale(0.8) translateY(30px);
        transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .scroll-animate-left {
        opacity: 0;
        transform: translateX(-100px) rotate(-10deg);
        transition: all 3.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .scroll-animate-right {
        opacity: 0;
        transform: translateX(100px) rotate(10deg);
        transition: all 3.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .scroll-animate-flip {
        opacity: 0;
        transform: rotateY(90deg) scale(0.5);
        transition: all 3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .animate-in {
        opacity: 1 !important;
        transform: translateY(0) translateX(0) scale(1) rotate(0deg) rotateY(0deg) !important;
    }
    
    /* Card Animations */
    .animate-card {
        opacity: 0;
        transform: translateY(30px) scale(0.9);
        transition: all 2.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .animate-card.animate-in {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
    
    /* Interactive Effects */
    .hover-dance:hover {
        animation: dance 2s ease-in-out infinite;
    }
    
    .hover-spin:hover {
        animation: spin 3s linear infinite;
    }
    
    .pulse-glow {
        animation: pulseGlow 3s ease-in-out infinite;
    }
    
    .floating {
        animation: floating 8s ease-in-out infinite;
    }
    
    .wiggle {
        animation: wiggle 4s ease-in-out infinite;
    }
    
    @keyframes dance {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        25% { transform: translateY(-10px) rotate(2deg); }
        50% { transform: translateY(-5px) rotate(-1deg); }
        75% { transform: translateY(-15px) rotate(1deg); }
    }
    
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    @keyframes pulseGlow {
        0%, 100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.3); }
        50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.6), 0 0 30px rgba(59, 130, 246, 0.4); }
    }
    
    @keyframes floating {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes wiggle {
        0%, 100% { transform: rotate(0deg); }
        25% { transform: rotate(1deg); }
        75% { transform: rotate(-1deg); }
    }
    
    /* Hero Shimmer Effect */
    .hero-shimmer {
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        background-size: 200% 100%;
        animation: shimmer 3s infinite;
    }
    
    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }
    
    /* Skill Progress Animation */
    .skill-progress {
        transition: width 2s ease-in-out;
    }
    
    /* Stagger Animation System */
    .stagger-child {
        opacity: 0;
        transform: translateY(30px);
        transition: all 2.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }
    
    .stagger-child.animate-in {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Enhanced Hover Effects */
    .hover-lift:hover {
        transform: translateY(-5px) scale(1.02);
        transition: all 0.3s ease;
    }
    
    /* Reduced Motion Support */
    @media (prefers-reduced-motion: reduce) {
        .page-load-animate,
        .scroll-animate,
        .scroll-animate-scale,
        .scroll-animate-left,
        .scroll-animate-right,
        .scroll-animate-flip,
        .stagger-child,
        .animate-card {
            animation: none !important;
            transition: opacity 0.3s ease !important;
        }
        
        .hover-dance:hover,
        .hover-spin:hover,
        .pulse-glow,
        .floating,
        .wiggle,
        .hero-shimmer {
            animation: none !important;
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
    </style>
    @endpush

</div>
@endsection