@extends('layouts.main')
@section('title')
    @lang('Profile')
@endsection
@section('container')
    <div class="" style="margin-top: 120px"></div>
    <div class="card mb-3 ms-3 me-3" style="max-width: 100%; border-radius: 0px">
        <div class="row g-0 ms-2 mt-2 mb-2 me-2">
            <div class="col-md-3">
                <img src="{{ $lowongan->media }}" class="img-fluid " alt="...">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;">{{ $lowongan->title }}</h5>
                    <a href="/user/{{ $lowongan->user->username }}">
                        <p>{{ $lowongan->user->first_name }} {{ $lowongan->user->last_name }}</p>
                    </a>
                    <p class="text-muted font-size-13 text-white"><i class="fas fa-map-marker-alt"></i>
                        {{ $lowongan->alamat }}
                        <i class="fas fa-building ms-4"></i>
                        {{ $lowongan->category->name }}
                    </p>
                    <p><i class="fas fa-calendar-alt"></i>
                        {{ $lowongan->minimalPengalaman->name }}
                        <i class="fas fa-dollar-sign ms-4"></i> {{ $lowongan->est_gaji }}
                    </p>

                    <p>
                        @if ($lowongan->status == 'AKTIF')
                            Status: <span class="badge bg-success">{{ $lowongan->status }}</span>
                        @elseif($lowongan->status != 'AKTIF')
                            Status: <span class="badge bg-danger">{{ $lowongan->status }}</span>
                        @endif
                    </p>
                    <p class="card-text"><small class="text-muted">Di buat
                            {{ $lowongan->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="ms-5 me-5 mt-3">
        <h5 class="" style="font-weight: bold">Persyaratan</h5>
        <hr>
        <p> {!! $lowongan->persyaratan !!}</p>
    </div>
    <div class="ms-5 me-5 mt-5">
        <h5 class="" style="font-weight: bold">Tanggung Jawab</h5>
        <hr>
        <p> {!! $lowongan->tanggung_jawab !!}</p>
    </div>
    <div class="ms-5 me-5 mt-5">
        <h5 class="" style="font-weight: bold">Detail</h5>
        <hr>
        <div class="row gap-2 d-flex justify-content-center">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <h6 class="card-title">Fungsi Kerja</h6>
                    <p class="card-text">{{ $lowongan->fungsi_kerja }}</p>
                </div>
            </div>
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <h6 class="card-title">Minimal Pendidikan</h6>
                    <p class="card-text">{{ $lowongan->jenjangPendidikan->name }}</p>
                </div>
            </div>
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <h6 class="card-title">Jurusan Pendidikan</h6>
                    <p class="card-text">{{ $lowongan->jurusanPendidikan->name }}</p>
                </div>
            </div>
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-body text-secondary">
                    <h6 class="card-title">Jenjang Karir</h6>
                    <p class="card-text">{{ $lowongan->jenjangKarir->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="ms-5 me-5 mt-2">
        <h5 class="" style="font-weight: bold">Contact</h5>
        <hr>
        <p>Google Map</p>
        <a href="{{ $lowongan->google_map }}">{{ $lowongan->alamat }}</a>
        @auth
            @if (auth()->user()->role === 'ADMIN' || auth()->user()->role === 'COMPANY')
            @elseif($lamaran->isNotEmpty())
                <div class="d-flex justify-content-center mt-2">
                    <form action="{{ route('ajukan', $lowongan) }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" style="border-radius: 0%" type="submit" name="submit"
                            onclick="return confirm
    ('Yakin ingin melamar ?')
">Ajukan
                            Lamaran</button>
                    </form>
                </div>
            @else
            @endif
        @endauth

    </div>

    {{-- <div class="card mb-2 ms-5 me-5" style=" border-radius: 0px; background-color: rgb(255, 255, 255); height: 200px;">
        <div class="row g-0 mb-2 mt-2 ms-3">
            <div class="col-md-4">
                <img src="{{ $lowongan->media }}" class="img-fluid" alt="lowongan image">
            </div>
            <div class="col-md-8 mt-4" style="">
                <div class="card-body">
                    <h5 class="card-title" style="font-weight: bold;">{{ $lowongan->title }}</h5>
                    <p>{{ $lowongan->user->first_name }} {{ $lowongan->user->last_name }}</p>
                    <p class="text-muted font-size-13 text-white"><i class="fas fa-map-marker-alt"></i>
                        {{ $lowongan->alamat }}
                        <i class="fas fa-building ms-4"></i>
                        {{ $lowongan->category->name }}<i class="fas fa-calendar-alt ms-4"></i>
                        {{ $lowongan->minimalPengalaman->name }}
                        <i class="fas fa-clock ms-4"></i>
                        {{ $lowongan->est_gaji }}
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
@section('script')
    {{-- <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script> --}}
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
@endsection
