@extends('layout')
@section('title', 'Detail Offer ' . $sell_laptop->sell_laptop_name)

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
    @include('partials._offerdetailseller')
@endsection

@section('afterscript')

@endsection
