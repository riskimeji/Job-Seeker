@extends('admins.layouts.master')
@section('title')
    @lang('Add Lowongan - JobSeeker')
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('admins.components.breadcrumb')
        @slot('li_1')
            Lowongan
        @endslot
        @slot('title')
            Add Lowongan
        @endslot
    @endcomponent
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Foto Lowongan</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('dashboard/lowongan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="fallback">
                            <input name="media" class="form-control @error('media') is-invalid @enderror" type="file"
                                accept="image/png, image/jpg, image/jpeg, image/png" value="{{ old('media') }}" />
                            @error('media')
                                {{ $message }}
                            @enderror
                        </div>
                </div>

            </div> <!-- end card-->

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Lowongan Baru</h4>
                    <p class="card-title-desc">Lengkapi Informasi Di bawah Ini</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Judul </label>
                                <input id="metatitle" name="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                                    placeholder="Type judul">
                            </div>
                            @error('title')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metakeywords">Estimasi Gaji</label>
                                <input id="metakeywords" name="est_gaji" type="text"
                                    class="form-control @error('est_gaji') is-invalid @enderror"
                                    placeholder="8.000.000 - 15.000.000" value="{{ old('est_gaji') }}">
                            </div>
                            @error('est_gaji')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Syarat Minimal Lulusan</label>
                                <select class="form-control" name="jenjang_pendidikan_id">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($jenjangpendidikans as $jenjangpendidikan)
                                        <option value="{{ $jenjangpendidikan->id }}">{{ $jenjangpendidikan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Syarat Jurusan Pendidikan</label>
                                <select class="form-control" name="jurusan_pendidikan_id">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($jurusanpendidikans as $jurusanpendidikan)
                                        <option value="{{ $jurusanpendidikan->id }}">{{ $jurusanpendidikan->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Kategori Pekerjaan</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($categorys as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Jenjang Karir</label>
                                <select class="form-control" name="jenjang_karir_id">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($jenjangkarirs as $jenjangkarir)
                                        <option value="{{ $jenjangkarir->id }}">{{ $jenjangkarir->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label class="control-label">Minimal Pengalaman</label>
                                <select class="form-control" name="minimal_pengalaman_id">
                                    <option value="">Pilih Salah Satu</option>
                                    @foreach ($minimalpengalamans as $minimalpengalaman)
                                        <option value="{{ $minimalpengalaman->id }}">{{ $minimalpengalaman->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Fungsi Kerja (opsional)</label>
                                <input id="metatitle" name="fungsi_kerja" type="text"
                                    class="form-control @error('fungsi_kerja') is-invalid @enderror"
                                    placeholder="Type fungsi kerja" value="{{ old('fungsi_kerja') }}">
                            </div>
                            @error('fungsi_kerja')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Lokasi Kantor </label>
                                <input id="metatitle" name="alamat" type="text"
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    placeholder="Jl. Job Seeker no 52" value="{{ old('alamat') }}">
                            </div>
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metatitle">Link Google Maps </label>
                                <input id="metatitle" name="google_map" type="text"
                                    class="form-control  @error('google_map') is-invalid @enderror"
                                    placeholder="https:://maps.com/123asda" value="{{ old('google_map') }}">
                            </div>
                            @error('google_map')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Persyaratan</label>
                                <textarea class="form-control @error('persyaratan') is-invalid @enderror" id="persyaratan" rows="5"
                                    name="persyaratan" placeholder="Persyaratan" value="{{ old('persyaratan') }}"></textarea>
                            </div>
                            @error('persyaratan')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="metadescription">Tanggung Jawab</label>
                                <textarea class="form-control @error('tanggung_jawab') is-invalid @enderror" id="tanggung_jawab"
                                    name="tanggung_jawab" rows="5" placeholder="Tanggung Jawab" value="{{ old('tanggung_jawab') }}"></textarea>
                            </div>
                            @error('tanggung_jawab')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="control-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="AKTIF">Aktif</option>
                                <option value="NONAKTIF">Non-aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                            Changes</button>
                        <button type="submit" class="btn btn-secondary waves-effect waves-light">Cancel</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#persyaratan'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#tanggung_jawab'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script src="{{ URL::asset('assets/libs/@ckeditor/@ckeditor.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
