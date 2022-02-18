@auth('admin_user')
    <nav class="navbar navbar-expand-lg navbar-dark bg-grey py-3">
    @else
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue py-3">
        @endauth

        <div class="container">
            <a class="navbar-brand" href="{{ route('beranda') }}"><img src="{{ asset('img/logo.svg') }}" alt="Logo"
                    width="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                {{-- <span class="navbar-toggler-icon"></span> --}}
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <div class="find mx-auto my-2 my-lg-0">
                    <form class="d-flex align-items-center">
                        <div class="input-group bg-light rounded">
                            <input type="text" class="form-control border border-white"
                                placeholder="Yuk cari laptop kamu" aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-light" type="button" id="button-addon2"><i
                                    class="fas fa-search text-blue"></i></button>
                        </div>
                        @auth('buyer_user')
                            <a class="m-0 ms-4 text-white h3" href="{{ route('cart.index') }}"><i
                                    class="fas fa-shopping-cart"></i></a>
                        @endauth
                    </form>
                </div>


                <div class="user navbar-nav {{ false ? 'ms-auto' : '' }}">
                    @auth('buyer_user')
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white d-flex align-items-center px-0" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                                <span
                                    class="mx-2">{{ auth()->guard('buyer_user')->user()->buyer_username }}</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('buyer-account.index') }}">Akun Saya</a></li>

                                <li><a class="dropdown-item" href="{{ route('buyer-order.index') }}">Pesanan Saya</a>
                                </li>


                                <form action="{{ route('pembeli-logout') }}" method="POST">
                                    @csrf
                                    <li><span class="dropdown-item">
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </span></li>
                                </form>
                            </ul>
                        </div>
                    @elseif (Auth::guard('seller_user')->check())
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white d-flex align-items-center px-0" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                                <span
                                    class="mx-2">{{ auth()->guard('seller_user')->user()->seller_username }}</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('penjual-dashboard') }}">Akun Saya</a></li>

                                <li><a class="dropdown-item" href="{{ route('penjual-dashboard-offers') }}">Penjualan Saya</a></li>

                                <form action="/seller-logout" method="POST">
                                    @csrf
                                    <li><span class="dropdown-item">
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </span></li>
                                </form>
                            </ul>
                        </div>

                    @elseif (Auth::guard('admin_user')->check())
                        <div class="dropdown">
                            <button class="btn dropdown-toggle text-white d-flex align-items-center px-0" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                                <span
                                    class="mx-2">{{ auth()->guard('admin_user')->user()->admin_username }}</span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Akun Saya</a></li>

                                <form action="/admin-logout" method="POST">
                                    @csrf
                                    <li><span class="dropdown-item">
                                            <button type="submit" class="btn btn-danger">Logout</button>
                                        </span></li>
                                </form>
                            </ul>
                        </div>

                    @else
                        <a class="text-white btn d-flex align-items-center px-0" href="{{ route('pembeli-login') }}">
                            <i class="fas fa-sign-in-alt" style="font-size: 1.1rem"></i>
                            <span class="mx-2">Login</span>
                        </a>
                    @endauth

                </div>
            </div>
        </div>
    </nav>
