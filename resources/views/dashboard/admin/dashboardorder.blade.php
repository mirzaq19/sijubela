@extends('layout')
@section('title', 'Dashboard Admin')

@section('aftercss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Demo styles -->
    <style>
        .content {
            min-height: 0;
        }

    </style>
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-2 mt-2">
                @include('partials._sidebaradmin')
            </div>
            <div class="col-lg-10 mt-2 rounded">
                @if (session()->has('success'))
                    <div class="mb-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="table-responsive bg-white rounded">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Username</th>
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Order Status</th>
                                <th class="text-center" scope="col">Shipping Status</th>
                                <th class="text-center" scope="col">Total</th>
                                <th class="text-center" scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                @if ($laptops->where(
                'id',
                '==',
                $orderdetails->where('order_id', '==', $order->id)->pluck('laptop_id')->first(),
            )->pluck('laptop_name')->first() != null)
                                    <tr>
                                        <th class="text-center" scope="row">{{ $loop->iteration }}</th>

                                        <td class="text-center">
                                            {{ $buyers->where('id', '==', $order->buyer_user_id)->pluck('buyer_username')->first() }}
                                        </td>
                                        <td class="text-center">
                                            {{ $laptops->where(
                                                    'id',
                                                    '==',
                                                    $orderdetails->where('order_id', '==', $order->id)->pluck('laptop_id')->first(),
                                                )->pluck('laptop_name')->first() }}
                                        </td>
                                        <td class="text-center">
                                            {{ Str::ucfirst(str_replace('_', ' ', $order->order_status)) }}</td>
                                        <td class="text-center">{{ Str::ucfirst($order->shipping_status) }}</td>
                                        <td class="text-center">Rp
                                            {{ number_format($order->total_price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <a href="/admin-dashboard/orders/{{ $order->id }}" class="badge bg-info"><i
                                                    class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
