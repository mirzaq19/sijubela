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
            <div class="col-lg-10 mt-2">
                <div class="mb-3">
                    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                        <li class="list-group-item list-group-item-action active text-center" id="income"
                            data-bs-toggle="list" href="#income" role="tab" aria-controls="income">
                            Income
                        </li>
                        <li class="list-group-item list-group-item-action text-center" id="expense" data-bs-toggle="list"
                            href="#expense" role="tab" aria-controls="expense">
                            Expense
                        </li>
                    </div>
                </div>

                <div class="table-responsive bg-white rounded">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Amount</th>
                                <th class="text-center" scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="income" role="tabpanel"
                                    aria-labelledby="income-tab">
                                    @foreach ($orderdetails as $orderdetail)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">
                                                {{ $laptops->where('id', '==', $orderdetail->laptop_id)->pluck('laptop_name')->first() }}
                                            </td>
                                            <td class="text-center">{{ $orderdetail->order_detail_amount }}</td>
                                            <td class="text-center">
                                                {{ number_format($orderdetail->price_subtotal, 0, ',', '.') }}</td>


                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="expense" role="tabpanel" aria-labelledby="expense-tab">
                                    @foreach ($sell_laptops as $sell_laptop)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $sell_laptop->sell_laptop_name }}</td>
                                            <td class="text-center">1
                                            </td>
                                            <td class="text-center">Rp
                                                {{ number_format($sell_laptop->sell_laptop_price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
