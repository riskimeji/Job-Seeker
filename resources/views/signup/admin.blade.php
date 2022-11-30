@extends('layouts.main')
@section('container')
    <div style="margin-top:140px;">
        {{-- <div class="container d-flex align-items-center justify-content-center"> --}}
        <div class="border border-primary mt-5 mx-auto"style="width:600px;">
            <h3 class="mt-5 blue-style text-center">Daftar Admin </h3>
            <form action="{{ asset('admin/regist') }}" method="POST">
                @csrf
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="nama" class="blue-style">Nama</label><label class="wajib">*</label>
                        <input type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}"
                            style="border-radius: 0;" required>
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row ms-5 me-5 mt-4">
                    <div class="col">
                        <label for="nama" class="blue-style">Username</label><label class="wajib">*</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            value="{{ old('username') }}" style="border-radius: 0;" required>
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
                        <label for="phone_number" class="blue-style">Nomor Handphone</label><label class="wajib">*</label>
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
                            style="border-radius: 0;" required>
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                    <div class="col">
                        <label for="ulangisandi" class="blue-style">Konfirmasi Kata
                            Sandi</label><label class="wajib">*</label>
                        <input type="password" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            style="border-radius: 0;" required>
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-check me-4" style="margin-left:60px;">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    <label class="form-check-label" for="exampleCheck1" required>Saya setuju dengan Syarat & Ketentuan dan
                        Kebijakan
                        Privasi</label>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        <button type="submit" name="submit" class="btn btn-free "
                            style="border-radius:0; width:478px; ">DAFTAR</button>
                    </div>
                </div>
                <label class="mb-5" style="margin-left:60px">Sudah punya akun? <a
                        href="{{ asset('signin/employee') }}">Masuk</a>
                </label>
            </form>
        </div>
    </div>
@endsection
