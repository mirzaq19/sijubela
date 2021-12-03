@extends('dashboard.pembeli.layout-buyer')
@section('title')
    Akun Saya | {{ $pagetitle }}
@endsection

@section('aftercss')
    <style>
        .nav .nav-link.link-blue {
            border-bottom: 2px solid transparent;
        }

        .nav .nav-link:hover.link-blue {
            border-bottom: 2px solid #00c1eb;
            font-weight: 400;
        }

        .nav .nav-link.link-blue.active {
            color: #00c1eb;
            border-bottom: 2px solid #00c1eb;
            font-weight: 400;
        }

    </style>
@endsection

@section('buyer-content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="order-nav rounded bg-white py-2 mt-3 m-md-0">
        <nav class="nav nav-fill">
            @if (Request::is('account/detail'))
                <span class="nav-link link-blue active">Detail Akun</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-account.detail') }}">Detail Akun</a>
            @endif
            @if (Request::is('account/address'))
                <span class="nav-link link-blue active">Alamat</span>
            @else
                <a class="nav-link link-blue" href="{{ route('buyer-account.address') }}">Alamat</a>
            @endif
        </nav>
    </div>
    @if (Request::is('account/detail'))
        <div class="bg-white p-4">
            <form action="{{ route('buyer-account.detailupdate') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="buyer_username" class="form-label">Username</label>
                    <input type="text" class="form-control" disabled id="buyer_username" name="buyer_username"
                        value="{{ $user->buyer_username }}">
                </div>
                <div class="mb-3">
                    <label for="buyer_full_name" class="form-label">Nama</label>
                    <input type="text" class="form-control  @error('buyer_full_name') is-invalid @enderror" disabled
                        id="buyer_full_name" name="buyer_full_name" value="{{ $user->buyer_full_name }}">
                    @error('buyer_full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="buyer_email" class="form-label">Email</label>
                    <input type="email" class="form-control" disabled id="buyer_email" name="buyer_email"
                        value="{{ $user->buyer_email }}">
                </div>
                <div class="mb-3">
                    <label for="buyer_phone" class="form-label">No. HP</label>
                    <input type="text" class="form-control  @error('buyer_phone') is-invalid @enderror" disabled
                        id="buyer_phone" name="buyer_phone" value="{{ $user->buyer_phone }}">
                    @error('buyer_phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password baru</label>
                    <input type="password" class="form-control  @error('buyer_password') is-invalid @enderror" disabled
                        id="password" name="buyer_password">
                    @error('buyer_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Konfirmasi Password baru</label>
                    <input type="password" class="form-control" disabled id="password_confirmation"
                        name="buyer_password_confirmation">
                </div>
                <button id="savebutton" type="submit" class="btn btn-blue visually-hidden">Simpan</button>
                <button id="cancelbutton" class="btn btn-secondary visually-hidden">Batal</button>
                <button id="changebutton" class="btn btn-blue">Ubah</button>
            </form>
        </div>
    @endif
    @if (Request::is('account/address'))
        <div class="bg-white p-4">
            <form action="{{ route('buyer-account.addressupdate') }}" method="POST">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $userid }}">
                <div class="mb-3">
                    <label for="full_address" class="form-label">Alamat Lengkap</label>
                    <input disabled type="text" class="form-control  @error('full_address') is-invalid @enderror"
                        id="full_address" name="full_address" placeholder="Alamat Lengkap"
                        value="{{ $address ? $address->full_address : '' }}">
                    @error('full_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="province" class="form-label">Provinsi</label>
                    <input disabled type="text" class="form-control @error('province') is-invalid @enderror" id="province"
                        name="province" placeholder="Provinsi" value="{{ $address ? $address->province : '' }}">
                    @error('province')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class=" row mb-3">
                    <div class="col-sm-6 mb-3 m-sm-0">
                        <label for="district" class="form-label">Kota/ Kabupaten</label>
                        <input disabled type="text" id="district"
                            class="form-control @error('district') is-invalid @enderror" placeholder="kota/kabupaten"
                            name="district" value="{{ $address ? $address->district : '' }}">
                        @error('district')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" col-sm-6 mb-3 m-sm-0">
                        <label for="subdistrict" class="form-label">Kecamatan</label>
                        <input disabled type="text" id="subdistrict"
                            class="form-control @error('subdistrict') is-invalid @enderror" placeholder="kecamatan"
                            name="subdistrict" value="{{ $address ? $address->subdistrict : '' }}">
                        @error('subdistrict')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class=" row mb-3">
                    <div class="col-sm-6 mb-3 m-sm-0">
                        <label for="village" class="form-label">Kelurahan/ Desa</label>
                        <input disabled type="text" id="village" class="form-control @error('village') is-invalid @enderror"
                            placeholder="kelurahan / desa" name="village"
                            value="{{ $address ? $address->village : '' }}">
                        @error('village')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class=" col-sm-6 mb-3 m-sm-0">
                        <label for="postal_code" class="form-label">Kode Pos</label>
                        <input disabled type="text" id="postal_code"
                            class="form-control @error('postal_code') is-invalid @enderror" placeholder="kode pos"
                            name="postal_code" value="{{ $address ? $address->postal_code : '' }}">
                        @error('postal_code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <button id="savebutton" type="submit" class="btn btn-blue visually-hidden">Simpan</button>
                <button id="cancelbutton" class="btn btn-secondary visually-hidden">Batal</button>
                <button id="changebutton" class="btn btn-blue">Ubah</button>
            </form>
        </div>
    @endif
@endsection

@section('afterscript')
    <script>
        const changeButton = document.getElementById('changebutton');
        const saveButton = document.getElementById('savebutton');
        const cancelButton = document.getElementById('cancelbutton');

        changeButton.addEventListener('click', (e) => {
            e.preventDefault();
            @if (Request::is('account/detail'))
                document.getElementById('buyer_full_name').disabled = false;
                document.getElementById('buyer_phone').disabled = false;
                document.getElementById('password').disabled = false;
                document.getElementById('password_confirmation').disabled = false;
            @endif
            @if (Request::is('account/address'))
                document.getElementById('full_address').disabled = false;
                document.getElementById('province').disabled = false;
                document.getElementById('district').disabled = false;
                document.getElementById('subdistrict').disabled = false;
                document.getElementById('village').disabled = false;
                document.getElementById('postal_code').disabled = false;
            @endif
            changeButton.classList.add('visually-hidden');
            saveButton.classList.remove('visually-hidden');
            cancelButton.classList.remove('visually-hidden');
        });

        cancelButton.addEventListener('click', (e) => {
            e.preventDefault();
            @if (Request::is('account/detail'))
                document.getElementById('buyer_full_name').disabled = true;
                document.getElementById('buyer_phone').disabled = true;
                document.getElementById('password').disabled = true;
                document.getElementById('password_confirmation').disabled = true;
            @endif
            @if (Request::is('account/address'))
                document.getElementById('full_address').disabled = true;
                document.getElementById('province').disabled = true;
                document.getElementById('district').disabled = true;
                document.getElementById('subdistrict').disabled = true;
                document.getElementById('village').disabled = true;
                document.getElementById('postal_code').disabled = true;
            @endif
            changeButton.classList.remove('visually-hidden');
            saveButton.classList.add('visually-hidden');
            cancelButton.classList.add('visually-hidden');
        });
    </script>
@endsection
