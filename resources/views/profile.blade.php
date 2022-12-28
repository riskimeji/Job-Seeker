@extends('layouts_two.main')
@section('title')
    @lang('Profile')
@endsection
@section('container')
    <div class="" style="margin-top: 65px;">
        <div class="">
            <div class="album">
                <img src="{{ $users->sampul }}" alt="album" width="100%" height="400px"
                    style="position: absolute; padding: 40px;">
            </div>
            <div class="mb-2" style="padding-top: 250px; padding-left: 43%;">
                <img src="{{ $users->profile }}" alt="profile" class="rounded-circle" width="200px" height="200px"
                    style="border-width: 3px; border-color: gray; border-style: solid; position: relative;">

            </div>
            <div class="text-center">
                <h3 class="ms-2">{{ $users->first_name }}{{ $users->last_name }}</h3>
                <p>{{ $users->bio }}</p>
                <p>Tinggal di {{ $users->bioEmployee->alamt }} </p>
                {{-- @dd($biodatas); --}}
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
                        <li class="list-group-item">{{ $users->bioEmployee->institut_name }}</li>
                        <li class="list-group-item">{{ $users->bioEmployee->jurusanPendidikan->name }}</li>
                        <li class="list-group-item">{{ $users->bioEmployee->star_institut }} -
                            {{ $users->bioEmployee->end_institut }}</li>
                        <li class="list-group-item">IPK {{ $users->bioEmployee->ipk }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Biodata
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $users->email }}</li>
                        <li class="list-group-item">{{ $users->date_birth }}</li>
                        <li class="list-group-item">{{ $users->phone_number }}</li>
                        <li class="list-group-item">
                            @if ($users->gender == 'P')
                                Perempuan
                            @else
                                Laki-Laki
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Pengalaman Kerja
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $users->bioEmployee->company_name }}</li>
                        <li class="list-group-item">{{ $users->bioEmployee->position }}</li>
                        <li class="list-group-item">{{ $users->bioEmployee->star_magang }} -
                            {{ $users->bioEmployee->end_magang }}</li>
                        <li class="list-group-item">{{ $users->bioEmployee->category->name }}</li>
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
