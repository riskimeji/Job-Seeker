@extends('company.layouts.master')
@section('title')
    @lang('Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/datatables.net-responsive-bs4.min.css') }}"
        rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('company.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Lamaran
        @endslot
    @endcomponent
    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <h5 class="card-title">Data Lamaran </h5> {{-- <span class="text-muted fw-normal ms-2">({{ $datas }})</span> --}}
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
                                    <th scope="col">Judul</th>
                                    <th scope="col">Tanggal Melamar</th>
                                    <th scope="col">Status</th>
                                    <th style="width: 80px; min-width: 80px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lamarans as $lamaran)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="@if ($lamaran->user->profile != '') {{ $lamaran->user->profile }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                                alt="" class="avatar-sm rounded-circle me-2">
                                            <a href="/profile/{{ $lamaran->user->username }}"
                                                class="text-body">{{ $lamaran->user->first_name }}
                                                {{ $lamaran->user->last_name }}</a>
                                        </td>
                                        <td>{{ $lamaran->lowongan->title }}</td>
                                        <td>{{ $lamaran->created_at->diffForHumans() }}</td>

                                        <td><span
                                                class="@if ($lamaran->status == 'PENDING') badge bg-warning text-dark
                                        @elseif($lamaran->status == 'TERIMA')
                                        badge bg-success
                                        @elseif($lamaran->status == 'TOLAK')
                                        badge bg-danger @endif">{{ $lamaran->status }}</span>
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
                                                            href="/dashboard/company/lamaran/{{ $lamaran->id }}/edit">Edit</a>
                                                    </li> {{-- <li><a class="dropdown-item" href="#">Delete</a></li> --}}
                                                    <li>
                                                        <form action="/dashboard/company/lamaran/{{ $lamaran->id }}"
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
    <script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
@endsection
