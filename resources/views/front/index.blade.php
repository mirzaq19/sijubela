@extends('layout')
@section('title', 'Beranda')

@section('aftercss')
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Demo styles -->
    <style>
        .jumbotron {
            background-image: url('{{ asset('img/asset/landing.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            height: 50vh;
            position: relative;
        }

        .jumbotron:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(27, 28, 30, 0)), color-stop(90%, rgba(27, 28, 30, 0.8)));
            background: linear-gradient(180deg, rgba(27, 28, 30, 0) 0%, rgba(27, 28, 30, 0.8) 90%);
        }

        .jumbotron div {
            position: relative;
        }

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
    <div class="jumbotron text-white">
        <div class="container py-5 text-center text-sm-start">
            <h1 class="display-4">Selamat Datang di Toko SIJUBELA</h1>
            <p class="lead">Toko Jual Beli Laptop Bekas Maupun Baru</p>
            <hr class="my-4">
            <p>Silahkan pilih menu yang tersedia untuk melakukan pembelian laptop kamu</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="#brand" role="button">Lihat produk</a>
            </p>
        </div>
    </div>
    <div class="container my-5">
        <div class="card" id="brand">
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
                                    <a href="{{ route('product.asus') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/apple.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Apple</h3>
                                    <a href="{{ route('product.apple') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/toshiba.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Toshiba</h3>
                                    <a href="{{ route('product.toshiba') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/axioo.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Axioo</h3>
                                    <a href="{{ route('product.axioo') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/lenovo.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Lenovo</h3>
                                    <a href="{{ route('product.lenovo') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/hp.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">HP</h3>
                                    <a href="{{ route('product.hp') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/dell.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Dell</h3>
                                    <a href="{{ route('product.dell') }}" class="btn btn-primary">See list</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card shadow-sm bg-lightgrey" style="width: 15rem;">
                                <img class="card-img-top" draggable="false" src="{{ asset('img/brand/acer.png') }}"
                                    alt="brand">

                                <div class="card-body text-center">
                                    <h3 class="card-title">Acer</h3>
                                    <a href="{{ route('product.acer') }}" class="btn btn-primary">See list</a>
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
        <div class="card mt-4" id="brand">
            <h2 class="card-header text-center"><strong>Produk</strong></h2>
            <div class="card-body">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($laptops as $laptop)
                        <div class="col">
                            <div class="card h-100">
                                <img src="{{ asset($laptop->laptop_image()->first()->laptop_image) }}"
                                    class="card-img-top" alt="Product">
                                <div class="card-body text-center">
                                    <h6 class="card-title">{{ $laptop->laptop_name }}</h6>
                                    <p class="mb-2">Stock: {{ $laptop->laptop_stock }}</p>
                                    <p class="mb-2">Kondisi: {{ $laptop->laptop_condition ? 'Baru' : 'Bekas' }}
                                    </p>
                                    <p class="mb-2">Rp.
                                        {{ number_format($laptop->laptop_price, 0, ',', '.') }}</p>
                                    <a class="btn btn-blue" href="{{ route('product', $laptop) }}">Lihat produk</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($laptops->count() == 0)
                    <p class="display-6 text-center my-4">Belum ada produk</p>
                @endif
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
