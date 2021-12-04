@extends('layout')
@section('title', 'Login')

@section('aftercss')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

    <!-- Demo styles -->
    <style>
        .content {
            min-height: 0;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #00c1eb;
        }

    </style>
@endsection

@section('content')
    @if (session()->has('success'))
        <div class="container mt-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="container mt-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container my-5 bg-white rounded">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="{{ asset('/img/asset/login-laptop.png') }}" class="img-fluid" alt="laptop-image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form action="/login" method="POST">
                    @csrf
                    <div class="divider d-flex align-items-center my-4">
                        <h1 class="text-center fw-bold mx-3 mb-0 text-blue">Login</h1>
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name="buyer_username" id="text"
                            class="form-control form-control-lg @error('username') is-invalid @enderror"
                            placeholder="Enter your username" required autofocus value="{{ old('username') }}" />
                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-group">
                            <input type="password" name="buyer_password" id="password" class="form-control form-control-lg"
                                placeholder="Enter password" required />
                            <span class="input-group-text">
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                            <label class="form-check-label">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" class="btn btn-blue btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a
                                href={{ route('pembeli-register') }} class="text-blue text-decoration-none">Register</a>
                        </p>

                        <p class="small fw-bold mt-2 pt-1 mb-4">Login as a seller? <a href={{ route('penjual-login') }}
                                class="text-blue text-decoration-none">Click Here</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('afterscript')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye / eye slash icon
            this.classList.toggle('bi-eye');
        });
    </script>
@endsection
