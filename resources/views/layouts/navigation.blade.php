<!-- Topbar -->
<div class="sticky top-0 z-[60] bg-gradient-to-r from-purple-900 via-pink-900 to-purple-950 text-gray-200 text-xs sm:text-sm">
    <div class="w-full px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-9">
            <div class="flex items-center gap-3 sm:gap-5">
                <a href="mailto:{{ $topbar['contact_email'] }}" class="hidden sm:inline-flex items-center gap-1.5 hover:text-white transition-colors duration-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>{{ $topbar['contact_email'] }}</span>
                </a>
                <a href="tel:{{ $topbar['contact_phone'] }}" class="inline-flex items-center gap-1.5 hover:text-white transition-colors duration-200">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>{{ $topbar['contact_phone'] }}</span>
                </a>
                <span class="hidden lg:inline-flex items-center gap-1.5 text-gray-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <span>{{ $topbar['contact_location'] }}</span>
                </span>
            </div>
            <div class="flex items-center gap-2">
                @if($topbar['social_facebook'])
                <a href="{{ $topbar['social_facebook'] }}" target="_blank" title="Facebook" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-blue-600 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                @endif
                @if($topbar['social_twitter'])
                <a href="{{ $topbar['social_twitter'] }}" target="_blank" title="Twitter/X" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-sky-500 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
                @endif
                @if($topbar['social_instagram'])
                <a href="{{ $topbar['social_instagram'] }}" target="_blank" title="Instagram" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-pink-600 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                @endif
                @if($topbar['social_github'])
                <a href="{{ $topbar['social_github'] }}" target="_blank" title="GitHub" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-gray-700 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                @endif
                @if($topbar['social_linkedin'])
                <a href="{{ $topbar['social_linkedin'] }}" target="_blank" title="LinkedIn" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-blue-700 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                @endif
                @if($topbar['social_youtube'])
                <a href="{{ $topbar['social_youtube'] }}" target="_blank" title="YouTube" class="w-6 h-6 flex items-center justify-center rounded hover:text-white hover:bg-red-600 transition-all duration-200">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

<nav x-data="{ open: false, scrolled: false }" 
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'bg-white/95 dark:bg-slate-900/95 dark:backdrop-blur-xl border-b border-gray-200/80 dark:border-indigo-500/20 shadow-2xl' : 'bg-gradient-to-r from-white/90 via-white/80 to-blue-50/20 dark:from-slate-900/90 dark:via-indigo-950/80 dark:to-slate-900/20 backdrop-blur-lg border-b border-gray-200/30 dark:border-indigo-500/10 shadow-lg'"
     class="sticky top-9 z-50 transition-all duration-300">
    <!-- Enhanced Navigation with Animated Border -->
    <div class="w-full px-4 sm:px-6 lg:px-8 relative">
        <!-- Animated top border -->
        <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-transparent via-blue-500/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        
        <div class="flex justify-between items-center h-16 relative">
            <div class="flex items-center">
                <!-- Enhanced Logo with Glow Effect -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 group relative">
                        <!-- Logo container with enhanced effects -->
                        <div class="relative">
                            <!-- Animated glow ring -->
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-400/20 via-purple-400/20 to-pink-400/20 rounded-2xl blur-lg opacity-0 group-hover:opacity-100 transition-all duration-500 group-hover:scale-110 animate-pulse"></div>
                            
                            <!-- Main logo -->
                            @if(!empty($settings['profile_photo']))
                                <!-- Profile Photo Logo -->
                                <div class="relative w-10 h-10 rounded-xl overflow-hidden transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-6 group-hover:shadow-xl group-hover:shadow-purple-500/25 ring-2 ring-gradient-to-br ring-blue-600/50">
                                    <img src="{{ $settings['profile_photo'] }}" alt="Profile" class="w-full h-full object-cover">
                                    <!-- Inner shine effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                            @else
                                <!-- Fallback BO Logo -->
                                <div class="relative w-10 h-10 bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 rounded-xl flex items-center justify-center transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-6 group-hover:shadow-xl group-hover:shadow-purple-500/25">
                                    <span class="text-white font-bold text-lg group-hover:text-white transition-colors duration-300">BO</span>
                                    <!-- Inner shine effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-white/20 to-transparent rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                </div>
                            @endif
                            
                            <!-- Floating particles -->
                            <div class="absolute -top-1 -right-1 w-2 h-2 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-bounce" style="animation-delay: 0.1s"></div>
                            <div class="absolute -bottom-1 -left-1 w-1.5 h-1.5 bg-purple-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-bounce" style="animation-delay: 0.2s"></div>
                        </div>
                        
                        <!-- Enhanced text -->
                        <div class="hidden sm:block">
                            <div class="text-xl font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent group-hover:from-blue-500 group-hover:via-purple-500 group-hover:to-pink-500 transition-all duration-300">
                                Brian Owaka
                            </div>
                            <div class="text-xs text-gray-500 font-medium group-hover:text-gray-600 transition-colors duration-300">Full Stack Developer</div>
                        </div>
                        
                        <!-- Subtle underline animation -->
                        <div class="absolute -bottom-1 left-0 w-0 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 group-hover:w-full transition-all duration-300"></div>
                    </a>
                </div>

                <!-- Enhanced Navigation Links with Animated Effects -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex sm:items-center">
                    <!-- Home Link -->
                    <a href="{{ route('home') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Home</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('home'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- About Link -->
                    <a href="{{ route('about') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">About</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('about'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- Portfolio Link -->
                    <a href="{{ route('portfolio') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Portfolio</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('portfolio*'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- Services Link -->
                    <a href="{{ route('services') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Services</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('services'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- Products Link -->
                    <a href="{{ route('store') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Products</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('store*'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- Contact Link -->
                    <a href="{{ route('contact') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Contact</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('contact'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 rounded-lg"></div>
                        @endif
                    </a>
                    <!-- Review Link -->
                    <a href="{{ route('reviews.create') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10 flex items-center gap-2">
                            <svg class="w-4 h-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                            <span class="group-hover:transform group-hover:translate-y-[-2px] transition-transform duration-300">Reviews</span>
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50/80 to-purple-50/80 rounded-lg opacity-0 group-hover:opacity-100 transition-all duration-300 scale-95 group-hover:scale-100"></div>
                        @if(request()->routeIs('reviews.*'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg"></div>
                        @endif
                    </a>
                    
                    <!-- Enhanced CTA Button with Glow Effect -->
                    <div class="relative ml-4">
                        <a href="{{ route('contact') }}" class="relative group">
                            <!-- Animated glow background -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 rounded-lg opacity-0 group-hover:opacity-75 blur transition-all duration-500 group-hover:scale-110"></div>
                            
                            <!-- Pulsing ring effect -->
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg opacity-0 group-hover:opacity-20 animate-ping"></div>
                            
                            <!-- Main button -->
                            <div class="relative bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-5 py-2 rounded-lg font-semibold transition-all duration-300 transform hover:scale-105 hover:shadow-xl hover:shadow-purple-500/25 flex items-center space-x-2 overflow-hidden">
                                <!-- Shimmer effect -->
                                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform -translate-x-full group-hover:translate-x-full"></div>
                                
                                <span class="relative z-10">Hire Me</span>
                                <svg class="w-4 h-4 transform transition-all duration-300 group-hover:translate-x-1 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                </svg>
                            </div>
                            
                            <!-- Floating particles -->
                            <div class="absolute -top-1 -right-1 w-1 h-1 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping"></div>
                            <div class="absolute -bottom-1 -left-1 w-1.5 h-1.5 bg-blue-300 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping" style="animation-delay: 0.2s"></div>
                        </a>
                    </div>
                    
                    @auth
                    <a href="{{ route('admin.dashboard') }}" class="relative px-4 py-2 text-sm font-medium text-gray-700 dark:text-slate-300 hover:text-blue-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                        <span class="relative z-10">Admin</span>
                        <div class="absolute inset-0 bg-blue-50 dark:bg-blue-950/50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        @if(request()->routeIs('admin.*'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-8 h-0.5 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-400 dark:to-purple-400 rounded-full"></div>
                        @endif
                    </a>
                    @endauth
                </div>
            </div>

            <!-- Right side: Login/User + Dark Mode Toggle -->
            <div class="hidden sm:flex sm:items-center sm:gap-2">
                <!-- Settings Dropdown / Login Button -->
                <div class="flex items-center">
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-gray-200 dark:border-indigo-700/50 text-sm leading-4 font-medium rounded-lg text-gray-700 dark:text-slate-200 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm hover:bg-gray-50 dark:hover:bg-slate-700/80 hover:text-gray-900 dark:hover:text-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-3">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <div class="font-medium text-gray-900">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-500">Admin</div>
                            </div>
                            <div class="ml-2">
                                <svg class="fill-current h-4 w-4 text-gray-400 transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-3 border-b border-gray-100">
                            <div class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</div>
                            <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        <x-dropdown-link :href="route('profile.edit')">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                {{ __('Profile') }}
                            </div>
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                <div class="flex items-center text-red-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                    </svg>
                                    {{ __('Log Out') }}
                                </div>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-purple-600 dark:from-blue-500 dark:to-purple-500 text-white text-sm font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 dark:hover:from-blue-600 dark:hover:to-purple-600 transition-all duration-300 transform hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Login
                </a>
                @endauth
                </div>

                <!-- Dark Mode Toggle Button -->
                <button id="theme-toggle" type="button" 
                    class="relative group inline-flex items-center justify-center p-2.5 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all duration-300 transform hover:scale-110 border border-gray-200 dark:border-indigo-600/30 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm">
                    <!-- Glow background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur"></div>
                    
                    <!-- Sun icon (visible in dark mode) -->
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 relative z-10 transition-transform duration-300 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    
                    <!-- Moon icon (visible in light mode) -->
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 relative z-10 transition-transform duration-300 group-hover:rotate-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    
                    <!-- Floating particles -->
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-yellow-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping"></div>
                    <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-purple-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping" style="animation-delay: 0.1s"></div>
                </button>
            </div>
            <!-- End Right side -->

            <!-- Dark Mode Toggle (Mobile) -->
            <div class="flex items-center sm:hidden me-2">
                <button id="theme-toggle-mobile" type="button" 
                    class="relative group inline-flex items-center justify-center p-2.5 rounded-xl text-gray-600 dark:text-gray-300 hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all duration-300 transform hover:scale-110 border border-gray-200 dark:border-indigo-600/30 bg-white/80 dark:bg-slate-800/80 backdrop-blur-sm">
                    <!-- Sun icon (visible in dark mode) -->
                    <svg class="theme-toggle-light-icon hidden w-5 h-5 relative z-10 transition-transform duration-300 group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                    
                    <!-- Moon icon (visible in light mode) -->
                    <svg class="theme-toggle-dark-icon hidden w-5 h-5 relative z-10 transition-transform duration-300 group-hover:rotate-12" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                </button>
            </div>

            <!-- Enhanced Hamburger with Glow Effect -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="relative group inline-flex items-center justify-center p-3 rounded-xl text-gray-600 hover:text-white hover:bg-gradient-to-r hover:from-blue-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-blue-500/50 transition-all duration-300 transform hover:scale-110">
                    <!-- Glow background -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600/20 to-purple-600/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur"></div>
                    
                    <!-- Animated hamburger icon -->
                    <svg class="h-6 w-6 transition-all duration-300 relative z-10" :class="{'rotate-90 scale-110': open}" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <!-- Hamburger lines -->
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex transition-all duration-300" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <!-- Close X -->
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    
                    <!-- Floating particles around button -->
                    <div class="absolute -top-1 -right-1 w-1.5 h-1.5 bg-blue-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping"></div>
                    <div class="absolute -bottom-1 -left-1 w-1 h-1 bg-purple-400 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300 animate-ping" style="animation-delay: 0.1s"></div>
                </button>
            </div>
        </div>
    </div>

    <!-- Enhanced Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" 
         class="hidden sm:hidden bg-gradient-to-br from-white/95 via-white/90 to-blue-50/30 dark:from-slate-900/95 dark:via-indigo-950/90 dark:to-slate-900/30 backdrop-blur-xl border-t border-gray-200/50 dark:border-indigo-500/20 shadow-2xl transition-all duration-300">
        <!-- Animated gradient overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 via-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        <div class="relative z-10 pt-4 pb-3 px-4 space-y-2">
            <!-- Enhanced Mobile Logo Section -->
            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200/50 dark:border-indigo-500/20 bg-gradient-to-r from-blue-50/30 to-purple-50/30 dark:from-blue-950/30 dark:to-purple-950/30 rounded-lg p-3">
                <div class="relative">
                    @if(!empty($settings['profile_photo']))
                        <div class="w-12 h-12 rounded-xl overflow-hidden shadow-lg ring-2 ring-blue-600/50">
                            <img src="{{ $settings['profile_photo'] }}" alt="Profile" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/20 to-transparent rounded-xl"></div>
                        </div>
                    @else
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-600 via-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-bold text-lg">BO</span>
                            <!-- Shine effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/20 to-transparent rounded-xl"></div>
                        </div>
                    @endif
                    <!-- Glow ring -->
                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-xl blur-lg"></div>
                </div>
                <div class="flex-1">
                    <div class="text-lg font-bold bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Brian Owaka
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 font-medium">Full Stack Developer</div>
                </div>
                <!-- Status indicator -->
                <div class="flex items-center gap-1.5 px-2 py-1 bg-green-100/80 border border-green-200 rounded-full">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-medium text-green-700">Available</span>
                </div>
            </div>
            
            <!-- Navigation Links -->
            <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('home'))
                    bg-gradient-to-r from-blue-50 to-purple-50 dark:from-indigo-900/50 dark:to-purple-900/50 text-blue-700 dark:text-blue-400 border-l-4 border-blue-600 dark:border-blue-400
                @else
                    text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-800 hover:text-blue-600 dark:hover:text-blue-400
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('home')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Home
            </a>
            
            <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('about'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('about')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                About
            </a>
            
            <a href="{{ route('portfolio') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('portfolio*'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('portfolio*')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
                Portfolio
            </a>
            
            <a href="{{ route('services') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('services'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('services')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Services
            </a>
            
            <a href="{{ route('store') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('store*'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('store*')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Products
            </a>
            
            <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('contact'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('contact')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Contact
            </a>
            
            <!-- Enhanced Mobile CTA Button -->
            <div class="px-4 py-3">
                <a href="{{ route('contact') }}" class="relative group w-full bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 text-white px-4 py-3 rounded-lg font-semibold hover:from-blue-700 hover:via-purple-700 hover:to-pink-700 transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2 shadow-lg hover:shadow-xl overflow-hidden">
                    <!-- Shimmer effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 transform -translate-x-full group-hover:translate-x-full"></div>
                    
                    <span class="relative z-10">Hire Me</span>
                    <svg class="w-4 h-4 transform transition-all duration-300 group-hover:translate-x-1 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                    
                    <!-- Glow effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-400/20 to-purple-400/20 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur"></div>
                </a>
            </div>
            
            @auth
            <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 text-base font-medium rounded-lg transition-all duration-300 group
                @if(request()->routeIs('admin.*'))
                    bg-gradient-to-r from-blue-50 to-purple-50 text-blue-700 border-l-4 border-blue-600
                @else
                    text-gray-700 hover:bg-gray-50 hover:text-blue-600
                @endif
            ">
                <svg class="w-5 h-5 mr-3 @if(request()->routeIs('admin.*')) text-blue-600 @else text-gray-400 group-hover:text-blue-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Admin
            </a>
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200/50 bg-gray-50/50">
            @auth
            <div class="px-4 py-3 bg-white rounded-lg mx-4 mb-2 shadow-sm">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-medium text-gray-900">{{ Auth::user()->name }}</div>
                        <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>
            </div>

            <div class="px-4 space-y-1">
                <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-white rounded-lg transition-all duration-300">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center px-4 py-2 text-base font-medium text-red-600 hover:bg-red-50 rounded-lg transition-all duration-300">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Log Out
                    </a>
                </form>
            </div>
            @else
            <div class="px-4 space-y-2">
                <a href="{{ route('login') }}" class="flex items-center px-4 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-base font-medium rounded-lg hover:from-blue-700 hover:to-purple-700 transition-all duration-300">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Login
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>

