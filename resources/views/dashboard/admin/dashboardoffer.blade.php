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
            <div class="col-lg-2 mt-2">
                @include('partials._sidebaradmin')
            </div>
            <div class="col-lg-10 mt-2">
                @if (session()->has('success'))
                    <div class="mb-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif

                <div class="mb-3">
                    <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                        <li class="list-group-item list-group-item-action active text-center" id="status-wait-confirmation"
                            data-bs-toggle="list" href="#status-wait-confirmation" role="tab"
                            aria-controls="status-wait-confirmation">
                            Waiting Confirmation
                        </li>
                        <li class="list-group-item list-group-item-action text-center" id="status-rejected"
                            data-bs-toggle="list" href="#status-rejected" role="tab" aria-controls="status-rejected">
                            Rejected
                        </li>
                        <li class="list-group-item list-group-item-action text-center" id="status-accepted"
                            data-bs-toggle="list" href="#status-accepted" role="tab" aria-controls="status-accepted">
                            Accepted
                        </li>
                    </div>
                </div>

                <div class="table-responsive bg-white rounded">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Laptop</th>
                                <th class="text-center" scope="col">Condition</th>
                                <th class="text-center" scope="col">Price</th>
                                <th class="text-center" scope="col">Weight</th>
                                <th class="text-center" scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="status-wait-confirmation" role="tabpanel"
                                    aria-labelledby="status-wait-confirmation">
                                    @foreach ($offers as $offer)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                                            <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                                            </td>
                                            <td class="text-center">Rp
                                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                                            <td class="text-center">
                                                <a href="/admin-dashboard/sell_laptops/{{ $offer->id }}"
                                                    class="badge bg-info"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="status-rejected" role="tabpanel"
                                    aria-labelledby="status-rejected">
                                    @foreach ($offers_rejected as $offer)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                                            <td class="text-center">{{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                                            </td>
                                            <td class="text-center">Rp
                                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                                            <td class="text-center">
                                                <a href="/admin-dashboard/sell_laptops/{{ $offer->id }}"
                                                    class="badge bg-info"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="status-accepted" role="tabpanel"
                                    aria-labelledby="status-accepted">
                                    @foreach ($offers_accepted as $offer)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-center">{{ $offer->sell_laptop_name }}</td>
                                            <td class="text-center">
                                                {{ $offer->sell_laptop_condition ? 'New' : 'Old' }}
                                            </td>
                                            <td class="text-center">Rp
                                                {{ number_format($offer->sell_laptop_price, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $offer->sell_laptop_weight }}</td>
                                            <td class="text-center">
                                                <a href="/admin-dashboard/sell_laptops/{{ $offer->id }}"
                                                    class="badge bg-info"><i class="fas fa-info-circle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    {{-- <script>
        var triggerEl = document.querySelector('#status-wait-confirmation a[href="#status-wait-confirmation"]')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
        var triggerEl = document.querySelector('#status-rejected a[href="#status-rejected"]')
        bootstrap.Tab.getInstance(triggerEl).show() // Select tab by name
    </script> --}}
@endsection
