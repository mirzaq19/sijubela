@extends('layout')
@section('title', 'Change Status Offer')

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
        </div>
        <p class="h2">Change Status Offer from {{ $sell_laptop->seller_user->seller_full_name }}</p>
        <form action="/admin-dashboard/sell_laptops/{{ $sell_laptop->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="sell_laptop_name" class="form-label">Name</label>

                    <input type="text" name="sell_laptop_name" class="form-control" id="sell_laptop_name"
                        value="{{ $sell_laptop->sell_laptop_name }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="sell_laptop_brand" class="form-label">Brand</label>

                    <input type="text" name="sell_laptop_brand" class="form-control" id="sell_laptop_brand"
                        value="{{ $sell_laptop->sell_laptop_brand }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="sell_laptop_type" class="form-label">Type</label>

                    <input type="text" class="form-control" name="sell_laptop_type" id="sell_laptop_type"
                        value="{{ $sell_laptop->sell_laptop_type }}" readonly>
                </div>
                <div class="col-md-6">
                    <label for="sell_laptop_price" class="form-label">Price (Rp)</label>

                    <input type="text" class="form-control" name="sell_laptop_price" id="sell_laptop_price"
                        value="{{ number_format($sell_laptop->sell_laptop_price, 0, ',', '.') }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="sell_laptop_weight" class="form-label">Weight (kg)</label>

                    <input type="text" class="form-control" name="sell_laptop_weight" id="sell_laptop_weight"
                        value="{{ $sell_laptop->sell_laptop_weight }}" readonly>
                </div>

                <div class="col-md-6">
                    <label for="sell_laptop_condition" class="form-label">Condition</label>

                    <input type="text" class="form-control" name="sell_laptop_condition" id="sell_laptop_condition"
                        value="{{ $sell_laptop->sell_laptop_condition ? 'New' : 'Old' }}" readonly>
                </div>



                <div class="col-md-6">
                    <label for="sell_laptop_usage_time" class="form-label">Usage (Months)</label>

                    <input type="text" class="form-control" name="sell_laptop_usage_time" id="sell_laptop_usage_time"
                        value="{{ $sell_laptop->sell_laptop_condition ? '-' : $sell_laptop->sell_laptop_usage_time }}"
                        readonly>
                </div>


                <div class="col-12">
                    <label for="sell_laptop_desc" class="form-label">Description</label>
                    <textarea type="text" name="sell_laptop_desc" class="form-control" id="sell_laptop_desc"
                        placeholder="{{ $sell_laptop->sell_laptop_desc }}" rows="10" readonly></textarea>
                </div>

                <div class="col-12">
                    <label for="sell_laptop_status" class="form-label">Status</label>

                    <select class="form-select @error('sell_laptop_status') is-invalid @enderror" name="sell_laptop_status"
                        id="sell_laptop_status" required>
                        <option value=0>Waiting Confirmation</option>
                        <option value=1>Accept</option>
                        <option value=2>Reject</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success mb-3">Change Status Laptop</button>
            </div>
        </form>
    </div>
@endsection

@section('afterscript')

@endsection
