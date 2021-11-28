@extends('layout')
@section('title', 'Keranjang')

@section('aftercss')
    <style>
        .product-check {
            padding: .5rem;
        }

    </style>
@endsection

@section('content')
    <div class="container my-5 p-4 bg-white">
        <h1>Keranjang</h1>
        <hr>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="pilihsemua">
            <label class="form-check-label" for="pilihsemua">
                Pilih Semua
            </label>
        </div>
        <div class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-3 d-flex justify-content-between align-items-center">
                        <input class="form-check-input product-check" type="checkbox" value="">
                        <img class="img-fluid" src="{{ asset('/img/product/l1.png') }}" alt="Product">
                    </div>
                    <div class="col-9">
                        <h5 class="mb-1">Asus Zephyrus Intel Core i7 GTX 1650</h5>
                        <p class="mb-1">Rp. 12.499.000</p>
                        <p class="mb-1">Jumlah : 1</p>
                        <p class="mb-1">Total : Rp. 12.499.000</p>
                        <button class="btn btn-danger mt-2"><i class="fas fa-trash"></i> Hapus</button>

                    </div>
                </div>
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-3 d-flex justify-content-between align-items-center">
                        <input class="form-check-input product-check" type="checkbox" value="">
                        <img class="img-fluid" src="{{ asset('/img/product/l2.png') }}" alt="Product">
                    </div>
                    <div class="col-9">
                        <h5 class="mb-1">Asus Yoga Intel Core i5 GTX 1650</h5>
                        <p class="mb-1">Rp. 8.499.000</p>
                        <p class="mb-1">Jumlah : 1</p>
                        <p class="mb-1">Total : Rp. 8.499.000</p>
                        <button class="btn btn-danger mt-2"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </li>
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
