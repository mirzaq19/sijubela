@extends('layout')
@section('title', 'Edit Account ' . $seller_user->seller_username)

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

        <p class="h2">Edit Account</p>

        <form action="/dashboard/setting/edit" method="POST">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="seller_full_name" class="form-label">Name</label>

                    <input type="text" name="seller_full_name"
                        class="form-control @error('seller_full_name') is-invalid @enderror" id="seller_full_name"
                        placeholder="" required value="{{ old('seller_full_name', $seller_user->seller_full_name) }}">

                    @error('seller_full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="seller_email" class="form-label">Email</label>

                    <input type="text" name="seller_email" class="form-control @error('seller_email') is-invalid @enderror"
                        id="seller_email" placeholder="" required
                        value="{{ old('seller_email', $seller_user->seller_email) }}">

                    @error('seller_email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-6">
                    <label for="seller_phone" class="form-label">Phone</label>

                    <input type="text" name="seller_phone" class="form-control @error('seller_phone') is-invalid @enderror"
                        id="seller_phone" placeholder="" required
                        value="{{ old('seller_phone', $seller_user->seller_phone) }}">

                    @error('seller_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


            </div>

            <button type="submit" class="btn btn-success mb-3">Edit Account</button>

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
