@extends('admins.layouts.master')
@section('title')
    @lang('Profile')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            {{-- <div class="profile-user" style="background-image: url('{{ Auth::user()->sampul }}') "> --}}
            <div class="profile-user"
                style="background-image: url('@if ($lowongan->media != '') {{ $lowongan->media }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif')">
                {{-- <img src="{{ url(Auth::user()->sampul) }}" class="profile-user" alt=""> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="profile-content">
            <div class="row align-items-end">
                <div class="col-sm">
                    <div class="d-flex align-items-end mt-3 mt-sm-0">
                        <div class="flex-shrink-0 mt-2">
                            <div class="avatar-xxl me-3">
                                <img src="@if ($lowongan->media != '') {{ $lowongan->media }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                    alt="profile-image" class="img-fluid rounded-circle d-block img-thumbnail avatar-xxl">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="font-size-16 mb-2">{{ $lowongan->title }}</h5>
                            {{-- @foreach ($lowongan as $lowongans) --}}
                            <p class="text-muted font-size-13"><i
                                    class="mdi mdi-google-maps font-size-18 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->alamat }}
                                <i class="mdi mdi-office-building ms-4 font-size-18 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->category->name }}<i
                                    class="mdi mdi-calendar-month-outline ms-4 font-size-18 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->minimalPengalaman->name }}
                                <i class="mdi mdi-clock ms-4 font-size-18 align-middle pe-2 text-primary"></i>
                                {{ $lowongan->est_gaji }}
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                        <div>
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target=".update-profile"><i class="me-1"></i>Lamar</button> --}}
                            <a class="" href="#">
                                <form action="{{ route('ajukan', $lowongan) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary" type="submit" name="submit"
                                        onclick="return confirm
                                            ('Yakin ingin melamar ?')
">Ajukan
                                        Lamaran</button>
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
                @if (session()->has('message'))
                    <div class="alert alert-success mt-2" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
                @error('username')
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <p class="mt-2">Dibuat: {{ $lowongan->created_at }}</p>
                    <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-8">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 d-inline">Detail Lowongan</h5>
                                {{-- <button class="btn btn-primary d-inline">Ubah Data</button> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div>
                                <h5 class="font-size-15">Persyaratan</h5>
                                <p>
                                    {!! $lowongan->persyaratan !!}
                                </p>
                            </div>
                            <h5 class="font-size-15">Tanggung Jawab</h5>
                            <p>
                                {!! $lowongan->tanggung_jawab !!}
                            </p>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end tab pane -->

                <div class="tab-pane" id="lowongan" role="tabpanel">
                    <div class="col-xl-12 col-lg-12">
                        <div class="tab-content">
                            <div class="tab-pane active" id="overview" role="tabpanel">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-0 d-inline">Lowongan Kerja di
                                                {{ Auth::user()->first_name }}</h5>
                                            <button class="btn btn-primary d-inline">Tambah Lowongan</button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-xl-12 col-sm-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="dropdown float-end">
                                                        <a class="text-muted dropdown-toggle font-size-16" href="#"
                                                            role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Action</a>
                                                            <a class="dropdown-item" href="#">Remove</a>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img src="{{ URL::asset('assets/images/users/avatar-2.jpg') }}"
                                                                alt=""
                                                                class="avatar-lg rounded-circle img-thumbnail">
                                                        </div>
                                                        <div class="flex-1 ms-3">
                                                            <h5 class="font-size-15 mb-1"><a href="#"
                                                                    class="text-dark">Design and
                                                                    Administration Support
                                                                    (Contract Base)
                                                                </a></h5>
                                                            <p class="text-muted mb-0">Lorem ipsum dolor sit amet
                                                                consectetur adipisicing elit. Voluptas, id!</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 pt-1">
                                                        <p class="text-muted mb-0"><i
                                                                class=" bx bx-briefcase-alt-2 font-size-15 align-middle pe-2 text-primary"></i>
                                                            Minimal 2 Tahun</p>
                                                        <p class="mb-0 mt-2" style="color: green;"><i
                                                                class="bx bx-money font-size-15 align-middle pe-2 text-primary"></i>
                                                            IDR 5.000.000 - 5.500.000 </p>
                                                        <p class="text-muted mb-0 mt-2"><i
                                                                class="mdi mdi-google-maps font-size-15 align-middle pe-2 text-primary"></i>
                                                            Padang</p>
                                                        <p class=" mb-0 mt-2 badge bg-soft-success text-success">
                                                            Aktif</p>
                                                        <p class="text-muted mb-0 mt-2">
                                                            Dibuat: 18 November 2022</p>
                                                    </div>
                                                </div>

                                                <div class="btn-group" role="group">
                                                    <button type="button" class="btn btn-outline-light text-truncate"><i
                                                            class="uil uil-user me-1"></i> Profile</button>
                                                    <button type="button" class="btn btn-outline-light text-truncate"><i
                                                            class="uil uil-envelope-alt me-1"></i> Contact</button>
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card -->
                    <!-- end card -->
                </div>
                <!-- end tab pane -->
            </div>
            <!-- end tab content -->
        </div>
        <!-- end col -->

        <div class="col-xl-4 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 d-inline">Detail Lowongan</h5>
                        {{-- <a href="#">
                            <button class="btn btn-primary d-inline">
                                Ubah Data</button></a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <tbody>
                                {{-- @foreach ($biodatas as $item) --}}
                                <tr>
                                    <td>
                                        <div style="color: gray;">Fungsi Kerja:</div>
                                        {{-- {{ $item->province->name }} --}}{{ $lowongan->fungsi_kerja }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Jenjang Karir:</div>
                                        {{ $lowongan->jenjangKarir->name }}
                                        {{-- {{ $item->city->name }} --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Pengalaman:</div>
                                        <a href="{{ $lowongan->minimalPengalaman->name }}">
                                            <div class="map-show mt-2 mb-2">
                                            </div>
                                        </a>
                                        {{ $lowongan->alamat }}
                                        {{-- {{ $item->district->name }} --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Website:</div>
                                        <a href="www.google.com">{{ $lowongan->title }}</a>
                                        {{-- {{ $item->village->name }} --}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- end col -->
    </div>
    {{-- @endforeach --}}
    <!-- end row -->
    <!--  Update Profile example -->
    <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myLargeModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/dashboard/company/profile/{{ Auth::user()->username }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                value="{{ Auth::user()->first_name }}" id="username" name="first_name" autofocus
                                placeholder="Enter Company Name">
                            <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                value="{{ Auth::user()->username }}" id="username" name="username" autofocus
                                placeholder="Enter username">
                            <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="avatar">Profile Picture</label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('profile') is-invalid @enderror"
                                    id="avatar" name="profile" autofocus
                                    accept="image/png, image/jpg, image/jpeg, image/png">
                                <label class="input-group-text" for="avatar">Upload</label>
                            </div>
                            <div class="text-start mt-2">
                                <img src="@if (Auth::user()->profile != '') {{ asset(Auth::user()->profile) }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                    alt="" class="rounded-circle avatar-lg">
                            </div>
                            <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                        </div>
                        <div class="mb-3">
                            <label for="avatar">Sampul Picture</label>
                            <div class="input-group">
                                <input type="file" class="form-control @error('sampul') is-invalid @enderror"
                                    id="avatar" name="sampul" autofocus
                                    accept="image/png, image/jpg, image/jpeg, image/png">
                                <label class="input-group-text" for="avatar">Upload</label>
                            </div>
                            <div class="text-start mt-2">
                                <img src="@if (Auth::user()->sampul != '') {{ asset(Auth::user()->sampul) }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                    alt="" class="rounded-circle avatar-lg">
                            </div>
                            <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                        </div>
                        <div class="mt-3 d-grid">
                            <button class="btn btn-primary waves-effect waves-light UpdateProfile"
                                type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/profile.init.js') }}"></script>
    <script>
        $('#update-profile').on('submit', function(event) {
            event.preventDefault();
            var Id = $('#data_id').val();
            let formData = new FormData(this);
            $('#emailError').text('');
            $('#nameError').text('');
            $('#avatarError').text('');
            $.ajax({
                url: "{{ url('update-profile') }}" + "/" + Id,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#emailError').text('');
                    $('#nameError').text('');
                    $('#avatarError').text('');
                    if (response.isSuccess == false) {
                        alert(response.Message);
                    } else if (response.isSuccess == true) {
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                    }
                },
                error: function(response) {
                    $('#emailError').text(response.responseJSON.errors.email);
                    $('#nameError').text(response.responseJSON.errors.name);
                    $('#avatarError').text(response.responseJSON.errors.avatar);
                }
            });
        });
    </script>
@endsection
