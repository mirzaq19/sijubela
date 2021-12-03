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
            <div class="col-lg-2">
                @include('partials._sidebaradmin')
            </div>
            <div class="col-lg-10">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card">
                            <h3 class="card-header">Products</h3>
                            <div class="card-body">
                                <h5 class="card-title">{{ $laptop + $sell_laptop }} Laptops</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h3 class="card-header">Income</h3>
                            <div class="card-body">
                                <h5 class="card-title">Rp {{ number_format($price - $shipping_cost, 0, ',', '.') }}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h3 class="card-header">Expense</h3>
                            <div class="card-body">
                                <h5 class="card-title">Rp {{ number_format($expense, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
