@extends('admins.layouts.master')
@section('title')
    @lang('Edit Lamaran -  Dashboards')
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
            Lamaran
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-5">
                            <div>
                                <h5 class="font-size-14 mb-4">Edit
                                    data</h5>
                                <form method="POST" action="/dashboard/lamaran/{{ $lamarans->id }}">
                                    @method('PUT')
                                    @csrf
                                    <select class="form-select" name="status" aria-label="Default select example" required>
                                        <option value="TERIMA">DITERIRMA</option>
                                        <option value="TOLAK">DITOLAK</option>
                                        <option value="PENDING">PENDING</option>
                                    </select>
                                    <div class="mt-2">
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
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
    <script src="{{ URL::asset('assets/js/pages/datatable-pages.init.js') }}"></script>
@endsection
