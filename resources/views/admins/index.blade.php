@extends('admins.layouts.master')
@section('title')
    @lang('Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('admins.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Welcome !
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total User</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $datas }}">0</span>
                            </h4>
                            {{-- <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+$20.9k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div> --}}
                        </div>

                        <div class="flex-shrink-0 text-end dash-widget">
                            <i data-feather="users" class="avatar-md"></i>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Industry</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $countindustry }}">0</span>
                            </h4>
                            {{-- <div class="text-nowrap">
                                <span class="badge bg-soft-danger text-danger">-29 Trades</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div> --}}
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">

                            <i data-feather="grid" class="avatar-md"></i>

                            {{-- <div id="mini-chart2" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col-->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Lamaran</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $countlamarans }}">0</span>
                            </h4>
                            {{-- <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+ $2.8k</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div> --}}
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <i data-feather="inbox" class="avatar-md"></i>
                            {{-- <div id="mini-chart3" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card card-h-100">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Lowongan</span>
                            <h4 class="mb-3">
                                <span class="counter-value" data-target="{{ $countlowongans }}">0</span>
                            </h4>
                            {{-- <div class="text-nowrap">
                                <span class="badge bg-soft-success text-success">+5.32%</span>
                                <span class="ms-1 text-muted font-size-13">Since last week</span>
                            </div> --}}
                        </div>
                        <div class="flex-shrink-0 text-end dash-widget">
                            <i data-feather="archive" class="avatar-md"></i>
                            {{-- <div id="mini-chart4" data-colors='["#1c84ee", "#33c38e"]' class="apex-charts"></div> --}}
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row-->

    <div class="row">
        <div class="col-xl-8">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">10 Lamaran Terbaru</h5>
                    </div>
                    <div class="card-body px-0">
                        <div class="px-3" data-simplebar style="max-height: 386px;">
                            @foreach ($lamarans as $lamaran)
                                <div class="d-flex align-items-center pb-4">
                                    <div class="avatar-md me-4">
                                        <img src="@if ($lamaran->user->profile == null) {{ URL::asset('./assets/images/users/avatar-1.jpg') }}
                                        @else{{ asset($lamaran->user->profile) }} @endif"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-15 mb-1"><a href=""
                                                class="text-dark">{{ $lamaran->user->first_name }}
                                                {{ $lamaran->user->last_name }}
                                            </a></h5>
                                        <span class="text-muted">Judul: {{ $lamaran->lowongan->title }}</span><br>
                                        <span class="text-muted">Waktu Melamar:
                                            {{ $lamaran->created_at->diffForHumans() }}</span><br>
                                        <span
                                            class="@if ($lamaran->status == 'PENDING') badge bg-warning text-dark
                                            @elseif($lamaran->status == 'TERIMA')
                                            badge bg-success
                                            @elseif($lamaran->status == 'TOLAK')
                                            badge bg-danger @endif">{{ $lamaran->status }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->

        <div class="col-xl-4">
            <!-- card -->
            <div class="card">
                <!-- card body -->
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-center mb-4">
                        <h5 class="card-title me-2">10 Lowongan Terbaru</h5>
                    </div>
                    <div class="card-body px-0">
                        <div class="px-3" data-simplebar style="max-height: 386px;">
                            @foreach ($lowongans as $lowongan)
                                <div class="d-flex align-items-center pb-4">
                                    <div class="avatar-md me-4">
                                        <img src="{{ asset($lowongan->media) }}" class="img-fluid rounded-circle"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="font-size-15 mb-1"><a href=""
                                                class="text-dark">{{ $lowongan->title }}
                                            </a></h5>
                                        <span class="text-muted">Dibuat: {{ $lowongan->created_at }}</span><br>
                                        <span class="text-muted">Oleh: {{ $lowongan->user->first_name }}
                                            {{ $lowongan->user->last_name }}</span><br>
                                        <span
                                            class="@if ($lowongan->status == 'AKTIF') mt-2 badge bg-soft-success text-success @else
                                            mt-2 badge bg-soft-danger text-danger @endif">{{ $lowongan->status }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">10 User Terakhir</h4>
                </div><!-- end card header -->

                <div class="card-body px-0">
                    <div class="px-3" data-simplebar style="max-height: 386px;">
                        @foreach ($users as $user)
                            <div class="d-flex align-items-center pb-4">
                                <div class="avatar-md me-4">
                                    @if ($user->profile != null)
                                        <img src="{{ URL::asset($user->profile) }}" class="img-fluid rounded-circle"
                                            alt="">
                                    @else
                                        <img src="{{ URL::asset('./assets/images/users/avatar-1.jpg') }}"
                                            class="img-fluid rounded-circle" alt="">
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="font-size-15 mb-1"><a href=""
                                            class="text-dark">{{ $user->first_name }} {{ $user->last_name }}</a></h5>
                                    <span class="text-muted">{{ $user->email }}</span><br>
                                    <span class="text-muted">{{ $user->role }}</span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
        <!-- end col -->
    </div><!-- end row -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

{{-- @extends('admins.layouts.master')
@section('title')
    @lang('Dashboards')
@endsection
@section('css')
    <link href="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('admins.components.breadcrumb')
        @slot('li_1')
            Dashboard
        @endslot
        @slot('title')
            Welcome !
        @endslot
    @endcomponent
    <div>
        <h1></h1>
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/admin-resources/admin-resources.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection --}}
