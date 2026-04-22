<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autosamsi - Solusi Perawatan Kendaraan Anda</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-gray-950 text-gray-200 antialiased">
    <!-- Navbar -->
    <nav class="fixed w-full z-50 bg-gray-950/80 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-red-600 tracking-tighter uppercase">Auto<span class="text-white">samsi</span></span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#home" class="hover:text-red-500 transition">Beranda</a>
                    <a href="#services" class="hover:text-red-500 transition">Layanan</a>
                    <a href="#products" class="hover:text-red-500 transition">Sparepart</a>
                </div>
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 border border-gray-700 hover:bg-gray-800 rounded-lg transition">Logout</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center pt-16">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/img/autosamsi_workshop_hero_1775454712728.png') }}" class="w-full h-full object-cover opacity-30" alt="Workshop Hero">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-transparent to-transparent"></div>
        </div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-6 tracking-tight">
                    Perawatan Premium untuk <span class="text-red-600">Kendaraan Anda.</span>
                </h1>
                <p class="text-xl text-gray-400 mb-8 leading-relaxed">
                    Bengket Autosamsi melayani dengan standar profesionalitas tinggi, peralatan modern, dan teknisi berpengalaman.
                </p>
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="#products" class="px-8 py-4 bg-red-600 hover:bg-red-700 text-white text-lg font-bold rounded-xl transition shadow-lg shadow-red-600/20">Belanja Sekarang</a>
                    <a href="https://shope.ee" target="_blank" class="px-8 py-4 bg-white hover:bg-gray-100 text-gray-900 text-lg font-bold rounded-xl transition">Kunjungi Shopee</a>
                </div>

                <!-- Tracking Section -->
                <div class="bg-gray-900/40 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 max-w-xl shadow-2xl">
                    <h3 class="text-sm font-black uppercase tracking-widest text-red-600 mb-4">Lacak Kendaraan Anda</h3>
                    <form action="{{ route('track') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" name="whatsapp_number" placeholder="Masukan No. WhatsApp Pelanggan..." class="w-full bg-gray-950 border border-gray-800 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-red-600 outline-none transition" required>
                            <svg class="w-6 h-6 absolute right-4 top-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <button type="submit" class="px-8 py-4 bg-white text-gray-900 font-bold rounded-2xl hover:bg-gray-200 transition">
                            Cari
                        </button>
                    </form>
                    <p class="mt-4 text-xs text-gray-500">Masukan nomor WhatsApp yang digunakan saat pendaftaran servis.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="relative group overflow-hidden rounded-2xl">
                    <img src="{{ asset('assets/img/autosamsi_gallery_1_1775454753441.png') }}" class="w-full h-[400px] object-cover transition duration-700 group-hover:scale-110" alt="Gallery 1">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950/80 to-transparent flex items-end p-8">
                        <p class="text-xl font-semibold">Ruang Tunggu Eksklusif</p>
                    </div>
                </div>
                <div class="relative group overflow-hidden rounded-2xl">
                     <img src="{{ asset('assets/img/autosamsi_workshop_hero_1775454712728.png') }}" class="w-full h-[400px] object-cover transition duration-700 group-hover:scale-110" alt="Gallery 2">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-950/80 to-transparent flex items-end p-8">
                        <p class="text-xl font-semibold">Peralatan Diagnostik Modern</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 uppercase tracking-wider text-red-600">Layanan Kami</h2>
                <p class="text-gray-400">Kami memberikan kenyamanan dan keamanan terbaik untuk perjalanan Anda.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-900/50 p-10 rounded-3xl border border-gray-800 hover:border-red-500/50 transition">
                    <div class="w-16 h-16 bg-red-600/10 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Ganti Oli</h3>
                    <p class="text-gray-400">Pilihan oli terbaik untuk menjaga performa mesin tetap optimal dan tahan lama.</p>
                </div>
                <div class="bg-gray-900/50 p-10 rounded-3xl border border-gray-800 hover:border-red-500/50 transition">
                    <div class="w-16 h-16 bg-red-600/10 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Servis Rutin</h3>
                    <p class="text-gray-400">Pengecekan menyeluruh untuk memastikan kendaraan Anda selalu dalam kondisi prima.</p>
                </div>
                <div class="bg-gray-900/50 p-10 rounded-3xl border border-gray-800 hover:border-red-500/50 transition">
                    <div class="w-16 h-16 bg-red-600/10 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Suku Cadang</h3>
                    <p class="text-gray-400">Ketersediaan sparepart lengkap dan berkualitas tinggi untuk berbagai merk kendaraan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-8">
                <div>
                    <h2 class="text-4xl font-bold uppercase tracking-wider text-red-600 mb-4">Spareparts & Produk</h2>
                    <p class="text-gray-400 max-w-xl">Cari suku cadang kebutuhan kendaraan Anda. Bisa langsung beli di Shopee kami.</p>
                </div>
                <form action="{{ route('home') }}#products" method="GET" class="w-full md:w-auto">
                    <div class="relative">
                        <input type="text" name="search" placeholder="Cari sparepart..." value="{{ request('search') }}" class="bg-gray-800 border border-gray-700 text-white px-6 py-3 pl-12 rounded-2xl w-full md:w-80 focus:ring-2 focus:ring-red-600 outline-none">
                        <svg class="w-6 h-6 absolute left-4 top-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                    </div>
                </form>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($products as $product)
                    <div class="bg-gray-950 border border-gray-800 rounded-3xl overflow-hidden group hover:border-red-600 transition duration-300">
                        <div class="relative overflow-hidden aspect-square">
                            <img src="{{ asset('assets/img/' . $product->image_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $product->name }}">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-4 line-clamp-1">{{ $product->name }}</h3>
                            <a href="{{ $product->shopee_url }}" target="_blank" class="block w-full py-3 bg-white hover:bg-gray-100 text-gray-900 text-center font-bold rounded-xl transition">Beli di Shopee</a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center text-gray-500">
                        Tidak ada produk yang ditemukan.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500">
            <p>&copy; 2026 Autosamsi. Developed by Antigravity AI.</p>
        </div>
    </footer>
</body>
</html>
