@extends('layouts.main')
@section('container')
    <div style="margin-top:140px;">
        <h3 class="text-center welcome-title centerMobileOnly">Selamat Datang di JOB SEEKER</h3>
        {{-- <div class="container d-flex align-items-center justify-content-center"> --}}
        <div class="border border-primary mt-5 mx-auto"style="width:600px;">
            <h3 class="mt-5 blue-style text-center">Daftar Sebagai Company</h3>
            <form action="{{ asset('signup/company') }}" method="POST">
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row ms-5 me-5 mt-5">
                    <div class="col">
                        <label for="namadepan" class="blue-style">Nama Perusahaan </label><label for="wajib"
                            class="wajib">
                            *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('name') }}" required>
                        @error('message')
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
                            class="form-control @error('phone_number') is-invalid @enderror" style="border-radius: 0;"
                            value="{{ old('phone_number') }}" required>
                        @error('phone_number')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-2 mb-4 mt-4">
                    <div class="col">
                        <label for="sandi" class="blue-style">Kata Sandi</label><label for="bintang"
                            class="wajib">*</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('password') }}" required>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col">
                        <label for="ulangisandi" class="blue-style">Konfirmasi Kata
                            Sandi</label><label class="wajib">*</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            style="border-radius: 0;" value="{{ old('password_confirmation') }}" required>
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
                        href="{{ asset('signin/company') }}">Masuk</a>
                </label>
            </form>
        </div>
    </div>
@endsection
