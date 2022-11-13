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
            Update Picture
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
                    <h4 class="card-title">Update Picture</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                {{-- @foreach ($biodatas as $item) --}}
                                <form method="POST" action="/dashboard/edit-profile/">
                                    @method('PUT')
                                    @csrf
                                    <div class="mb-3">
                                        <label for="avatar">Profile Picture</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror"
                                                id="avatar" name="avatar" autofocus>
                                            <label class="input-group-text" for="avatar">Upload</label>
                                        </div>
                                        <div class="text-start mt-2">
                                            <img src="@if (Auth::user()->avatar != '') {{ URL::asset('images/' . Auth::user()->avatar) }}@else{{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                                                alt="" class="rounded-circle avatar-lg">
                                        </div>
                                        <div class="text-danger" role="alert" id="avatarError"
                                            data-ajax-feedback="avatar"></div>
                                    </div>
                                    {{-- @endforeach --}}
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
