@extends('layouts.main')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
{{-- Carousel Image --}}
<section data-aos="fade-up">
    <div id="carouselExampleIndicators" width="100" class="carousel slide" data-bs-ride="carousel"
        style="margin-top: 120px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/1.jpg" class="d-block w-100 img-fluid" alt="..." width="100vw" height="500px">
            </div>
            <div class="carousel-item">
                <img src="../img/2.jpg" class="d-block w-100 img-fluid" alt="..." width="100vw" height="500px">
            </div>
            <div class="carousel-item">
                <img src="../img/3.jpg" class="d-block w-100 img-fluid" alt="..." width="100vw" height="500px">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
@section('container')
    <div class="mt-3 mb-5">
        <h3 class="text-center" style="font-weight: bold;">Lowongan Kerja Terbaru</h3>
    </div>
    {{-- Card Lowngan Kerja Terbaru --}}
    <section data-aos="fade-up">
        <div class="row gap-4 justify-content-center" style="margin-right: 0px; margin-left:0px;">
            @foreach ($lowongans as $lowongan)
                <div class="box lokercard">
                    <div name="logo" class="flex mt-2">
                        <a href="/detail/{{ $lowongan->slug }}">
                            <img src="{{ $lowongan->media }}" style="width:100px; height:100px;" alt="logo_perusahaan"></a>
                    </div>
                    <hr>
                    <div class="ms-3">
                        <label for="" class="mt-1" style="color:grey">{{ $lowongan->user->first_name }}
                            {{ $lowongan->user->last_name }}</label><br>
                        <a href="/detail/{{ $lowongan->slug }}">
                            <label for="" class="" style="font-size:18px; font-weight: bold; color:#3D42A4;">
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
            <div class="text-center mt-3">
                <a href="/lowongan" class="btn btn-free" style="">Lihat Lowongan Lebih Banyak</a>
            </div>
        </div>
    </section>
    {{-- Mengapa Membuat Akun di Job Seeker --}}
    <section data-aos="fade-up" class="mt-5">
        <div class="card mb-3" style="max-width: 100%; border-color:#1b61ad;  background:#1b61ad; border-radius:0px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('img/regist.png') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title text-white mt-4" style="font-weight: bold; letter-spacing: 1px;">Mengapa
                            membuat
                            akun di JobSeeker.com ?
                        </h3>
                        <h5 class="card-text text-white mt-5"><i class="far fa-check-circle"></i>
                            Mendapatkan Informasi Lowongan
                            Pekerjaan Berdasarkan Wilayah User</h5>
                        <h5 class="card-text text-white mt-4"><i class="far fa-check-circle"></i>
                            Bisa Mendaftarkan Pendaftaran Secara Online Tanpa Harus ke Lokasi Perusahaan
                        </h5>
                        <h5 class="card-text text-white mt-4"><i class="far fa-check-circle"></i>
                            Dapat Mencari Lowongan Pekerjaan Berdasarkan Keahlian.</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Industri Favorit Anda --}}
    <section data-aos="fade-up">
        <div class="mt-4 text-center">
            <h3>Industri Favorit Anda</h3>
            <h5>Lihat lowongan bedasarkan industri</h5>
            <div class="mt-4">
                <div class="row flex" style="margin-left: 0px; margin-right: 0px;">
                    @foreach ($categorys as $item)
                        <div class="border test" style="width:400px; height:50px;">
                            <div class="">
                                <label for="" class="ms-3"
                                    style="font-weight: bold; margin-top:13px; color:rgb(85, 79, 79);"><i
                                        class="fas fa-calculator me-2"></i>{{ $item->name }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
