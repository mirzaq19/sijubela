@extends('dashboard.pembeli.layout-buyer')
@section('title')
    Pesanan Saya | Semua Pesanan
@endsection

@section('aftercss')
    <style>
        .nav .nav-link.link-blue {
            border-bottom: 2px solid transparent;
        }

        .nav .nav-link:hover.link-blue {
            border-bottom: 2px solid #00c1eb;
            font-weight: 400;
        }

        .nav .nav-link.link-blue.active {
            color: #00c1eb;
            border-bottom: 2px solid #00c1eb;
            font-weight: 400;
        }

    </style>
@endsection

@section('buyer-content')
    <div class="order-nav rounded bg-white py-2 mt-3 m-md-0">
        <nav class="nav nav-fill">
            @if (Request::is('order/all'))
                <span class="nav-link link-blue active">Semua</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.all') }}">Semua</a>
            @endif
            @if (Request::is('order/notpay'))
                <span class="nav-link link-blue active">Belum Bayar</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.notpay') }}">Belum Bayar</a>
            @endif
            @if (Request::is('order/packing'))
                <span class="nav-link link-blue active">Dikemas</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.packing') }}">Dikemas</a>
            @endif
            @if (Request::is('order/shipping'))
                <span class="nav-link link-blue active">Dikirim</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.shipping') }}">Dikirim</a>
            @endif
            @if (Request::is('order/finish'))
                <span class="nav-link link-blue active">Selesai</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.finish') }}">Selesai</a>
            @endif
            @if (Request::is('order/cancel'))
                <span class="nav-link link-blue active">Batal</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.cancel') }}">Batal</a>
            @endif
        </nav>
    </div>
    <div class="order-wrapper bg-white p-3 mt-3 rounded">
        <div class="row">
            <div class="col-8">
                <div class="order-list mb-4">
                    <div class="row">
                        <div class="col-sm-3 mb-3 mb-md-0">
                            <img class="img-fluid" src="{{ asset('img/product/l1.png') }}" alt="product">
                        </div>
                        <div class="col-sm-9">
                            <h5 class="mb-3">Asus Zephyrus Intel Core i7 GTX 1650</h5>
                            <p class="mb-0">Jumlah : 1</p>
                            <p class="mb-0">Note : Harap segera dikirim ya</p>
                            <p class="mb-0">Rp. 12.499.000</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="order-status">
                    <p class="mb-0"><strong>Status Pesanan:</strong> Belum bayar</p>
                </div>
            </div>
        </div>
        <p class="mb-0"><strong>Silahkan melakukan pembayaran pada rekening berikut: </strong></p>
        <p><strong>BNI: 32094392847</strong></p>
        <h5 class="text-end"><i class="text-blue fas fa-clipboard-check"></i> Total Pesanan: Rp. 12.499.000</h5>
        <div class="order-button text-end mt-4">
            <button class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#uploadBuktiModal"
                data-bs-idbayar="1">Upload Bukti Bayar</button>
            {{-- <button class="btn btn-blue">Tulis Testimoni</button> --}}
        </div>
    </div>

    <div class="modal fade" id="uploadBuktiModal" tabindex="-1" aria-labelledby="uploadBuktiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadBuktiModalLabel">Upload bukti pembayaran</h5>
                </div>
                <form>
                    <div class="modal-body">
                        <input type="hidden" name="idbayar" class="idbayar">
                        <div class="mb-3">
                            <label for="account_name" class="form-label">Nama pemilik rekening:</label>
                            <input type="text" name="account_name" class="form-control" id="account_name">
                        </div>
                        <div class="mb-3">
                            <label for="bank_name" class="form-label">Rekening bank:</label>
                            <select id="bank_name" name="bank_name" class="form-select"
                                aria-label="Default select example">
                                <option value="bni">PT. Bank Negara Indonesia</option>
                                <option value="bca">PT. Bank Central Asia</option>
                                <option value="mandiri">PT. Bank Mandiri</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="account_number" class="form-label">Nomor rekening: </label>
                            <input type="number" name="account_number" class="form-control" id="account_number">
                        </div>
                        <div class="mb-3">
                            <label for="account_number" class="form-label">Nomor rekening: </label>
                            <input type="number" name="account_number" class="form-control" id="account_number">
                        </div>
                        <div class="mb-3">
                            <label for="buktibayar" class="form-label">Bukti bayar: </label>
                            <input class="form-control" type="file" id="buktibayar"
                                accept="image/png, image/gif, image/jpeg">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-blue">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        let uploadbuktimodal = document.getElementById('uploadBuktiModal')
        uploadbuktimodal.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let idbayar = button.getAttribute('data-bs-idbayar')
            let inputidbayar = uploadbuktimodal.querySelector('.modal-body .idbayar')
            inputidbayar.value = idbayar
        })
    </script>
@endsection
