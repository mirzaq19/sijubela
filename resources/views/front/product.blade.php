@extends('layout')
@section('title', 'Product')

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
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Intel</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laptop Asus</li>
            </ol>
        </nav>
        <h1 class="text-center">Asus Zephyrus Intel Core i7 GTX 1650</h1>
        <div class="container my-4 product-img">
            <div id="carouselProductImg" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselProductImg" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselProductImg" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselProductImg" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/product/l1.png') }}" class="d-block w-100" alt="Laptop">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/product/l2.png') }}" class="d-block w-100" alt="Laptop">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/product/l3.png') }}" class="d-block w-100" alt="Laptop">
                    </div>
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
            <h2>Rp. <span id="price">12.499.000</span></h2>
            <h4>Stok : <span id="stock">3</span></h4>
        </div>
        <div class="product-desc">
            <h3>Deskripsi Produk: </h3>
            <p>
                CPU : Intel Core i7-8750H (2.8 GHz)
                <br>
                RAM : 16 GB DDR4-2400
                <br>
                HDD : 1 TB HDD
                <br>
                VGA : NVIDIA GeForce GTX 1650
                <br>
                OS : Windows 10 Home
                <br>
                Display : 15.6 inch
                <br>
                Battery : 3 cell
                <br>
                Weight : 1.5 kg
                <br>
                Color : Black
                <br>
                Dimension : L x W x H : L: 170mm x W: 170mm x H: 170mm
                <br>
                Warranty : 1 year
                <br>
                Brand : ASUS
                <br>
                Model : Zephyrus
                <br>
                Processor : Intel Core i7-8750H
                <br>
            </p>
        </div>
        <div class="belanja">
            <h3>Belanja Sekarang</h3>
            <div class="row mt-2 mb-4">
                <div class="col-md-6">
                    <form>
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
                                <p class="my-1 h5">dari <span id="maxbuy"></span></p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notelaptop" class="form-label">Catatan</label>
                            <textarea name="notelaptop" class="form-control" id="notelaptop" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-blue">Masukkan Keranjang</button>
                    </form>
                </div>
            </div>
            <p class="h4">Harga total: Rp. <span id="totalprice"></span></p>
        </div>
    </div>
    <div class="container rounded mb-3 bg-white p-4">
        <h2>Testimonial</h2>
        <div class="testimoni my-3">
            <div class="row">
                <div class="col-2 col-sm-1 d-flex justify-content-center">
                    <h1 class="m-0"><i class="far fa-user-circle"></i></h1>
                </div>
                <div class="col-10">
                    <p class="m-0"><strong>Nama User</strong></p>
                    <span class="star text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <p class="bg-lightgrey p-3 mt-3 rounded">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis quam blanditiis odio,
                        asperiores nisi animi sit adipisci, nulla commodi neque quo optio eveniet maiores distinctio
                        suscipit quaerat quasi alias! Porro!
                    </p>
                </div>
            </div>
        </div>
        <div class="testimoni my-3">
            <div class="row">
                <div class="col-2 col-sm-1 d-flex justify-content-center">
                    <h1 class="m-0"><i class="far fa-user-circle"></i></h1>
                </div>
                <div class="col-10">
                    <p class="m-0"><strong>Nama User</strong></p>
                    <span class="star text-warning">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <p class="bg-lightgrey p-3 mt-3 rounded">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis quam blanditiis odio,
                        asperiores nisi animi sit adipisci, nulla commodi neque quo optio eveniet maiores distinctio
                        suscipit quaerat quasi alias! Porro!
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        const price = document.getElementById('price');
        const stock = document.getElementById('stock');
        const maxbuy = document.getElementById('maxbuy');
        const totalprice = document.getElementById('totalprice');
        const minusamount = document.getElementById('minusamount');
        const plusamount = document.getElementById('plusamount');
        const qty = document.getElementById('qty');
        const notelaptop = document.getElementById('notelaptop');

        maxbuy.innerHTML = stock.innerHTML;

        const fromPriceFormat = (value) => {
            return parseInt(value.replace(/\./g, ""));
        }

        const calculatePrice = (quantity, priceProduct) => {
            return (quantity * fromPriceFormat(priceProduct)).toLocaleString('id-ID')
        }

        const minus = () => {
            if (qty.value > 1) {
                qty.value--;
                totalprice.innerHTML = calculatePrice(qty.value, price.innerHTML);
            }
        }

        const plus = () => {
            if (qty.value < stock.innerHTML) {
                qty.value++;
                totalprice.innerHTML = calculatePrice(qty.value, price.innerHTML);
            }
        }

        const checkStock = () => {
            if (qty.value > parseInt(stock.innerHTML)) {
                qty.value = parseInt(stock.innerHTML);
            }
            totalprice.innerHTML = calculatePrice(qty.value, price.innerHTML);
        }

        minusamount.addEventListener('click', minus);
        plusamount.addEventListener('click', plus);
        qty.addEventListener('keyup', checkStock);

        document.addEventListener('DOMContentLoaded', function() {
            totalprice.innerHTML = calculatePrice(qty.value, price.innerHTML);
        }, false);
    </script>
@endsection
