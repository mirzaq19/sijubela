@extends('layout')
@section('title', 'Detail {{ $laptop->laptop_name }}')

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
    <div class="container my-5 bg-white rounded px-3">
        <div class="d-flex justify-content-between py-3">
            <div class="p-2">
                <a href="/admin-dashboard/laptops" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="p-2"></div>
            <div class="p-2">
                <a href="/admin-dashboard/laptops/{{ $laptop->id }}/edit" class="btn btn-warning"><i
                        class="far fa-edit"></i> Edit</a>
                <form action="/admin-dashboard/laptops/{{ $laptop->id }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Are you sure want to delete {{ $laptop->laptop_name }}?')"><i
                            class="far fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
        <p class="h2">Product Detail</p>
        <div class="row g-3 pb-3">
            <div class="col-12">
                <label for="laptop_name" class="form-label">Laptop Name</label>

                <input type="text" class="form-control" id="laptop_name" placeholder="{{ $laptop->laptop_name }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>

            <div class="col-md-4">
                <label for="laptop_brand" class="form-label">Laptop Brand</label>

                <input type="text" class="form-control" id="laptop_brand" placeholder="{{ $laptop->laptop_brand }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-4">
                <label for="laptop_type" class="form-label">Laptop Type</label>

                <input type="text" class="form-control" id="laptop_type" placeholder="{{ $laptop->laptop_type }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-4">
                <label for="laptop_condition" class="form-label">Condition</label>

                <input type="text" class="form-control" id="laptop_condition"
                    placeholder="{{ $laptop->laptop_condition }}" aria-label="Disabled input example" disabled readonly>
            </div>

            <div class="col-md-4">
                <label for="laptop_weight" class="form-label">Weight (kg)</label>

                <input type="text" class="form-control" id="laptop_weight" placeholder="{{ $laptop->laptop_weight }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-4">
                <label for="laptop_price" class="form-label">Price (Rp)</label>

                <input type="text" class="form-control" id="laptop_price"
                    placeholder="{{ number_format($laptop->laptop_price, 0, ',', '.') }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>
            <div class="col-md-4">
                <label for="laptop_stock" class="form-label">Stock</label>

                <input type="text" class="form-control" id="laptop_stock" placeholder="{{ $laptop->laptop_stock }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>

            <div class="col-12">
                <label for="laptop_desc" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="laptop_desc"
                    placeholder="{{ strip_tags($laptop->laptop_desc) }}" rows="10" disabled readonly></textarea>
            </div>

        </div>
    </div>
@endsection

@section('afterscript')

@endsection
