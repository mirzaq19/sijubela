@extends('layout')
@section('title', 'Dashboard Admin')

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
            <div class="col-lg-2">
                @include('partials._sidebaradmin')
            </div>
            <div class="col-lg-10">

            </div>
        </div>
    </div>
@endsection

@section('afterscript')

@endsection
