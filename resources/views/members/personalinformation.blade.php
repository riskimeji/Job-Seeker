@extends('members.layouts.master-withoutheader')
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
    @component('members.components.breadcrumb')
        @slot('li_1')
            Data
        @endslot
        @slot('title')
            Personal Information
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
                    <h4 class="card-title mb-0">Personal Information</h4>
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
                                    <h5>Data Pribadi</h5>
                                    <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input" class="form-label">First name</label>
                                            <input type="text" class="form-control" id="basicpill-firstname-input"
                                                placeholder="Enter Your First Name" value="{{ Auth::user()->first_name }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input" class="form-label">Last name</label>
                                            <input type="text" class="form-control" id="basicpill-lastname-input"
                                                placeholder="Enter Your Last Name" value="{{ Auth::user()->last_name }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-phoneno-input" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="basicpill-phoneno-input"
                                                placeholder="Enter Your Phone No." value="{{ Auth::user()->phone_number }}"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-email-input" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="basicpill-email-input"
                                                placeholder="Enter Your Email ID" value="{{ Auth::user()->email }}"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ url('dashboard/personal-information') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status Pernikahan</label>
                                                <select class="form-select" name="status_pernikahan" required>
                                                    <option selected>Pilih Status Pernikahan</option>
                                                    <option value="MENIKAH">Menikah</option>
                                                    <option value="BELUM MENIKAH">Belum Menikah</option>
                                                    <option value="Janda/Duda">Janda / Duda</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Provinsi</label>
                                                @php
                                                    $provinces = new App\Http\Controllers\PersonalInfoController();
                                                    $provinces = $provinces->provinces();
                                                @endphp
                                                <select class="form-select" name="province_id" id="provinsi" required>
                                                    <option>Pilih Salah Satu</option>
                                                    @foreach ($provinces as $item)
                                                        <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}
                                                        </option>
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
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Kecamatan / Kelurahan</label>
                                                <select class="form-select" name="district_id" id="kecamatan" required>
                                                    <option selected>Pilih Salah Satu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Desa</label>
                                                <select class="form-select" name="village_id" id="desa" required>
                                                    <option selected>Pilih Salah Satu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-address-input" class="form-label">Address</label>
                                                <textarea id="basicpill-address-input" name="alamt" class="form-control @error('alamt') is-invalid @enderror"
                                                    value="{{ old('alamt') }}" rows="2" placeholder="Enter Detail Your Address" required></textarea>
                                                @error('alamt')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="pager wizard twitter-bs-wizard-pager-link">
                                        <li class="next"><a href="javascript: void(0);" class="btn btn-primary"
                                                onclick="nextTab()">Next <i class="bx bx-chevron-right ms-1"></i></a></li>
                                    </ul>
                            </div>
                            <!-- tab pane -->
                            <div class="tab-pane" id="job-experience">
                                <div>
                                    <div class="text-center mb-4">
                                        <h5>Pengalaman Kerja</h5>
                                        <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">Tempat
                                                    Kerja / Magang Terakhir</label>
                                                <input type="text"
                                                    class="form-control @error('company_name') is-invalid @enderror"
                                                    name="company_name" value="{{ old('company_name') }}"
                                                    id="basicpill-pancard-input" placeholder="Enter Company Name."
                                                    required>
                                                @error('company_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input" class="form-label">Periode
                                                    Magang</label>
                                                <input type="date"
                                                    class="form-control flatpickr-input @error('star_magang') is-invalid @enderror"
                                                    name="star_magang" id="basicpill-vatno-input"
                                                    value="{{ old('star_magang') }}" required>
                                                @error('star_magang')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-cstno-input" class="form-label">Nama Jabatan</label>
                                                <input type="text"
                                                    class="form-control flatpickr-input @error('position') is-invalid @enderror"
                                                    id="datepicker-humanfd" name="position"
                                                    placeholder="Enter your Position" required>
                                                @error('position')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input" class="form-label">Sampai
                                                    Dengan</label>
                                                <input type="date" name="end_magang"
                                                    class="form-control @error('end_magang') is-invalid @enderror"
                                                    id="basicpill-servicetax-input" value="{{ old('end_magang') }}"
                                                    required>
                                                @error('end_magang')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Jenis Pekerjaan</label>
                                                <select class="form-select" name="category_id" required>
                                                    @foreach ($categorys as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                        <h5>Riwayat Pendidikan</h5>
                                        <p class="card-title-desc">Lengkapi informasi di bawah ini</p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-pancard-input" class="form-label">Sekolah /
                                                    Universitas Terakhir</label>
                                                <input type="text"
                                                    class="form-control @error('institut_name') is-invalid @enderror "
                                                    name="institut_name" id="basicpill-pancard-input"
                                                    value="{{ old('institut_name') }}"
                                                    placeholder="Enter Institution Name." required>
                                                @error('institut_name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-vatno-input" class="form-label">Dari</label>
                                                <input type="date" name="star_institut"
                                                    class="form-control @error('star_institut') is-invalid
                                                @enderror"
                                                    id="basicpill-vatno-input" required>
                                                @error('star_institut')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Jenjang Pendidikan Terakhir</label>
                                                <select
                                                    class="form-select @error('jenjang_pendidikan_id') is-invalid
                                                @enderror"
                                                    name="jenjang_pendidikan_id" required>
                                                    @foreach ($jenjangs as $jenjang)
                                                        <option value="{{ $jenjang->id }}">{{ $jenjang->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="basicpill-servicetax-input" class="form-label">Sampai
                                                    Dengan</label>
                                                <input type="date" name="end_institut" class="form-control"
                                                    id="basicpill-servicetax-input" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Jurusan</label>
                                                <select class="form-select" name="jurusan_pendidikan_id" required>
                                                    @foreach ($jurusans as $jurusan)
                                                        <option value="{{ $jurusan->id }}">{{ $jurusan->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">IPK <label style="color: gray;">
                                                        (Opsional)</label></label>
                                                <input type="text" class="form-control" name="ipk"
                                                    id="basicpill-servicetax-input" placeholder="Ex 4.0" required>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{ URL::asset('assets/libs/choices.js/choices.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/@simonwep/@simonwep.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/twitter-bootstrap-wizard/twitter-bootstrap-wizard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
