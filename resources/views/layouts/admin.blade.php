<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ \App\Models\Setting::get('site_name', 'Brian Owaka') }}</title>
    
    <!-- Favicon - Profile Photo -->
    @php
        $profilePhoto = \App\Models\Setting::get('profile_photo');
    @endphp
    @if($profilePhoto)
        <link rel="icon" type="image/x-icon" href="{{ \Storage::url($profilePhoto) }}">
        <link rel="apple-touch-icon" href="{{ \Storage::url($profilePhoto) }}">
    @else
        <!-- Default favicon if no profile photo -->
        <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>👨‍💻</text></svg>">
    @endif
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .nav-item {
            display: flex; align-items: center; gap: 0.75rem;
            padding: 0.5rem 0.75rem; border-radius: 0.5rem;
            font-size: 0.875rem; font-weight: 500;
            color: #9ca3af; transition: all 0.15s;
            text-decoration: none;
        }
        .nav-item:hover { background: #1f2937; color: #fff; }
        .nav-item.active { background: #2563eb; color: #fff; box-shadow: 0 4px 14px rgba(37,99,235,0.25); }
        .nav-icon { width: 1.125rem; height: 1.125rem; flex-shrink: 0; }
        .nav-section-label {
            font-size: 0.65rem; font-weight: 700; letter-spacing: 0.08em;
            text-transform: uppercase; color: #4b5563;
            padding: 0 0.75rem; margin-bottom: 0.375rem;
        }
        .nav-sub {
            display: block; padding: 0.375rem 0.5rem; border-radius: 0.375rem;
            font-size: 0.8125rem; color: #6b7280; transition: all 0.15s;
            text-decoration: none;
        }
        .nav-sub:hover { color: #fff; background: #1f2937; }
        .nav-sub.active { color: #93c5fd; font-weight: 600; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-950 text-gray-100">

<div class="flex h-screen overflow-hidden">

    {{-- ===== SIDEBAR ===== --}}
    <aside id="sidebar" class="w-64 bg-gray-900 border-r border-gray-800 flex flex-col flex-shrink-0 transition-all duration-300">

        {{-- Brand --}}
        <div class="flex items-center gap-3 px-6 py-5 border-b border-gray-800">
            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div>
                <p class="text-sm font-bold text-white leading-tight">Admin Panel</p>
                <p class="text-xs text-gray-400">{{ auth()->user()->name }}</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-5">

            @php
                $isActive = fn($pattern) => request()->routeIs($pattern);
                $unreadCount = \App\Models\Message::unread()->count();
            @endphp

            {{-- 1. Dashboard --}}
            <div>
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-item {{ $isActive('admin.dashboard') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Dashboard
                </a>
            </div>

            {{-- 2. Content Management --}}
            <div>
                <p class="nav-section-label">Content Management</p>

                {{-- Projects --}}
                <div x-data="{ open: {{ $isActive('admin.projects*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.projects*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                        </svg>
                        Projects
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.projects.index') }}" class="nav-sub {{ $isActive('admin.projects.index') ? 'active' : '' }}">All Projects</a>
                        <a href="{{ route('admin.projects.create') }}" class="nav-sub {{ $isActive('admin.projects.create') ? 'active' : '' }}">Add Project</a>
                    </div>
                </div>

                {{-- Products --}}
                <div x-data="{ open: {{ $isActive('admin.products*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.products*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        Products
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.products.index') }}" class="nav-sub {{ $isActive('admin.products.index') ? 'active' : '' }}">All Products</a>
                        <a href="{{ route('admin.products.create') }}" class="nav-sub {{ $isActive('admin.products.create') ? 'active' : '' }}">Add Product</a>
                    </div>
                </div>

                {{-- Services --}}
                <div x-data="{ open: {{ $isActive('admin.services*') || $isActive('admin.pricing-tiers*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.services*') || $isActive('admin.pricing-tiers*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Services
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.services.index') }}" class="nav-sub {{ $isActive('admin.services.index') ? 'active' : '' }}">All Services</a>
                        <a href="{{ route('admin.services.create') }}" class="nav-sub {{ $isActive('admin.services.create') ? 'active' : '' }}">Add Service</a>
                        <a href="{{ route('admin.pricing-tiers.index') }}" class="nav-sub {{ $isActive('admin.pricing-tiers*') ? 'active' : '' }}">Pricing Tiers</a>
                    </div>
                </div>

                {{-- Categories --}}
                <a href="{{ route('admin.categories.index') }}"
                   class="nav-item {{ $isActive('admin.categories*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Categories
                </a>

                {{-- Hero Offers --}}
                <div x-data="{ open: {{ $isActive('admin.hero-offers*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.hero-offers*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                        </svg>
                        Hero Offers
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.hero-offers.index') }}" class="nav-sub {{ $isActive('admin.hero-offers.index') ? 'active' : '' }}">All Offers</a>
                        <a href="{{ route('admin.hero-offers.create') }}" class="nav-sub {{ $isActive('admin.hero-offers.create') ? 'active' : '' }}">Add Offer</a>
                    </div>
                </div>
            </div>

            {{-- 3. Personal Branding --}}
            <div>
                <p class="nav-section-label">Personal Branding</p>

                {{-- Profile / About --}}
                <a href="{{ route('profile.edit') }}"
                   class="nav-item {{ $isActive('profile*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Profile / About
                </a>

                {{-- Skills --}}
                <div x-data="{ open: {{ $isActive('admin.skills*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.skills*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                        Skills
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.skills.index') }}" class="nav-sub {{ $isActive('admin.skills.index') ? 'active' : '' }}">All Skills</a>
                        <a href="{{ route('admin.skills.create') }}" class="nav-sub {{ $isActive('admin.skills.create') ? 'active' : '' }}">Add Skill</a>
                    </div>
                </div>

                {{-- Experience --}}
                <div x-data="{ open: {{ $isActive('admin.experiences*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.experiences*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        Experience
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.experiences.index') }}" class="nav-sub {{ $isActive('admin.experiences.index') ? 'active' : '' }}">All Experience</a>
                        <a href="{{ route('admin.experiences.create') }}" class="nav-sub {{ $isActive('admin.experiences.create') ? 'active' : '' }}">Add Experience</a>
                    </div>
                </div>

                {{-- Education --}}
                <div x-data="{ open: {{ $isActive('admin.education*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.education*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                        Education
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.education.index') }}" class="nav-sub {{ $isActive('admin.education.index') ? 'active' : '' }}">All Education</a>
                        <a href="{{ route('admin.education.create') }}" class="nav-sub {{ $isActive('admin.education.create') ? 'active' : '' }}">Add Education</a>
                    </div>
                </div>
            </div>

            {{-- 4. Documents --}}
            <div>
                <p class="nav-section-label">Documents</p>

                {{-- CV / Resume (links to settings) --}}
                <a href="{{ route('admin.settings.index', ['tab' => 'general']) }}"
                   class="nav-item {{ $isActive('admin.settings*') && request('tab') === 'general' ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    CV / Resume
                </a>

                {{-- Files --}}
                <div x-data="{ open: {{ $isActive('admin.files*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.files*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                        </svg>
                        Files
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.files.index') }}" class="nav-sub {{ $isActive('admin.files.index') ? 'active' : '' }}">All Files</a>
                        <a href="{{ route('admin.files.create') }}" class="nav-sub {{ $isActive('admin.files.create') ? 'active' : '' }}">Upload File</a>
                    </div>
                </div>
            </div>

            {{-- 5. Communication --}}
            <div>
                <p class="nav-section-label">Communication</p>

                {{-- Messages --}}
                <a href="{{ route('admin.messages.index') }}"
                   class="nav-item {{ $isActive('admin.messages*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Messages
                    @if($unreadCount > 0)
                        <span class="ml-auto bg-red-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">{{ $unreadCount }}</span>
                    @endif
                </a>

                {{-- Reviews --}}
                @php $pendingReviews = \App\Models\Review::pending()->count(); @endphp
                <a href="{{ route('admin.reviews.index') }}"
                   class="nav-item {{ $isActive('admin.reviews*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                    Reviews
                    @if($pendingReviews > 0)
                        <span class="ml-auto bg-yellow-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">{{ $pendingReviews }}</span>
                    @endif
                </a>

                {{-- Newsletter --}}
                <a href="{{ route('admin.newsletters.index') }}"
                   class="nav-item {{ $isActive('admin.newsletters*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                    Newsletter
                    @php $subscribersCount = \App\Models\Newsletter::subscribed()->count(); @endphp
                    @if($subscribersCount > 0)
                        <span class="ml-auto bg-emerald-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">{{ $subscribersCount }}</span>
                    @endif
                </a>

                {{-- Testimonials --}}
                <a href="{{ route('admin.testimonials.index') }}"
                   class="nav-item {{ $isActive('admin.testimonials*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                    Testimonials
                </a>
            </div>

            {{-- 6. Business / Sales --}}
            <div>
                <p class="nav-section-label">Business &amp; Sales</p>

                {{-- Advertisements --}}
                <div x-data="{ open: {{ $isActive('admin.advertisements*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.advertisements*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m0 0V1a1 1 0 011-1h2a1 1 0 011 1v18a1 1 0 01-1 1H4a1 1 0 01-1-1V1a1 1 0 011-1h2a1 1 0 011 1v3m0 0h8m-8 0V1"/>
                        </svg>
                        Advertisements
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.advertisements.index') }}" class="nav-sub {{ $isActive('admin.advertisements.index') ? 'active' : '' }}">All Advertisements</a>
                        <a href="{{ route('admin.advertisements.create') }}" class="nav-sub {{ $isActive('admin.advertisements.create') ? 'active' : '' }}">Create Advertisement</a>
                    </div>
                </div>

                {{-- Orders --}}
                <div x-data="{ open: {{ $isActive('admin.orders*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.orders*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Orders
                        @php $pendingOrders = \App\Models\Order::pending()->count(); @endphp
                        @if($pendingOrders > 0)
                            <span class="ml-auto bg-yellow-500 text-white text-xs font-bold px-1.5 py-0.5 rounded-full leading-none">{{ $pendingOrders }}</span>
                        @endif
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.orders.index') }}" class="nav-sub {{ $isActive('admin.orders.index') ? 'active' : '' }}">All Orders</a>
                        <a href="{{ route('admin.orders.create') }}" class="nav-sub {{ $isActive('admin.orders.create') ? 'active' : '' }}">Create Order</a>
                    </div>
                </div>

                {{-- Transactions --}}
                <a href="{{ route('admin.transactions.index') }}"
                   class="nav-item {{ $isActive('admin.transactions*') ? 'active' : '' }}">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Transactions
                </a>
            </div>

            {{-- 7. System Settings --}}
            <div>
                <p class="nav-section-label">System Settings</p>

                {{-- General Settings --}}
                <div x-data="{ open: {{ $isActive('admin.settings*') ? 'true' : 'false' }} }">
                    <button @click="open = !open" class="nav-item w-full {{ $isActive('admin.settings*') ? 'active' : '' }}">
                        <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Settings
                        <svg class="ml-auto w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="mt-1 ml-4 space-y-0.5 border-l border-gray-800 pl-3">
                        <a href="{{ route('admin.settings.index', ['tab' => 'general']) }}" class="nav-sub {{ $isActive('admin.settings*') && request('tab','general') === 'general' ? 'active' : '' }}">General</a>
                        <a href="{{ route('admin.settings.index', ['tab' => 'contact']) }}" class="nav-sub {{ $isActive('admin.settings*') && request('tab') === 'contact' ? 'active' : '' }}">Contact Info</a>
                        <a href="{{ route('admin.settings.index', ['tab' => 'social']) }}" class="nav-sub {{ $isActive('admin.settings*') && request('tab') === 'social' ? 'active' : '' }}">Social Links</a>
                        <a href="{{ route('admin.settings.index', ['tab' => 'seo']) }}" class="nav-sub {{ $isActive('admin.settings*') && request('tab') === 'seo' ? 'active' : '' }}">SEO</a>
                    </div>
                </div>
            </div>

        </nav>

        {{-- Bottom: quick actions --}}
        <div class="px-3 py-4 border-t border-gray-800 space-y-1">
            <a href="{{ route('home') }}" target="_blank" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                View Site
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-item w-full text-red-500/80 hover:!text-red-400 hover:!bg-red-900/30">
                    <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    {{-- ===== MAIN AREA ===== --}}
    <div class="flex-1 flex flex-col overflow-hidden">

        {{-- Top bar --}}
        <header class="bg-gray-900 border-b border-gray-800 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <div>
                <h1 class="text-lg font-semibold text-white">@yield('page-title', 'Dashboard')</h1>
                <p class="text-xs text-gray-500">@yield('page-subtitle', 'Welcome back, ' . auth()->user()->name)</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-xs text-gray-500">{{ now()->format('D, M j Y') }}</span>
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white text-sm font-bold">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </header>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="mx-6 mt-4 px-4 py-3 bg-green-900/50 border border-green-700 text-green-300 rounded-lg text-sm flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mx-6 mt-4 px-4 py-3 bg-red-900/50 border border-red-700 text-red-300 rounded-lg text-sm flex items-center gap-2">
                <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Page content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
