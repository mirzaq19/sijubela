@extends('layout')
@section('title', 'Add Bank Account')

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
                <a href="/dashboard/setting" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-circle-left"></i>
                </a>
            </div>
        </div>

        <p class="h2">Add Bank Account</p>

        <form action="/dashboard/setting/add-bank" method="POST">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="bank_name" class="form-label">Name Bank</label>

                    <select class="form-select @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name"
                        required>
                        <option value="BCA">BCA</option>
                        <option value="BNI">BNI</option>
                        <option value="Mandiri">Mandiri</option>
                        <option value="BSI">BSI</option>
                        <option value="BRI">BRI</option>
                        <option value="Muamalat">Muamalat</option>
                        <option value="Jago">Jago</option>
                        <option value="BTN">BTN</option>
                    </select>

                    @error('bank_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="account_name" class="form-label">Account Name</label>

                    <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror"
                        id="account_name" placeholder="" required value="{{ old('account_name') }}">

                    @error('account_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="account_number" class="form-label">Account Number</label>

                    <input type="text" name="account_number"
                        class="form-control @error('account_number') is-invalid @enderror" id="account_number"
                        placeholder="" required value="{{ old('account_number') }}">

                    @error('account_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-success mb-3">Add Bank</button>

        </form>
    </div>
@endsection

@section('afterscript')
@endsection
