@auth('admin_user')
    <footer class="bg-grey text-white pb-3 pt-5">
    @else
        <footer class="bg-blue text-white pb-3 pt-5">
        @endauth

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-lg-4 d-flex justify-content-md-start justify-content-center  ">
                            <a href="{{ route('beranda') }}">

                                <img class="h-100" src="{{ asset('img/logo.svg') }}" alt="Logo">
                            </a>
                        </div>
                        <div class="col-lg-8 text-md-start text-center">
                            <h1>Toko Sijubela</h1>
                            <p>Jl. Aryobebangah No.176, Kec. Gedangan, Kab. Sidoarjo, Jawa Timur 61253</p>
                            <p class="m-0">Phone: 0812213123123</p>
                            <p class="m-0">Whatsapp: 0812213123123</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-md-end text-center mb-3 mt-4 mt-md-0">Follow us on:</h2>
                    <div class="row justify-content-md-end justify-content-center">
                        <div class="col-auto">
                            <a href="#" class="btn btn-outline-light btn-block">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-outline-light btn-block">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-outline-light btn-block">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a href="#" class="btn btn-outline-light btn-block">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="divider-white">
            <div class="text-center">
                <p>&copy; 2021 - Toko Sijubela</p>
            </div>
        </div>
    </footer>
