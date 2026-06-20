<aside
    class="fixed inset-y-0 left-0 z-50 flex flex-col w-[260px] bg-slate-900 text-slate-300
           transform -translate-x-full lg:translate-x-0
           transition-transform duration-300 ease-[cubic-bezier(0.32,0.72,0,1)]"
    :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen, 'lg:translate-x-0': true }"
    x-cloak
>
    <!-- Mobile overlay -->
    <div
        x-show="sidebarOpen"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm lg:hidden z-[-1]"
        x-transition.opacity.duration.300ms
    ></div>

    <!-- Logo -->
    <div class="flex items-center gap-3 h-16 px-5 border-b border-slate-800 shrink-0">
        <div class="flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600/20">
            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
            </svg>
        </div>
        <span class="text-sm font-semibold text-slate-100 tracking-tight">Autosamsi</span>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]
                  {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-slate-50 border-l-[3px] border-blue-500' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
            <svg class="w-[18px] h-[18px] shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-slate-500' }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z" />
            </svg>
            Dashboard
        </a>

        <a href="{{ route('admin.customers') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]
                  {{ request()->routeIs('admin.customers') ? 'bg-slate-800 text-slate-50 border-l-[3px] border-blue-500' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
            <svg class="w-[18px] h-[18px] shrink-0 {{ request()->routeIs('admin.customers') ? 'text-blue-500' : 'text-slate-500' }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Customer
        </a>

        <a href="{{ route('admin.services') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]
                  {{ request()->routeIs('admin.services') ? 'bg-slate-800 text-slate-50 border-l-[3px] border-blue-500' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
            <svg class="w-[18px] h-[18px] shrink-0 {{ request()->routeIs('admin.services') ? 'text-blue-500' : 'text-slate-500' }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            Servis
        </a>

        <a href="{{ route('admin.products') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]
                  {{ request()->routeIs('admin.products') ? 'bg-slate-800 text-slate-50 border-l-[3px] border-blue-500' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
            <svg class="w-[18px] h-[18px] shrink-0 {{ request()->routeIs('admin.products') ? 'text-blue-500' : 'text-slate-500' }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            Produk
        </a>

        <a href="{{ route('admin.complaints') }}"
           class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-[13px] font-medium transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)]
                  {{ request()->routeIs('admin.complaints') ? 'bg-slate-800 text-slate-50 border-l-[3px] border-blue-500' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/50' }}">
            <svg class="w-[18px] h-[18px] shrink-0 {{ request()->routeIs('admin.complaints') ? 'text-blue-500' : 'text-slate-500' }}" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            Keluhan
        </a>
    </nav>

    <!-- User Footer -->
    <div class="border-t border-slate-800 p-3 shrink-0" x-data="{ open: false }">
        <button @click="open = !open"
                class="flex items-center gap-3 w-full px-3 py-2 rounded-xl text-left transition-all duration-200 ease-[cubic-bezier(0.16,1,0.3,1)] hover:bg-slate-800/50">
            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-slate-700 text-slate-300 text-xs font-semibold uppercase ring-2 ring-slate-600 shrink-0">
                {{ substr(Auth::user()->name, 0, 2) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-[13px] font-medium text-slate-200 truncate">{{ Auth::user()->name }}</p>
                <p class="text-[11px] text-slate-500 truncate">Admin Autosamsi</p>
            </div>
            <svg class="w-4 h-4 text-slate-500 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <div x-show="open"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-1"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-1"
             class="mt-1 px-2 py-1 space-y-0.5">
            <a href="{{ route('profile.edit') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-[13px] text-slate-400 hover:text-slate-200 hover:bg-slate-800/50 transition-colors duration-150">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-[13px] text-slate-400 hover:text-red-400 hover:bg-slate-800/50 transition-colors duration-150 w-full text-left">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </div>
</aside>
