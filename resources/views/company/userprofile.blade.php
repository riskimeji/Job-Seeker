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
                <h3 class="ms-2">{{ $users->first_name }}</h3>
                <p><i class="fas fa-map-marker-alt"></i>&nbsp;{{ $users->bioCompany->province->name }} &nbsp;&nbsp;<i
                        class="fas fa-building"></i>&nbsp;{{ $users->bioCompany->industry->name }}&nbsp;&nbsp;<i
                        class="fas fa-calendar-alt"></i>&nbsp;{{ $users->bioCompany->hariKerja->name }}&nbsp;&nbsp;<i
                        class="fas fa-clock"></i>&nbsp;&nbsp;{{ $users->bioCompany->jam_kerja_mulai }} AM -
                    {{ $users->bioCompany->jam_kerja_berakhir }} PM &nbsp;
                </p>
                <p>{{ $users->bioCompany->alamat }} </p>
            </div>
        </div>
    </div>
    <div class="container">
        <h4>Tentang Perusahaan</h4>
        <hr>
        <p>{!! $users->bioCompany->tentang !!}</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card" style="width: 18rem;">
                    <div class="card-header text-center">
                        Kontak Perusahaan
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{ $users->email }}</li>
                        <li class="list-group-item">{{ $users->phone_number }}</li>
                        <li class="list-group-item"><a
                                href="{{ $users->bioCompany->website }}">{{ $users->bioCompany->website }}</a></li>
                        <li class="list-group-item">
                            <a href="{{ $users->bioCompany->google_maps }}">
                                <div class="map-show mt-2 mb-2">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4 class="mt-3">Lowongan Pekerjaan di Perusahaan ini</h4>
        <hr>
        <section data-aos="fade-up">
            <div class="row gap-4 justify-content-center" style="margin-right: 0px; margin-left:0px;">
                @foreach ($lowongans as $lowongan)
                    <div class="box lokercard">
                        <div name="logo" class="flex mt-2">
                            <a href="/detail/{{ $lowongan->slug }}" class="btn">
                                <img src="{{ $lowongan->media }}" style="width:100px; height:100px;"
                                    alt="logo_perusahaan"></a>
                        </div>
                        <hr>
                        <div class="ms-3">

                            <a
                                @if ($lowongan->user->username == 'admin') href=""
                            @else
                            href="/user/{{ $lowongan->user->username }}" @endif>
                                <label for="" class="mt-1" style="color:grey">{{ $lowongan->user->first_name }}
                                    {{ $lowongan->user->last_name }}</label><br>
                            </a>
                            <a href="/detail/{{ $lowongan->slug }}">
                                <label for="" class=""
                                    style="font-size:18px; font-weight: bold; color:#3D42A4;">
                                    {{ $lowongan->title }}</label><br></a>
                            <label for="" class="mt-2"><i
                                    class="fas fa-map-marker-alt me-1"></i>{{ $lowongan->alamat }}
                            </label>
                            <label for="" class="mt-3" style="color:red; font-weight: bold; font-size: 15px;">
                                {{ $lowongan->est_gaji }}</label>
                        </div>
                        {{-- <div class="text-center mt-3">
                        <a href="/detail/{{ $lowongan->slug }}" class="btn btn-free">Details</a>
                    </div> --}}
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
@section('script')
    {{-- <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
@endsection
