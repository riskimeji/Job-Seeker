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
            Minimal Pengalaman
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

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-5">
                            <div>
                                <h5 class="font-size-14 mb-4">Add
                                    data</h5>
                                <form method="POST" action="/dashboard/minimal-pengalaman/{{ $minimalpengalamans->id }}">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-email-input">Id</label>
                                                <input type="number" value="{{ old('id', $minimalpengalamans->id) }}"
                                                    class="form-control" disabled placeholder=" Id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-password-input">Name</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="formrow-password-input"
                                                    value="{{ old('name', $minimalpengalamans->name) }}"
                                                    placeholder="Enter Industry Name" required>
                                                @error('name')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
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
