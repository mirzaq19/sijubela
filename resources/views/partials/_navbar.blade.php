<nav class="navbar navbar-expand-lg navbar-light {{ true ? 'bg-blue' : 'bg-grey' }} py-3">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ asset('img/logo.png') }}" alt="Logo" width="40"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if (true)
                <div class="find mx-auto my-2 my-lg-0">
                    <form class="d-flex">
                        <div class="input-group bg-light rounded">
                            <input type="text" class="form-control border border-white"
                                placeholder="Yuk cari laptop kamu" aria-label="Recipient's username"
                                aria-describedby="button-addon2">
                            <button class="btn btn-outline-light" type="button" id="button-addon2"><i
                                    class="fas fa-search text-blue"></i></button>
                        </div>
                    </form>
                </div>
            @endif

            <div class="user navbar-nav {{ false ? 'ms-auto' : '' }}">
                @if (true)
                    <div class="dropdown">
                        <button class="btn dropdown-toggle text-white d-flex align-items-center" type="button"
                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                            <span class="mx-2">Name</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Akun Saya</a></li>
                            @if (true)
                                <li><a class="dropdown-item" href="#">Pesanan Saya</a></li>
                            @else
                                <li><a class="dropdown-item" href="#">Penjualan Saya</a></li>
                            @endif
                            <li><span class="dropdown-item"><a class="btn btn-danger" href="#">Logout</a></span></li>
                        </ul>
                    </div>
                @elseif (true)
                    <button class="btn text-white d-flex align-items-center">
                        <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                        <span class="mx-2">Name</span>
                    </button>
                @else
                    <a class="text-white btn d-flex align-items-center" href="#">
                        <i class="fas fa-user-circle" style="font-size: 2rem"></i>
                        <span class="mx-2">Login</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>
