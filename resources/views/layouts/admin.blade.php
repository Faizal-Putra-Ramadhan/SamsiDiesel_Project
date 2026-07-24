<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Autosamsi') }} &mdash; Admin</title>

    <link rel="icon" href="{{ asset('template/img/logo.png') }}">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/admin.css', 'resources/js/app.js'])
</head>
<body class="dark font-sans antialiased h-full bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100" x-data="{ sidebarOpen: false }">

    @include('components.sidebar')

    <div class="lg:ml-[260px] min-h-full flex flex-col">
        <!-- Topbar -->
        <header class="sticky top-0 z-40 bg-white/80 backdrop-blur-md border-b border-slate-200/80">
            <div class="flex items-center justify-between h-14 px-4 lg:px-6">
                <!-- Left: Hamburger + Breadcrumb -->
                <div class="flex items-center gap-3">
                    <button @click="sidebarOpen = !sidebarOpen"
                            class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-500 hover:text-slate-700 hover:bg-slate-100 transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)] active:scale-[0.96]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    @isset($header)
                        <nav class="hidden sm:flex items-center gap-1.5 text-[13px] text-slate-500">
                            <span class="text-slate-400">Admin</span>
                            <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                            <span class="font-medium text-slate-700">{{ strip_tags($header) }}</span>
                        </nav>
                    @endisset
                </div>

                <!-- Right: Actions + User -->
                <div class="flex items-center gap-2">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center gap-2.5 px-2 py-1.5 rounded-xl text-sm text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]">
                                <div class="flex items-center justify-center w-7 h-7 rounded-full bg-slate-200 text-slate-600 text-[11px] font-semibold uppercase">
                                    {{ substr(Auth::user()->name, 0, 2) }}
                                </div>
                                <span class="hidden sm:inline text-[13px] font-medium">{{ Auth::user()->name }}</span>
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
