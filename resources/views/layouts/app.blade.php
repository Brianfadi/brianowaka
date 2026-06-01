<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="google-site-verification" content="RqUWPzkRhAoeNUOEeBLFF9WwrIUOkIwbulF8ebikclo" />

        <title>{{ $settings['site_name'] ?? 'Brian Owaka' }} - @yield('title', 'Full Stack Developer')</title>
        
        <!-- Favicon - Profile Photo -->
        @if(isset($settings['profile_photo']) && $settings['profile_photo'])
            <link rel="icon" type="image/x-icon" href="{{ $settings['profile_photo'] }}">
            <link rel="apple-touch-icon" href="{{ $settings['profile_photo'] }}">
        @else
            <!-- Default favicon if no profile photo -->
            <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>👨‍💻</text></svg>">
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Dark Mode Script (must be in head to prevent flash) -->
        <script>
            // Site is dark-mode first. Only switch to light if user explicitly chose it.
            if (localStorage.theme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        </script>

        <!-- Scripts -->
        @if(app()->environment('production') && file_exists(public_path('build/manifest.json')))
            {{-- Production: Load pre-built assets directly --}}
            @php
                $manifest = json_decode(file_get_contents(public_path('build/manifest.json')), true);
                $cssFile = $manifest['resources/css/app.css']['file'] ?? null;
                $jsFile = $manifest['resources/js/app.js']['file'] ?? null;
            @endphp
            @if($cssFile)
                <link rel="stylesheet" href="{{ secure_asset('build/' . $cssFile) }}">
            @endif
            @if($jsFile)
                <script type="module" src="{{ secure_asset('build/' . $jsFile) }}" defer></script>
            @endif
        @else
            {{-- Development: Use Vite dev server --}}
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
        
        @stack('styles')
        
        <!-- Custom Dark Mode Styles -->
        <style>
            /* Enhanced Dark Mode with Rich Colors */
            .dark {
                color-scheme: dark;
            }
            
            /* Dark mode gradient backgrounds */
            .dark body {
                background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #1e293b 100%);
            }
            
            /* Animated gradient for dark mode */
            @keyframes darkGradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .dark .dark-gradient-bg {
                background: linear-gradient(-45deg, #0f172a, #1e1b4b, #312e81, #1e293b);
                background-size: 400% 400%;
                animation: darkGradient 15s ease infinite;
            }
            
            /* Glass morphism effect for dark mode cards */
            .dark .glass-card {
                background: rgba(30, 41, 59, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(148, 163, 184, 0.1);
            }
            
            /* Glow effects for dark mode */
            .dark .glow-blue {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
            }
            
            .dark .glow-purple {
                box-shadow: 0 0 20px rgba(147, 51, 234, 0.3);
            }
            
            .dark .glow-pink {
                box-shadow: 0 0 20px rgba(236, 72, 153, 0.3);
            }

            /* Project Detail Page Animations */
            @keyframes slide-in-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-in-right {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }
                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes fade-in {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            .animate-slide-in-up {
                animation: slide-in-up 0.6s ease-out forwards;
            }

            .animate-slide-in-right {
                animation: slide-in-right 0.6s ease-out forwards;
            }

            .animate-fade-in {
                animation: fade-in 0.6s ease-out forwards;
            }

            /* Smooth hover transitions */
            .hover-lift {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .hover-lift:hover {
                transform: translateY(-5px);
            }

            /* Enhanced Store Page Animations */
            @keyframes float {
                0%, 100% { transform: translateY(0px); }
                50% { transform: translateY(-10px); }
            }

            @keyframes glow-pulse {
                0%, 100% { box-shadow: 0 0 20px rgba(16, 185, 129, 0.3); }
                50% { box-shadow: 0 0 40px rgba(16, 185, 129, 0.6); }
            }

            @keyframes shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }

            .animate-float {
                animation: float 3s ease-in-out infinite;
            }

            .animate-glow-pulse {
                animation: glow-pulse 2s ease-in-out infinite;
            }

            .animate-shimmer {
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                background-size: 200% 100%;
                animation: shimmer 2s infinite;
            }

            /* Animation delays */
            .animation-delay-1000 { animation-delay: 1s; }
            .animation-delay-2000 { animation-delay: 2s; }
            .animation-delay-4000 { animation-delay: 4s; }
            .animation-delay-6000 { animation-delay: 6s; }

            /* Enhanced shadow effects */
            .shadow-3xl {
                box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
            }

            .dark .shadow-3xl {
                box-shadow: 0 35px 60px -12px rgba(79, 70, 229, 0.4);
            }

            /* Gradient text animation */
            @keyframes gradient-shift {
                0%, 100% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
            }

            .animate-gradient {
                background-size: 200% 200%;
                animation: gradient-shift 3s ease infinite;
            }

            /* Card hover effects */
            .card-hover-effect {
                transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .card-hover-effect:hover {
                transform: translateY(-8px) scale(1.02);
            }

            /* Button ripple effect */
            .btn-ripple {
                position: relative;
                overflow: hidden;
            }

            .btn-ripple::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }

            .btn-ripple:hover::before {
                width: 300px;
                height: 300px;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-white dark:bg-slate-900 text-gray-900 dark:text-slate-100 transition-colors duration-300">
        <div class="min-h-screen bg-gray-100 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-slate-800/50 dark:backdrop-blur-xl shadow dark:shadow-indigo-900/50 transition-colors duration-300 border-b dark:border-indigo-900/30">
                    <div class="w-full px-4 sm:px-6 lg:px-8 py-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="w-full">
                @yield('content')
            </main>
            
            <!-- Footer -->
            <footer class="bg-gradient-to-br from-gray-900 via-gray-800 to-black dark:from-gray-950 dark:via-gray-900 dark:to-black text-white py-16 relative overflow-hidden transition-colors duration-300">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-0 left-0 w-96 h-96 bg-gradient-to-br from-blue-500/20 to-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
                    <div class="absolute bottom-0 right-0 w-96 h-96 bg-gradient-to-br from-pink-500/20 to-orange-500/20 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
                    <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-gradient-to-br from-green-500/20 to-teal-500/20 rounded-full blur-3xl animate-pulse animation-delay-4000"></div>
                </div>

                <div class="w-full px-4 sm:px-6 lg:px-8 relative z-10">
                    <!-- Main Footer Content -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                        <!-- Brand Section -->
                        <div class="space-y-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg transform transition-all duration-300 hover:scale-110">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">Brian Owaka</h3>
                            </div>
                            <p class="text-gray-300 leading-relaxed mb-6">
                                Full Stack Developer crafting scalable web systems and innovative business solutions that drive digital transformation.
                            </p>
                            <div class="flex space-x-4">
                                <a href="#" class="group w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg flex items-center justify-center text-white shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <a href="#" class="group w-10 h-10 bg-gradient-to-br from-cyan-600 to-blue-600 rounded-lg flex items-center justify-center text-white shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <a href="#" class="group w-10 h-10 bg-gradient-to-br from-purple-600 to-pink-600 rounded-lg flex items-center justify-center text-white shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="group w-10 h-10 bg-gradient-to-br from-orange-600 to-red-600 rounded-lg flex items-center justify-center text-white shadow-lg transform transition-all duration-300 hover:scale-110 hover:shadow-2xl">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="space-y-6">
                            <h4 class="text-xl font-bold mb-4 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </div>
                                Quick Links
                            </h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="{{ route('home') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-blue-400 to-purple-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Home</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-green-400 to-teal-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('portfolio') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Portfolio</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-orange-400 to-red-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Services</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('store') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-cyan-400 to-blue-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Store</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-pink-400 to-rose-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Contact</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Services -->
                        <div class="space-y-6">
                            <h4 class="text-xl font-bold mb-4 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-teal-600 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                    </svg>
                                </div>
                                Services
                            </h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Web Development</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">System Development</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-purple-400 to-indigo-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">API Integration</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-pink-400 to-rose-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">UI/UX Design</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}" class="group flex items-center text-gray-300 hover:text-white transition-all duration-300 transform hover:translate-x-2">
                                        <span class="w-2 h-2 bg-gradient-to-r from-orange-400 to-red-400 rounded-full mr-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                                        <span class="font-medium">Graphics Design</span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Contact Info -->
                        <div class="space-y-6">
                            <h4 class="text-xl font-bold mb-4 flex items-center">
                                <div class="w-8 h-8 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                Contact Info
                            </h4>
                            <ul class="space-y-4">
                                <li class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-200">Email</div>
                                        <div class="text-gray-400 text-sm">{{ $settings['contact_email'] ?? 'brian@brianowaka.com' }}</div>
                                    </div>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-gradient-to-br from-green-500 to-teal-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-200">Phone</div>
                                        <div class="text-gray-400 text-sm">{{ $settings['contact_phone'] ?? '+254 123 456 789' }}</div>
                                    </div>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <div class="w-6 h-6 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-200">Location</div>
                                        <div class="text-gray-400 text-sm">Nairobi, Kenya</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Bottom Section -->
                    <div class="border-t border-gray-700/50 mt-12 pt-8">
                        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center text-gray-400">
                                    <div class="w-2 h-2 bg-gradient-to-r from-green-400 to-emerald-400 rounded-full mr-2"></div>
                                    <span class="text-sm">Always Learning</span>
                                </div>
                                <div class="flex items-center text-gray-400">
                                    <div class="w-2 h-2 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full mr-2"></div>
                                    <span class="text-sm">Innovating</span>
                                </div>
                                <div class="flex items-center text-gray-400">
                                    <div class="w-2 h-2 bg-gradient-to-r from-purple-400 to-pink-400 rounded-full mr-2"></div>
                                    <span class="text-sm">Creating</span>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2 2 4-4m0 0l-4-4m4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Back to Top
                                </a>
                                <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-teal-600 text-white rounded-lg font-semibold hover:from-green-700 hover:to-teal-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    Get In Touch
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Copyright -->
                    <div class="text-center pt-8 border-t border-gray-700/50">
                        <div class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-800/50 to-gray-700/50 rounded-full border border-gray-600 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            <span class="text-gray-300 font-medium">&copy; {{ date('Y') }} Brian Owaka. All rights reserved.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    @stack('scripts')
    
    <!-- Dark Mode Toggle Script -->
    <script>
        // Theme toggle functionality
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleMobileBtn = document.getElementById('theme-toggle-mobile');
        const themeToggleDarkIcons = document.querySelectorAll('#theme-toggle-dark-icon, .theme-toggle-dark-icon');
        const themeToggleLightIcons = document.querySelectorAll('#theme-toggle-light-icon, .theme-toggle-light-icon');

        // Function to update icon visibility
        function updateIcons() {
            if (document.documentElement.classList.contains('dark')) {
                themeToggleLightIcons.forEach(icon => icon.classList.remove('hidden'));
                themeToggleDarkIcons.forEach(icon => icon.classList.add('hidden'));
            } else {
                themeToggleDarkIcons.forEach(icon => icon.classList.remove('hidden'));
                themeToggleLightIcons.forEach(icon => icon.classList.add('hidden'));
            }
        }

        // Function to toggle theme
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
            updateIcons();
        }

        // Initialize icons on page load
        updateIcons();

        // Add event listeners
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', toggleTheme);
        }
        if (themeToggleMobileBtn) {
            themeToggleMobileBtn.addEventListener('click', toggleTheme);
        }

        // Listen for system theme changes
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
            if (!('theme' in localStorage)) {
                if (e.matches) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
                updateIcons();
            }
        });
    </script>

    <!-- WhatsApp Floating Button -->
    @php
        // Get phone number from settings and format for WhatsApp
        $phone = $settings['contact_phone'] ?? '+254 123 456 789';
        // Remove all spaces, dashes, and special characters except +
        $whatsappPhone = preg_replace('/[^0-9+]/', '', $phone);
        // Remove leading + if present and ensure it starts with country code
        $whatsappPhone = ltrim($whatsappPhone, '+');
        // Default message
        $defaultMessage = 'Hello Brian, I would like to discuss a project with you.';
    @endphp
    
    <a href="https://wa.me/{{ $whatsappPhone }}?text={{ urlencode($defaultMessage) }}" 
       target="_blank" 
       rel="noopener noreferrer"
       id="whatsapp-float-btn"
       class="fixed bottom-6 right-6 group"
       style="z-index: 9999 !important;"
       aria-label="Chat on WhatsApp">
        <div class="relative">
            <!-- Pulsing ring animation -->
            <div class="absolute inset-0 bg-green-500 rounded-full animate-ping opacity-75"></div>
            
            <!-- Main button -->
            <div class="relative w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center shadow-2xl transform transition-all duration-300 group-hover:scale-110 group-hover:shadow-green-500/50 group-hover:from-green-600 group-hover:to-green-700">
                <!-- WhatsApp Icon SVG -->
                <svg class="w-9 h-9 text-white" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                
                <!-- Notification badge (optional - can be used for unread messages) -->
                <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full flex items-center justify-center text-white text-xs font-bold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            
            <!-- Tooltip -->
            <div class="absolute right-full mr-3 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                <div class="bg-gray-900 text-white px-4 py-2 rounded-lg shadow-xl whitespace-nowrap">
                    <span class="font-medium">Chat with me on WhatsApp</span>
                    <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-full">
                        <div class="border-8 border-transparent border-l-gray-900"></div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    <!-- WhatsApp Button Styles -->
    <style>
        /* Ensure button stays above ALL other elements on all screen sizes */
        #whatsapp-float-btn {
            position: fixed !important;
            bottom: 1.5rem !important;
            right: 1.5rem !important;
            z-index: 9999 !important;
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
        
        /* Mobile adjustments */
        @media (max-width: 640px) {
            #whatsapp-float-btn {
                bottom: 1rem !important;
                right: 1rem !important;
            }
        }
        
        /* Desktop - ensure it's always visible */
        @media (min-width: 641px) {
            #whatsapp-float-btn {
                bottom: 1.5rem !important;
                right: 1.5rem !important;
            }
        }
        
        /* Smooth animations */
        @keyframes whatsapp-pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 0.75;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.5;
            }
        }
        
        /* Custom pulse animation for the ring */
        #whatsapp-float-btn .animate-ping {
            animation: whatsapp-pulse 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }
    </style>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
