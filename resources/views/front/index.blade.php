@extends('front.layout')
@section('title', 'Beranda')

@section('aftercss')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Demo styles -->
    <style>
        .swiper {
            width: 100%;
            padding-top: 2rem;
            padding-bottom: 3rem;
        }

        .swiper-slide {
            background-position: center;
            width: 15rem;
        }

        .swiper-slide .card {
            display: block;
            width: 100%;
        }

        .swiper-button-next,
        .swiper-button-prev {
            width: 2.5rem;
            height: 2.5rem;
            background-color: #00c1eb;
            border-radius: 50%;
            color: white;
            font-size: 1.4rem;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            content: '';
        }

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="card">
            <h2 class="card-header text-center"><strong>Brand / Merk</strong></h2>
            <div class="card-body">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/asus.png') }}"
                                    alt="brand">
                                <div class="card-body text-center">
                                    <h3 class="card-title">Asus</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/apple.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Apple</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/toshiba.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Toshiba</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/axioo.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Axioo</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/lenovo.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Lenovo</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/hp.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">HP</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/dell.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Dell</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/acer.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Acer</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <h2 class="card-header text-center"><strong>GPU</strong></h2>
            <div class="card-body">
                <!-- Swiper -->
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/gpu/amd.png') }}"
                                    alt="brand">
                                <div class="card-body text-center">
                                    <h3 class="card-title">AMD</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/gpu/gtx.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">GTX Series</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/gpu/intel.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Intel Series</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/gpu/rtx.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">RTX Series</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/gpu/ryzen.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Ryzen Series</h3>
                                    <a href="#" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next">
                        <i class="fas fa-arrow-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fas fa-arrow-left"></i>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 'auto',
            spaceBetween: 30,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
@endsection
