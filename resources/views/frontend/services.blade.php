@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-purple-50 dark:from-slate-950 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 py-12">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
        
        {{-- Hero Header Section --}}
        <div class="text-center mb-16 animate-fade-in">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 dark:bg-blue-900/30 rounded-full mb-6">
                <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <span class="text-sm font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">What I Offer</span>
            </div>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 dark:text-white mb-6 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                Professional Services
            </h1>
            <p class="text-xl text-gray-600 dark:text-slate-300 max-w-3xl mx-auto leading-relaxed">
                Transform your ideas into powerful digital solutions with cutting-edge technology and expert craftsmanship
            </p>
        </div>

        {{-- Services Grid --}}
        <div class="mb-20">
        <div class="mb-20">
                @if($services->count() > 0)
                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($services as $index => $service)
                    @php
                        $features = is_string($service->features)
                            ? (json_decode($service->features, true) ?? [])
                            : ($service->features ?? []);
                        
                        // Gradient colors for each card
                        $gradients = [
                            ['from-blue-500', 'to-cyan-500', 'shadow-blue-500/20'],
                            ['from-purple-500', 'to-pink-500', 'shadow-purple-500/20'],
                            ['from-orange-500', 'to-red-500', 'shadow-orange-500/20'],
                            ['from-green-500', 'to-emerald-500', 'shadow-green-500/20'],
                            ['from-indigo-500', 'to-purple-500', 'shadow-indigo-500/20'],
                            ['from-pink-500', 'to-rose-500', 'shadow-pink-500/20'],
                        ];
                        $gradient = $gradients[$index % count($gradients)];
                    @endphp
                    <div class="group relative bg-white dark:bg-slate-800/90 backdrop-blur-xl rounded-3xl overflow-hidden border border-gray-200 dark:border-slate-700 hover:border-transparent transition-all duration-500 hover:shadow-2xl hover:-translate-y-2 {{ $gradient[2] }} animate-slide-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                        
                        {{-- Gradient overlay on hover --}}
                        <div class="absolute inset-0 bg-gradient-to-br {{ $gradient[0] }} {{ $gradient[1] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                        
                        {{-- Popular badge --}}
                        @if($service->order <= 2)
                        <div class="absolute top-6 right-6 z-10">
                            <div class="flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full shadow-lg">
                                <svg class="w-3.5 h-3.5 text-yellow-900" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="text-xs font-bold text-yellow-900">Popular</span>
                            </div>
                        </div>
                        @endif

                        <div class="relative p-8">
                            {{-- Icon with gradient background --}}
                            <div class="mb-6">
                                <div class="relative inline-flex">
                                    <div class="absolute inset-0 bg-gradient-to-br {{ $gradient[0] }} {{ $gradient[1] }} rounded-2xl blur-xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
                                    <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-br {{ $gradient[0] }} {{ $gradient[1] }} flex items-center justify-center shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-500">
                                        @if($service->icon)
                                        <i class="{{ $service->icon }} text-white text-2xl"></i>
                                        @else
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- Title & description --}}
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:{{ $gradient[0] }} group-hover:{{ $gradient[1] }} group-hover:bg-clip-text transition-all duration-300">
                                {{ $service->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-slate-400 text-sm leading-relaxed mb-6">
                                {{ $service->description }}
                            </p>

                            {{-- Features --}}
                            @if(!empty($features))
                            <ul class="space-y-3 mb-8">
                                @foreach(array_slice($features, 0, 5) as $feature)
                                <li class="flex items-start gap-3 text-sm text-gray-700 dark:text-slate-300">
                                    <div class="mt-0.5 w-5 h-5 rounded-full bg-gradient-to-br {{ $gradient[0] }} {{ $gradient[1] }} flex items-center justify-center flex-shrink-0 shadow-sm">
                                        <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <span class="flex-1">{{ $feature }}</span>
                                </li>
                                @endforeach
                                @if(count($features) > 5)
                                <li class="text-xs text-gray-500 dark:text-slate-500 pl-8 italic">
                                    +{{ count($features) - 5 }} more features included
                                </li>
                                @endif
                            </ul>
                            @endif

                            {{-- Price + CTA --}}
                            <div class="pt-6 border-t border-gray-100 dark:border-slate-700">
                                <div class="flex items-center justify-between mb-5">
                                    <div>
                                        <div class="text-3xl font-bold bg-gradient-to-r {{ $gradient[0] }} {{ $gradient[1] }} bg-clip-text text-transparent">
                                            {{ $service->formatted_price }}
                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-slate-500 mt-1">
                                            @if($service->pricing_type === 'custom') Custom pricing
                                            @elseif($service->pricing_type === 'from') Starting from
                                            @else Fixed rate
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}"
                                   class="group/btn relative w-full flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r {{ $gradient[0] }} {{ $gradient[1] }} text-white font-semibold rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl hover:scale-105">
                                    <span class="relative z-10">Request Quote</span>
                                    <svg class="relative z-10 w-5 h-5 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                    <div class="absolute inset-0 bg-white opacity-0 group-hover/btn:opacity-20 transition-opacity"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                {{-- Empty state --}}
                <div class="text-center py-32 bg-white dark:bg-slate-800/50 rounded-3xl border border-gray-200 dark:border-slate-700">
                    <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-3xl mx-auto mb-8 flex items-center justify-center shadow-2xl shadow-blue-500/20 animate-float">
                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Services Coming Soon</h3>
                    <p class="text-gray-600 dark:text-slate-400 mb-10 max-w-md mx-auto">
                        I'm currently updating my service offerings. Feel free to reach out to discuss your project needs.
                    </p>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-xl hover:shadow-xl hover:scale-105 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Contact Me
                    </a>
                </div>
                @endif
            </div>

        {{-- ── PRICING TIERS ─────────────────────────────────────────────────── --}}
        <div class="mb-20">
            <div class="text-center mb-12">
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 dark:bg-purple-900/30 rounded-full mb-6">
                    <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-sm font-semibold text-purple-600 dark:text-purple-400 uppercase tracking-wider">Investment</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-white mb-6">
                    Flexible Pricing Plans
                </h2>
                <p class="text-lg text-gray-600 dark:text-slate-300 max-w-2xl mx-auto">
                    Choose a plan that fits your project scope and budget. All plans include ongoing support and maintenance.
                </p>
            </div>

            @if($pricingTiers->count() > 0)
            <div class="grid md:grid-cols-{{ min($pricingTiers->count(), 3) }} gap-8">
                @foreach($pricingTiers as $index => $tier)
                <div class="relative group {{ $tier->is_featured ? 'md:-mt-4 md:mb-4' : '' }}">
                    {{-- Featured badge --}}
                    @if($tier->is_featured)
                    <div class="absolute -top-5 left-1/2 -translate-x-1/2 z-10">
                        <div class="flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 rounded-full shadow-xl">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-sm font-bold text-white">Most Popular</span>
                        </div>
                    </div>
                    @endif

                    <div class="relative h-full bg-white dark:bg-slate-800/90 backdrop-blur-xl rounded-3xl overflow-hidden border-2 {{ $tier->is_featured ? 'border-purple-500 dark:border-purple-400 shadow-2xl shadow-purple-500/20' : 'border-gray-200 dark:border-slate-700' }} hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 p-8">
                        
                        {{-- Gradient overlay --}}
                        @if($tier->is_featured)
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5"></div>
                        @endif

                        <div class="relative">
                            {{-- Plan name --}}
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                                {{ $tier->name }}
                            </h3>
                            
                            {{-- Price --}}
                            <div class="mb-4">
                                <div class="text-5xl font-extrabold bg-gradient-to-r {{ $tier->is_featured ? 'from-purple-600 to-pink-600' : 'from-blue-600 to-cyan-600' }} bg-clip-text text-transparent">
                                    {{ $tier->price }}
                                </div>
                            </div>
                            
                            {{-- Description --}}
                            <p class="text-gray-600 dark:text-slate-400 mb-8 leading-relaxed">
                                {{ $tier->description }}
                            </p>
                            
                            {{-- CTA Button --}}
                            <a href="{{ route('contact') }}"
                               class="w-full flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:scale-105 {{ $tier->is_featured ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/30 hover:shadow-xl' : 'bg-gray-100 dark:bg-slate-700 text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                                Get Started
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Default pricing tiers if none are configured --}}
            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['Basic','KES 25K – 50K','Perfect for small projects, UI/UX design, graphics, and simple APIs',false,'from-blue-500','to-cyan-500'],
                    ['Standard','KES 50K – 100K','Ideal for web apps, e-commerce platforms, and REST API development',true,'from-purple-500','to-pink-500'],
                    ['Enterprise','KES 100K+','Complete business systems, complex integrations, and custom solutions',false,'from-orange-500','to-red-500'],
                ] as [$tier,$price,$desc,$featured,$from,$to])
                <div class="relative group {{ $featured ? 'md:-mt-4 md:mb-4' : '' }}">
                    @if($featured)
                    <div class="absolute -top-5 left-1/2 -translate-x-1/2 z-10">
                        <div class="flex items-center gap-1.5 px-4 py-2 bg-gradient-to-r from-yellow-400 via-orange-400 to-red-400 rounded-full shadow-xl">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <span class="text-sm font-bold text-white">Most Popular</span>
                        </div>
                    </div>
                    @endif

                    <div class="relative h-full bg-white dark:bg-slate-800/90 backdrop-blur-xl rounded-3xl overflow-hidden border-2 {{ $featured ? 'border-purple-500 dark:border-purple-400 shadow-2xl shadow-purple-500/20' : 'border-gray-200 dark:border-slate-700' }} hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 p-8">
                        @if($featured)
                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500/5 to-pink-500/5"></div>
                        @endif

                        <div class="relative">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ $tier }}</h3>
                            <div class="mb-4">
                                <div class="text-5xl font-extrabold bg-gradient-to-r {{ $from }} {{ $to }} bg-clip-text text-transparent">
                                    {{ $price }}
                                </div>
                            </div>
                            <p class="text-gray-600 dark:text-slate-400 mb-8 leading-relaxed">{{ $desc }}</p>
                            <a href="{{ route('contact') }}"
                               class="w-full flex items-center justify-center gap-2 px-6 py-4 rounded-xl font-semibold transition-all duration-300 hover:scale-105 {{ $featured ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg shadow-purple-500/30 hover:shadow-xl' : 'bg-gray-100 dark:bg-slate-700 text-gray-900 dark:text-white hover:bg-gray-200 dark:hover:bg-slate-600' }}">
                                Get Started
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>

        {{-- ── HOW IT WORKS ──────────────────────────────────────────────────── --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 p-6 lg:p-8 mt-4">
            <div class="mb-12">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Process</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">How It Works</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach([
                    ['1','Consultation','We discuss your project requirements, goals, and vision.'],
                    ['2','Planning','I design the solution architecture and project timeline.'],
                    ['3','Development','I build your system with regular updates and feedback.'],
                    ['4','Delivery','Testing, deployment, training, and ongoing support.'],
                ] as [$num,$title,$desc])
                <div class="relative bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-6 hover:border-blue-300 hover:shadow-md transition-all group">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-extrabold text-lg mb-4 group-hover:scale-110 transition-transform shadow-md shadow-blue-500/20">
                        {{ $num }}
                    </div>
                    <h3 class="font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-2 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $title }}</h3>
                    <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 leading-relaxed">{{ $desc }}</p>
                    @if($num < '4')
                    <div class="hidden lg:block absolute top-10 -right-3 w-6 h-px bg-gray-300"></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

        {{-- ── WHY CHOOSE ME ─────────────────────────────────────────────────── --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 p-6 lg:p-8 mt-4">
            <div class="mb-12">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Advantages</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Why Choose Me</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['from-green-500','to-green-600','M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z','Real-World Experience','Proven solutions for actual businesses and organisations.'],
                    ['from-blue-500','to-blue-600','M13 10V3L4 14h7v7l9-11h-7z','Scalable Solutions','Built to grow with your business needs over time.'],
                    ['from-purple-500','to-purple-600','M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4','Clean Code','Maintainable, well-documented, and easy to extend.'],
                    ['from-yellow-500','to-orange-500','M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z','Fast Communication','Regular updates and quick response times throughout.'],
                    ['from-red-500','to-pink-500','M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z','Dedicated Support','Ongoing maintenance and support after delivery.'],
                    ['from-indigo-500','to-blue-600','M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4','Flexible Pricing','Custom pricing based on your budget and requirements.'],
                ] as [$from,$to,$icon,$title,$desc])
                <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-6 hover:border-blue-300 hover:shadow-md transition-all group flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br {{ $from }} {{ $to }} flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform shadow-sm">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-1 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 leading-relaxed">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ── PORTFOLIO PREVIEW ─────────────────────────────────────────────── --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 p-6 lg:p-8 mt-4">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-12">
                <div>
                    <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Examples</p>
                    <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Recent Projects</h2>
                    <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                </div>
                <a href="{{ route('portfolio') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-blue-600 dark:text-blue-400 transition-colors duration-300 hover:text-blue-700 transition-colors flex-shrink-0">
                    View full portfolio
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </div>

            @if($recentProjects->count() > 0)
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @php
                    $gradients = [
                        ['from-blue-500', 'to-purple-600'],
                        ['from-green-500', 'to-teal-600'],
                        ['from-orange-500', 'to-red-500'],
                        ['from-pink-500', 'to-rose-600'],
                        ['from-indigo-500', 'to-blue-600'],
                        ['from-yellow-500', 'to-orange-500'],
                    ];
                @endphp
                @foreach($recentProjects as $index => $project)
                @php
                    $gradient = $gradients[$index % count($gradients)];
                    $projectImage = is_array($project->images) && count($project->images) > 0 ? $project->images[0] : null;
                @endphp
                <div class="group bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl overflow-hidden hover:border-blue-300 hover:shadow-md transition-all">
                    @if($projectImage)
                    <div class="h-40 overflow-hidden bg-gray-200 dark:bg-gray-800">
                        <img src="{{ asset('storage/' . $projectImage) }}" 
                             alt="{{ $project->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                    @else
                    <div class="h-40 bg-gradient-to-br {{ $gradient[0] }} {{ $gradient[1] }} group-hover:opacity-90 transition-opacity"></div>
                    @endif
                    <div class="p-5">
                        <h3 class="font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-1 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $project->title }}</h3>
                        <p class="text-sm text-gray-500 dark:text-slate-400 transition-colors duration-300 mb-3">{{ Str::limit($project->short_description ?? $project->description, 60) }}</p>
                        <a href="{{ route('portfolio.show', $project->slug) }}"
                           class="inline-flex items-center gap-1 text-sm font-semibold text-blue-600 dark:text-blue-400 transition-colors duration-300 hover:text-blue-700 transition-colors">
                            View project
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            {{-- Empty state --}}
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-2">No projects yet</h3>
                <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 mb-6">Check back soon for examples of my work.</p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                    Contact Me
                </a>
            </div>
            @endif
        </div>

        {{-- ── CTA ───────────────────────────────────────────────────────────── --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 mt-4 mb-4">
            <div class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 p-10 lg:p-16 text-center">
                <div class="pointer-events-none absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/5 blur-2xl"></div>
                <div class="pointer-events-none absolute -bottom-20 -left-20 w-64 h-64 rounded-full bg-white/5 blur-2xl"></div>
                <div class="relative z-10">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-white mb-4">Have a project in mind?</h2>
                    <p class="text-blue-100 text-lg mb-10 max-w-xl mx-auto">Let's build it together. Contact me today to discuss your requirements and get a custom quote.</p>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-7 py-3.5 bg-white text-blue-700 font-bold rounded-xl hover:bg-blue-50 transition-all hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Hire Me
                        </a>
                        <a href="{{ route('contact') }}"
                           class="inline-flex items-center gap-2 px-7 py-3.5 bg-white/10 text-white font-semibold rounded-xl border border-white/20 hover:bg-white/20 transition-all hover:scale-105">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Request a Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
