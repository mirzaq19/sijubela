@extends('layout')
@section('title', 'Login User')

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

        .pd-register {
            padding-left: 40%;
            padding-right: 40%;
        }

    </style>
@endsection

@section('content')
    <div class="container my-5 bg-white">
        <form class="px-2">
            <div class="divider d-flex align-items-center pt-4 mb-5">
                <h1 class="text-center fw-bold mx-3 mb-0 text-blue">Register Seller</h1>
            </div>


            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Username</label>
                <input type="text" id="username" class="form-control form-control-lg" placeholder="Enter your username" />
            </div>

            <!-- Full Name input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="fullname">Full Name</label>
                <input type="text" id="fullname" class="form-control form-control-lg" placeholder="Enter your full name" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" class="form-control form-control-lg" placeholder="Enter your email" />
            </div>

            <!-- phone input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="phone">Phone Number</label>
                <input type="text" id="phone" class="form-control form-control-lg" placeholder="Enter your phone number" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <input type="password" id="password" class="form-control form-control-lg"
                        placeholder="Enter password" />
                </div>
            </div>

            <!-- Password Confirmation input -->
            <div class="form-outline mb-3">
                <label class="form-label" for="password">Password Confirmation</label>
                <div class="input-group">
                    <input type="password" id="passwordconfirmation" class="form-control form-control-lg"
                        placeholder="Re-Enter password" />
                </div>
            </div>

            <div class="text-center justify-content-center d-flex flex-column text-lg-start mt-4 pt-2 pd-register">
                <button type="button" class="btn btn-blue btn-lg mb-2"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                <p class="small text-center fw-bold mt-2 pt-1 pb-4">Have an account? <a
                        href="{{ route('penjual-login') }}" class="text-blue text-decoration-none">Login</a></p>
            </div>

        </form>
    </div>
@endsection
