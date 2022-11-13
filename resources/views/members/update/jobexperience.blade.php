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
            Update Pendidikan Terakhir
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
                    <h4 class="card-title">Pendidikan Terakhir</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                @foreach ($biodatas as $item)
                                    <form method="POST" action="/dashboard/edit-jobexperience/{{ $item->id }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-email-input">Nama
                                                        Perusahaan</label>
                                                    <input type="text" class="form-control" name="company_name"
                                                        value="{{ $item->company_name }}" id="formrow-email-input"
                                                        placeholder="Enter Your Institut Name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-email-input">Jabatan</label>
                                                    <input type="text" class="form-control" name="position"
                                                        value="{{ $item->position }}" id="formrow-email-input"
                                                        placeholder="Enter Your Institut Name">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-email-input">Dari</label>
                                                    <input type="date" class="form-control" name="star_magang"
                                                        id="formrow-email-input" placeholder="Enter Your Email Id"
                                                        value="{{ $item->star_magang }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-password-input">Sampai
                                                        Dengan</label>
                                                    <input type="date" name="end_magang" class="form-control"
                                                        id="formrow-password-input" value="{{ $item->end_magang }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label" for="formrow-password-input">Jurusan</label>
                                                    <select class="form-select" name="category_id">
                                                        @foreach ($categorys as $category)
                                                            @if (old('category_id', $item->category_id) == $category->id)
                                                                <option value="{{ $category->id }}" selected="selected">
                                                                    {{ $category->name }}</option>
                                                            @else
                                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                @endforeach
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
