@extends('layout')
@section('title', $laptop->laptop_name)

@section('aftercss')
    <style>
        .product-img {
            width: 40%;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        #minusamount,
        #plusamount {
            cursor: pointer;
            background-color: rgb(240, 240, 240);
            transition: all 0.2s ease-in-out;
        }

        #minusamount:hover,
        #plusamount:hover {
            background-color: rgb(226, 226, 226);
        }

    </style>
@endsection

@section('content')
    <div class="container bg-light rounded mt-5 mb-4 p-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">{{ $laptop->laptop_brand }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $laptop->laptop_name }}</li>
            </ol>
        </nav>
        <h1 class="text-center">{{ $laptop->laptop_name }}</h1>
        <div class="container my-4 product-img">
            <div id="carouselProductImg" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    @foreach ($laptop->laptop_image()->get() as $image)
                        @if ($loop->first)
                            <button type="button" data-bs-target="#carouselProductImg"
                                data-bs-slide-to="{{ $loop->index }}" class="active" aria-current="true"
                                aria-label="Slide {{ $loop->iteration }}"></button>
                        @else
                            <button type="button" data-bs-target="#carouselProductImg"
                                data-bs-slide-to="{{ $loop->index }}"
                                aria-label="Slide {{ $loop->iteration }}"></button>
                        @endif
                    @endforeach
                </div>
                <div class="carousel-inner">
                    @foreach ($laptop->laptop_image()->get() as $image)
                        @if ($loop->first)
                            <div class="carousel-item active">
                                <img src="{{ asset($image->laptop_image) }}" class="d-block w-100" alt="Laptop">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset($image->laptop_image) }}" class="d-block w-100" alt="Laptop">
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductImg"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselProductImg"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="text-center mt-3">
            <h2>Rp. <span id="price">{{ number_format($laptop->laptop_price, 0, ',', '.') }}</span></h2>
            <h4>Stok : <span id="stock">{{ $laptop->laptop_stock }}</span></h4>
        </div>
        <div class="product-desc">
            <h3>Deskripsi Produk: </h3>
            <p>
                {!! nl2br($laptop->laptop_desc) !!}
            </p>
        </div>
        @auth('buyer_user')
            <div class="belanja">
                <h3>Belanja Sekarang</h3>
                <div class="row mt-2 mb-4">
                    <div class="col-md-6">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="buyer_user_id" id="buyer_user_id"
                                value="{{ Auth::guard('buyer_user')->user()->id }}">
                            <input type="hidden" name="laptop_id" id="laptop_id" value="{{ $laptop->id }}">
                            <div class="row">
                                <label for="qty" class="form-label">Jumlah</label>
                                <div class="col-5">
                                    <div class="input-group mb-3">
                                        <span title="Kurang" class="input-group-text" id="minusamount"><i
                                                class="fas fa-minus-circle"></i></span>
                                        <input type="number" id="qty" name="qty" class="form-control text-center" value="1">
                                        <span title="Tambah" class="input-group-text" id="plusamount"><i
                                                class="fas fa-plus-circle"></i></span>
                                    </div>
                                </div>
                                <div class="col-7">
                                    <p class="my-1 h5">dari {{ $laptop->laptop_stock }}</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notelaptop" class="form-label">Catatan</label>
                                <textarea name="notelaptop" class="form-control @error('notelaptop') is-invalid @enderror"
                                    id="notelaptop" rows="3"></textarea>
                                @error('notelaptop')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-blue">Masukkan Keranjang</button>
                        </form>
                    </div>
                </div>
                <p class="h4">Harga total: Rp. <span id="totalprice"></span></p>
            </div>
        @else
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-info-circle"></i> Silahkan <a href="{{ route('pembeli-login') }}">login</a> terlebih dahulu
                untuk memulai transaksi
            </div>
        @endauth
    </div>
    <div class="container rounded mb-3 bg-white p-4">
        <h2>Testimonial</h2>
        @foreach ($laptop->testimonials()->get() as $testimoni)
            <div class="testimoni my-3">
                <div class="row">
                    <div class="col-2 col-sm-1 d-flex justify-content-center">
                        <h1 class="m-0"><i class="far fa-user-circle"></i></h1>
                    </div>
                    <div class="col-10">
                        <p class="m-0"><strong>{{ $testimoni->buyer_user->buyer_full_name }}</strong></p>
                        <span class="star text-warning">
                            @for ($i = 0; $i < $testimoni->rating; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </span>
                        <p class="bg-lightgrey p-3 mt-3 rounded">
                            @if ($testimoni->testimonial_desc)
                                {{ $testimoni->testimonial_desc }}
                            @else
                                <i>Belum ada testimonial</i>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        @if ($laptop->testimonials()->count() == 0)
            <div class="bg-lightgrey text-center p-3 mt-4 rounded border border-secondary">
                <p class="fs-4">Belum ada testimoni untuk produk ini</p>
            </div>
        @endif
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="h1 text-blue my-4">
                        <i class="fas fa-shopping-cart"></i>
                    </p>
                    <p class="fs-3">
                        Laptop berhasil dimasukkan ke keranjang
                    </p>
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary m-0 me-sm-3" data-bs-dismiss="modal">Lanjutkan
                            Belanja</button>
                        <a href="{{ route('cart.index') }}" class="btn btn-blue">Ke keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-failed" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="h1 text-danger my-4">
                        <i class="fas fa-exclamation-triangle"></i>
                    </p>
                    <p class="fs-3">
                        Laptop gagal dimasukkan ke keranjang
                    </p>
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary m-0 me-sm-3" data-bs-dismiss="modal">Lanjutkan
                            Belanja</button>
                        <a href="{{ route('cart.index') }}" class="btn btn-blue">Ke keranjang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    @if (session()->has('success'))
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('modal-success'), {
                keyboard: false
            });
            myModal.show();
        </script>
    @endif
    @if (false)
        <script>
            const myModal = new bootstrap.Modal(document.getElementById('modal-failed'), {
                keyboard: false
            });
            myModal.show();
        </script>
    @endif
    @auth('buyer_user')
        <script>
            const price = {{ $laptop->laptop_price }};
            const stock = {{ $laptop->laptop_stock }};
            const totalprice = document.getElementById('totalprice');
            const minusamount = document.getElementById('minusamount');
            const plusamount = document.getElementById('plusamount');
            const qty = document.getElementById('qty');
            const notelaptop = document.getElementById('notelaptop');

            const calculatePrice = (quantity, priceProduct) => {
                return (quantity * priceProduct).toLocaleString('id-ID')
            }

            const minus = () => {
                if (qty.value > 1) {
                    qty.value--;
                    totalprice.innerHTML = calculatePrice(qty.value, price);
                }
            }

            const plus = () => {
                if (qty.value < stock) {
                    qty.value++;
                    totalprice.innerHTML = calculatePrice(qty.value, price);
                }
            }

            const checkStock = () => {
                if (qty.value > stock) {
                    qty.value = stock;
                }
                totalprice.innerHTML = calculatePrice(qty.value, price);
            }

            minusamount.addEventListener('click', minus);
            plusamount.addEventListener('click', plus);
            qty.addEventListener('keyup', checkStock);

            document.addEventListener('DOMContentLoaded', function() {
                totalprice.innerHTML = calculatePrice(qty.value, price);
            }, false);
        </script>
    @endauth
@endsection
