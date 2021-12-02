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
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Condition</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Negotiable</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($offers as $offer)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                                    <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}</td>
                                    <td class="text-center">Rp
                                        {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                                    <td class="text-center">{{ $offer->sell_laptop_negotiable ? 'Yes' : 'No' }}</td>
                                    <td class="text-center">
                                        <a href="/admin-dashboard/sell_laptops/{{ $offer->id }}"
                                            class="badge bg-info"><i class="fas fa-info-circle"></i></a>
                                        <form action="/admin-dashboard/sell_laptops" method="POST" class="d-inline">
                                            @method('PUT')
                                            @csrf
                                            <button class="badge bg-danger border-0" type="submit"
                                                onclick="return confirm('Are you sure want to reject offer laptop {{ $offer->sell_laptop_name }}?')">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                        </form>
                                        <a href="#" class="badge bg-success"><i class="far fa-check-circle"></i></a>


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
