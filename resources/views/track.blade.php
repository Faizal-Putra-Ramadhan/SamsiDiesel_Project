@extends('layouts.frontend')

@section('title', 'Lacak Servis - AutoSamsi')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/carousel-bg-1.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Lacak Progres</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Track</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Tracking Search Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light p-5 rounded shadow-sm border">
                        <div class="text-center mb-4">
                            <h6 class="text-primary text-uppercase">// Status Kendaraan //</h6>
                            <h1 class="mb-2">Cek Progres Servis</h1>
                            <p class="text-muted mb-4">Masukkan nomor WhatsApp dan plat nomor kendaraan.</p>
                        </div>
                        <form action="{{ route('track') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <input type="text" name="whatsapp_number" value="{{ old('whatsapp_number', request('whatsapp_number')) }}" class="form-control border-0 py-3" placeholder="Nomor WhatsApp, contoh 62812..." required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="plate_number" value="{{ old('plate_number', request('plate_number')) }}" class="form-control border-0 py-3 text-uppercase" placeholder="Plat Nomor, contoh B 1234 ABC" required>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Cari Data</button>
                                </div>
                            </div>
                        </form>
                        @if(session('error'))
                            <div class="mt-4 alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tracking Search End -->

    @if($user)
        <!-- Tracking Results Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="border-start border-5 border-primary ps-4 mb-5">
                            <h6 class="text-primary text-uppercase">Data Pelanggan</h6>
                            <h1 class="display-6 mb-0">{{ $user->name }}</h1>
                            <p class="text-muted mt-2">Ditemukan {{ $vehicles->count() }} unit kendaraan terdaftar.</p>
                        </div>

                        <div class="row g-4">
                            @foreach($vehicles as $vehicle)
                                <div class="col-12 mb-5">
                                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                                        <div class="card-header bg-white border-bottom p-4 d-flex flex-wrap justify-content-between align-items-center">
                                            <div>
                                                <span class="badge bg-primary mb-2">PLAT NOMOR</span>
                                                <h3 class="mb-0 text-dark">{{ $vehicle->plate_number }}</h3>
                                                <p class="text-muted mb-0">{{ $vehicle->brand }} {{ $vehicle->model }}</p>
                                            </div>
                                            @php
                                                $latest = $vehicle->serviceHistories->first();
                                                $statusClass = match($latest?->status) {
                                                    'masuk' => 'bg-info',
                                                    'pengerjaan' => 'bg-warning',
                                                    'selesai' => 'bg-success',
                                                    default => 'bg-secondary'
                                                };
                                                $statusLabel = match($latest?->status) {
                                                    'masuk' => 'Antrean Bengkel',
                                                    'pengerjaan' => 'Sedang Dikerjakan',
                                                    'selesai' => 'Siap Diambil',
                                                    default => 'Tidak Ada Servis'
                                                };
                                            @endphp
                                            <div class="text-end">
                                                <span class="text-muted d-block small text-uppercase fw-bold mb-1">Status Progres</span>
                                                <span class="badge {{ $statusClass }} px-4 py-2 fs-6">{{ $statusLabel }}</span>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="table-responsive">
                                                <table class="table table-hover mb-0">
                                                    <thead class="bg-light">
                                                        <tr>
                                                            <th class="px-4 py-3">Tanggal</th>
                                                            <th class="px-4 py-3">Rincian Servis</th>
                                                            <th class="px-4 py-3 text-end">Biaya</th>
                                                            <th class="px-4 py-3 text-center">Invoice</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse($vehicle->serviceHistories as $history)
                                                            @php
                                                                $serviceDetails = $history->details->where('type', 'jasa');
                                                                $sparepartDetails = $history->details->where('type', 'sparepart');
                                                            @endphp
                                                            <tr>
                                                                <td class="px-4 py-4">
                                                                    <div class="fw-bold">{{ \Carbon\Carbon::parse($history->service_date)->format('d M Y') }}</div>
                                                                    <small class="text-primary">#INV{{ $history->id }}</small>
                                                                </td>
                                                                <td class="px-4 py-4">
                                                                    <div class="fw-bold text-uppercase">{{ $history->service_type }}</div>
                                                                    <ul class="list-unstyled small text-muted mb-0 mt-2">
                                                                        @foreach($serviceDetails as $item)
                                                                            <li><i class="fa fa-check text-primary me-2"></i>Jasa: {{ $item->name }} - Rp {{ number_format($item->price, 0, ',', '.') }}</li>
                                                                        @endforeach
                                                                        @foreach($sparepartDetails as $item)
                                                                            <li><i class="fa fa-cog text-primary me-2"></i>Sparepart: {{ $item->name }} - Rp {{ number_format($item->price, 0, ',', '.') }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                    @if($sparepartDetails->isEmpty() && $history->spareparts)
                                                                        <div class="mt-2">
                                                                            <small class="text-muted italic">Spareparts: {{ $history->spareparts }}</small>
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                <td class="px-4 py-4 text-end">
                                                                    <div class="text-muted small">Total Tagihan</div>
                                                                    <div class="fw-bold text-dark">Rp {{ number_format($history->total_cost, 0, ',', '.') }}</div>
                                                                    <span class="badge {{ $history->invoice_status == 'lunas' ? 'bg-success' : 'bg-danger' }} mt-1">
                                                                        {{ strtoupper($history->invoice_status) }}
                                                                    </span>
                                                                </td>
                                                                <td class="px-4 py-4 text-center">
                                                                    <a href="{{ URL::signedRoute('public.download-invoice', $history) }}" class="btn btn-outline-primary btn-sm rounded-pill">
                                                                        <i class="fa fa-download me-2"></i>Unduh
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="4" class="text-center py-5 text-muted italic">Belum ada riwayat pengerjaan.</td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tracking Results End -->
    @endif
@endsection
