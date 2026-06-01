@extends('layouts.app')

@section('title', 'Contact Me - Get In Touch')

@section('content')
<div class="min-h-screen bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300" x-data="contactApp()">
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
        </div>

        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 xl:px-16 text-center">
            <div class="animate-fade-in-up">
                <p class="text-sm font-semibold tracking-widest text-blue-200 uppercase mb-3">Contact</p>
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-4 text-white hero-shimmer bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent">
                    Get In Touch
                </h1>
                <p class="text-xl text-blue-100 font-medium mb-8 max-w-2xl mx-auto">
                    Let's discuss your project and bring your ideas to life. I'm always excited to collaborate on new opportunities.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm border border-white/20 rounded-full text-sm">
                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white">Quick Response</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300/10 backdrop-blur-sm border border-white/20 rounded-full text-sm">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white">Free Consultation</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CONTACT FORM & INFO ───────────────────────────────────────────────── --}}
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
                <div class="grid lg:grid-cols-2 gap-12">
                    {{-- Contact Form --}}
                    <div class="animate-slide-in-left">
                        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-2xl p-8 shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 hover-lift dashboard-card">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Send Me a Message</h2>
                            </div>
                            
                            @if(session('success'))
                            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 rounded-xl animate-slide-in-up">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ session('success') }}
                                </div>
                            </div>
                            @endif
                            
                            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                                @csrf
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div>
                                        <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 transition-colors duration-300 mb-2">Name *</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                            </div>
                                            <input type="text" id="name" name="name" required
                                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                                   value="{{ old('name') }}" placeholder="John Doe">
                                        </div>
                                        @error('name')
                                        <p class="mt-1 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 transition-colors duration-300 mb-2">Email *</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <input type="email" id="email" name="email" required
                                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                                   value="{{ old('email') }}" placeholder="john@example.com">
                                        </div>
                                        @error('email')
                                        <p class="mt-1 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 transition-colors duration-300 mb-2">Phone</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <input type="tel" id="phone" name="phone"
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                               value="{{ old('phone') }}" placeholder="+254 123 456 789">
                                    </div>
                                    @error('phone')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 transition-colors duration-300 mb-2">Subject</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                            </svg>
                                        </div>
                                        <input type="text" id="subject" name="subject"
                                               class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                               value="{{ old('subject') }}" placeholder="Project Discussion">
                                    </div>
                                    @error('subject')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="message" class="block text-sm font-semibold text-gray-700 dark:text-slate-300 transition-colors duration-300 mb-2">Message *</label>
                                    <div class="relative">
                                        <textarea id="message" name="message" rows="6" required
                                                  class="w-full px-4 py-3 border border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                                                  placeholder="Tell me about your project...">{{ old('message') }}</textarea>
                                        <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                            <span id="charCount">0</span> / 2000
                                        </div>
                                    </div>
                                    @error('message')
                                    <p class="mt-1 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                    @enderror
                                </div>
                                
                                <button type="submit" class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white py-4 rounded-xl font-bold transition-all duration-200 hover:scale-105 shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 btn-ripple relative overflow-hidden flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                                    </svg>
                                    Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    {{-- Contact Info --}}
                    <div class="animate-slide-in-right">
                        <!-- Contact Information -->
                        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-2xl p-8 shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 hover-lift dashboard-card mb-8">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-500 to-teal-600 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-green-600 to-teal-600 bg-clip-text text-transparent">Contact Information</h2>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="group observe-me">
                                    <div class="flex items-start p-4 rounded-xl bg-gradient-to-r from-blue-50 to-blue-100 border border-blue-200 dark:border-indigo-500/30 transition-colors duration-300 hover:border-blue-300 transition-all group-hover:scale-105 cursor-pointer"
                                         @click="copyToClipboard('{{ $settings['contact_email'] }}', 'Email')">
                                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition-transform pulse-ring">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-1 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">Email</h3>
                                            <a href="mailto:{{ $settings['contact_email'] }}" class="text-blue-600 dark:text-blue-400 transition-colors duration-300 hover:text-blue-700 font-medium break-all">{{ $settings['contact_email'] }}</a>
                                            <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 mt-1">Response within {{ $settings['response_time'] }}</p>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="group observe-me" style="animation-delay: 0.1s">
                                    <div class="flex items-start p-4 rounded-xl bg-gradient-to-r from-green-50 to-green-100 border border-green-200 hover:border-green-300 transition-all group-hover:scale-105 cursor-pointer"
                                         @click="copyToClipboard('{{ $settings['contact_phone'] }}', 'Phone')">
                                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition-transform pulse-ring">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-1 group-hover:text-green-600 transition-colors">Phone</h3>
                                            <a href="tel:{{ $settings['contact_phone'] }}" class="text-green-600 hover:text-green-700 font-medium">{{ $settings['contact_phone'] }}</a>
                                            <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 mt-1">{{ $settings['availability'] }}</p>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-green-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="group observe-me" style="animation-delay: 0.2s">
                                    <div class="flex items-start p-4 rounded-xl bg-gradient-to-r from-purple-50 to-purple-100 border border-purple-200 hover:border-purple-300 transition-all group-hover:scale-105 cursor-pointer"
                                         @click="copyToClipboard('{{ $settings['contact_location'] }}', 'Location')">
                                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 flex-shrink-0 group-hover:scale-110 transition-transform pulse-ring">
                                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <h3 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-1 group-hover:text-purple-600 transition-colors">Location</h3>
                                            <p class="text-purple-600 font-medium">{{ $settings['contact_location'] }}</p>
                                            <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 mt-1">{{ $settings['contact_address'] }}</p>
                                        </div>
                                        <div class="flex-shrink-0 ml-2">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Links -->
                        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-2xl p-8 shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 hover-lift dashboard-card">
                            <div class="flex items-center mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">Connect With Me</h2>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ $settings['facebook_url'] }}" target="_blank" class="group flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-xl hover:border-blue-300 transition-all social-3d magnetic-btn observe-me">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400 transition-colors duration-300 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-slate-300 transition-colors duration-300">Facebook</span>
                                    </div>
                                </a>
                                
                                <a href="{{ $settings['twitter_url'] }}" target="_blank" class="group flex items-center justify-center p-4 bg-gradient-to-br from-cyan-50 to-cyan-100 border border-cyan-200 rounded-xl hover:border-cyan-300 transition-all social-3d magnetic-btn observe-me" style="animation-delay: 0.1s">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-cyan-600 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-slate-300 transition-colors duration-300">Twitter</span>
                                    </div>
                                </a>
                                
                                <a href="{{ $settings['github_url'] }}" target="_blank" class="group flex items-center justify-center p-4 bg-gradient-to-br from-purple-50 to-purple-100 border border-purple-200 rounded-xl hover:border-purple-300 transition-all social-3d magnetic-btn observe-me" style="animation-delay: 0.2s">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-purple-600 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-slate-300 transition-colors duration-300">GitHub</span>
                                    </div>
                                </a>
                                
                                <a href="{{ $settings['linkedin_url'] }}" target="_blank" class="group flex items-center justify-center p-4 bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-xl hover:border-blue-300 transition-all social-3d magnetic-btn observe-me" style="animation-delay: 0.3s">
                                    <div class="text-center">
                                        <svg class="w-8 h-8 text-blue-700 mx-auto mb-2 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-slate-300 transition-colors duration-300">LinkedIn</span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="mt-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl observe-me" style="animation-delay: 0.4s">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                        </svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-slate-300 transition-colors duration-300">Also available on WhatsApp</span>
                                    </div>
                                    <a href="https://wa.me/{{ str_replace(['+', ' '], '', $settings['whatsapp_number']) }}" target="_blank" 
                                       class="text-green-600 hover:text-green-700 font-semibold text-sm flex items-center gap-1">
                                        Chat Now
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>

    {{-- ── FAQ SECTION ───────────────────────────────────────────────────── --}}
    <section class="py-20 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12 animate-fade-in-up">
                    <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Questions</p>
                    <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Frequently Asked Questions</h2>
                    <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer mx-auto"></div>
                </div>
                
                <div class="space-y-4">
                    <div class="bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-xl overflow-hidden hover-lift dashboard-card animate-slide-in-up">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors" onclick="this.classList.toggle('active')">
                            <span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">What services do you offer?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-slate-400 transition-colors duration-300 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 dark:text-slate-400 transition-colors duration-300 hidden">
                            I offer comprehensive web development services including frontend development, backend development, API integration, UI/UX design, and custom business system development.
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-xl overflow-hidden hover-lift dashboard-card animate-slide-in-up" style="animation-delay: 0.1s">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors" onclick="this.classList.toggle('active')">
                            <span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">What is your typical response time?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-slate-400 transition-colors duration-300 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 dark:text-slate-400 transition-colors duration-300 hidden">
                            I typically respond to all inquiries within 24 hours. For urgent projects, I often respond much faster. You can also reach me via phone for immediate assistance.
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-xl overflow-hidden hover-lift dashboard-card animate-slide-in-up" style="animation-delay: 0.2s">
                        <button class="w-full px-6 py-4 text-left flex items-center justify-between hover:bg-gray-100 transition-colors" onclick="this.classList.toggle('active')">
                            <span class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300">Do you work with international clients?</span>
                            <svg class="w-5 h-5 text-gray-500 dark:text-slate-400 transition-colors duration-300 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="px-6 pb-4 text-gray-600 dark:text-slate-400 transition-colors duration-300 hidden">
                            Absolutely! I work with clients from around the world. Thanks to remote collaboration tools, I can effectively manage projects regardless of location.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── CTA ───────────────────────────────────────────────────────────── --}}
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16 text-center">
            <div class="animate-fade-in-up">
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-5 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Ready to Start Your Project?</h2>
                <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 text-lg mb-10 max-w-2xl mx-auto">Let's discuss how I can help bring your ideas to life. I'm excited to learn about your project and explore how we can work together.</p>
                <div class="flex flex-wrap gap-4 justify-center animate-slide-in-up">
                    <a href="{{ route('portfolio') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-bold rounded-xl shadow-lg dark:shadow-indigo-900/50 transition-shadow duration-300 transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        View My Work
                    </a>
                    <a href="tel:+254123456789"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 hover:bg-gray-50 dark:hover:bg-slate-700/80 transition-colors duration-300 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 font-bold rounded-xl border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 hover:border-gray-300 dark:border-indigo-400/20 transition-colors duration-300 shadow-sm transition-all duration-200 hover:scale-105 btn-ripple relative overflow-hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Call Me
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Character counter for message field
        const messageField = document.getElementById('message');
        const charCount = document.getElementById('charCount');
        
        if (messageField && charCount) {
            messageField.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;
                
                if (count > 2000) {
                    this.value = this.value.substring(0, 2000);
                    charCount.textContent = 2000;
                }
                
                if (count > 1800) {
                    charCount.classList.add('text-red-500');
                } else {
                    charCount.classList.remove('text-red-500');
                }
            });
        }
        
        // FAQ accordion functionality
        document.querySelectorAll('button[onclick*="toggle"]').forEach(button => {
            button.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');
                
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });
    </script>

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

    {{-- ── TOAST NOTIFICATION ──────────────────────────────────────────────── --}}
    <div x-show="showToast" 
         x-cloak
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="fixed bottom-8 left-8 z-50 max-w-sm">
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 rounded-xl shadow-2xl border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 p-4 flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-900 dark:text-slate-100 transition-colors duration-300" x-text="toastMessage"></p>
            </div>
            <button @click="showToast = false" class="text-gray-400 hover:text-gray-600 dark:text-slate-400 transition-colors duration-300">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        </div>
    </div>

    @push('scripts')

    <script>
    function contactApp() {
        return {
            scrollProgress: 0,
            showToast: false,
            toastMessage: '',
            
            init() {
                // Update scroll progress
                window.addEventListener('scroll', () => {
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
            
            copyToClipboard(text, label) {
                navigator.clipboard.writeText(text).then(() => {
                    this.toastMessage = `${label} copied to clipboard!`;
                    this.showToast = true;
                    setTimeout(() => {
                        this.showToast = false;
                    }, 3000);
                }).catch(err => {
                    console.error('Failed to copy:', err);
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
    </script>

    <style>
    [x-cloak] { display: none !important; }
    
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
