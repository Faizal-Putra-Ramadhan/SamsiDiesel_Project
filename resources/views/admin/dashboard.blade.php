<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Admin - Autosamsi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border-b-4 border-red-600">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Pelanggan</p>
                    <p class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $stats['customers'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border-b-4 border-blue-600">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Kendaraan</p>
                    <p class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $stats['vehicles'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border-b-4 border-yellow-600">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Keluhan Pending</p>
                    <p class="text-4xl font-extrabold text-gray-900 dark:text-white">{{ $stats['pending_complaints'] }}</p>
                </div>
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border-b-4 border-green-600">
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Export Data</p>
                    <a href="{{ route('admin.export-excel') }}" class="inline-block mt-2 text-green-600 font-bold hover:underline">Download Excel &darr;</a>
                </div>
            </div>

            <!-- Management Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-12">
                <a href="{{ route('admin.customers') }}" class="group bg-gray-900 p-8 rounded-3xl border border-gray-800 hover:border-red-600 transition">
                    <div class="w-12 h-12 bg-red-600/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-red-600 transition">
                        <svg class="w-6 h-6 text-red-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Manajemen Customer</h3>
                    <p class="text-gray-500 mt-2">Lihat daftar pelanggan, data kendaraan, dan kirim notifikasi WhatsApp.</p>
                </a>

                <a href="{{ route('admin.services') }}" class="group bg-gray-900 p-8 rounded-3xl border border-gray-800 hover:border-red-600 transition">
                    <div class="w-12 h-12 bg-blue-600/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600 transition">
                        <svg class="w-6 h-6 text-blue-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Catat Servis</h3>
                    <p class="text-gray-500 mt-2">Input riwayat servis baru untuk kendaraan pelanggan.</p>
                </a>

                <a href="{{ route('admin.products') }}" class="group bg-gray-900 p-8 rounded-3xl border border-gray-800 hover:border-red-600 transition">
                    <div class="w-12 h-12 bg-green-600/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-green-600 transition">
                        <svg class="w-6 h-6 text-green-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Spareparts</h3>
                    <p class="text-gray-500 mt-2">Kelola produk yang tampil di halaman depan website.</p>
                </a>

                <a href="{{ route('admin.complaints') }}" class="group bg-gray-900 p-8 rounded-3xl border border-gray-800 hover:border-red-600 transition">
                    <div class="w-12 h-12 bg-yellow-600/10 rounded-xl flex items-center justify-center mb-4 group-hover:bg-yellow-600 transition">
                        <svg class="w-6 h-6 text-yellow-600 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Keluhan Masuk</h3>
                    <p class="text-gray-500 mt-2">Lihat dan tangani feedback dari pelanggan.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
