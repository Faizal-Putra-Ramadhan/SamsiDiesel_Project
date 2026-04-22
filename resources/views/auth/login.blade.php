<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login - {{ config('app.name', 'AutoSamsi') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-[Inter] text-gray-900 bg-gray-50 flex items-center justify-center min-h-screen relative overflow-hidden">
    <!-- Decorative abstract background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden -z-10">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-blue-600/10 blur-[100px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-600/10 blur-[100px]"></div>
    </div>

    <div class="w-full max-w-5xl mx-auto flex rounded-3xl shadow-2xl bg-white/80 backdrop-blur-xl overflow-hidden border border-white/50 min-h-[600px]">
        <!-- Image Section -->
        <div class="hidden lg:block lg:w-1/2 relative">
            <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?auto=format&fit=crop&q=80&w=1000" class="absolute inset-0 w-full h-full object-cover" alt="Workshop">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 to-gray-900/20 flex flex-col justify-end p-12 text-white">
                <h2 class="text-4xl font-bold mb-4 drop-shadow-md">AutoSamsi Auto Workshop</h2>
                <p class="text-lg text-gray-200 drop-shadow-md">Professional maintenance and repair services for your vehicle. Trust us to keep you moving.</p>
            </div>
        </div>

        <!-- Form Section -->
        <div class="w-full lg:w-1/2 p-8 sm:p-12 md:p-16 flex flex-col justify-center">
            <div class="mb-10 text-center lg:text-left">
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Welcome Back</h1>
                <p class="text-gray-500 mt-2">Please enter your details to sign in.</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-600 bg-green-50 p-3 rounded-xl border border-green-200" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6 lg:space-y-8">
                @csrf

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="text-gray-900 pl-10 block w-full rounded-xl border-gray-300 bg-gray-50 border shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors py-3 sm:text-sm" placeholder="john@example.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs" />
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500 transition-colors">Forgot password?</a>
                        @endif
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password" class="text-gray-900 pl-10 block w-full rounded-xl border-gray-300 bg-gray-50 border shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors py-3 sm:text-sm" placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-xs" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 transition-colors">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600 font-medium cursor-pointer">Remember me for 30 days</label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-md text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all active:scale-[0.98]">
                        Sign in to account
                    </button>
                </div>
                

            </form>
        </div>
    </div>
</body>
</html>
