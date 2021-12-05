@extends('layout')
@section('title', 'Dashboard Offer')

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
            <div class="col-lg-10 mt-4">
                @if (session()->has('success'))
                    <div class="mb-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    @include('partials._listselleroffer')
                </div>

                <div class="table-responsive bg-white rounded">
                    @include('partials._tableselleroffer')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
