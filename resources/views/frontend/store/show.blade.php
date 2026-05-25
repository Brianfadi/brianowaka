@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 py-4">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
        
        {{-- Breadcrumb --}}
        <div class="mb-6">
            <a href="{{ route('store') }}"
               class="inline-flex items-center gap-1.5 text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 text-sm font-medium transition-all duration-300 hover:gap-2 group">
                <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back to Store
            </a>
        </div>

        {{-- Main Product Card --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 animate-slide-in-up">
            
            {{-- Product Header --}}
            <div class="p-8 lg:p-10 border-b border-gray-200 dark:border-indigo-500/20">
                <div class="flex flex-wrap items-center gap-2 mb-4">
                    <span class="px-4 py-1.5 bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-300 text-sm font-semibold rounded-full border border-green-200 dark:border-green-500/30 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Digital Product
                    </span>
                    <span class="px-4 py-1.5 bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 text-sm font-semibold rounded-full border border-blue-200 dark:border-blue-500/30 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        {{ $product->downloads }} Downloads
                    </span>
                </div>

                <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 dark:text-slate-100 mb-3 leading-tight">
                    {{ $product->name }}
                </h1>
                <p class="text-gray-600 dark:text-slate-400 text-base lg:text-lg leading-relaxed mb-6">
                    {{ $product->description }}
                </p>

                <div class="flex flex-wrap gap-3">
                    @if($product->demo_link)
                    <a href="{{ $product->demo_link }}" target="_blank"
                       class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg text-sm relative overflow-hidden">
                        <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                        <svg class="w-4 h-4 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        <span class="relative z-10">Live Demo</span>
                    </a>
                    @endif
                    @if($product->documentation_path)
                    <a href="{{ $product->documentation_path }}" target="_blank"
                       class="group inline-flex items-center gap-2 px-5 py-2.5 bg-gray-800 dark:bg-slate-700 hover:bg-gray-700 dark:hover:bg-slate-600 text-white font-bold rounded-xl transition-all duration-300 hover:scale-105 text-sm relative overflow-hidden">
                        <span class="absolute inset-0 bg-white/10 translate-x-full group-hover:translate-x-0 transition-transform duration-300"></span>
                        <svg class="w-4 h-4 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <span class="relative z-10">Documentation</span>
                    </a>
                    @endif
                </div>
            </div>

            {{-- Content Area --}}
            <div class="p-8 lg:p-10">
                <div class="flex flex-col lg:flex-row gap-10">
                    
                    {{-- Main Content --}}
                    <div class="flex-1 min-w-0 space-y-8">
                        
                        {{-- Product Image --}}
                        <div class="group bg-gradient-to-br from-green-500 via-emerald-500 to-teal-600 dark:from-green-900 dark:via-emerald-900 dark:to-teal-900 rounded-2xl flex items-center justify-center shadow-xl relative overflow-hidden animate-slide-in-up aspect-video">
                            <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxnIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSI+PHBhdGggZD0iTTM2IDM0djItaDJ2LTJoLTJ6bTAgNGgtMnYyaDJ2LTJ6bS0yLTJoLTJ2Mmgydi0yem0wLTJoMnYtMmgtMnYyem0tMiAydi0yaC0ydjJoMnptMi00di0yaC0ydjJoMnptMC00aDJ2LTJoLTJ2MnoiLz48L2c+PC9nPjwvc3ZnPg==')] opacity-30"></div>
                            <svg class="w-24 h-24 text-white/40 relative z-10 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>

                        {{-- About Product --}}
                        <div class="bg-gradient-to-br from-gray-50 to-blue-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.1s;">
                            <div class="flex items-center gap-3 mb-5">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">About This Product</h2>
                            </div>
                            <p class="text-gray-700 dark:text-slate-300 transition-colors duration-300 leading-relaxed text-lg">{{ $product->description }}</p>
                        </div>

                        {{-- Features --}}
                        @if($product->features && count($product->features) > 0)
                        <div class="bg-gradient-to-br from-green-50/50 to-emerald-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.2s;">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Features</h2>
                            </div>
                            <div class="grid sm:grid-cols-2 gap-4">
                                @foreach($product->features as $index => $feature)
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

                        {{-- Technologies --}}
                        @if($product->technologies && count($product->technologies) > 0)
                        <div class="bg-gradient-to-br from-purple-50/50 to-indigo-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-8 shadow-lg hover:shadow-xl dark:shadow-indigo-900/20 transition-all duration-300 animate-slide-in-up" style="animation-delay: 0.3s;">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-500 to-indigo-600 flex items-center justify-center shadow-lg">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Technologies Used</h2>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                @foreach($product->technologies as $index => $tech)
                                <span class="group px-5 py-2.5 bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border-2 border-purple-200 dark:border-indigo-500/30 transition-colors duration-300 text-purple-700 dark:text-purple-300 rounded-xl text-sm font-bold hover:bg-purple-50 dark:hover:bg-purple-900/30 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:border-purple-400 dark:hover:border-purple-500 cursor-default animate-fade-in" style="animation-delay: {{ $index * 0.03 }}s;">
                                    {{ $tech }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>

                    {{-- Sidebar --}}
                    <div class="w-full lg:w-80 flex-shrink-0">
                        <div class="sticky top-6 space-y-5">
                            
                            {{-- Purchase Card --}}
                            <div class="bg-gradient-to-br from-white to-green-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border-2 border-gray-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-2xl p-6 shadow-xl hover:shadow-2xl dark:shadow-indigo-900/30 transition-all duration-300 animate-slide-in-right">
                                <div class="flex items-center gap-2 mb-5">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                    </svg>
                                    <h3 class="font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Purchase Information</h3>
                                </div>
                                
                                <div class="text-4xl font-extrabold text-green-600 dark:text-green-400 mb-6 group-hover:scale-110 transition-transform">{{ $product->formatted_price }}</div>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center text-gray-600 dark:text-slate-400 transition-colors duration-300 text-sm">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Instant download after purchase
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-slate-400 transition-colors duration-300 text-sm">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Complete documentation included
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-slate-400 transition-colors duration-300 text-sm">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        Technical support included
                                    </div>
                                    <div class="flex items-center text-gray-600 dark:text-slate-400 transition-colors duration-300 text-sm">
                                        <svg class="w-4 h-4 mr-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $product->downloads }} happy customers
                                    </div>
                                </div>

                                <button class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-500 hover:to-emerald-500 text-white font-bold rounded-xl transition-all duration-300 text-sm shadow-lg hover:shadow-xl hover:scale-105 relative overflow-hidden">
                                    <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                    <svg class="w-5 h-5 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span class="relative z-10">Buy Now - {{ $product->formatted_price }}</span>
                                </button>
                            </div>

                            {{-- Support Card --}}
                            <div class="bg-gradient-to-br from-gray-50 to-purple-50/30 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border-2 border-gray-200 dark:border-indigo-500/30 transition-colors duration-300 rounded-2xl p-6 shadow-lg hover:shadow-xl dark:shadow-indigo-900/30 transition-all duration-300 animate-slide-in-right" style="animation-delay: 0.1s;">
                                <div class="flex items-center gap-2 mb-2">
                                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 109.75 9.75A9.75 9.75 0 0012 2.25z"/>
                                    </svg>
                                    <h4 class="font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300">Need Help?</h4>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300 mb-4">Have questions about this product? I'm here to help!</p>
                                <a href="{{ route('contact') }}"
                                   class="group w-full flex items-center justify-center gap-2 px-4 py-3 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 hover:from-blue-500 hover:via-purple-500 hover:to-pink-500 text-white font-bold rounded-xl transition-all duration-300 text-sm shadow-lg hover:shadow-2xl hover:scale-105 relative overflow-hidden">
                                    <span class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                                    <svg class="w-4 h-4 relative z-10 group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span class="relative z-10">Contact Support</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection