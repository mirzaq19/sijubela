@extends('layout')
@section('title', 'Edit Laptop')

@section('aftercss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.js"></script>

    <!-- Demo styles -->
    <style>
        .content {
            min-height: 0;
        }

        /* Delete upload file feature trix editor */
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
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
        </div>

        <p class="h2">Edit Laptop</p>

        <form action="/admin-dashboard/laptops/{{ $laptop->id }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="laptop_name" class="form-label">Laptop Name</label>

                    <input type="text" name="laptop_name" class="form-control @error('laptop_name') is-invalid @enderror"
                        id="laptop_name" placeholder="" required value="{{ old('laptop_name', $laptop->laptop_name) }}">

                    @error('laptop_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_brand" class="form-label">Laptop Brand</label>

                    <select class="form-select @error('laptop_brand') is-invalid @enderror" name="laptop_brand"
                        id="laptop_brand" required>
                        <option value="{{ $laptop->laptop_brand }}" selected> {{ $laptop->laptop_brand }} </option>
                        @if ($laptop->laptop_brand != 'Acer')
                            <option value="Acer">Acer</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Apple')
                            <option value="Apple">Apple</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Asus')
                            <option value="Asus">Asus</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Axioo')
                            <option value="Axioo">Axioo</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Dell')
                            <option value="Dell">Dell</option>
                        @endif
                        @if ($laptop->laptop_brand != 'HP')
                            <option value="HP">HP</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Lenovo')
                            <option value="Lenovo">Lenovo</option>
                        @endif
                        @if ($laptop->laptop_brand != 'Toshiba')
                            <option value="Toshiba">Toshiba</option>
                        @endif
                    </select>

                    @error('laptop_brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_type" class="form-label">Laptop Type</label>

                    <select class="form-select @error('laptop_type') is-invalid @enderror" name="laptop_type"
                        id="laptop_type" required>
                        <option value="{{ $laptop->laptop_type }}" selected> {{ $laptop->laptop_type }} </option>
                        @if ($laptop->laptop_type != '2 in 1')
                            <option value="2 in 1">2 in 1</option>
                        @endif
                        @if ($laptop->laptop_type != 'Business')
                            <option value="Business">Business</option>
                        @endif
                        @if ($laptop->laptop_type != 'Daily')
                            <option value="Daily">Daily</option>
                        @endif
                        @if ($laptop->laptop_type != 'Gaming')
                            <option value="Gaming">Gaming</option>
                        @endif
                        @if ($laptop->laptop_type != 'Netbook')
                            <option value="Netbook">Netbook</option>
                        @endif
                        @if ($laptop->laptop_type != 'Ultrabook')
                            <option value="Ultrabook">Ultrabook</option>
                        @endif

                    </select>

                    @error('laptop_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_condition" class="form-label ">Condition</label>

                    <select class="form-select @error('laptop_condition') is-invalid @enderror" name="laptop_condition"
                        id="laptop_condition" required>
                        <option value="{{ $laptop->laptop_condition }}" selected> {{ $laptop->laptop_condition }}
                        </option>
                        @if ($laptop->laptop_condition != 'New')
                            <option value="New">New</option>
                        @else
                            <option value="New">Old</option>
                        @endif
                    </select>

                    @error('laptop_condition')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_weight" class="form-label">Weight (kg)</label>

                    <input type="number" step="0.01" name="laptop_weight"
                        class="form-control @error('laptop_weight') is-invalid @enderror" id="laptop_weight" placeholder=""
                        required value="{{ old('laptop_weight', $laptop->laptop_weight) }}">

                    @error('laptop_weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_price" class="form-label">Price (Rp)</label>

                    <input type="number" name="laptop_price"
                        class="form-control @error('laptop_price') is-invalid @enderror" id="laptop_price" placeholder=""
                        required value="{{ old('laptop_price', $laptop->laptop_price) }}">

                    @error('laptop_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="laptop_stock" class="form-label">Stock</label>

                    <input type="number" name="laptop_stock"
                        class="form-control @error('laptop_stock') is-invalid @enderror" id="laptop_stock" placeholder=""
                        required value="{{ old('laptop_stock', $laptop->laptop_stock) }}">

                    @error('laptop_stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="laptop_desc" class="form-label">Description</label>

                    @error('laptop_desc')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror

                    <input id="laptop_desc" type="hidden" name="laptop_desc"
                        value="{{ old('laptop_desc', $laptop->laptop_desc) }}"">
                    <trix-editor input="laptop_desc"></trix-editor>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Update Laptop</button>

        </form>
    </div>
@endsection

@section('afterscript')
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
@endsection
