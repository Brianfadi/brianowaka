@extends('layouts.app')

@section('content')
<!-- Enhanced Store Page with Floating Elements and Improved Animations -->
<div class="min-h-screen bg-gray-100 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 py-4 relative overflow-hidden">
    <!-- Floating Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-20 left-10 w-72 h-72 bg-gradient-to-br from-emerald-400/10 to-teal-400/10 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-40 right-20 w-96 h-96 bg-gradient-to-br from-blue-400/10 to-indigo-400/10 rounded-full blur-3xl animate-pulse animation-delay-2000"></div>
        <div class="absolute bottom-20 left-1/3 w-80 h-80 bg-gradient-to-br from-purple-400/10 to-pink-400/10 rounded-full blur-3xl animate-pulse animation-delay-4000"></div>
        <div class="absolute bottom-40 right-10 w-64 h-64 bg-gradient-to-br from-orange-400/10 to-red-400/10 rounded-full blur-3xl animate-pulse animation-delay-6000"></div>
    </div>

    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16 relative z-10">

        {{-- Enhanced Store Header Card with Parallax Effect --}}
        <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl rounded-3xl shadow-2xl dark:shadow-indigo-900/40 border border-gray-200 dark:border-indigo-500/30 overflow-hidden transition-all duration-500 animate-slide-in-up mb-6 hover:shadow-3xl hover:scale-[1.01] group">
            {{-- Animated Background Pattern --}}
            <div class="absolute inset-0 opacity-5 dark:opacity-10">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-emerald-500/20 via-teal-500/20 to-cyan-500/20 animate-pulse"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-emerald-400/30 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
                <div class="absolute bottom-0 left-0 w-40 h-40 bg-gradient-to-tr from-teal-400/30 to-transparent rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 animation-delay-2000"></div>
            </div>
            
            {{-- Compact Header Content --}}
            <div class="p-6 lg:p-8 text-center relative z-10">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 mb-4">
                    <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                    <span class="text-emerald-600 dark:text-emerald-400 text-sm font-bold tracking-widest uppercase">Digital Store</span>
                </div>
                
                <h1 class="text-4xl lg:text-5xl font-black text-gray-900 dark:text-slate-100 mb-4 leading-tight">
                    Premium <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Digital</span> Products
                </h1>
                
                <p class="text-lg text-gray-600 dark:text-slate-300 max-w-2xl mx-auto mb-6 leading-relaxed">
                    Ready-to-deploy solutions built with modern technologies. 
                    <span class="font-semibold text-emerald-600 dark:text-emerald-400">Save months of development time.</span>
                </p>

                <!-- Compact Feature Badges -->
                <div class="flex flex-wrap gap-3 justify-center mb-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-500/20 rounded-full text-sm text-yellow-700 dark:text-yellow-300 hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        Quality Guaranteed
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-500/20 rounded-full text-sm text-emerald-700 dark:text-emerald-300 hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                        Instant Download
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-cyan-50 dark:bg-cyan-900/20 border border-cyan-200 dark:border-cyan-500/20 rounded-full text-sm text-cyan-700 dark:text-cyan-300 hover:scale-105 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                        Full Support
                    </div>
                </div>

                <!-- Compact Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                    <div class="group hover:scale-105 transition-all duration-300">
                        <div class="text-3xl font-black bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">{{ $products->count() }}+</div>
                        <div class="text-xs text-gray-500 dark:text-slate-400 font-medium mt-1">Products</div>
                    </div>
                    <div class="group hover:scale-105 transition-all duration-300">
                        <div class="text-3xl font-black bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">{{ $products->sum('downloads') ?? 0 }}+</div>
                        <div class="text-xs text-gray-500 dark:text-slate-400 font-medium mt-1">Downloads</div>
                    </div>
                    <div class="group hover:scale-105 transition-all duration-300">
                        <div class="text-3xl font-black bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">100%</div>
                        <div class="text-xs text-gray-500 dark:text-slate-400 font-medium mt-1">Satisfaction</div>
                    </div>
                    <div class="group hover:scale-105 transition-all duration-300">
                        <div class="text-3xl font-black bg-gradient-to-r from-orange-600 to-red-600 bg-clip-text text-transparent">24/7</div>
                        <div class="text-xs text-gray-500 dark:text-slate-400 font-medium mt-1">Support</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Enhanced Products Card --}}
        <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl rounded-3xl shadow-2xl dark:shadow-indigo-900/40 border border-gray-200 dark:border-indigo-500/30 overflow-hidden transition-all duration-500 animate-slide-in-up mb-6 hover:shadow-3xl">
            {{-- Compact Header --}}
            <div class="p-6 lg:p-8 border-b border-gray-200 dark:border-indigo-500/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-black tracking-widest text-emerald-600 dark:text-emerald-400 uppercase mb-2">Our Products</p>
                        <h2 class="text-3xl lg:text-4xl font-black text-gray-900 dark:text-slate-100">
                            Available <span class="bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 bg-clip-text text-transparent">Solutions</span>
                        </h2>
                    </div>
                </div>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full"></div>
            </div>

            {{-- Enhanced Products Grid --}}
            <div class="p-6 lg:p-8">
                @if($products->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $index => $product)
                    <div class="group relative bg-white dark:bg-slate-800/90 border border-gray-200 dark:border-indigo-500/20 rounded-2xl p-6 hover:border-emerald-400 dark:hover:border-emerald-500 hover:shadow-xl dark:shadow-indigo-900/50 transition-all duration-300 flex flex-col overflow-hidden hover:-translate-y-1">
                        
                        <!-- Product Image/Icon -->
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 flex items-center justify-center mb-4 group-hover:scale-105 transition-transform shadow-md shadow-emerald-500/20">
                            @if($product->images && count($product->images) > 0)
                                 <img src="{{ Storage::url($product->images[0]) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-2xl" loading="lazy">
                            @else
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            @endif
                        </div>

                        {{-- Category --}}
                        @if($product->category)
                        <span class="inline-block text-xs font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-500/20 px-3 py-1 rounded-full mb-3 w-fit">{{ $product->category->name }}</span>
                        @endif

                        {{-- Title & Description --}}
                        <h3 class="text-xl font-extrabold text-gray-900 dark:text-slate-100 mb-2 group-hover:text-emerald-600 dark:group-hover:text-emerald-400 transition-colors">{{ $product->name }}</h3>
                        <p class="text-gray-500 dark:text-slate-400 text-sm mb-4 line-clamp-2 leading-relaxed flex-grow">{{ $product->short_description ?? Str::limit($product->description, 100) }}</p>

                        {{-- Features (max 2) --}}
                        @if($product->features && count($product->features) > 0)
                        <ul class="space-y-1 mb-4">
                            @foreach(array_slice($product->features, 0, 2) as $feature)
                            <li class="flex items-start gap-2 text-sm text-gray-600 dark:text-slate-400">
                                <svg class="w-4 h-4 text-emerald-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                <span>{{ Str::limit($feature, 35) }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                        {{-- Price & Actions --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100 dark:border-indigo-500/20 mt-auto">
                            <div>
                                @if($product->pricing_type === 'contact')
                                    <span class="text-lg font-black text-gray-700 dark:text-slate-300">Contact</span>
                                @elseif($product->discount_price)
                                    <span class="text-xl font-black text-emerald-600">KES {{ number_format($product->discount_price, 0) }}</span>
                                    <span class="text-sm text-gray-400 line-through ml-2">KES {{ number_format($product->price, 0) }}</span>
                                @elseif($product->price)
                                    <span class="text-xl font-black text-emerald-600">KES {{ number_format($product->price, 0) }}</span>
                                @else
                                    <span class="text-xl font-black text-emerald-600">Free</span>
                                @endif
                            </div>
                            
                            <div class="flex gap-2">
                                @if($product->demo_link)
                                <a href="{{ $product->demo_link }}" target="_blank" class="p-2.5 border-2 border-gray-200 dark:border-indigo-500/20 text-gray-500 dark:text-slate-400 rounded-xl hover:border-emerald-400 hover:text-emerald-600 transition-all" title="Demo">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                </a>
                                @endif
                                <a href="{{ route('store.show', $product) }}" class="flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold rounded-xl transition-all duration-200 hover:scale-105 shadow-md text-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707L17 13z"/></svg>
                                    Buy Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <!-- Compact Empty State -->
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gradient-to-br from-emerald-100 to-teal-100 dark:from-emerald-900/30 dark:to-teal-900/30 rounded-full mx-auto mb-6 flex items-center justify-center border-2 border-emerald-200 dark:border-emerald-500/30 shadow-lg">
                        <svg class="w-12 h-12 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                    </div>
                    
                    <h3 class="text-3xl font-black text-gray-900 dark:text-slate-100 mb-4">
                        Products <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Coming Soon</span>
                    </h3>
                    
                    <p class="text-gray-600 dark:text-slate-400 mb-8 max-w-md mx-auto">
                        We're crafting exceptional digital products. Be the first to know when they launch!
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-emerald-600 to-teal-600 text-white font-bold rounded-xl shadow-lg hover:scale-105 transition-all">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Get Custom Quote
                        </a>
                        <a href="{{ route('portfolio') }}" class="inline-flex items-center px-6 py-3 bg-white dark:bg-slate-800/80 border-2 border-gray-200 dark:border-indigo-500/30 text-gray-700 dark:text-slate-300 font-bold rounded-xl transition-all hover:scale-105">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            View My Work
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
        {{-- Compact Benefits Card --}}
        <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl rounded-3xl shadow-2xl dark:shadow-indigo-900/40 border border-gray-200 dark:border-indigo-500/30 overflow-hidden transition-all duration-500 animate-slide-in-up mb-6">
            {{-- Header --}}
            <div class="p-6 lg:p-8 border-b border-gray-200 dark:border-indigo-500/20 text-center">
                <p class="text-sm font-bold tracking-widest text-emerald-600 uppercase mb-2">Why Choose Us</p>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-slate-100">Why Buy From <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">My Store?</span></h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>

            {{-- Compact Benefits Grid --}}
            <div class="p-6 lg:p-8">
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                    $benefits = [
                        ['icon'=>'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z','title'=>'Instant Download','desc'=>'Get immediate access to all files right after purchase.','gradient'=>'from-emerald-400 to-teal-500','bg'=>'from-emerald-50 to-teal-50','darkBg'=>'from-emerald-900/30 to-teal-900/30'],
                        ['icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z','title'=>'Quality Tested','desc'=>'Every product is thoroughly tested before release.','gradient'=>'from-blue-400 to-indigo-500','bg'=>'from-blue-50 to-indigo-50','darkBg'=>'from-blue-900/30 to-indigo-900/30'],
                        ['icon'=>'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253','title'=>'Full Documentation','desc'=>'Complete setup guides and usage documentation included.','gradient'=>'from-purple-400 to-pink-500','bg'=>'from-purple-50 to-pink-50','darkBg'=>'from-purple-900/30 to-pink-900/30'],
                        ['icon'=>'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z','title'=>'Dedicated Support','desc'=>'Technical support included with every purchase.','gradient'=>'from-orange-400 to-red-500','bg'=>'from-orange-50 to-red-50','darkBg'=>'from-orange-900/30 to-red-900/30'],
                    ];
                    @endphp
                    @foreach($benefits as $benefit)
                    <div class="group relative bg-gradient-to-br {{ $benefit['bg'] }} dark:{{ $benefit['darkBg'] }} rounded-2xl p-6 border border-gray-100 dark:border-indigo-500/20 hover:shadow-xl dark:shadow-indigo-900/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="w-12 h-12 bg-gradient-to-br {{ $benefit['gradient'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $benefit['icon'] }}"/></svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-slate-100 mb-2">{{ $benefit['title'] }}</h3>
                        <p class="text-gray-500 dark:text-slate-400 text-sm leading-relaxed">{{ $benefit['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Testimonials Card --}}
        @if($testimonials->count() > 0)
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 animate-slide-in-up mb-4">
            {{-- Header --}}
            <div class="p-6 lg:p-8 border-b border-gray-200 dark:border-indigo-500/20 text-center">
                <p class="text-sm font-bold tracking-widest text-emerald-600 uppercase mb-2">Customer Reviews</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100">What Our <span class="bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Clients Say</span></h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-emerald-500 to-teal-500 rounded-full mx-auto"></div>
            </div>

            {{-- Testimonials Grid --}}
            <div class="p-6 lg:p-8">
                <div class="grid md:grid-cols-{{ min($testimonials->count(), 3) }} gap-8">
                    @foreach($testimonials as $testimonial)
                    <div class="bg-white dark:bg-slate-800/80 rounded-3xl p-6 shadow-md hover:shadow-xl dark:shadow-indigo-900/50 transition-all duration-300 hover:-translate-y-2">
                        <div class="flex gap-1 mb-4">
                            @for($j = 0; $j < $testimonial->rating; $j++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            @endfor
                        </div>
                        <p class="text-gray-600 dark:text-slate-400 mb-6 leading-relaxed italic">"{{ $testimonial->content }}"</p>
                        <div class="flex items-center gap-3">
                            @if($testimonial->avatar)
                             <img src="{{ Storage::url($testimonial->avatar) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full object-cover" loading="lazy">
                            @else
                            <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-teal-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                {{ $testimonial->initials }}
                            </div>
                            @endif
                            <div>
                                <div class="font-bold text-gray-900 dark:text-slate-100">{{ $testimonial->name }}</div>
                                <div class="text-sm text-gray-500 dark:text-slate-400">{{ $testimonial->role }}@if($testimonial->company), {{ $testimonial->company }}@endif</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        {{-- Compact Newsletter Card --}}
        <div class="bg-white dark:bg-slate-800/90 dark:backdrop-blur-xl rounded-3xl shadow-2xl dark:shadow-indigo-900/40 border border-gray-200 dark:border-indigo-500/30 overflow-hidden transition-all duration-500 animate-slide-in-up mb-6">
            <div class="p-6 lg:p-8 text-center">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 mb-6">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    <span class="text-emerald-600 text-sm font-semibold">Stay Updated</span>
                </div>
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-slate-100 mb-4">Get Notified About New Products</h2>
                <p class="text-gray-500 dark:text-slate-400 mb-8">Subscribe to our newsletter and be the first to know about new releases, special offers, and updates.</p>
                <form class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto">
                    @csrf
                    <input type="email" name="email" placeholder="Enter your email" required class="flex-1 px-6 py-4 border border-gray-200 dark:border-indigo-500/20 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-transparent">
                    <button type="submit" class="px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 text-white font-bold rounded-xl transition-all hover:scale-105 shadow-md">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>

        {{-- Compact CTA Card --}}
        <div class="bg-gradient-to-br from-emerald-600 to-teal-600 rounded-3xl shadow-2xl dark:shadow-indigo-900/30 overflow-hidden transition-colors duration-300 animate-slide-in-up">
            <div class="p-6 lg:p-8 text-center text-white">
                <p class="text-sm font-bold tracking-widest text-emerald-100 uppercase mb-4">Custom Solutions</p>
                <h2 class="text-4xl lg:text-5xl font-black mb-6 leading-tight">Need Something <span class="text-cyan-200">Tailored?</span></h2>
                <p class="text-emerald-100 text-lg mb-10 leading-relaxed max-w-2xl mx-auto">Don't see exactly what you need? I build custom solutions designed around your specific business requirements.</p>
                <div class="flex flex-wrap gap-4 justify-center">
                    <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white hover:bg-gray-50 text-emerald-600 font-bold rounded-xl shadow-lg transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        Get a Custom Quote
                    </a>
                    <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-bold rounded-xl border border-white/20 transition-all hover:scale-105">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                        View My Work
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection