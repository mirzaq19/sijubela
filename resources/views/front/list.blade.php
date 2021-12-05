@extends('layout')
@section('title', 'Beranda | ' . $title)

@section('content')

    <div class="container my-5">
        <h1 class="m-0 mb-3">List Product: {{ $title }}</h1>
        @foreach ($laptops as $laptop)
            <div class="row mb-3 bg-white rounded shadow-sm p-4">
                <div class="col-md-2 mb-4 m-md-0">
                    <img class="img-fluid" src="{{ asset($laptop->laptop_image()->first()->laptop_image) }}"
                        alt="Laptop Image">
                </div>
                <div class="col-md-10">
                    <h4>{{ $laptop->laptop_name }}</h4>
                    <p class="mb-0">Stock: {{ $laptop->laptop_stock }}</p>
                    <p class="mb-0">Harga: Rp.{{ number_format($laptop->laptop_price, 0, ',', '.') }}</p>
                    <p>Kondisi: {{ $laptop->laptop_condition ? 'Baru' : 'Bekas' }}</p>
                    <a href="{{ route('product', $laptop) }}" class="btn btn-blue">Lihat Produk</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
