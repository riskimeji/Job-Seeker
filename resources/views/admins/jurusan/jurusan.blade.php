@extends('admins.layouts.master')
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
    @component('admins.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Jurusan Pendidikan
        @endslot
    @endcomponent
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    @if (session()->has('pesan'))
        <div class="alert alert-danger" role="alert">
            {{ session('pesan') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title">Jurusan Pendidikan <span
                                        class="text-muted fw-normal ms-2">({{ $datas }})</span>
                                </h5>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                                <div>
                                    <a href="{{ asset('dashboard/jurusan-pendidikan/create') }}" class="btn btn-light"><i
                                            class="bx bx-plus me-1"></i>
                                        Add New</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- end row -->

                    <div class="table-responsive mb-4">
                        <table class="table align-middle datatable dt-responsive table-check nowrap"
                            style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th style="width: 80px; min-width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jurusans as $jurusan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>

                                            <a href="#" class="text-body">{{ $jurusan->name }}</a>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-link font-size-16 shadow-none py-0 text-muted dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item"
                                                            href="/dashboard/jurusan-pendidikan/{{ $jurusan->id }}/edit">Edit</a>
                                                    </li>
                                                    {{-- <li><a class="dropdown-item" href="#">Delete</a></li> --}}
                                                    <li>
                                                        <form action="/dashboard/jurusan-pendidikan/{{ $jurusan->id }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="dropdown-item" type="submit"
                                                                onclick="return confirm
                                            ('Yakin akan menghapus data ?')
">Delete</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                    <!-- end table responsive -->
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
    <script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
@endsection
