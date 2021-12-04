@extends('layout')
@section('title', 'Add New Laptop')

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
                <a href="/dashboard" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
        </div>

        <p class="h2">Add New Laptop</p>

        <form action="/dashboard/add-laptop" method="POST">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="sell_laptop_name" class="form-label">Laptop Name</label>

                    <input type="text" name="sell_laptop_name"
                        class="form-control @error('sell_laptop_name') is-invalid @enderror" id="sell_laptop_name"
                        placeholder="" required value="{{ old('sell_laptop_name') }}">

                    @error('sell_laptop_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_brand" class="form-label">Laptop Brand</label>

                    <select class="form-select @error('sell_laptop_brand') is-invalid @enderror" name="sell_laptop_brand"
                        id="sell_laptop_brand" required>
                        <option value="Acer">Acer</option>
                        <option value="Apple">Apple</option>
                        <option value="Asus">Asus</option>
                        <option value="Axioo">Axioo</option>
                        <option value="Dell">Dell</option>
                        <option value="HP">HP</option>
                        <option value="Lenovo">Lenovo</option>
                        <option value="Toshiba">Toshiba</option>
                    </select>

                    @error('sell_laptop_brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_type" class="form-label">Laptop Type</label>

                    <select class="form-select @error('sell_laptop_type') is-invalid @enderror" name="sell_laptop_type"
                        id="sell_laptop_type" required>
                        <option value="2 in 1">2 in 1</option>
                        <option value="Business">Business</option>
                        <option value="Daily">Daily</option>
                        <option value="Gaming">Gaming</option>
                        <option value="Netbook">Netbook</option>
                        <option value="Ultrabook">Ultrabook</option>
                    </select>

                    @error('sell_laptop_type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_condition" class="form-label ">Condition</label>

                    <select class="form-select @error('sell_laptop_condition') is-invalid @enderror"
                        name="sell_laptop_condition" id="sell_laptop_condition" required>
                        <option value=1>New</option>
                        <option value=0>Old</option>
                    </select>

                    @error('sell_laptop_condition')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_weight" class="form-label">Weight (kg)</label>

                    <input type="number" step="0.01" name="sell_laptop_weight"
                        class="form-control @error('sell_laptop_weight') is-invalid @enderror" id="sell_laptop_weight"
                        placeholder="" required value="{{ old('sell_laptop_weight') }}">

                    @error('sell_laptop_weight')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_price" class="form-label">Price (Rp)</label>

                    <input type="number" name="sell_laptop_price"
                        class="form-control @error('sell_laptop_price') is-invalid @enderror" id="sell_laptop_price"
                        placeholder="" required value="{{ old('sell_laptop_price') }}">

                    @error('sell_laptop_price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label for="sell_laptop_usage_time" class="form-label">Usage Time (Month)</label>

                    <input type="number" name="sell_laptop_usage_time"
                        class="form-control @error('sell_laptop_usage_time') is-invalid @enderror"
                        id="sell_laptop_usage_time" placeholder="" required value="{{ old('sell_laptop_usage_time') }}">

                    @error('sell_laptop_usage_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="sell_laptop_desc" class="form-label">Description</label>

                    @error('sell_laptop_desc')
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    @enderror

                    <input id="sell_laptop_desc" type="hidden" name="sell_laptop_desc"
                        value="{{ old('sell_laptop_desc') }}"">
                    <trix-editor input="sell_laptop_desc"></trix-editor>
                </div>
            </div>

            <button type="submit" class="btn btn-success mb-3">Add Laptop</button>

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
