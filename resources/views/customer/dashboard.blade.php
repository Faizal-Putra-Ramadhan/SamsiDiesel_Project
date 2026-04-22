<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600 dark:text-gray-400">Pantau kondisi kendaraan dan riwayat servis Anda di sini.</p>
                </div>
            </div>

            <!-- Stats/Overview -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-red-600">
                    <p class="text-sm text-gray-500 uppercase font-bold">Total Kendaraan</p>
                    <p class="text-3xl font-bold dark:text-white">{{ $vehicles->count() }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-blue-600">
                    <p class="text-sm text-gray-500 uppercase font-bold">Servis Terakhir</p>
                    <p class="text-xl font-bold dark:text-white">
                        {{ $vehicles->sortByDesc('last_service_date')->first()?->last_service_date ?? 'Belum ada' }}
                    </p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-green-600">
                    <p class="text-sm text-gray-500 uppercase font-bold">Booking Servis</p>
                    <a href="https://wa.me/6281234567890" target="_blank" class="text-red-600 font-bold hover:underline">Hubungi Toko &rarr;</a>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('customer.vehicles') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold transition">Kelola Kendaraan</a>
                <a href="{{ route('customer.history') }}" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-3 rounded-xl font-bold transition border border-gray-700">Riwayat Servis</a>
                <a href="{{ route('customer.complaints') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-900 px-6 py-3 rounded-xl font-bold transition">Kirim Keluhan</a>
            </div>
        </div>
    </div>
</x-app-layout>
