<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lacak Servis - Autosamsi</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .gradient-text {
            background: linear-gradient(to right, #ef4444, #dc2626);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-950 text-gray-200 antialiased">
    <!-- Navbar (Same as Welcome) -->
    <nav class="fixed w-full z-50 bg-gray-950/80 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <a href="/" class="text-2xl font-bold text-red-600 tracking-tighter uppercase">Auto<span class="text-white">samsi</span></a>
                </div>
                <div class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="/#home" class="hover:text-red-500 transition">Beranda</a>
                    <a href="/#services" class="hover:text-red-500 transition">Layanan</a>
                    <a href="/#products" class="hover:text-red-500 transition">Sparepart</a>
                </div>
                <div class="flex space-x-4">
                    @auth
                        <a href="{{ url('/admin/dashboard') }}" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-lg transition uppercase tracking-widest">Dashboard</a>
                    @else
                        <a href="/autosamsi-karyawan" class="px-4 py-2 border border-gray-800 hover:bg-gray-900 text-gray-400 text-xs font-bold rounded-lg transition uppercase tracking-widest">Karyawan</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="pt-32 pb-24">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Header -->
            <div class="mb-16">
                <h1 class="text-5xl md:text-6xl font-black text-white mb-6 tracking-tighter uppercase leading-none">
                    Lacak <span class="text-red-600">Progres.</span>
                </h1>
                
                <div class="bg-gray-900/50 backdrop-blur-xl p-8 rounded-3xl border border-gray-800 shadow-2xl">
                    <form action="{{ route('track') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                        <div class="relative flex-1">
                            <input type="text" name="whatsapp_number" value="{{ request('whatsapp_number') }}" placeholder="Masukan No. WhatsApp Pelanggan..." class="w-full bg-gray-950 border border-gray-800 text-white px-6 py-4 rounded-2xl focus:ring-2 focus:ring-red-600 outline-none transition" required>
                            <svg class="w-6 h-6 absolute right-4 top-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                        </div>
                        <button type="submit" class="px-10 py-4 bg-white text-gray-900 font-black rounded-2xl hover:bg-gray-200 transition uppercase tracking-widest text-sm">
                            Cari Data
                        </button>
                    </form>
                    
                    @if(session('error'))
                        <div class="mt-4 text-red-500 text-sm font-bold flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" /></svg>
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>

            @if($user)
            <!-- Identity -->
            <div class="mb-12 border-l-4 border-red-600 pl-6">
                <p class="text-xs font-black uppercase tracking-widest text-red-600 mb-1">Data Pelanggan</p>
                <h2 class="text-4xl font-black text-white uppercase">{{ $user->name }}</h2>
                <p class="text-gray-400 mt-1">Ditemukan {{ $vehicles->count() }} unit kendaraan terdaftar.</p>
            </div>

            <!-- Vehicles List -->
            <div class="space-y-16">
                @foreach($vehicles as $vehicle)
                <div class="relative group">
                    <!-- Unit Header -->
                    <div class="flex flex-col md:flex-row justify-between items-end mb-6 gap-6">
                        <div>
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-gray-800 text-gray-400 text-[10px] font-black px-2 py-1 rounded">PLAT NOMOR</span>
                                <span class="text-red-500 font-black text-2xl tracking-tighter">{{ $vehicle->plate_number }}</span>
                            </div>
                            <h3 class="text-3xl font-black text-white uppercase">{{ $vehicle->brand }} {{ $vehicle->model }}</h3>
                        </div>

                        @php
                            $latest = $vehicle->serviceHistories->first();
                            $statusInfo = match($latest?->status) {
                                'masuk' => ['label' => 'Antrean Bengkel', 'color' => 'text-blue-500', 'bg' => 'bg-blue-500/10'],
                                'pengerjaan' => ['label' => 'Sedang Dikerjakan', 'color' => 'text-yellow-500', 'bg' => 'bg-yellow-500/10'],
                                'selesai' => ['label' => 'Siap Diambil', 'color' => 'text-green-500', 'bg' => 'bg-green-500/10'],
                                default => ['label' => 'Tidak Ada Servis', 'color' => 'text-gray-600', 'bg' => 'bg-gray-800/50']
                            };
                        @endphp

                        <div class="{{ $statusInfo['bg'] }} px-6 py-4 rounded-3xl border border-white/5 text-right">
                            <p class="text-[10px] font-black uppercase text-gray-500 tracking-widest mb-1">Status Progres</p>
                            <div class="flex items-center justify-end gap-3">
                                <span class="h-3 w-3 rounded-full {{ str_replace('text-', 'bg-', $statusInfo['color']) }} shadow-[0_0_10px_rgba(0,0,0,0.5)] {{ $latest?->status !== 'selesai' ? 'animate-pulse' : '' }}"></span>
                                <span class="text-xl font-black {{ $statusInfo['color'] }} uppercase italic">{{ $statusInfo['label'] }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- History Table -->
                    <div class="bg-gray-900/30 rounded-3xl border border-gray-800 overflow-hidden backdrop-blur-sm">
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-gray-800/50">
                                    <tr>
                                        <th class="py-4 px-6 text-[10px] font-black uppercase tracking-widest text-gray-500">Tanggal</th>
                                        <th class="py-4 px-6 text-[10px] font-black uppercase tracking-widest text-gray-500">Rincian Servis</th>
                                        <th class="py-4 px-6 text-[10px] font-black uppercase tracking-widest text-gray-500 text-right">Biaya</th>
                                        <th class="py-4 px-6 text-[10px] font-black uppercase tracking-widest text-gray-500 text-center">Invoice</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800">
                                    @forelse($vehicle->serviceHistories as $history)
                                    <tr class="hover:bg-white/5 transition-colors">
                                        <td class="py-6 px-6 align-top">
                                            <div class="font-bold text-white mb-1">{{ \Carbon\Carbon::parse($history->service_date)->format('d M Y') }}</div>
                                            <div class="text-[10px] bg-red-600/10 text-red-500 px-1.5 py-0.5 rounded inline-block">#INV{{ $history->id }}</div>
                                        </td>
                                        <td class="py-6 px-6 align-top">
                                            <div class="font-black text-gray-300 uppercase leading-none mb-3 text-lg">{{ $history->service_type }}</div>
                                            
                                            <!-- Detail Items -->
                                            <div class="space-y-1">
                                                @foreach($history->details as $item)
                                                <div class="flex items-center text-xs text-gray-500">
                                                    <span class="w-1.5 h-1.5 bg-red-600 rounded-full mr-2"></span>
                                                    <span>{{ $item->name }}</span>
                                                </div>
                                                @endforeach
                                            </div>

                                            @if($history->spareparts)
                                            <div class="mt-4 pt-4 border-t border-gray-800/50">
                                                <p class="text-[9px] font-black text-gray-600 uppercase mb-2 italic">Spareparts:</p>
                                                <div class="flex flex-wrap gap-1.5">
                                                    @foreach(explode(',', $history->spareparts) as $part)
                                                    <span class="px-2 py-0.5 bg-gray-950 text-gray-500 text-[9px] rounded-lg border border-gray-800">{{ trim($part) }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif
                                        </td>
                                        <td class="py-6 px-6 align-top text-right">
                                            <div class="text-[10px] font-black uppercase text-gray-600 mb-1">Total Tagihan</div>
                                            <div class="text-xl font-black text-white">Rp {{ number_format($history->total_cost, 0, ',', '.') }}</div>
                                            <div class="mt-1">
                                                <span class="text-[9px] font-black uppercase px-2 py-0.5 rounded {{ $history->invoice_status == 'lunas' ? 'bg-green-500/10 text-green-500' : 'bg-red-500/10 text-red-500' }}">
                                                    {{ $history->invoice_status }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="py-6 px-6 align-top text-center">
                                            <a href="{{ route('public.download-invoice', $history) }}" class="inline-flex items-center justify-center w-12 h-12 bg-gray-800 hover:bg-white hover:text-gray-950 text-white rounded-2xl transition-all duration-300 shadow-xl group">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" /></svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="py-12 text-center text-gray-600 text-sm italic">Belum ada riwayat pengerjaan.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-12 border-t border-gray-900 bg-gray-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-600 text-sm font-medium uppercase tracking-widest">&copy; 2026 Autosamsi. Solusi Perawatan Premium.</p>
        </div>
    </footer>
</body>
</html>
