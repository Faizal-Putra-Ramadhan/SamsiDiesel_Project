@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/about-header.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


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

    <!-- Booking Start -->
    <div class="container-fluid bg-secondary booking my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="text-white mb-4">History Of <span style="font-style: italic; color: red;">Auto</span><i style="font-style: italic;">Samsi</i> Group</h1>
                        <p class="text-white mb-0">Bengkel Samsi berdiri sejak 1962 dengan usaha awal bengkel mobil panggilan dengan jumlah karyawan 6 orang yang berlokasi awal di Desa Menadi Kab. Pacitan. Pada tahun 2000an menambah bidang usaha menjadi beberapa divisi dengan jumlah karyawan kurang lebih 30 orang yang terdiri dari staff dan mekanik yang ahli dalam menangani segala jenis kendaraan, dan membuka cabang dikota pacitan adapun divisinya meliputi :</p>
                        <br>
                        <p style="color: white;" class="mb-0"><i class="fa fa-arrow-right me-3"></i>Bengkel Samsi Diesel & Spareparts (Jl.Pacitan-Lorok Dsn. Ngaglik Ds.Menadi Kab.Pacitan</p>
                        <p style="color: white;" class="mb-0"><i class="fa fa-arrow-right me-3"></i>Bengkel Samsi Bubut dan Pembuatan alat pendukung pabrik (Jln.Pacitan-lorok Dsn.Ngaglik Ds.Menadi Kab.Pacitan)</p>
                        <p style="color: white;" class="mb-0"><i class="fa fa-arrow-right me-3"></i>Auto Samsi Gasolin dan Sparepart (Jln.Magribi Dsn.Ngaglik Ds.Menadi Kab.Pacitan)</p>
                        <p style="color: white;" class="mb-0"><i class="fa fa-arrow-right me-3"></i>Auto Samsi Body Repair dan Repaint (Jln.Pacitan-lorok Dsn.Ngaglik Ds.Menadi Kab.Pacitan)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Our Leaders</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/img/grey-bg-1.jpg') }}" alt="">
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Full Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <!-- Repeat for other team members as in template -->
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
