@extends('layout')
@section('title', 'Edit Account Bank')

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

        <p class="h2">Edit Account Bank</p>

        <form action="/dashboard/setting/edit-bank/{{ $bank->id }}" method="POST">
            @csrf
            <div class="row g-3 pb-3">
                <div class="col-12">
                    <label for="bank_name" class="form-label">Name</label>

                    <select class="form-select @error('bank_name') is-invalid @enderror" name="bank_name" id="bank_name"
                        required>
                        <option value="{{ $bank->bank_name }}" selected>{{ $bank->bank_name }}</option>
                        @if ($bank->bank_name != 'BCA')
                            <option value="BCA">BCA</option>
                        @endif
                        @if ($bank->bank_name != 'BNI')
                            <option value="BNI">BNI</option>
                        @endif
                        @if ($bank->bank_name != 'Mandiri')
                            <option value="Mandiri">Mandiri</option>
                        @endif
                        @if ($bank->bank_name != 'BSI')
                            <option value="BSI">BSI</option>
                        @endif
                        @if ($bank->bank_name != 'BRI')
                            <option value="BRI">BRI</option>
                        @endif
                        @if ($bank->bank_name != 'Muamalat')
                            <option value="Muamalat">Muamalat</option>
                        @endif
                        @if ($bank->bank_name != 'Jago')
                            <option value="Jago">Jago</option>
                        @endif
                        @if ($bank->bank_name != 'BTN')
                            <option value="BTN">BTN</option>
                        @endif
                    </select>

                    @error('bank_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="account_name" class="form-label">Account Name</label>

                    <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror"
                        id="account_name" placeholder="" required value="{{ old('account_name', $bank->account_name) }}">

                    @error('account_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="account_number" class="form-label">Account Number</label>

                    <input type="text" name="account_number"
                        class="form-control @error('account_number') is-invalid @enderror" id="account_number"
                        placeholder="" required value="{{ old('account_number', $bank->account_number) }}">

                    @error('account_number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


            </div>

            <button type="submit" class="btn btn-success mb-3">Edit Account Bank</button>

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
