@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-user bg-white p-4 rounded">
                    <h1 class="mb-4"><i class="fs-1 far fa-user-circle"></i> John</h1>
                    <p class="m-0 mb-2">
                        @if (Request::is('account'))
                            <span class="text-blue">
                                <i class="far fa-address-book"></i> Akun Saya</span>
                        @else
                            <a class="link-blue" href="{{ route('buyer-account.detail') }}">
                                <i class="far fa-address-book"></i> Akun Saya</a>
                        @endif
                    </p>
                    <p class="m-0 mb-2">
                        @if (Request::is('order/*'))
                            <span class="text-blue">
                                <i class="fas fa-shopping-basket"></i> Pesanan
                                Saya</span>
                        @else
                            <a class="link-blue" href="{{ route('buyer-order.all') }}">
                                <i class="fas fa-shopping-basket"></i> Pesanan
                                Saya</a>
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-9">
                @yield('buyer-content')
            </div>
        </div>
    </div>
@endsection
