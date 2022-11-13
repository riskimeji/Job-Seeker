@extends('members.layouts.master-layouts')
@section('title')
    @lang('Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
    {{-- <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet"> --}}
@endsection
@section('content')
    @component('members.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Update Account
        @endslot
    @endcomponent
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row" style="min-height: 0px;">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Account</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <form method="POST" action="/dashboard/profile/{{ Auth::user()->id }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Nama Depan</label>
                                                <input type="text"
                                                    class="form-control @error('first_name') is-invalid @enderror"
                                                    name="first_name" value="{{ Auth::user()->first_name }}"
                                                    id="formrow-email-input" placeholder="Enter Your First Name">
                                                @error('first_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Nama Belakang</label>
                                                <input type="text"
                                                    class="form-control @error('last_name') is-invalid @enderror"
                                                    name="last_name" id="formrow-password-input"
                                                    placeholder="Enter Your Last Name"
                                                    value="{{ Auth::user()->last_name }}">
                                                @error('last_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    id="formrow-email-input" placeholder="Enter Your Email Id"
                                                    value="{{ Auth::user()->email }}">
                                                @error('email')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Tanggal Lahir</label>
                                                <input type="date" name="date_birth"
                                                    class="form-control @error('date_birth') is-invalid @enderror"
                                                    id="formrow-password-input" value="{{ Auth::user()->date_birth }}">
                                                @error('date_birth')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Nomor Handphone</label>
                                                <input type="number" name="phone_number"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="formrow-email-input" placeholder="Enter Your Number Phone"
                                                    value="{{ Auth::user()->phone_number }}">
                                                @error('phone_number')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="jenis kelamin" class="blue-style">Jenis Kelamin</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio1" value="L"
                                                        value="{{ Auth::user()->jenis_kelamin }}" checked>
                                                    <label for="laki-laki">Laki- Laki</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineRadio2" value="P">
                                                    <label for="perempuan">Perempuan</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary w-md">Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/datatables.net/datatables.net.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/datatables.net-responsive.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
