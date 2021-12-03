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

                <div class="mb-2">
                    <a href="/admin-dashboard/laptops/create" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i>
                        Add Laptop
                    </a>
                </div>
                <div class="table-responsive bg-white rounded">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Condition</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Stock</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalogs as $catalog)
                                <tr>
                                    <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                    <td class="text-center">{{ $catalog->laptop_name }}</td>
                                    <td class="text-center">{{ $catalog->laptop_condition ? 'New' : 'Old' }}</td>
                                    <td class="text-center">Rp {{ number_format($catalog->laptop_price, 0, ',', '.') }}
                                    </td>
                                    <td class="text-center">{{ $catalog->laptop_stock }}</td>
                                    <td class="text-center">
                                        <a href="/admin-dashboard/laptops/{{ $catalog->id }}" class="badge bg-info"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a href="/admin-dashboard/laptops/{{ $catalog->id }}/edit"
                                            class="badge bg-warning"><i class="far fa-edit"></i></a>
                                        <form action="/admin-dashboard/laptops/{{ $catalog->id }}" method="POST"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button class="badge bg-danger border-0" type="submit"
                                                onclick="return confirm('Are you sure want to delete {{ $catalog->laptop_name }}?')"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </form>
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
