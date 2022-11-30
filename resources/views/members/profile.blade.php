@extends('members.layouts.master-layouts')
@section('title')
    @lang('Profile')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            {{-- <div class="profile-user" style="background-image: url('{{ Auth::user()->sampul }}') "> --}}
            <div class="profile-user"
                style="background-image: url('@if (Auth::user()->sampul != '') {{ asset(Auth::user()->sampul) }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif')">
                {{-- <img src="{{ url(Auth::user()->sampul) }}" class="profile-user" alt=""> --}}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="profile-content">
            <div class="row align-items-end">
                <div class="col-sm">
                    <div class="d-flex align-items-end mt-3 mt-sm-0">
                        <div class="flex-shrink-0">
                            <div class="avatar-xxl me-3">
                                <img src="@if (Auth::user()->profile != '') {{ asset(Auth::user()->profile) }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                    {{-- @if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.png') }} @endif --}} alt="profile-image"
                                    class="img-fluid rounded-circle d-block img-thumbnail">
                            </div>
                        </div>
                        <div class="flex-grow-1">
                            <div>
                                <h5 class="font-size-16 mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </h5>
                                <p class="text-muted font-size-13 mb-2 pb-2">{{ Auth::user()->bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex align-items-start justify-content-end gap-2 mb-2">
                        <div>
                            {{-- <button type="button" class="btn btn-success"><i class="me-1"></i> Message</button> --}}
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target=".update-profile"><i class="me-1"></i> Edit Profile</button>
                            {{-- <a href="/dashboard/edit-profile/{{ Auth::user()->id }}/edit">
                                <button class="btn btn-primary d-inline">
                                    Edit Profile</button></a> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card bg-transparent shadow-none">
                <div class="card-body">
                    <ul class="nav nav-tabs-custom card-header-tabs border-top mt-2" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link px-3 active" data-bs-toggle="tab" href="#overview" role="tab">Setting</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link px-3" data-bs-toggle="tab" href="#post" role="tab">Post</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- end col -->
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 d-inline">Account</h5>
                        <a href="/dashboard/account/{{ Auth::user()->id }}/edit">
                            <button class="btn btn-primary d-inline">
                                Ubah Data</button></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <tbody>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Nama:</div>
                                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Email:</div>
                                        {{ Auth::user()->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Tanggal Lahir:</div>
                                        {{ Auth::user()->date_birth }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Nomor Handphone:</div>
                                        {{ Auth::user()->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div style="color: gray;">Jenis Kelamin:</div>
                                        {{ Auth::user()->gender }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0 d-inline">Address</h5>
                        <a href="/dashboard/edit-address/{{ Auth::user()->id }}/edit">
                            <button class="btn btn-primary d-inline">
                                Ubah Data</button></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <tbody>
                                @foreach ($biodatas as $item)
                                    <tr>
                                        <td>
                                            <div style="color: gray;">Provinsi:</div>
                                            {{ $item->province->name }}
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="color: gray;">Kota:</div>

                                            {{ $item->city->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="color: gray;">Kecamatan:</div>
                                            {{ $item->district->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="color: gray;">Desa:</div>
                                            {{ $item->village->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="color: gray;">Alamat lengkap:</div>
                                            {{ $item->alamt }}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 d-inline">Pendidikan Terakhir</h5>
                                <a href="/dashboard/edit-education/{{ $item->id }}/edit">
                                    <button class="btn btn-primary d-inline">
                                        Ubah Data</button></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Nama Institut:</div>
                                                {{ $item->institut_name }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Jurusan:</div>
                                                {{ $item->jurusanPendidikan->name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Dari</div>
                                                {{ $item->star_institut }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Sampai Dengan:</div>
                                                {{ $item->end_institut }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Nilai IPK:</div>
                                                {{ $item->ipk }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0 d-inline">Riwayat Pekerjaan</h5>
                                <a href="/dashboard/edit-jobexperience/{{ $item->id }}/edit">
                                    <button class="btn btn-primary d-inline">
                                        Ubah Data</button></a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Nama Perusahaan:</div>
                                                {{ $item->company_name }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Jabatan:</div>
                                                {{ $item->position }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Dari</div>
                                                {{ $item->star_magang }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Sampai Dengan:</div>
                                                {{ $item->end_magang }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div style="color: gray;">Jenis Pekerjaan:</div>
                                                {{ $item->category->name }}
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
    </div>
    <!-- end col -->

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
                    <form class="form-horizontal" action="/dashboard/profile/{{ Auth::user()->username }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                value="{{ Auth::user()->username }}" id="username" name="username" autofocus
                                placeholder="Enter username">
                            <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Bio</label>
                            <input type="text" class="form-control @error('bio') is-invalid @enderror"
                                value="{{ Auth::user()->bio }}" id="username" name="bio" autofocus
                                placeholder="Enter Bio">
                            @error('bio')
                                {{ $message }}
                            @enderror
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
