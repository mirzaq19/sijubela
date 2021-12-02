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
                <div class="table-responsive bg-white">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                {{-- <th class="text-center" scope="col">Username</th> --}}
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Order Status</th>
                                <th class="text-center" scope="col">Shipping Status</th>
                                <th class="text-center" scope="col">Total</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    {{-- <td class="text-center">{{ $order->orders->buyer_users->buyer_username }}</td> --}}
                                    <td class="text-center">{{ $order->laptops->laptop_name }}</td>
                                    <td class="text-center">{{ $order->orders->order_status }}</td>
                                    <td class="text-center">{{ $order->orders->shipping_status }}</td>
                                    <td class="text-center">Rp
                                        {{ number_format($order->orders->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin-dashboard/order_details/#" class="badge bg-info"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a href="#" class="badge bg-warning"><i class="far fa-edit"></i></a>
                                        <a href="#" class="badge bg-danger"><i class="far fa-trash-alt"></i></a>

                                    </td>
                                </tr>
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
