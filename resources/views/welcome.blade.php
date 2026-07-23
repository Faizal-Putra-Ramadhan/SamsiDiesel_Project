@extends('layouts.frontend')

@section('title', 'AutoSamsi')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('template/img/bg-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Engine Diesel //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Service Engine Diesel & Spareparts</h1>
                                    <a href="{{ route('services.diesel') }}" class="btn btn-secondary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('template/img/bg-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Engine Gassoline //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Service Engine Gassoline & Spareparts</h1>
                                    <a href="{{ route('services.gasoline') }}" class="btn btn-secondary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('template/img/bg-3.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Bubut //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Bubut, Las, dan Pembuatan Alat Pendukung Pabrik</h1>
                                    <a href="{{ route('services.bubut') }}" class="btn btn-secondary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('template/img/bg-4.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center justify-content-center justify-content-lg-start">
                                <div class="col-10 col-lg-7 text-center text-lg-start">
                                    <h6 class="text-white text-uppercase mb-3 animated slideInDown">// Body Repaire //</h6>
                                    <h1 class="display-3 text-white mb-4 pb-3 animated slideInDown">Body Repaire & Repaint (Perbaikan Body & Pengecatan)</h1>
                                    <a href="{{ route('services.bodyrepair') }}" class="btn btn-secondary py-3 px-5 animated slideInDown">Learn More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Lacak Section Start (Injected for functionality) -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-lg-10 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-light p-5 rounded">
                        <div class="text-center mb-4">
                            <h6 class="text-primary text-uppercase">// Lacak Progres //</h6>
                            <h1 class="mb-0">Cek Status Kendaraan Anda</h1>
                        </div>
                        <form action="{{ route('track') }}" method="GET">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <input type="text" name="whatsapp_number" class="form-control border-0 py-3" placeholder="Nomor WhatsApp, contoh 62812..." required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="plate_number" class="form-control border-0 py-3 text-uppercase" placeholder="Plat Nomor, contoh B 1234 ABC" required>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-secondary w-100 py-3" type="submit">Cari Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Lacak Section End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-certificate fa-3x text-secondary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Quality Servicing</h5>
                            <p>Pelayanan kami tidak hanya sekadar memenuhi kebutuhan pelanggan, namun juga memberikan pengalaman yang luar biasa dengan standar kualitas yang tinggi dan profesional.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="d-flex bg-light py-5 px-4">
                        <i class="fa fa-users-cog fa-3x text-secondary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Expert Workers</h5>
                            <p>Tim kami terdiri dari para ahli di bidangnya yang memiliki pengalaman dan keahlian yang mendalam, siap memberikan solusi terbaik untuk setiap tantangan yang dihadapi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="d-flex py-5 px-4">
                        <i class="fa fa-tools fa-3x text-secondary flex-shrink-0"></i>
                        <div class="ps-4">
                            <h5 class="mb-3">Modern Equipment</h5>
                            <p>Kami menggunakan peralatan modern dan teknologi terbaru untuk memastikan hasil layanan yang berkualitas dan efisien.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/about.jpg') }}" style="object-fit: cover;" alt="">
                        <div class="position-absolute top-0 end-0 mt-n4 me-n4 py-4 px-5" style="background: rgba(0, 0, 0, .08);">
                            <h1 class="display-4 text-white mb-0">61 <span class="fs-4">Years</span></h1>
                            <h4 class="text-white">Experience</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-secondary text-uppercase">// About Us //</h6>
                    <h1 class="mb-4"><span class="text-secondary" style="font-style: italic;"><span style="color: red;">Auto</span>Samsi</span></h1>
                    <p class="mb-4">UD.Samsi Motor Group (Bengkel Samsi) adalah perusahaan yang bergerak dalam bidang jasa meliputi :</p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Service</h6>
                                    <span>Perawatan dan perbaikan kendaaan bermesin Gasolline (Bensin) dan Diesel (Biosolar).</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Body Repaire</h6>
                                    <span>Perbaikan body dan pengecatan ulang kendaraan.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Spareparts</h6>
                                    <span>Penjualan berbagai macam sparepart kendaraan.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">04</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Bubut & Las</h6>
                                    <span>Segala pekerjaan bubut dan las, serta pembuatan alat pendukung pabrik</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">61</h2>
                    <p class="text-white mb-0">Years Experience</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">40</h2>
                    <p class="text-white mb-0">Expert Technicians</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">150</h2>
                    <p class="text-white mb-0">Satisfied Clients</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-car fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">1000</h2>
                    <p class="text-white mb-0">Compleate Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->

    <!-- our services Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">// Our Services //</h6>
                <h1 class="mb-5">Explore Our Services</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav w-100 nav-pills me-4">
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">
                            <h4 class="m-0">Service Engine Diesel & Spareparts.</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">
                            <h4 class="m-0">Service Engine Gassoline & Spareparts</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">
                            <h4 class="m-0">Pengelasan, Bubut & Pembuatan Alat Pendukung Pabrik</h4>
                        </button>
                        <button class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">
                            <h4 class="m-0">Body Repaire & Repaint (Perbaikan Body & Pengecatan)</h4>
                        </button>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        <div class="tab-pane fade show active" id="tab-pane-1">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-1.jpg') }}" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Diesel Engine</h3>
                                    <p class="mb-4">Samsi Diesel & Spareparts. Spesialis Kendaraan dan Alat Berat Bermesin Diesel. Mulai dari kendaraan konvensional sampai teknologi commonrail.</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Engine Tune up</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>suku cadang (spareparts)</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Ganti Oli</p>
                                    <a href="{{ route('services.diesel') }}" class="btn btn-secondary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-2">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-2.jpg') }}" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Gassoline Engine</h3>
                                    <p class="mb-4">Auto Samsi Gasoline & Spareparts. Spesialis Kendaraan Gasoline. Mulai dari konvensional sampai teknologi EFI.</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Engine Tune up</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Scanner ECU/ECM</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Over Houl</p>
                                    <a href="{{ route('services.gasoline') }}" class="btn btn-secondary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-3">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-3.jpg') }}" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Bubut & Las</h3>
                                    <p class="mb-4">Samsi Bubut dan Las. Berfokus pada perindustrian dan otomotif.</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Segala Pekerjaan Bubut dan Las.</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Colter / Ganti Boring</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Slep Cylinder Head</p>
                                    <a href="{{ route('services.bubut') }}" class="btn btn-secondary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-pane-4">
                            <div class="row g-4">
                                <div class="col-md-6" style="min-height: 350px;">
                                    <div class="position-relative h-100">
                                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-4.jpg') }}" style="object-fit: cover;" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="mb-3">Repaire Body</h3>
                                    <p class="mb-4">Auto Samsi Body Repair & Repaint. Spesiali Body Repair (Kenteng body) dan Cat Ulang.</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Kenteng Body</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Ketok Magic</p>
                                    <p><i class="fa fa-check me-3 text-success"></i>Canter Sasis Truck</p>
                                    <a href="{{ route('services.bodyrepair') }}" class="btn btn-secondary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- our services End -->

    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">History Of <span style="font-style: italic; color: red;">Auto</span><i style="font-style: italic;">Samsi</i> Group</h1>
                        <p class="text-white mb-0">Bengkel Samsi berdiri sejak 1962 dengan usaha awal bengkel mobil panggilan dengan jumlah karyawan 6 orang yang berlokasi awal di Desa Menadi Kab. Pacitan. Pada tahun 2000an menambah bidang usaha menjadi beberapa divisi dengan jumlah karyawan kurang lebih 30 orang yang terdiri dari staff dan mekanik yang ahli dalam menangani segala jenis kendaraan, dan membuka cabang dikota pacitan.</p>
                        <a href="{{ route('about') }}" class="btn btn-primary py-3 px-5 mt-3">Read More<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- Testimonial Start -->
    @php
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'profession' => 'Pemilik Toko/Kendaraan Pribadi',
                'text' => 'Pelayanan sangat memuaskan, teknisi ahli dan sangat membantu. Kendaraan saya kembali prima setelah servis di sini. Harga juga wajar dan transparan.',
            ],
            [
                'name' => 'Siti Rahmawati',
                'profession' => 'Ibu Rumah Tangga',
                'text' => 'Bengkel Samsi memang terpercaya. Mobil saya yang sebelumnya sering bermasalah, setelah diservis di sini jadi seperti baru lagi. Terima kasih tim Samsi!',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'profession' => 'Supir Angkutan',
                'text' => 'Udah langganan sejak 2018. Pelayanan ramah, cepat, dan nggak nguras dompet. Khususnya buat sparepart diesel original, lengkap banget.',
            ],
            [
                'name' => 'Dwi Prasetyo',
                'profession' => 'Karyawan Swasta',
                'text' => 'Rekomendasi buat yang butuh service body repair. Hasil cat ulang mobil saya rapi, warnanya cocok, nggak beda sama aslinya. Puas banget!',
            ],
            [
                'name' => 'Hendra Gunawan',
                'profession' => 'Pengusaha Transportasi',
                'text' => 'Armada truk saya rutin diservis di sini. Tidak pernah mengecewakan, teknisi berpengalaman dan selalu tepat waktu. Sangat profesional.',
            ],
            [
                'name' => 'Rina Nuraini',
                'profession' => 'Guru',
                'text' => 'Baru pertama kali ke bengkel ini karena rekomendasi teman. Ternyata pelayanannya luar biasa, dijelasin detail soal kerusakan dan biaya. Langganan deh!',
            ],
        ];
    @endphp
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Apa Kata Pelanggan Kami?</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                @foreach($testimonials as $t)
                    <div class="testimonial-item text-center">
                        <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('template/img/grey-bg-1.jpg') }}" style="width: 80px; height: 80px;" alt="{{ $t['name'] }}">
                        <h5 class="mb-0">{{ $t['name'] }}</h5>
                        <p>{{ $t['profession'] }}</p>
                        <div class="testimonial-text bg-light text-center p-4">
                            <p class="mb-0">"{{ $t['text'] }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Spareparts Section (Dynamic) -->
    <div id="products" class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">// Spareparts & Produk //</h6>
                <h1 class="mb-5">Belanja Suku Cadang</h1>
            </div>
            <div class="row g-4 mb-4">
                <div class="col-lg-12">
                    <form action="{{ route('home') }}#products" method="GET" class="d-flex gap-2">
                        <input type="text" name="search" placeholder="Cari sparepart..." value="{{ request('search') }}" class="form-control">
                        <button type="submit" class="btn btn-secondary px-5">Cari</button>
                    </form>
                </div>
            </div>
            <div class="row g-4">
                @forelse($products as $product)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ $product->image_url }}" alt="{{ $product->name }}">
                                <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                    @if($product->shopee_url)
                                        <a class="btn btn-square mx-1" href="{{ $product->shopee_url }}" target="_blank"><i class="fa fa-shopping-cart"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="bg-light text-center p-4">
                                <h5 class="fw-bold mb-0 text-truncate" title="{{ $product->name }}">{{ $product->name }}</h5>
                                @if($product->shopee_url)
                                    <a href="{{ $product->shopee_url }}" target="_blank" class="btn btn-sm btn-secondary mt-3">Beli di Shopee</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">Produk tidak ditemukan.</div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- Spareparts End -->
@endsection
