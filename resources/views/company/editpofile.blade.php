@extends('company.layouts.master-withoutheader')
@section('title')
    @lang('Personal Information')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('company.components.breadcrumb')
        @slot('li_1')
            Data
        @endslot
        @slot('title')
            Compleate Company Information
        @endslot
    @endcomponent
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Company Information</h4>
                </div>
                <div class="card-body">
                    <div id="basic-pills-wizard" class="twitter-bs-wizard">
                        <ul class="twitter-bs-wizard-nav">
                            <li class="nav-item">
                                <a href="#personal-information" class="nav-link" data-toggle="tab">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Data Pribadi">
                                        <i class="bx bx-list-ul"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#job-experience" class="nav-link" data-toggle="tab">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Pengalaman Kerja">
                                        <i class="bx bx-book"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#bank-detail" class="nav-link" data-toggle="tab">
                                    <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Education">
                                        <i class="bx bxs-school"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- wizard-nav -->

                        <div class="tab-content twitter-bs-wizard-tab-content">
                            <div class="tab-pane" id="personal-information">
                                <div class="text-center mb-4">
                                    <h5>Data Perusahaan</h5>
                                    <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                </div>
                                @foreach ($biocompanees as $biocompanee)
                                    <form method="POST" action="/dashboard/company-compleate/{{ $biocompanee->id }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-firstname-input" class="form-label">Email</label>
                                                    <input type="email"
                                                        class="form-control @error('email_perusahaan') is-invalid @enderror"
                                                        value="{{ $biocompanee->email_perusahaan }}"
                                                        placeholder="Enter Your Email Company" name="email_perusahaan">
                                                    @error('email_perusahaan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-lastname-input" class="form-label">Nomor Handphone
                                                    </label>
                                                    <input type="number" name="phone_perusahaan"
                                                        class="form-control @error('phone_perusahaan') is-invalid @enderror"
                                                        value="{{ $biocompanee->phone_perusahaan }}"
                                                        id="basicpill-lastname-input" placeholder="Enter Your Number Phone">
                                                    @error('phone_perusahaan')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Provinsi</label>
                                                    @php
                                                        $provinces = new App\Http\Controllers\BioEmployeeController();
                                                        $provinces = $provinces->provinces();
                                                    @endphp
                                                    <select class="form-select" name="province_id" id="provinsi" required>
                                                        <option>Pilih Salah Satu</option>
                                                        @foreach ($provinces as $item)
                                                            {{-- <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}
                                                            </option> --}}
                                                            @if (old('province_id', $biocompanee->province_id) == $item->id)
                                                                <option value="{{ $item->id }}" selected="selected">
                                                                    {{ $item->name }}</option>
                                                            @else
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Kota / Kabupaten</label>
                                                    <select class="form-select" name="city_id" id="kota" required>
                                                        <option selected>Pilih Salah Satu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="choices-single-groups"
                                                        class="form-label font-size-13 text-muted">Industry</label>
                                                    <select class="form-control" name="industry_id">
                                                        @foreach ($industrys as $industry)
                                                            @if (old('industry_id', $biocompanee->industry_id) == $industry->id)
                                                                <option value="{{ $industry->id }}" selected="selected">
                                                                    {{ $industry->name }}</option>
                                                            @else
                                                                <option value="{{ $industry->id }}">{{ $industry->name }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="basicpill-address-input"
                                                        class="form-label">Address</label>
                                                    <textarea id="basicpill-address-input" name="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                                        rows="2" placeholder="Enter Detail Your Address" required>{{ $biocompanee->alamat }}</textarea>
                                                    @error('alamat')
                                                        {{ $message }}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="pager wizard twitter-bs-wizard-pager-link">
                                            <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                    onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a>
                                            </li>
                                        </ul>
                            </div>
                            <!-- tab pane -->
                            <div class="tab-pane" id="job-experience">
                                <div>
                                    <div class="text-center mb-4">
                                        <h5>Detail Perusahaan</h5>
                                        <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">Link Google
                                                    Maps</label>
                                                <input type="text"
                                                    class="form-control @error('google_maps') is-invalid @enderror"
                                                    name="google_maps" value="{{ $biocompanee->google_maps }}"
                                                    id="basicpill-pancard-input"
                                                    placeholder="https://goo.gl/maps/5oQLYDdGEZfmjAX56" required>
                                                @error('google_maps')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">Website</label>
                                                <input type="text"
                                                    class="form-control @error('website') is-invalid @enderror"
                                                    name="website" value="{{ $biocompanee->website }}"
                                                    placeholder="https://www.job-seeker.com" required>
                                                @error('website')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Hari Kerja</label>
                                                <select class="form-select" name="hari_kerja_id" required>
                                                    @foreach ($harikerjas as $harikerja)
                                                        <option value="{{ $harikerja->id }}">{{ $harikerja->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input" class="form-label">Jam Mulai
                                                    Kerja</label>
                                                <input type="time" id="datepicker-timepicker"
                                                    class="form-control flatpickr-input @error('jam_kerja_mulai') is-invalid @enderror"
                                                    name="jam_kerja_mulai" value="{{ $biocompanee->jam_kerja_mulai }}"
                                                    required>
                                                @error('jam_kerja_mulai')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input" class="form-label">Jam Berhenti
                                                    Kerja</label>
                                                <input type="time"
                                                    class="form-control flatpickr-input @error('jam_kerja_berakhir') is-invalid @enderror"
                                                    id="datepicker-humanfd" name="jam_kerja_berakhir"
                                                    value="{{ $biocompanee->jam_kerja_berakhir }}" required>
                                                @error('jam_kerja_berakhir')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextPrev(-1)"><i class="bx bx-chevron-left me-1"></i>
                                                Previous</a></li>
                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextPrev(1)">Next <i class="bx bx-chevron-right ms-1"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- tab pane -->
                            <div class="tab-pane" id="bank-detail">
                                <div>
                                    <div class="text-center mb-4">
                                        <h5>Tentang Perusuahaan</h5>
                                        <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <textarea name="tentang" id="tentang">{{ $biocompanee->tentang }}</textarea>
                                                @error('tentang')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="previous"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()"><i class="bx bx-chevron-left me-1"></i> Previous</a>
                                        </li>
                                        <button class="float-end btn btn-primary" type="submit">Save Data</button>
                                    </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script>
        function onChangeSelect(url, id, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#' + name).empty();
                    $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                    $.each(data, function(key, value) {
                        $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                    });
                }
            });
        }
        $(function() {
            $('#provinsi').on('change', function() {
                onChangeSelect('{{ route('cities') }}', $(this).val(), 'kota');
            });
            $('#kota').on('change', function() {
                onChangeSelect('{{ route('districts') }}', $(this).val(), 'kecamatan');
            })
            $('#kecamatan').on('change', function() {
                onChangeSelect('{{ route('villages') }}', $(this).val(), 'desa');
            })
        });
    </script>
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tentang'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-editor.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
