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
                <a href="/admin-dashboard/laptops" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
        </div>

        <p class="h2">Add New Laptop</p>

        <form action="/admin-dashboard/laptops" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="laptop_name" class="form-label">Laptop Name</label>

                    <input type="text" name="laptop_name" class="form-control @error('laptop_name') is-invalid @enderror"
                        id="laptop_name" placeholder="" required value="{{ old('laptop_name') }}">

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
                        <option value="Acer" {{ old('laptop_brand') == 'Acer' ? 'selected' : '' }}>Acer</option>
                        <option value="Apple" {{ old('laptop_brand') == 'Apple' ? 'selected' : '' }}>Apple</option>
                        <option value="Asus" {{ old('laptop_brand') == 'Asus' ? 'selected' : '' }}>Asus</option>
                        <option value="Axioo" {{ old('laptop_brand') == 'Axioo' ? 'selected' : '' }}>Axioo</option>
                        <option value="Dell" {{ old('laptop_brand') == 'Dell' ? 'selected' : '' }}>Dell</option>
                        <option value="HP" {{ old('laptop_brand') == 'HP' ? 'selected' : '' }}>HP</option>
                        <option value="Lenovo" {{ old('laptop_brand') == 'Lenovo' ? 'selected' : '' }}>Lenovo</option>
                        <option value="Toshiba" {{ old('laptop_brand') == 'Toshiba' ? 'selected' : '' }}>Toshiba</option>
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
                        <option value="2 in 1" {{ old('laptop_type') == '2 in 1' ? 'selected' : '' }}>2 in 1</option>
                        <option value="Business" {{ old('laptop_type') == 'Business' ? 'selected' : '' }}>Business
                        </option>
                        <option value="Daily" {{ old('laptop_type') == 'Daily' ? 'selected' : '' }}>Daily</option>
                        <option value="Gaming" {{ old('laptop_type') == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                        <option value="Netbook" {{ old('laptop_type') == 'Netbook' ? 'selected' : '' }}>Netbook</option>
                        <option value="Ultrabook" {{ old('laptop_type') == 'Ultrabook' ? 'selected' : '' }}>Ultrabook
                        </option>
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
                        <option value='1' {{ old('laptop_condition') == '1' ? 'selected' : '' }}>New</option>
                        <option value='0' {{ old('laptop_condition') == '0' ? 'selected' : '' }}>Old</option>
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
                        required value="{{ old('laptop_weight') }}">

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
                        required value="{{ old('laptop_price') }}">

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
                        required value="{{ old('laptop_stock') }}">

                    @error('laptop_stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="laptop_images" class="form-label">Laptop images</label>
                    <input
                        class="form-control @error('laptop_image.*') is-invalid @enderror @error('laptop_image') is-invalid @enderror"
                        type="file" id="laptop_images" accept="image/png, image/gif, image/jpeg, image/webp"
                        name="laptop_image[]" multiple>
                    @error('laptop_image.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('laptop_image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="laptop_desc" class="form-label">Description</label>
                    <input class="form-control @error('laptop_desc') is-invalid @enderror" id="laptop_desc" type="hidden"
                        name="laptop_desc" value="{{ old('laptop_desc') }}">
                    <trix-editor input="laptop_desc"></trix-editor>
                    @error('laptop_desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Add Laptop</button>

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
