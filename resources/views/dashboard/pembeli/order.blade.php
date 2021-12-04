@extends('dashboard.pembeli.layout-buyer')
@section('title')
    Pesanan Saya | {{ $title }}
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
    @if (session()->has('orderaddsuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('orderaddsuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('canceladdsuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('canceladdsuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
            @if (Request::is('order/pay'))
                <span class="nav-link link-blue active">Sudah Bayar</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-order.pay') }}">Sudah Bayar</a>
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
    @foreach ($orders as $order)
        <div class="order-wrapper bg-white p-3 mt-3 rounded">
            <div class="row">
                <div class="col-8">
                    <div class="order-list mb-4">
                        @foreach ($order->order_details()->get() as $item)
                            <div class="row mb-3">
                                <div class="col-sm-3 mb-3 mb-md-0">
                                    <img class="img-fluid"
                                        src="{{ asset($item->laptop->laptop_image()->first()->laptop_image) }}"
                                        alt="product">
                                </div>
                                <div class="col-sm-9">
                                    <h5 class="mb-3">{{ $item->laptop->laptop_name }}</h5>
                                    <p class="mb-0">Jumlah: {{ $item->order_detail_amount }}</p>
                                    <p class="mb-0">Note: {{ $item->order_detail_note }}</p>
                                    <p class="mb-0">Harga: Rp.
                                        {{ number_format($item->price_subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                            @if (!$item->reviewed && $order->order_status == 'finished')
                                <a href="#" class="btn btn-blue">Tulis testimoni</a>
                            @endif
                            @if ($item->reviewed && $order->order_status == 'finished')
                                <a href="{{ route('product', $item->laptop_id) }}" class="btn btn-blue">Beli lagi</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="order-status">
                        <p class="mb-0"><strong>Status Pesanan:</strong>
                            {{ str_replace('_', ' ', $order->order_status) }}</p>
                    </div>
                </div>
            </div>
            @if ($order->order_status == 'not_paid')
                <p class="mb-0"><strong>Silahkan melakukan pembayaran pada rekening berikut: </strong></p>
                <p><strong>BNI: 32094392847</strong></p>
            @endif
            @if ($order->order_status == 'packing' || $order->order_status == 'shipping')
                <p class="mb-0"><strong>Status Pengiriman: </strong>{{ $order->shipping_status }}</p>
            @endif
            <h5 class="text-end"><i class="text-blue fas fa-clipboard-check"></i> Total: Rp.
                {{ number_format($order->total_price, 0, ',', '.') }}</h5>
            <div class="order-button text-end mt-4">
                @if ($order->order_status == 'not_paid')
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cancelConfirm"
                        data-bs-idbayar="{{ $order->id }}">Batalkan pesanan</button>
                    <button class="btn btn-blue" data-bs-toggle="modal" data-bs-target="#uploadBuktiModal"
                        data-bs-idbayar="{{ $order->id }}">Upload Bukti Bayar</button>
                @endif
            </div>
        </div>
    @endforeach

    @if ($orders->count() == 0)
        <div class="order-wrapper bg-white p-3 mt-3 rounded">
            <div class="row">
                <div class="col-12 text-center py-3">
                    <h5 class="m-0">Tidak ada pesanan</h5>
                </div>
            </div>
        </div>
    @endif

    <div class="modal fade" id="uploadBuktiModal" tabindex="-1" aria-labelledby="uploadBuktiModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadBuktiModalLabel">Upload bukti pembayaran</h5>
                </div>
                <form>
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="order_id" class="idbayar">
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

    <!-- Modal -->
    <div class="modal fade" id="cancelConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <p class="h1 text-blue my-4">
                        <i class="fas fa-shopping-cart"></i>
                    </p>
                    <p class="fs-3">
                        Apakah anda yakin ingin membatalkan pesanan ini?
                    </p>
                    <form action="{{ route('buyer-order.cancel.add') }}" method="post">
                        <div class="mt-3">
                            <button type="button" class="btn btn-secondary m-0 me-sm-3"
                                data-bs-dismiss="modal">Batal</button>
                            @csrf
                            <input type="hidden" name="order_id" class="idbayar">
                            <button type="submit" class="btn btn-blue m-0 me-sm-3" data-bs-dismiss="modal">Yakin</button>
                        </div>
                    </form>
                </div>
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

        let cancelconfirm = document.getElementById('cancelConfirm')
        cancelconfirm.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget
            let idbayar = button.getAttribute('data-bs-idbayar')
            let inputidbayar = cancelconfirm.querySelector('.modal-body .idbayar')
            inputidbayar.value = idbayar
        })
    </script>
@endsection
