@extends('layouts.main')
@section('container')
    <div style="margin-top: 140px;">
        <h3 for="" class="welcome-title text-center centerMobileOnly">Selamat Datang di JOB SEEKER</h3>
        <h3 class="blue-style text-center mt-4">Masuk Sebagai Company</h3>
        <div class="container mt-4" style="width: 500px;">
            <form method="POST" action="{{ asset('signin/company') }}">
                @csrf
                @if (session()->has('errorLogin'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('errorLogin') }}
                    </div>
                @endif
                @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label blue-style">Email</label><label for=""
                        style="color: red; font-weight: bold;">*</label>
                    <input type="email" name="email" class="form-control" style="border-radius: 0px;"
                        id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label blue-style">Kata Sandi</label><label for=""
                        style="color: red; font-weight: bold;">*</label>
                    <input type="password" class="form-control" name="password" style="border-radius: 0px;"
                        id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
                    <a href="#"><label style="color: black; font-weight: bold; margin-left:250px;" class="">Lupa
                            Password?</label></a>
                </div>
                <button type="submit" class="btn mt-4"
                    style="border-radius: 0px; width:476px; background:#3D42A4; color:white;">Masuk</button>
            </form>
            <label for="" class="mt-1">Belum Punya Akun? <a href="{{ url('signup/company') }}">Daftar</a></label>
        </div>
    </div>
@endsection
