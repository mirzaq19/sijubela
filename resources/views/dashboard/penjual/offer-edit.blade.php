@extends('layout')
@section('title', 'Edit Laptop' . $sell_laptop->sell_laptop_name)

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

        <form action="/dashboard/offer/edit/{{ $sell_laptop->id }}" method="POST">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="sell_laptop_name" class="form-label">Laptop Name</label>

                    <input type="text" name="sell_laptop_name"
                        class="form-control @error('sell_laptop_name') is-invalid @enderror" id="sell_laptop_name"
                        placeholder="" required value="{{ old('sell_laptop_name', $sell_laptop->sell_laptop_name) }}">

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
                        <option value="{{ $sell_laptop->sell_laptop_brand }}" selected>
                            {{ $sell_laptop->sell_laptop_brand }}
                        </option>
                        @if ($sell_laptop->sell_laptop_brand != 'Acer')
                            <option value="Acer">Acer</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Apple')
                            <option value="Apple">Apple</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Asus')
                            <option value="Asus">Asus</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Axioo')
                            <option value="Axioo">Axioo</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Dell')
                            <option value="Dell">Dell</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'HP')
                            <option value="HP">HP</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Lenovo')
                            <option value="Lenovo">Lenovo</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_brand != 'Toshiba')
                            <option value="Toshiba">Toshiba</option>
                        @endif
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
                        <option value="{{ $sell_laptop->sell_laptop_type }}" selected>
                            {{ $sell_laptop->sell_laptop_type }}
                        </option>
                        @if ($sell_laptop->sell_laptop_type != '2 in 1')
                            <option value="2 in 1">2 in 1</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_type != 'Business')
                            <option value="Business">Business</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_type != 'Daily')
                            <option value="Daily">Daily</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_type != 'Gaming')
                            <option value="Gaming">Gaming</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_type != 'Netbook')
                            <option value="Netbook">Netbook</option>
                        @endif
                        @if ($sell_laptop->sell_laptop_type != 'Ultrabook')
                            <option value="Ultrabook">Ultrabook</option>
                        @endif

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
                        <option value="{{ $sell_laptop->sell_laptop_condition }}" selected>
                            {{ $sell_laptop->sell_laptop_condition ? 'New' : 'Old' }}
                        </option>
                        @if ($sell_laptop->sell_laptop_condition != '1')
                            <option value="1">New</option>
                        @else
                            <option value="0">Old</option>
                        @endif
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
                        placeholder="" required
                        value="{{ old('sell_laptop_weight', $sell_laptop->sell_laptop_weight) }}">

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
                        placeholder="" required value="{{ old('sell_laptop_price', $sell_laptop->sell_laptop_price) }}">

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
                        id="sell_laptop_usage_time" placeholder="" required
                        value="{{ old('sell_laptop_usage_time', $sell_laptop->sell_laptop_usage_time) }}">

                    @error('sell_laptop_usage_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="sell_laptop_images" class="form-label">Laptop images</label>
                    <div class="row mb-3">
                        @foreach ($sell_laptop->sell_laptop_image()->get() as $image)
                            <div class="col-sm-3">
                                <figure class="figure img-thumbnail">
                                    <img src="{{ asset($image->sell_laptop_image) }}"
                                        class="figure-img img-fluid rounded" alt="Laptop Image">
                                    <figcaption class="figure-caption text-center">
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-imagepath="{{ $image->sell_laptop_image }}"
                                            data-bs-imageid={{ $image->id }} data-bs-target="#deleteImageConfirmModal"
                                            type="button">Delete</button>
                                    </figcaption>
                                </figure>
                            </div>
                        @endforeach
                    </div>
                    <input
                        class="form-control @error('sell_laptop_image.*') is-invalid @enderror @error('sell_laptop_image') is-invalid @enderror"
                        type="file" id="sell_laptop_images" accept="image/png, image/gif, image/jpeg, image/webp"
                        name="sell_laptop_image[]" multiple>
                    @error('sell_laptop_image.*')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @error('sell_laptop_image')
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
                        value="{{ old('sell_laptop_desc', $sell_laptop->sell_laptop_desc) }}">
                    <trix-editor input="sell_laptop_desc"></trix-editor>
                </div>
            </div>

            <button type="submit" class="btn btn-success mb-3">Edit Laptop</button>

        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteImageConfirmModal" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="deleteImageConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteImageConfirmModalLabel">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="deletedImage" class="img-thumbnail mb-3" style="max-width: 60%"
                        data-bs-path="{{ asset('') }}" src="" alt="Laptop image">
                    <p>
                        Are you sure want to delete this image?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
    @if ($sell_laptop->sell_laptop_image()->count() > 0)
        <script>
            const deleteImageConfirmModal = document.querySelector('#deleteImageConfirmModal');
            deleteImageConfirmModal.addEventListener('show.bs.modal', function(e) {
                const button = e.relatedTarget;
                const imagePath = button.dataset.bsImagepath;
                const imageId = button.dataset.bsImageid;
                const deletedImage = document.querySelector('#deletedImage');
                deletedImage.src = deletedImage.dataset.bsPath + imagePath;

                const form = deleteImageConfirmModal.querySelector('form');
                form.action = `/dashboard/offer/edit/image/${imageId}`;

                deleteImageConfirmModal.querySelector('button.btn-danger').focus();
            });
        </script>
    @endif
@endsection
