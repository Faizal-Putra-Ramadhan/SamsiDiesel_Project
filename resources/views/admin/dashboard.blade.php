<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel Admin - Autosamsi') }}
        </h2>
    </x-slot>

    <div class="space-y-6">
        <!-- Stats -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Pelanggan -->
            <div class="group bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] hover:shadow-[0_4px_12px_rgba(15,23,42,0.06)] transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500 mb-2">Pelanggan</p>
                        <p class="text-[28px] font-bold text-slate-900 tracking-tight leading-none">{{ $stats['customers'] }}</p>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-red-50">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1 rounded-full bg-red-100">
                    <div class="h-full rounded-full bg-red-500 w-3/4 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:w-full"></div>
                </div>
            </div>

            <!-- Kendaraan -->
            <div class="group bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] hover:shadow-[0_4px_12px_rgba(15,23,42,0.06)] transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500 mb-2">Kendaraan</p>
                        <p class="text-[28px] font-bold text-slate-900 tracking-tight leading-none">{{ $stats['vehicles'] }}</p>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-blue-50">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1 rounded-full bg-blue-100">
                    <div class="h-full rounded-full bg-blue-500 w-3/4 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:w-full"></div>
                </div>
            </div>

            <!-- Keluhan Pending -->
            <div class="group bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] hover:shadow-[0_4px_12px_rgba(15,23,42,0.06)] transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500 mb-2">Keluhan Pending</p>
                        <p class="text-[28px] font-bold text-slate-900 tracking-tight leading-none">{{ $stats['pending_complaints'] }}</p>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-amber-50">
                        <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1 rounded-full bg-amber-100">
                    <div class="h-full rounded-full bg-amber-500 w-1/2 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:w-full"></div>
                </div>
            </div>

            <!-- Export Data -->
            <div class="group bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)] hover:shadow-[0_4px_12px_rgba(15,23,42,0.06)] transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500 mb-2">Export Data</p>
                        <a href="{{ route('admin.export-excel') }}" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-emerald-600 hover:text-emerald-700 transition-colors duration-200">
                            Download Excel
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                    <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-emerald-50">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4 h-1 rounded-full bg-emerald-100">
                    <div class="h-full rounded-full bg-emerald-500 w-3/4 transition-all duration-700 ease-[cubic-bezier(0.16,1,0.3,1)] group-hover:w-full"></div>
                </div>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Pendapatan Bulanan -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h3 class="text-sm font-semibold text-slate-900">Pendapatan Bulanan</h3>
                        <p class="text-[11px] text-slate-500 mt-0.5">6 bulan terakhir</p>
                    </div>
                </div>
                <div class="relative h-[260px]">
                    <canvas id="revenueChart"></canvas>
                </div>
                @php
                    $revenueLabels = $monthlyRevenue->pluck('month')->map(function($m) {
                        return \Carbon\Carbon::createFromFormat('Y-m', $m)->translatedFormat('M Y');
                    })->toArray();
                    $revenueData = $monthlyRevenue->pluck('total')->toArray();
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
                                    borderRadius: 6,
                                    borderSkipped: false,
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
                                        ticks: {
                                            callback: function(v) {
                                                return new Intl.NumberFormat('id-ID', { notation: 'compact' }).format(v);
                                            },
                                            font: { size: 11 },
                                            color: '#94a3b8'
                                        }
                                    },
                                    x: {
                                        grid: { display: false },
                                        ticks: { font: { size: 11 }, color: '#94a3b8' }
                                    }
                                }
                            }
                        });
                    });
                </script>
            </div>

            <!-- Status Servis -->
            <div class="bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
                <div class="mb-4">
                    <h3 class="text-sm font-semibold text-slate-900">Status Servis</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">Distribusi saat ini</p>
                </div>
                <div class="relative h-[220px] flex items-center justify-center">
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
                                cutout: '70%',
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            usePointStyle: true,
                                            pointStyleWidth: 8,
                                            padding: 16,
                                            font: { size: 11 },
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

        <!-- Charts Row 2: Jumlah Servis -->
        <div class="bg-white rounded-2xl p-5 ring-1 ring-slate-200/60 shadow-[0_1px_3px_rgba(15,23,42,0.04)]">
            <div class="mb-4">
                <h3 class="text-sm font-semibold text-slate-900">Jumlah Servis Bulanan</h3>
                <p class="text-[11px] text-slate-500 mt-0.5">6 bulan terakhir</p>
            </div>
            <div class="relative h-[220px]">
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
                    const gradient = ctx.getContext('2d').createLinearGradient(0, 0, 0, 220);
                    gradient.addColorStop(0, 'rgba(59,130,246,0.25)');
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
                                pointRadius: 4,
                                pointHoverRadius: 6,
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
                                    ticks: {
                                        stepSize: 1,
                                        font: { size: 11 },
                                        color: '#94a3b8'
                                    }
                                },
                                x: {
                                    grid: { display: false },
                                    ticks: { font: { size: 11 }, color: '#94a3b8' }
                                }
                            }
                        }
                    });
                });
            </script>
        </div>

        <!-- Quick Access Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Manajemen Customer -->
            <a href="{{ route('admin.customers') }}"
               class="group relative overflow-hidden rounded-2xl bg-slate-800 p-6 ring-1 ring-slate-700/50 hover:ring-red-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(239,68,68,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-red-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-red-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-red-500/10 ring-1 ring-red-500/20 mb-4 group-hover:bg-red-500 group-hover:ring-red-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-red-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Manajemen Customer</h3>
                    <p class="text-[13px] text-slate-400 mt-1.5 leading-relaxed">Lihat daftar pelanggan, data kendaraan, dan kirim notifikasi WhatsApp.</p>
                </div>
            </a>

            <!-- Catat Servis -->
            <a href="{{ route('admin.services') }}"
               class="group relative overflow-hidden rounded-2xl bg-slate-800 p-6 ring-1 ring-slate-700/50 hover:ring-blue-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(59,130,246,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-blue-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-blue-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-blue-500/10 ring-1 ring-blue-500/20 mb-4 group-hover:bg-blue-500 group-hover:ring-blue-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-blue-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Catat Servis</h3>
                    <p class="text-[13px] text-slate-400 mt-1.5 leading-relaxed">Input riwayat servis baru untuk kendaraan pelanggan.</p>
                </div>
            </a>

            <!-- Spareparts -->
            <a href="{{ route('admin.products') }}"
               class="group relative overflow-hidden rounded-2xl bg-slate-800 p-6 ring-1 ring-slate-700/50 hover:ring-emerald-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(16,185,129,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-emerald-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-emerald-500/10 ring-1 ring-emerald-500/20 mb-4 group-hover:bg-emerald-500 group-hover:ring-emerald-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-emerald-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Spareparts</h3>
                    <p class="text-[13px] text-slate-400 mt-1.5 leading-relaxed">Kelola produk yang tampil di halaman depan website.</p>
                </div>
            </a>

            <!-- Keluhan Masuk -->
            <a href="{{ route('admin.complaints') }}"
               class="group relative overflow-hidden rounded-2xl bg-slate-800 p-6 ring-1 ring-slate-700/50 hover:ring-amber-500/60 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)] hover:scale-[1.01] hover:shadow-[0_8px_30px_rgba(245,158,11,0.12)]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-amber-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 group-hover:bg-amber-500/10 transition-colors duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-center w-11 h-11 rounded-xl bg-amber-500/10 ring-1 ring-amber-500/20 mb-4 group-hover:bg-amber-500 group-hover:ring-amber-500 transition-all duration-300 ease-[cubic-bezier(0.16,1,0.3,1)]">
                        <svg class="w-5 h-5 text-amber-500 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-base font-semibold text-white tracking-tight">Keluhan Masuk</h3>
                    <p class="text-[13px] text-slate-400 mt-1.5 leading-relaxed">Lihat dan tangani feedback dari pelanggan.</p>
                </div>
            </a>
        </div>
    </div>
</x-admin-layout>
