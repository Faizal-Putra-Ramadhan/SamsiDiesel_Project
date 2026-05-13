@extends('layouts.frontend')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url({{ asset('template/img/bg-4.jpg') }});">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Gallery</h1>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Gallery Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">// Our Gallery //</h6>
                <h1 class="mb-5">Gallery from Our Projects</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{ asset('template/img/grey-bg-1.jpg') }}" alt="">
                            <div class="team-overlay position-absolute start-0 top-0 w-100 h-100">
                                <a class="btn btn-square mx-1" href="{{ asset('template/img/grey-bg-1.jpg') }}"><i class="fab bi-search"></i></a>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="fw-bold mb-0">Project 1</h5>
                            <small>Diesel Service</small>
                        </div>
                    </div>
                </div>
                <!-- Add more items as needed -->
            </div>
        </div>
    </div>
    <!-- Gallery End -->
@endsection
