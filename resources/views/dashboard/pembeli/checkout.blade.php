@extends('layout')
@section('title', 'Checkout')

@section('aftercss')
    <style>
    </style>
@endsection

@section('content')
    <div class="container my-5 p-4 bg-white">
        <h1>Checkout</h1>
        <hr>
        <h4>Produk yang dibeli :</h4>
        <div class="row">
            @foreach ($carts as $cart)
                <div class="col-md-6 my-3">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset($cart->laptop->laptop_image()->first()->laptop_image) }}"
                                alt="{{ $cart->laptop->laptop_name }}" class="img-fluid">
                        </div>
                        <div class="col-8">
                            <h5>{{ $cart->laptop->laptop_name }}</h5>
                            <p class="mb-0">Harga: Rp.
                                {{ number_format($cart->laptop->laptop_price, 0, ',', '.') }}</p>
                            <p class="mb-0">Jumlah: {{ $cart->cart_amount }}</p>
                            @if ($cart->cart_note)
                                <p class="mb-0">Catatan: {{ $cart->cart_note }}</p>
                            @endif
                            <p class="mb-0">Subtotal: Rp.
                                {{ number_format($cart->laptop->laptop_price * $cart->cart_amount, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <p class="fs-6 m-0"><strong>Ongkos kirim : Rp. {{ number_format($cost, 0, ',', '.') }}</strong></p>
        <p class="fs-5"><strong>Total : Rp. {{ number_format($total + $cost, 0, ',', '.') }}</strong></p>
        <h4>Data Alamat :</h4>
        <div class="row">
            <div class="col-md-8">
                <form id="addorderform" action="{{ route('buyer-order.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="total_price" id="total_price" value="{{ $total }}">
                    <input type="hidden" name="shipping_cost" id="shipping_cost" value="{{ $cost }}">
                    <input type="hidden" name="idcarts" id="id_carts" value="{{ $idcarts }}">
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Alamat Penerima:</label>
                        <textarea type="text" class="form-control" id="shipping_address" name="shipping_address"
                            rows="3">{{ $address ? $address->full_address . ', ' . $address->village . ', ' . $address->subdistrict . ', ' . $address->district . ', ' . $address->province . ', ' . $address->postal_code : '' }}</textarea>
                    </div>
                    {{-- <a class="btn btn-secondary" href="{{ route('cart') }}">Batal</a> --}}
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                        data-bs-target="#modal-cancel-confirm">Batalkan pesanan</button>
                    <button id="addorderbutton" class="btn btn-blue" type="submit">Buat Pesanan</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-cancel-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="h1 text-blue my-4">
                        <i class="fas fa-shopping-cart"></i>
                    </p>
                    <p class="fs-3">
                        Anda yakin ingin membatalkan pesanan
                    </p>
                    <div class="mt-3">
                        <button type="button" class="btn btn-secondary m-0 me-sm-3" data-bs-dismiss="modal">Batal</button>
                        <a href="{{ route('cart') }}" class="btn btn-blue">Iya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        const addorderbutton = document.getElementById('addorderbutton');
        addorderbutton.addEventListener('click', function(e) {
            e.preventDefault();
            const shipping_address = document.getElementById('shipping_address').value;
            if (shipping_address.length < 1) {
                alert('Alamat pengiriman harus diisi');
                return false;
            }
            const form = document.getElementById('addorderform');
            form.submit();
        });
    </script>
@endsection
