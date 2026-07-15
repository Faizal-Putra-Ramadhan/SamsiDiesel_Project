<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="space-y-6">

        {{-- Stat Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-3">

            {{-- Pelanggan --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-slate-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-slate-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-slate-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-slate-700 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Pelanggan</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-slate-100 ring-1 ring-slate-100 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-slate-700 group-hover:ring-slate-700 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-slate-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">{{ $stats['totalCustomers'] }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Total terdaftar</p>
            </div>

            {{-- Kendaraan --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-blue-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-blue-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-blue-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-blue-600 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Kendaraan</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-blue-50 ring-1 ring-blue-50 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-blue-600 group-hover:ring-blue-600 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-blue-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">{{ $stats['totalVehicles'] }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Total kendaraan</p>
            </div>

            {{-- Pendapatan Bulan Ini --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-emerald-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-emerald-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-emerald-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-emerald-600 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Pendapatan</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-emerald-50 ring-1 ring-emerald-50 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-emerald-600 group-hover:ring-emerald-600 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-emerald-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">Rp{{ number_format($stats['monthlyRevenue'], 0, ',', '.') }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">{{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
            </div>

            {{-- Servis Bulan Ini --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-cyan-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-cyan-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-cyan-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-cyan-600 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Servis</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-cyan-50 ring-1 ring-cyan-50 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-cyan-600 group-hover:ring-cyan-600 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-cyan-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">{{ $stats['monthlyServices'] }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Bulan berjalan</p>
            </div>

            {{-- Rata-rata Biaya --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-amber-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-amber-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-amber-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-amber-600 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Rata-rata</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-amber-50 ring-1 ring-amber-50 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-amber-600 group-hover:ring-amber-600 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-amber-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">Rp{{ number_format($stats['avgServiceCost'], 0, ',', '.') }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Per transaksi</p>
            </div>

            {{-- Keluhan Masuk --}}
            <div class="group relative overflow-hidden rounded-xl bg-white p-4 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] hover:-translate-y-1 hover:shadow-[0_14px_32px_-12px_rgba(15,23,42,0.18)] hover:ring-rose-300/70 active:scale-[0.985]">
                <div class="pointer-events-none absolute -top-10 -right-10 w-28 h-28 rounded-full bg-rose-500/0 blur-3xl transition-all duration-700 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-rose-500/10"></div>
                <div class="absolute top-0 left-0 w-full h-0.5 bg-rose-600 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:h-1"></div>
                <div class="flex items-center justify-between mb-2">
                    <p class="text-[10px] font-semibold uppercase tracking-widest text-slate-500">Keluhan</p>
                    <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-rose-50 ring-1 ring-rose-50 transition-all duration-500 ease-[cubic-bezier(0.32,0.72,0,1)] group-hover:bg-rose-600 group-hover:ring-rose-600 group-hover:scale-110 group-hover:-translate-y-0.5">
                        <svg class="w-3.5 h-3.5 text-rose-600 transition-colors duration-500 group-hover:text-white" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                    </div>
                </div>
                <p class="text-2xl font-bold text-slate-900 tracking-tight">{{ $stats['pendingComplaints'] }}</p>
                <p class="text-[10px] text-slate-400 mt-0.5">Menunggu tindakan</p>
            </div>

        </div>

        {{-- Charts Row --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            {{-- Pendapatan Bulanan Chart --}}
            <div class="lg:col-span-2 bg-white rounded-xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900">Pendapatan Bulanan</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">6 bulan terakhir</p>
                    </div>
                </div>
                <div class="relative h-[200px]">
                    <canvas id="revenueChart"></canvas>
                </div>
                @php
                    $revenueLabels = $monthlyRevenueData->pluck('month')->map(function($m) {
                        return \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y');
                    })->toArray();
                    $revenueData = $monthlyRevenueData->pluck('total')->toArray();
                @endphp
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const ctx = document.getElementById('revenueChart');
                        if (!ctx) return;
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: @json($revenueLabels),
                                datasets: [{
                                    label: 'Pendapatan (Rp)',
                                    data: @json($revenueData),
                                    backgroundColor: '#1e293b',
                                    borderRadius: 4,
                                    borderSkipped: false,
                                    barPercentage: 0.55,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false },
                                    tooltip: {
                                        callbacks: {
                                            label: function(c) {
                                                return 'Rp ' + new Intl.NumberFormat('id-ID').format(c.raw);
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        grid: { color: '#f1f5f9' },
                                        border: { display: false },
                                        ticks: {
                                            callback: function(v) {
                                                return new Intl.NumberFormat('id-ID', { notation: 'compact' }).format(v);
                                            },
                                            font: { size: 10 },
                                            color: '#94a3b8',
                                            maxTicksLimit: 5,
                                        }
                                    },
                                    x: {
                                        grid: { display: false },
                                        border: { display: false },
                                        ticks: { font: { size: 10 }, color: '#94a3b8', maxTicksLimit: 6 }
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            {{-- Status Servis Doughnut --}}
            <div class="bg-white rounded-xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
                <div class="mb-3">
                    <h3 class="text-sm font-semibold text-slate-900">Status Servis</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">Distribusi saat ini</p>
                </div>
                <div class="relative h-[180px] flex items-center justify-center">
                    <canvas id="statusChart"></canvas>
                </div>
                @php
                    $statusLabels = collect(['masuk' => 'Masuk', 'pengerjaan' => 'Pengerjaan', 'selesai' => 'Selesai']);
                    $statusMap = $serviceStatusCount->pluck('count', 'status');
                    $statusColors = ['masuk' => '#3b82f6', 'pengerjaan' => '#f59e0b', 'selesai' => '#10b981'];
                    $chartLabels = [];
                    $chartData = [];
                    $chartColors = [];
                    foreach ($statusLabels as $key => $label) {
                        $chartLabels[] = $label;
                        $chartData[] = $statusMap[$key] ?? 0;
                        $chartColors[] = $statusColors[$key];
                    }
                @endphp
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const ctx = document.getElementById('statusChart');
                        if (!ctx) return;
                        new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: @json($chartLabels),
                                datasets: [{
                                    data: @json($chartData),
                                    backgroundColor: @json($chartColors),
                                    borderWidth: 0,
                                    hoverBorderWidth: 0,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                cutout: '72%',
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            usePointStyle: true,
                                            pointStyleWidth: 8,
                                            padding: 14,
                                            font: { size: 10 },
                                            color: '#64748b'
                                        }
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(c) {
                                                const total = c.dataset.data.reduce((a, b) => a + b, 0);
                                                const pct = total ? Math.round(c.raw / total * 100) : 0;
                                                return ' ' + c.label + ': ' + c.raw + ' (' + pct + '%)';
                                            }
                                        }
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>
        </div>

        {{-- Servis Bulanan Line Chart --}}
        <div class="bg-white rounded-xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
            <div class="mb-3">
                <h3 class="text-sm font-semibold text-slate-900">Jumlah Servis Bulanan</h3>
                <p class="text-[11px] text-slate-500 mt-0.5">6 bulan terakhir</p>
            </div>
            <div class="relative h-[180px]">
                <canvas id="serviceCountChart"></canvas>
            </div>
            @php
                $countLabels = $monthlyServiceCount->pluck('month')->map(function($m) {
                    return \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y');
                })->toArray();
                $countData = $monthlyServiceCount->pluck('count')->toArray();
            @endphp
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const ctx = document.getElementById('serviceCountChart');
                    if (!ctx) return;
                    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 180);
                    gradient.addColorStop(0, 'rgba(59,130,246,0.2)');
                    gradient.addColorStop(1, 'rgba(59,130,246,0.02)');

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($countLabels),
                            datasets: [{
                                label: 'Jumlah Servis',
                                data: @json($countData),
                                borderColor: '#3b82f6',
                                backgroundColor: gradient,
                                borderWidth: 2,
                                fill: true,
                                tension: 0.3,
                                pointBackgroundColor: '#3b82f6',
                                pointBorderColor: '#fff',
                                pointBorderWidth: 2,
                                pointRadius: 3,
                                pointHoverRadius: 5,
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: false },
                                tooltip: {
                                    callbacks: {
                                        label: function(c) {
                                            return c.raw + ' servis';
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    grid: { color: '#f1f5f9' },
                                    border: { display: false },
                                    ticks: {
                                        stepSize: 1,
                                        font: { size: 10 },
                                        color: '#94a3b8',
                                        maxTicksLimit: 5,
                                    }
                                },
                                x: {
                                    grid: { display: false },
                                    border: { display: false },
                                    ticks: { font: { size: 10 }, color: '#94a3b8', maxTicksLimit: 6 }
                                }
                            }
                        }
                    });
                });
            </script>
        </div>

        {{-- Recent Activity --}}
        <div class="bg-white rounded-xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="text-sm font-semibold text-slate-900">Aktivitas Terbaru</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">5 servis terakhir</p>
                </div>
                <a href="{{ route('admin.services') }}" class="text-[11px] font-medium text-blue-600 hover:text-blue-700 transition-colors">Lihat Semua</a>
            </div>
            <div class="overflow-x-auto -mx-5">
                <table class="w-full text-[13px]">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Plat</th>
                            <th class="text-left px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Pelanggan</th>
                            <th class="text-left px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Jenis</th>
                            <th class="text-left px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Tanggal</th>
                            <th class="text-right px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Biaya</th>
                            <th class="text-center px-5 py-2.5 font-medium text-slate-400 uppercase tracking-wider text-[10px]">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentHistories as $h)
                            @php
                                $statusBadge = match ($h->status) {
                                    'masuk' => ['label' => 'Masuk', 'class' => 'bg-blue-50 text-blue-700 ring-blue-200/50'],
                                    'pengerjaan' => ['label' => 'Dikerjakan', 'class' => 'bg-amber-50 text-amber-700 ring-amber-200/50'],
                                    'selesai' => ['label' => 'Selesai', 'class' => 'bg-emerald-50 text-emerald-700 ring-emerald-200/50'],
                                    default => ['label' => $h->status, 'class' => 'bg-slate-50 text-slate-700 ring-slate-200/50'],
                                };
                            @endphp
                            <tr class="border-b border-slate-50 hover:bg-slate-50/50 transition-colors">
                                <td class="px-5 py-3 font-medium text-slate-800 whitespace-nowrap">{{ $h->vehicle->plate_number ?? '-' }}</td>
                                <td class="px-5 py-3 text-slate-600 whitespace-nowrap">{{ $h->vehicle->user->name ?? '-' }}</td>
                                <td class="px-5 py-3 text-slate-600 max-w-[180px] truncate">{{ $h->service_type }}</td>
                                <td class="px-5 py-3 text-slate-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($h->service_date)->translatedFormat('d M Y') }}</td>
                                <td class="px-5 py-3 text-right text-slate-800 font-medium whitespace-nowrap">Rp{{ number_format($h->total_cost, 0, ',', '.') }}</td>
                                <td class="px-5 py-3 text-center whitespace-nowrap">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold ring-1 {{ $statusBadge['class'] }}">
                                        {{ $statusBadge['label'] }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-8 text-center text-slate-400 text-sm">Belum ada riwayat servis.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Quick Access Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('admin.customers') }}"
               class="group relative overflow-hidden rounded-xl bg-slate-800 p-5 ring-1 ring-slate-700/50 hover:ring-red-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(239,68,68,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-red-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-red-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-red-500/10 ring-1 ring-red-500/20 mb-3 group-hover:bg-red-500 group-hover:ring-red-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-red-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Manajemen Customer</h3>
                    <p class="text-[13px] text-slate-400 mt-1 leading-relaxed">Lihat daftar pelanggan, data kendaraan, dan kirim notifikasi WhatsApp.</p>
                </div>
            </a>

            <a href="{{ route('admin.services') }}"
               class="group relative overflow-hidden rounded-xl bg-slate-800 p-5 ring-1 ring-slate-700/50 hover:ring-blue-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(59,130,246,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-500/10 ring-1 ring-blue-500/20 mb-3 group-hover:bg-blue-500 group-hover:ring-blue-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Catat Servis</h3>
                    <p class="text-[13px] text-slate-400 mt-1 leading-relaxed">Input riwayat servis baru untuk kendaraan pelanggan.</p>
                </div>
            </a>

            <a href="{{ route('admin.products') }}"
               class="group relative overflow-hidden rounded-xl bg-slate-800 p-5 ring-1 ring-slate-700/50 hover:ring-emerald-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(16,185,129,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-emerald-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-500/10 ring-1 ring-emerald-500/20 mb-3 group-hover:bg-emerald-500 group-hover:ring-emerald-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-emerald-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Spareparts</h3>
                    <p class="text-[13px] text-slate-400 mt-1 leading-relaxed">Kelola produk yang tampil di halaman depan website.</p>
                </div>
            </a>

            <a href="{{ route('admin.complaints') }}"
               class="group relative overflow-hidden rounded-xl bg-slate-800 p-5 ring-1 ring-slate-700/50 hover:ring-amber-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(245,158,11,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-amber-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-amber-500/10 ring-1 ring-amber-500/20 mb-3 group-hover:bg-amber-500 group-hover:ring-amber-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-amber-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Keluhan Masuk</h3>
                    <p class="text-[13px] text-slate-400 mt-1 leading-relaxed">Lihat dan tangani feedback dari pelanggan.</p>
                </div>
            </a>
        </div>
    </div>
</x-admin-layout>