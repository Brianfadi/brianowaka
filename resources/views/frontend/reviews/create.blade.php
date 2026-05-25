@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-white dark:bg-slate-900 transition-colors duration-300">
    {{-- ── HERO ──────────────────────────────────────────────────────────── --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-purple-700 dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 pt-24 pb-20 transition-colors duration-300">
        <!-- Enhanced Background with Animated Elements -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute -top-32 -left-32 w-[600px] h-[600px] rounded-full bg-white/5 dark:bg-indigo-500/5 blur-3xl hero-glow"></div>
            <div class="absolute -bottom-32 -right-32 w-[600px] h-[600px] rounded-full bg-white/5 dark:bg-indigo-500/5 blur-3xl hero-glow"></div>
            <!-- Floating Particles -->
            <div class="absolute top-20 left-10 w-2 h-2 bg-white/20 dark:bg-indigo-400/20 rounded-full hero-particle"></div>
            <div class="absolute top-40 right-20 w-3 h-3 bg-white/15 dark:bg-indigo-400/15 rounded-full hero-particle" style="animation-delay: 1s"></div>
            <div class="absolute bottom-40 left-20 w-2 h-2 bg-white/25 dark:bg-indigo-400/25 rounded-full hero-particle" style="animation-delay: 2s"></div>
            <div class="absolute bottom-20 right-10 w-4 h-4 bg-white/10 dark:bg-indigo-400/10 rounded-full hero-particle" style="animation-delay: 3s"></div>
            <div class="absolute top-60 left-1/2 w-2 h-2 bg-white/20 dark:bg-indigo-400/20 rounded-full hero-particle" style="animation-delay: 1.5s"></div>
        </div>

        <div class="relative z-10 w-full px-4 sm:px-6 lg:px-8 xl:px-16 text-center">
            <div class="animate-fade-in-up">
                <p class="text-sm font-semibold tracking-widest text-blue-200 uppercase mb-3">Share Your Experience</p>
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight mb-4 text-white hero-shimmer bg-gradient-to-r from-white via-blue-100 to-purple-100 bg-clip-text text-transparent">
                    Leave a Review
                </h1>
                <p class="text-xl text-blue-100 font-medium mb-8 max-w-2xl mx-auto">
                    Your feedback helps others and means a lot to me. Share your experience working together and help others make informed decisions.
                </p>
                <div class="flex flex-wrap gap-3 justify-center">
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm border border-white/20 dark:border-indigo-500/30 rounded-full text-sm transition-colors duration-300">
                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <span class="text-white">Verified Reviews</span>
                    </div>
                    <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 dark:bg-slate-800/80 backdrop-blur-sm border border-white/20 dark:border-indigo-500/30 rounded-full text-sm transition-colors duration-300">
                        <svg class="w-4 h-4 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-white">Moderated Content</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── REVIEW FORM ───────────────────────────────────────────────────── --}}
    <section class="py-20 bg-gray-50 dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="animate-slide-in-up">

            {{-- Success message --}}
            @if(session('success'))
            <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:bg-green-900/30 dark:backdrop-blur-xl border border-green-200 dark:border-green-500/30 text-green-700 dark:text-green-200 rounded-xl animate-slide-in-up transition-colors duration-300">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            {{-- Form card --}}
            <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-8 shadow-xl dark:shadow-indigo-900/50 hover-lift dashboard-card transition-colors duration-300">
                <div class="flex items-center mb-6">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-yellow-500 to-orange-600 flex items-center justify-center mr-3">
                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white bg-gradient-to-r from-yellow-600 to-orange-600 bg-clip-text text-transparent transition-colors duration-300">Share Your Experience</h2>
                </div>

                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-6">
                    @csrf

                    {{-- Name & Email --}}
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 dark:text-slate-200 mb-2 transition-colors duration-300">Your Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text" name="name" value="{{ old('name') }}" placeholder="John Doe"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-500/30 dark:bg-slate-700/50 dark:text-white rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all"
                                       @error('name') class="border-red-400" @enderror>
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
                            <label class="block text-sm font-semibold text-gray-700 dark:text-slate-200 mb-2 transition-colors duration-300">Email Address <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-500/30 dark:bg-slate-700/50 dark:text-white rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all"
                                       @error('email') class="border-red-400" @enderror>
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

                    {{-- Role --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-slate-200 mb-2 transition-colors duration-300">Your Role / Company <span class="text-gray-400 dark:text-slate-500 font-normal">(optional)</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="text" name="role" value="{{ old('role') }}" placeholder="e.g. CEO, RetailPro Kenya"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 dark:border-indigo-500/30 dark:bg-slate-700/50 dark:text-white rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all">
                        </div>
                    </div>

                    {{-- Star rating --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-slate-200 mb-2 transition-colors duration-300">Rating <span class="text-red-500">*</span></label>
                        <div class="flex gap-2" id="star-rating">
                            @for($i = 1; $i <= 5; $i++)
                            <button type="button" data-value="{{ $i }}"
                                    class="star-btn group relative text-4xl text-gray-300 hover:text-yellow-400 transition-all duration-200 focus:outline-none transform hover:scale-110"
                                    aria-label="{{ $i }} star">
                                <span class="relative">
                                    ★
                                    <span class="absolute inset-0 text-yellow-400 opacity-0 group-hover:opacity-100 transition-opacity duration-200" style="filter: drop-shadow(0 0 8px rgba(251, 191, 36, 0.5));">★</span>
                                </span>
                            </button>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input" value="{{ old('rating', 5) }}">
                        @error('rating')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Review body --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-slate-200 mb-2 transition-colors duration-300">Your Review <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <textarea name="body" rows="5" placeholder="Share your experience working with me... What did you like most? How did I help you achieve your goals?"
                                      class="w-full px-4 py-3 border border-gray-300 dark:border-indigo-500/30 dark:bg-slate-700/50 dark:text-white dark:placeholder-slate-400 rounded-xl focus:ring-2 focus:ring-blue-500 dark:focus:ring-indigo-500 focus:border-transparent transition-all resize-none"
                                      @error('body') class="border-red-400" @enderror>{{ old('body') }}</textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400 dark:text-slate-500">
                                <span id="charCount">0</span> / 1000
                            </div>
                        </div>
                        @error('body')
                        <p class="mt-1 text-sm text-red-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <button type="submit"
                            class="w-full inline-flex items-center justify-center gap-2 px-6 py-4 bg-gradient-to-r from-yellow-500 to-orange-600 hover:from-yellow-400 hover:to-orange-500 text-white font-bold rounded-xl shadow-lg hover:scale-105 transition-all duration-200 btn-ripple relative overflow-hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Submit Review
                    </button>
                </form>
            </div>

            <div class="mt-8 p-6 bg-gradient-to-r from-blue-50 to-purple-50 dark:from-slate-800 dark:to-slate-800 dark:backdrop-blur-xl border border-blue-200 dark:border-indigo-500/30 rounded-xl transition-colors duration-300">
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center mr-3 flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-2 transition-colors duration-300">Review Guidelines</h3>
                        <ul class="text-sm text-gray-600 dark:text-slate-300 space-y-1 transition-colors duration-300">
                            <li>• Your email address won't be published</li>
                            <li>• Reviews are moderated before appearing on the site</li>
                            <li>• Please be honest and constructive in your feedback</li>
                            <li>• Focus on your experience working together</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ── TESTIMONIALS PREVIEW ───────────────────────────────────────────── --}}
    @if($reviews->isNotEmpty())
    <section class="py-20 bg-white dark:bg-gradient-to-br dark:from-slate-900 dark:via-indigo-950 dark:to-slate-900 transition-colors duration-300">
        <div class="w-full px-4 sm:px-6 lg:px-8 xl:px-16">
            <div class="text-center mb-12 animate-fade-in-up">
                <p class="text-sm font-semibold tracking-widest text-blue-600 uppercase mb-2">Testimonials</p>
                <h2 class="text-4xl font-extrabold text-gray-900 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">What Others Say</h2>
                <div class="mt-3 w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full hero-shimmer mx-auto"></div>
            </div>

            @php
                $gradients = [
                    'from-gray-50 to-blue-50',
                    'from-gray-50 to-green-50',
                    'from-gray-50 to-purple-50',
                    'from-gray-50 to-orange-50',
                    'from-gray-50 to-pink-50',
                    'from-gray-50 to-teal-50',
                ];
                $avatarGradients = [
                    'from-blue-500 to-purple-600',
                    'from-green-500 to-teal-600',
                    'from-purple-500 to-pink-600',
                    'from-orange-500 to-red-600',
                    'from-pink-500 to-rose-600',
                    'from-teal-500 to-cyan-600',
                ];
            @endphp

            <div class="grid md:grid-cols-3 gap-6">
                @foreach($reviews as $i => $review)
                @php
                    $grad = $gradients[$i % count($gradients)];
                    $avatarGrad = $avatarGradients[$i % count($avatarGradients)];
                    $initials = collect(explode(' ', $review->name))->map(fn($w) => strtoupper($w[0]))->take(2)->implode('');
                    $delay = $i * 0.1;
                @endphp
                <div class="bg-white dark:bg-slate-800 dark:backdrop-blur-xl border border-gray-200 dark:border-indigo-500/30 rounded-2xl p-6 hover-lift dashboard-card animate-slide-in-up transition-colors duration-300" style="animation-delay: {{ $delay }}s">
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400 text-xl">
                            @for($s = 1; $s <= 5; $s++)
                                {{ $s <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-slate-200 mb-4 italic transition-colors duration-300">"{{ $review->body }}"</p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br {{ $avatarGrad }} flex items-center justify-center mr-3 flex-shrink-0">
                            <span class="text-white font-bold text-sm">{{ $initials }}</span>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900 dark:text-white transition-colors duration-300">{{ $review->name }}</div>
                            @if($review->role)
                            <div class="text-sm text-gray-500 dark:text-slate-300 transition-colors duration-300">{{ $review->role }}</div>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <script>
        // Enhanced star rating system
        const stars = document.querySelectorAll('.star-btn');
        const input = document.getElementById('rating-input');
        const messageField = document.querySelector('textarea[name="body"]');
        const charCount = document.getElementById('charCount');

        function setStars(val) {
            stars.forEach((s, index) => {
                const starValue = parseInt(s.dataset.value);
                if (starValue <= val) {
                    s.classList.remove('text-gray-300');
                    s.classList.add('text-yellow-400');
                    s.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        s.style.transform = 'scale(1)';
                    }, 200);
                } else {
                    s.classList.remove('text-yellow-400');
                    s.classList.add('text-gray-300');
                }
            });
            input.value = val;
        }

        // Initialize with current value
        setStars(parseInt(input.value) || 5);

        // Star interactions
        stars.forEach(s => {
            s.addEventListener('click', () => {
                setStars(parseInt(s.dataset.value));
                // Add pulse animation
                s.style.animation = 'pulse 0.5s';
                setTimeout(() => {
                    s.style.animation = '';
                }, 500);
            });
            
            s.addEventListener('mouseenter', () => {
                setStars(parseInt(s.dataset.value));
            });
        });

        document.getElementById('star-rating').addEventListener('mouseleave', () => {
            setStars(parseInt(input.value));
        });

        // Character counter for review field
        if (messageField && charCount) {
            messageField.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count;
                
                if (count > 1000) {
                    this.value = this.value.substring(0, 1000);
                    charCount.textContent = 1000;
                }
                
                if (count > 900) {
                    charCount.classList.add('text-red-500');
                } else {
                    charCount.classList.remove('text-red-500');
                }
            });
        }

        // Add pulse animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.3); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    </script>
</div>
@endsection
