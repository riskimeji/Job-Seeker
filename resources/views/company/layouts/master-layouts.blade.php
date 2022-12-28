<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | JobSeeker - Website Mencari Loker & Mendaftarkan Loker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Job Sekker - Website Mencari Pekerjaan dan Mendaftarkan Lowngan Pekerjaan" name="description" />
    <meta content="Riski Meji" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
    @include('company.layouts.head-css')
</head>

@section('body')
    @include('company.layouts.body')
@show

<div id="layout-wrapper">

    <body data-layout="horizontal">

        @include('company.layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('layouts.right-sidebar')
<!-- END Right Sidebar -->

@include('company.layouts.vendor-scripts')
</body>

</html>
