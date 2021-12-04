@extends('layout')
@section('title', 'Dashboard Seller')

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
                @include('partials._sidebarseller')
            </div>
            <div class="col-lg-10 mt-3">
                @if (session()->has('success'))
                    <div class="mb-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="d-grid mb-3">
                    <a href="/dashboard/add-laptop" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                        Add Laptop
                    </a>
                </div>

                <div class="card mb-3">
                    <h4 class="card-header">Income</h4>
                    <div class="card-body">
                        <h5 class="card-title">Rp
                            {{ number_format($laptop->pluck('sell_laptop_price')->sum(), 0, ',', '.') }}</h5>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-md-4 g-4">
                    <div class="col">
                        <div class="card">
                            <h4 class="card-header">Offers</h4>
                            <div class="card-body">
                                <h5 class="card-title">{{ $laptop->count() }} Laptops</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h4 class="card-header text-white bg-secondary">Waiting</h4>
                            <div class="card-body">
                                <h5 class="card-title">{{ $laptop_waiting->count() }} Laptops</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h4 class="card-header text-white bg-success">Accepted</h4>
                            <div class="card-body">
                                <h5 class="card-title">{{ $laptop_accepted->count() }} Laptops</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h4 class="card-header text-white bg-danger">Rejected</h4>
                            <div class="card-body">
                                <h5 class="card-title">{{ $laptop_rejected->count() }} Laptops</h5>
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
