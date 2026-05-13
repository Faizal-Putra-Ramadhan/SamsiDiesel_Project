@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/service-header.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

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

    <!-- Testimonial Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">// Testimonial //</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative">
                <div class="testimonial-item text-center">
                    <img class="bg-light rounded-circle p-2 mx-auto mb-3" src="{{ asset('template/img/grey-bg-1.jpg') }}" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0">Pelayanan sangat memuaskan, teknisi ahli dan sangat membantu. Kendaraan saya kembali prima setelah servis di sini.</p>
                    </div>
                </div>
                <!-- Repeat for other testimonials -->
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
