@extends('layout')
@section('title', 'Register Seller')

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
    <div class="container my-5 bg-white rounded">
        <form class="px-2" action="/seller-register" method="POST">
            @csrf
            <div class="divider d-flex align-items-center pt-4 mb-5">
                <h1 class="text-center fw-bold mx-3 mb-0 text-blue">Register Seller</h1>
            </div>


            <!-- Username & Full Name input -->
            <div class="row mb-4">
                <div class="col">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" name="seller_username" id="username"
                        class="form-control form-control-lg @error('username') is-invalid @enderror"
                        placeholder="Enter your username" required value="{{ old('username') }}" />
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="fullname">Full Name</label>
                    <input type="text" name="seller_full_name" id="fullname"
                        class="form-control form-control-lg @error('fullname') is-invalid @enderror"
                        placeholder="Enter your full name" required value="{{ old('fullname') }}" />
                    @error('fullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>


            <!-- Email & Phone input -->
            <div class="row mb-4">
                <div class="col">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="seller_email" id="email"
                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                        placeholder="Enter your email" required value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col">
                    <label class="form-label" for="phone">Phone</label>
                    <input type="text" name="seller_phone" id="phone"
                        class="form-control form-control-lg @error('phone') is-invalid @enderror"
                        placeholder="Enter your phone" required value="{{ old('phone') }}" />
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <input type="password" name="seller_password" id="password"
                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                        placeholder="Enter password" required />
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="text-center justify-content-center d-flex flex-column text-lg-start mt-4 pt-2 pd-register">
                <button type="submit" class="btn btn-blue btn-lg mb-2"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                <p class="small text-center fw-bold mt-2 pt-1 pb-4">Have an account? <a
                        href="{{ route('penjual-login') }}" class="text-blue text-decoration-none">Login</a></p>
            </div>

        </form>
    </div>
@endsection
