@extends('layout')
@section('title', 'Keranjang')

@section('aftercss')
    <style>
        .product-check {
            padding: .5rem;
        }

        .content {
            min-height: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container my-5 p-4 bg-white">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Keranjang</h1>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="pilihsemua">
            <label class="form-check-label" for="pilihsemua">
                Pilih Semua
            </label>
        </div>
        <div class="list-group">
            @foreach ($carts as $cart)
                <li class="list-group-item d-flex align-items-center">
                    <input class="form-check-input product-check" type="checkbox">
                    <div class="row ms-4">
                        <div class="col-sm-3 d-flex justify-content-start justify-content-sm-between align-items-center">
                            <img class="img-fluid"
                                src="{{ asset($cart->laptop->laptop_image()->first()->laptop_image) }}" alt="Product">
                        </div>
                        <div class="col-sm-9 mt-3 m-sm-0">
                            <h5 class="mb-1">{{ $cart->laptop->laptop_name }}</h5>
                            <p class="mb-1">Rp. {{ number_format($cart->laptop->laptop_price, 0, ',', '.') }}
                            </p>
                            <p class="mb-1">Jumlah : {{ $cart->cart_amount }}</p>
                            <p class="mb-1">Total : Rp.
                                {{ number_format($cart->cart_amount * $cart->laptop->laptop_price, 0, ',', '.') }}</p>
                            @if ($cart->cart_note)
                                <p>Note : {{ $cart->cart_note }}</p>
                            @endif
                            <form action="{{ route('cart.delete', $cart->id) }}" method="post">
                                @csrf
                                <button onclick="confirm('Yakin ingin menghapus barang ini dari keranjang?')"
                                    class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-auto ms-auto">
                <a href="{{ route('beranda') }}" class="btn btn-secondary btn-block">Lanjutkan Belanja</a>
            </div>
            <div class="col-auto">
                <form>
                    <button type="submit" class="btn btn-blue btn-block disabled" id="checkout">Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        const pilihsemua = document.getElementById('pilihsemua');
        const productCheck = document.querySelectorAll('.product-check');
        const checkout = document.getElementById('checkout');

        pilihsemua.addEventListener('click', function() {
            if (pilihsemua.checked) {
                productCheck.forEach(function(productCheck) {
                    productCheck.checked = true;
                })
                checkout.classList.remove('disabled');
            } else {
                productCheck.forEach(function(productCheck) {
                    productCheck.checked = false;
                })
                checkout.classList.add('disabled');
            }
        })

        productCheck.forEach(function(pc) {
            pc.addEventListener('click', function() {
                let checked = 0;
                productCheck.forEach(function(productCheck) {
                    if (productCheck.checked) {
                        checked++;
                    }
                })
                if (checked === productCheck.length) {
                    pilihsemua.checked = true;
                } else {
                    pilihsemua.checked = false;
                }

                if (checked > 0) {
                    checkout.classList.remove('disabled');
                } else {
                    checkout.classList.add('disabled');
                }
            })
        })
        productCheck.forEach(function(pc) {
            pc.addEventListener('change', function() {
                let checked = 0;
                productCheck.forEach(function(productCheck) {
                    if (productCheck.checked) {
                        checked++;
                    }
                })

                if (checked > 0) {
                    checkout.classList.remove('disabled');
                } else {
                    checkout.classList.add('disabled');
                }
            })
        })
    </script>
@endsection
