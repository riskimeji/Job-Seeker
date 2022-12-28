@extends('layouts_two.main')
@section('title')
    @lang('Profile')
@endsection
@section('container')
    <div class="" style="margin-top: 65px;">
        <div class="">
            <div class="album">
                <img src="https://blogpictures.99.co/film-anime-terbaik.png" alt="album" width="100%" height="400px"
                    style="position: absolute; padding: 40px;">
            </div>
            <div class="mb-2" style="padding-top: 250px; padding-left: 43%;">
                <img src="https://blogpictures.99.co/film-anime-terbaik.png" alt="profile" class="rounded-circle"
                    width="200px" height="200px"
                    style="border-width: 3px; border-color: gray; border-style: solid; position: relative;">

            </div>
            <div class="text-center">
                <h3 class="ms-2">Riski Meji</h3>
                <p>Proggrammer</p>
                <p>Tinggal di Jl Durian Tarung no 26, Kota Padang, Kec Kuranji, Provinsi Sumatera Barat </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Pendidikan Terakhir
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Politeknik Negeri Padang</li>
                        <li class="list-group-item">Teknologi Informasi</li>
                        <li class="list-group-item">2020 - 2024</li>
                        <li class="list-group-item">IPK 4.0</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Biodata
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">riskimeji6@gmail.com</li>
                        <li class="list-group-item">18-01-2003</li>
                        <li class="list-group-item">085363779773</li>
                        <li class="list-group-item">Laki-Laki</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Pengalaman Kerja
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Polsek Kuranji</li>
                        <li class="list-group-item">Admin</li>
                        <li class="list-group-item">2023 - 2024</li>
                        <li class="list-group-item">Pariwisata</li>
                    </ul>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        {{-- <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script> --}}
        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
    @endsection
