@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/fact.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Bubut & Las</h1>
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
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('template/img/services-3.jpg') }}" style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <h6 class="text-secondary text-uppercase">// Services //</h6>
                    <h1 class="mb-4"><span class="text-secondary">Bubut & Las</span></h1>
                    <p class="mb-4">Samsi Bubut dan Las. Berfokus pada perindustrian dan otomotif, Berikut beberapa macam perbaikan dan pembuatan alat yang kami kerjakan :</p>
                    <div class="row g-4 mb-3 pb-3">
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">01</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Melayani</h6>
                                    <span>Segala Pekerjaan Bubut dan Las.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">02</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Colter / Ganti Boring</h6>
                                    <span>Modifikasi dan perbaikan silinder.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">03</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Melayani</h6>
                                    <span>Slep Cylinder Head untuk kerataan maksimal.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="d-flex">
                                <div class="bg-light d-flex flex-shrink-0 align-items-center justify-content-center mt-1" style="width: 45px; height: 45px;">
                                    <span class="fw-bold text-secondary">04</span>
                                </div>
                                <div class="ps-3">
                                    <h6>Pembuatan Alat</h6>
                                    <span>Berbagai macam alat pendukung pabrik.</span>
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
                    <h1 class="mb-4">Jika ingin melakukan Booking</h1>
                    <p class="mb-0">Butuh jasa bubut presisi atau pengelasan profesional? Hubungi kami sekarang untuk konsultasi proyek Anda.</p>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-secondary d-flex flex-column justify-content-center text-center h-100 p-4">
                        <h3 class="text-white mb-4"><i class="fa fa-phone-alt me-3"></i>+62 823-3649-1998</h3>
                        <a href="https://wa.me/6282336491998" class="btn btn-primary py-3 px-5">Contact Us<i class="fa fa-arrow-right ms-3"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call To Action End -->
@endsection
