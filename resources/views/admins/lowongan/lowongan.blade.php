@extends('admins.layouts.master')
@section('title')
    @lang('Lowongan Pekerjaan')
@endsection
@section('content')
    @component('admins.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Lowongan
        @endslot
    @endcomponent
    <div class="card-body">
        <div class="d-flex justify-content-end">
            <a href="{{ url('dashboard/lowongan/create') }}"><button class="btn btn-primary">Add Lowongan</button></a>
        </div>
        <div class="mt-2 row-lg-6 d-flex justify-content-end">
            <form action="{{ url('dashboard/search') }}" method="GET" role="search">
                <div class="input-group">
                    <input type="search" name="search" class="form-control rounded" placeholder="Search"
                        aria-label="Search" aria-describedby="search-addon" value="{{ old('search') }}" />
                    <button type="submit" class="btn btn-outline-primary">search</button>
                </div>
            </form>
        </div>

        @foreach ($lowongans as $lowongan)
            <div class="col-xl-12 col-sm-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a class="text-muted dropdown-toggle font-size-16" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true">
                                <i class="bx bx-dots-horizontal-rounded"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/dashboard/lowongan/{{ $lowongan->slug }}/edit">Edit</a>
                                <a class="" href="#">
                                    <form action="/dashboard/lowongan/{{ $lowongan->id }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="dropdown-item" type="submit"
                                            onclick="return confirm
                                            ('Yakin akan menghapus data ?')
">Remove</button>
                                    </form>
                                </a>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset($lowongan->media) }}" alt=""
                                    class="avatar-lg rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-1 ms-3">
                                <h5 class="font-size-15 mb-1"><a href="#" class="text-dark">{{ $lowongan->title }}
                                    </a></h5>
                                <p class="text-muted mb-0">{{ $lowongan->fungsi_kerja }}</p>
                            </div>
                        </div>
                        <div class="mt-3 pt-1">
                            <p class="text-muted mb-0"><i
                                    class=" bx bx-briefcase-alt-2 font-size-15 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->minimalPengalaman->name }}</p>
                            <p class="mb-0 mt-2" style="color: green;"><i
                                    class="bx bx-money font-size-15 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->est_gaji }} </p>
                            <p class="text-muted mb-0 mt-2"><i
                                    class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->alamat }}</p>
                            <p
                                class="@if ($lowongan->status == 'AKTIF') mb-0 mt-2 badge bg-soft-success text-success
                                        @else
                                        mb-0 mt-2 badge bg-soft-danger text-danger @endif">
                                {{ $lowongan->status }}</p>
                            <p class="text-muted mb-0 mt-2">
                                Dibuat: {{ $lowongan->created_at }}</p>
                            <p class="text-muted mb-0 mt-2">
                                Oleh: {{ $lowongan->user->first_name }}</p>
                            {{-- @dd($lowongan) --}}
                        </div>
                    </div>

                    <div class="btn-group" role="group">

                        <button type="button" class="btn btn-outline-light text-truncate"><a
                                href="/detail/{{ $lowongan->slug }}"><i class="uil uil-user me-1"></i>
                                Readmore
                            </a>
                        </button>
                        {{-- <button type="button" class="btn btn-outline-light text-truncate"><i
                                class="uil uil-envelope-alt me-1"></i> Contact</button> --}}
                    </div>
                </div>
                <!-- end card -->
            </div>
        @endforeach
        {{ $lowongans->links('pagination::simple-bootstrap-5') }}
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection


<!-- New -->
