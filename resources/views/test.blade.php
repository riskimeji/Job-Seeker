@extends('layouts.main')
@section('container')
    <div style="margin-top: 130px;">
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
    </div>
@endsection
