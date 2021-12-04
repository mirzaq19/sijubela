@extends('layout')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-user bg-white p-4 rounded">
                    <div class="row mb-4">
                        <div class="col-lg-2 text-center text-lg-start">
                            <i class="fs-1 far fa-user-circle"></i>
                        </div>
                        <div class="col-lg-10 d-flex align-items-center justify-content-center justify-content-lg-start">
                            <p class="fs-6 m-0 text-center">
                                <strong>{{ Auth::guard('buyer_user')->user()->buyer_full_name }}</strong>
                            </p>
                        </div>
                    </div>
                    <p class="m-0 mb-2">
                        @if (Request::is('account/*'))
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
