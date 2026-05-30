@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300 py-4">
    <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
        
        {{-- Services Header and Grid Card --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 animate-slide-in-up">
            
            {{-- Header --}}
            <div class="p-6 lg:p-8 border-b border-gray-200 dark:border-indigo-500/20 text-center">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 uppercase mb-3">What I Offer</p>
                <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 dark:text-slate-100 mb-4">Services</h1>
                <p class="text-lg text-gray-600 dark:text-slate-400 max-w-2xl mx-auto">
                    Professional web development and digital solutions tailored to your business needs.
                </p>
            </div>

            {{-- Services Grid --}}
            <div class="p-6 lg:p-8">
                @if($services->count() > 0)
                <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($services as $service)
                    @php
                        $features = is_string($service->features)
                            ? (json_decode($service->features, true) ?? [])
                            : ($service->features ?? []);
                    @endphp
                    <div class="group relative bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 rounded-2xl p-7 hover:border-blue-300 hover:shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 transition-all duration-300 flex flex-col overflow-hidden">

                        {{-- Popular badge --}}
                        @if($service->order <= 2)
                        <div class="absolute top-4 right-4 px-2.5 py-1 bg-gradient-to-r from-yellow-400 to-orange-400 text-yellow-900 text-xs font-bold rounded-full">
                            Popular
                        </div>
                        @endif

                        {{-- Icon --}}
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mb-5 group-hover:scale-110 transition-transform shadow-md shadow-blue-500/20">
                            @if($service->icon)
                            <i class="{{ $service->icon }} text-white text-2xl"></i>
                            @else
                            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            @endif
                        </div>

                        {{-- Title & description --}}
                        <h3 class="text-xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-2 group-hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300 transition-colors">{{ $service->title }}</h3>
                        <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 text-sm leading-relaxed mb-5">{{ $service->description }}</p>

                        {{-- Features --}}
                        @if(!empty($features))
                        <ul class="space-y-2 mb-6 flex-1">
                            @foreach(array_slice($features, 0, 5) as $feature)
                            <li class="flex items-start gap-2.5 text-sm text-gray-600 dark:text-slate-400 transition-colors duration-300">
                                <span class="mt-0.5 w-4 h-4 rounded-full bg-green-100 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-2.5 h-2.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                                    </svg>
                                </span>
                                {{ $feature }}
                            </li>
                            @endforeach
                            @if(count($features) > 5)
                            <li class="text-xs text-gray-400 pl-6">+{{ count($features) - 5 }} more</li>
                            @endif
                        </ul>
                        @else
                        <div class="flex-1"></div>
                        @endif

                        {{-- Price + CTA --}}
                        <div class="pt-5 border-t border-gray-100 mt-auto">
                            <div class="flex items-end justify-between mb-4">
                                <div>
                                    <div class="text-xl font-extrabold text-blue-600 dark:text-blue-400 transition-colors duration-300">{{ $service->formatted_price }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">
                                        @if($service->pricing_type === 'custom') Tailored to your scope
                                        @elseif($service->pricing_type === 'from') Starting price
                                        @else Fixed price
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('contact') }}?service={{ urlencode($service->title) }}"
                               class="w-full flex items-center justify-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-500 hover:to-purple-500 text-white font-semibold rounded-xl transition-all duration-200 hover:scale-[1.02] shadow-md shadow-blue-500/20 text-sm">
                                Request Quote
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

                @else
                {{-- Empty state --}}
                <div class="text-center py-24">
                    <div class="w-20 h-20 bg-gray-100 rounded-2xl mx-auto mb-6 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-slate-100 transition-colors duration-300 mb-2">Services coming soon</h3>
                    <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 mb-8">I'm updating my offerings. Reach out in the meantime.</p>
                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                        Contact Me
                    </a>
                </div>
                @endif
            </div>
        </div>

        {{-- ── PRICING TIERS ─────────────────────────────────────────────────── --}}
        <div class="bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm rounded-3xl shadow-2xl dark:shadow-indigo-900/30 border border-gray-200 dark:border-indigo-500/20 overflow-hidden transition-colors duration-300 p-6 lg:p-8 mt-4">
            <div class="mb-12">
                <p class="text-sm font-semibold tracking-widest text-blue-600 dark:text-blue-400 transition-colors duration-300 uppercase mb-2">Investment</p>
                <h2 class="text-4xl font-extrabold text-gray-900 dark:text-slate-100 transition-colors duration-300">Pricing That Fits Your Needs</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                <p class="text-gray-500 dark:text-slate-400 transition-colors duration-300 mt-4 max-w-xl">Pricing depends on your project scope. These are rough ranges — get a custom quote for your specific needs.</p>
            </div>

            @if($pricingTiers->count() > 0)
            <div class="grid md:grid-cols-{{ min($pricingTiers->count(), 3) }} gap-5">
                @foreach($pricingTiers as $tier)
                <div class="relative bg-{{ $tier->is_featured ? 'gradient-to-br from-blue-600 to-purple-700' : 'gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300' }} border-2 {{ $tier->is_featured ? 'border-blue-600 shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 shadow-blue-500/15' : 'border-gray-200 dark:border-indigo-500/20 transition-colors duration-300' }} rounded-2xl p-8">
                    @if($tier->is_featured)
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold rounded-full">Most Popular</div>
                    @endif
                    <h3 class="text-lg font-extrabold mb-1 {{ $tier->is_featured ? 'text-white' : 'text-gray-900 dark:text-slate-100 transition-colors duration-300' }}">{{ $tier->name }}</h3>
                    <div class="text-3xl font-extrabold mb-2 {{ $tier->is_featured ? 'text-white' : 'text-blue-600 dark:text-blue-400 transition-colors duration-300' }}">{{ $tier->price }}</div>
                    <p class="text-sm {{ $tier->is_featured ? 'text-blue-100' : 'text-gray-500 dark:text-slate-400 transition-colors duration-300' }} mb-6">{{ $tier->description }}</p>
                    <a href="{{ route('contact') }}"
                       class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-[1.02]
                              {{ $tier->is_featured ? 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 text-blue-700 hover:bg-blue-50 dark:bg-blue-900/50 transition-colors duration-300' : 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 dark:border-indigo-500/20 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 hover:border-blue-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300' }}">
                        Get a Quote
                    </a>
                </div>
                @endforeach
            </div>
            @else
            {{-- Default pricing tiers if none are configured --}}
            <div class="grid md:grid-cols-3 gap-5">
                @foreach([
                    ['Basic','KES 25K – 50K','UI/UX Design, Graphics, Small APIs','from-blue-50','border-blue-100','text-blue-600 dark:text-blue-400 transition-colors duration-300',false],
                    ['Standard','KES 50K – 100K','Web Apps, E-commerce, REST APIs','from-blue-600','border-blue-600','text-white',true],
                    ['Enterprise','KES 100K+','Business Systems, Complex Solutions','from-gray-50','border-gray-200 dark:border-indigo-500/20 transition-colors duration-300','text-blue-600',false],
                ] as [$tier,$price,$desc,$bg,$border,$priceColor,$featured])
                <div class="relative bg-{{ $bg }} border-2 {{ $featured ? 'border-blue-600 shadow-xl dark:shadow-indigo-900/50 transition-shadow duration-300 shadow-blue-500/15' : 'border-'.$border }} rounded-2xl p-8 {{ $featured ? 'bg-gradient-to-br from-blue-600 to-purple-700 text-white' : '' }}">
                    @if($featured)
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-4 py-1 bg-yellow-400 text-yellow-900 text-xs font-bold rounded-full">Most Popular</div>
                    @endif
                    <h3 class="text-lg font-extrabold mb-1 {{ $featured ? 'text-white' : 'text-gray-900 dark:text-slate-100 transition-colors duration-300' }}">{{ $tier }}</h3>
                    <div class="text-3xl font-extrabold mb-2 {{ $featured ? 'text-white' : 'text-blue-600 dark:text-blue-400 transition-colors duration-300' }}">{{ $price }}</div>
                    <p class="text-sm {{ $featured ? 'text-blue-100' : 'text-gray-500 dark:text-slate-400 transition-colors duration-300' }} mb-6">{{ $desc }}</p>
                    <a href="{{ route('contact') }}"
                       class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl font-semibold text-sm transition-all hover:scale-[1.02]
                              {{ $featured ? 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm transition-colors duration-300 text-blue-700 hover:bg-blue-50 dark:bg-blue-900/50 transition-colors duration-300' : 'bg-white dark:bg-slate-800/80 dark:backdrop-blur-sm border border-gray-200 dark:border-indigo-500/20 transition-colors duration-300 dark:border-indigo-500/20 transition-colors duration-300 text-gray-700 dark:text-slate-300 transition-colors duration-300 hover:border-blue-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300 dark:text-blue-400 transition-colors duration-300' }}">
                        Get a Quote
                    </a>
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
