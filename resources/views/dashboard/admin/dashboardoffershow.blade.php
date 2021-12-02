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
                <a href="/admin-dashboard/sell_laptops" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="p-2"></div>
            <div class="p-2">

                <a href="#" class="btn btn-danger">Reject</a>
                <form action="#" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-success">Accept</button>
                </form>
            </div>
        </div>
        <p class="h2">Offer Detail</p>
        <div class="row g-3 pb-3">
            <div class="col-12">
                <label for="sell_laptop_name" class="form-label">Name</label>

                <input type="text" class="form-control" id="sell_laptop_name"
                    placeholder="{{ $sell_laptop->sell_laptop_name }}" aria-label="Disabled input example" disabled
                    readonly>
            </div>

            <div class="col-md-6">
                <label for="sell_laptop_brand" class="form-label">Brand</label>

                <input type="text" class="form-control" id="sell_laptop_brand"
                    placeholder="{{ $sell_laptop->sell_laptop_brand }}" aria-label="Disabled input example" disabled
                    readonly>
            </div>
            <div class="col-md-6">
                <label for="sell_laptop_type" class="form-label">Type</label>

                <input type="text" class="form-control" id="sell_laptop_type"
                    placeholder="{{ $sell_laptop->sell_laptop_type }}" aria-label="Disabled input example" disabled
                    readonly>
            </div>
            <div class="col-md-6">
                <label for="sell_laptop_price" class="form-label">Price (Rp)</label>

                <input type="text" class="form-control" id="sell_laptop_price"
                    placeholder="{{ number_format($sell_laptop->sell_laptop_price, 0, ',', '.') }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>

            <div class="col-md-6">
                <label for="sell_laptop_negotiable" class="form-label">Negotiable</label>

                <input type="text" class="form-control" id="sell_laptop_negotiable"
                    placeholder="{{ $sell_laptop->sell_laptop_negotiable ? 'Yes' : 'No' }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>

            <div class="col-md-6">
                <label for="sell_laptop_condition" class="form-label">Condition</label>

                <input type="text" class="form-control" id="sell_laptop_condition"
                    placeholder="{{ $sell_laptop->sell_laptop_condition ? 'New' : 'Old' }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>



            <div class="col-md-6">
                <label for="sell_laptop_usage_time" class="form-label">Usage (Months)</label>

                <input type="text" class="form-control" id="sell_laptop_usage_time"
                    placeholder="{{ $sell_laptop->sell_laptop_condition ? '-' : $sell_laptop->sell_laptop_usage_time }}"
                    aria-label="Disabled input example" disabled readonly>
            </div>


            <div class="col-12">
                <label for="sell_laptop_desc" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="sell_laptop_desc"
                    placeholder="{{ $sell_laptop->sell_laptop_desc }}" rows="10" disabled readonly></textarea>
            </div>

        </div>
    </div>
@endsection

@section('afterscript')

@endsection
