@extends('layouts.main')
@section('container')
    <div style="margin-top:140px;">
        <h3 class="text-center welcome-title centerMobileOnly">Selamat Datang di JOB SEEKER</h3>
        {{-- <div class="container d-flex align-items-center justify-content-center"> --}}
        <div class="border border-primary mt-5 mx-auto"style="width:600px;">
            <h3 class="mt-5 blue-style text-center">Daftar Sebagai Pelamar</h3>
            <form action="{{ asset('signup/employee') }}" method="POST">
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row ms-5 me-5 mt-5">
                    <div class="col mt-3">
                        <label for="namadepan" class="blue-style">Nama Depan </label><label for="wajib" class="wajib">
                            *</label>
                        <input type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                            style="border-radius: 0;" required>
                        @error('first_name')
                            {{ $message }}
                        @enderror

                    </div>
                    <div class="col mt-3">
                        <label for="namabelakang" class="blue-style">Nama Belakang </label><label class="wajib"> *</label>
                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="email" class="blue-style">Username</label><label class="wajib">*</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('username') }}" required>
                        @error('username')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="email" class="blue-style">Email</label><label class="wajib">*</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('email') }}" required>
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="nomorhp" class="blue-style">Nomor Handphone</label><label class="wajib">*</label>
                        <input type="number" name="phone_number"
                            class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ old('phone_number') }}" style="border-radius: 0;" required>
                        @error('phone_number')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="jenis kelamin" class="blue-style">Jenis Kelamin</label><label class="wajib">*</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="L"
                                {{ old('jenis_kelamin') }} checked>
                            <label for="laki-laki">Laki- Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="P">
                            <label for="perempuan">Perempuan</label>
                        </div>
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="tgllahir" class="blue-style">Tanggal Lahir</label><label for="bintang"
                            class="wajib">*</label>
                        <input type="date" name="date_birth"
                            class="form-control @error('date_birth') is-invalid @enderror" value="{{ old('date_birth') }}"
                            style="border-radius: 0;" required>
                        @error('date_birth')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-2 mb-4 mt-4">
                    <div class="col">
                        <label for="sandi" class="blue-style">Kata Sandi</label><label for="bintang"
                            class="wajib">*</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            style="border-radius: 0;">
                        @error('password')
                            {{ $message }}
                        @enderror

                    </div>
                    <div class="col">
                        <label for="ulangisandi" class="blue-style">Konfirmasi Kata
                            Sandi</label><label class="wajib">*</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            style="border-radius: 0;">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-check me-4" style="margin-left:60px;">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1">Saya setuju dengan Syarat & Ketentuan dan
                        Kebijakan
                        Privasi</label>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        <button type="submit" name="submit" class="btn"
                            style="border-radius:0; width:478px; background:#3D42A4; color:white;">DAFTAR</button>
                    </div>
                </div>
                <label class="mb-5" style="margin-left:60px">Sudah punya akun? <a
                        href="{{ asset('signin/employee') }}">Masuk</a>
                </label>
            </form>
        </div>
    </div>
@endsection
