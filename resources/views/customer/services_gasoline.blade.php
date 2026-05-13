@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/service-header.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Services/<span style="color: red;">Gassoline</span></h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Services Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 pt-4" style="min-height: 400px;">
                    <div class="position-relative h-100 wow fadeIn" data-wow-delay="0.1s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-2.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-secondary text-uppercase">// Services //</h6>
                    <h1 class="mb-4"><span class="text-secondary" style="font-style: italic;">Auto<span style="color: red;">Gassoline</span></span></h1>
                    <p class="mb-4">Auto Samsi Gasoline & Spareparts. Spesialis Kendaraan Gasoline. Mulai dari konvensional sampai teknologi EFI.</p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Engine Tune up</h6>
                                    <span>Memperbaiki performa mesin agar kembali optimal.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Scanner ECU/ECM</h6>
                                    <span>Diagnosa kerusakan sensor secara digital.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Replacement</h6>
                                    <span>Ganti Oli Mesin, Transmisi, Matic, Differential.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">04</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Over Houl</h6>
                                    <span>Pekerjaan turun mesin bensin secara profesional.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.9s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">05</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Foam</h6>
                                    <span>Carbon Cleaner dan Injection Cleaner.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Call To Action Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-6">
                    <h6 class="text-secondary text-uppercase">// Hubungi //</h6>
                    <h1 class="mb-4">Jika ingin melakukan booking</h1>
                    <p class="mb-0">Kendaraan bensin Anda bermasalah? Tim kami siap menangani mulai dari servis rutin hingga modifikasi.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-secondary d-flex flex-column justify-content-center text-center h-100 p-4">
                        <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>+62 852-3186-8048</h3>
                        <a href="https://wa.me/6285231868048" class="btn btn-primary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->
@endsection
