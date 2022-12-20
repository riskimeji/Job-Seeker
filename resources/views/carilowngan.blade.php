@extends('layouts.main')
@section('container')
    <div style="min-height: 100px">
    </div>
    {{-- Card Lowngan Kerja Terbaru --}}
    <section data-aos="fade-up">
        <div class="row gap-4 justify-content-center mt-2" style="margin-right: 0px; margin-left:0px;">
            @forelse ($searchLowongans as $lowongan)
                <a href="/detail/{{ $lowongan->slug }}">
                    <div class="box lokercard">
                        <div name="logo" class="flex mt-2">
                            <img src="{{ $lowongan->media }}" style="width:100px; height:100px;" alt="logo_perusahaan">
                        </div>
                        <hr>
                        <div class="ms-3">
                            <label for="" class="mt-1" style="color:grey">{{ $lowongan->user->first_name }}
                                {{ $lowongan->user->last_name }}</label><br>
                            <label for="" class="" style="font-size:18px; font-weight: bold; color:#3D42A4;">
                                {{ $lowongan->title }}</label><br>
                            <label for="" class="mt-2"><i
                                    class="fas fa-map-marker-alt me-1"></i>{{ $lowongan->alamat }}
                            </label>
                            <label for="" class="mt-3" style="color:red; font-weight: bold; font-size: 15px;">
                                {{ $lowongan->est_gaji }}</label>
                        </div>
                </a>
        </div>
    @empty
        <div class="mt-5 mb-5">
            <h3 class="text-center" style="font-weight: bold;">Data tidak ditemukan</h3>
        </div>
        @endforelse
        </div>
    </section>
    <div style="color:aliceblue;" class="ms-5 me-5 mt-5">
        {{ $searchLowongans->links('pagination::semantic-ui') }}
    </div>
@endsection
