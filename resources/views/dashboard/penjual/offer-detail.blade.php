@extends('layout')
@section('title', 'Detail Offer ' . $sell_laptop->sell_laptop_name)

@section('aftercss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Demo styles -->
    <style>
        .content {
            min-height: 0;
        }

        #sell_laptop_desc {
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #757575;
            background-color: #e9ecef;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            cursor: default;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

    </style>
@endsection

@section('content')
    @include('partials._offerdetailseller')
@endsection

@section('afterscript')

@endsection
