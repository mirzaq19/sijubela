@extends('layout')
@section('title', 'Settings')

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
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-2 mt-2">
                @include('partials._sidebarseller')
            </div>
            <div class="col-lg-10 mt-4 bg-white rounded">

                @if (session()->has('success'))
                    <div class="mt-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="d-flex justify-content-between py-3">
                    <div class="h2">
                        Detail Account Seller
                    </div>
                    <div class="p-2"></div>
                    <div class="p-2">
                        <a href="/dashboard/setting/edit" class="btn btn-warning"><i class="far fa-edit"></i> Edit</a>
                    </div>
                </div>

                <div class="row g-3 pb-3">
                    <div class="col-12">
                        <label for="seller_full_name" class="form-label">Name</label>

                        <input type="text" class="form-control" id="seller_full_name"
                            placeholder="{{ $seller_user->seller_full_name }}" disabled readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="seller_username" class="form-label">Username</label>

                        <input type="text" class="form-control" id="seller_username"
                            placeholder="{{ $seller_user->seller_username }}" disabled readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="seller_email" class="form-label">Email</label>

                        <input type="text" class="form-control" id="seller_email"
                            placeholder="{{ $seller_user->seller_email }}" disabled readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="seller_phone" class="form-label">Phone</label>

                        <input type="text" class="form-control" id="seller_phone"
                            placeholder="{{ $seller_user->seller_phone }}" disabled readonly>
                    </div>
                </div>


                <div class="d-flex justify-content-between py-3">
                    <div class="h2">
                        Detail Account Bank
                    </div>
                    @if ($bank != null)
                        <div class="p-2"></div>
                        <div class="p-2">
                            <a href="/dashboard/setting/edit-bank/{{ $seller_user->id }}" class="btn btn-warning"><i
                                    class="far fa-edit"></i> Edit Bank</a>
                        </div>
                    @endif
                </div>

                @if ($bank == null)
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> You don't have any bank account.
                    </div>
                    <div class="d-grid my-3">
                        <a href="/dashboard/setting/add-bank" class="btn btn-success">
                            <i class="fa fa-plus"></i>
                            Add Bank Account
                        </a>
                    </div>

                @else
                    <div class="row g-3 pb-3">
                        <div class="col-12">
                            <label for="bank_name" class="form-label">Bank</label>

                            <input type="text" class="form-control" id="bank_name" placeholder="{{ $bank->bank_name }}"
                                disabled readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="account_name" class="form-label">Account Name</label>

                            <input type="text" class="form-control" id="account_name"
                                placeholder="{{ $bank->account_name }}" disabled readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="account_number" class="form-label">Account Number</label>

                            <input type="text" class="form-control" id="account_number"
                                placeholder="{{ $bank->account_number }}" disabled readonly>
                        </div>
                    </div>


                @endif
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
