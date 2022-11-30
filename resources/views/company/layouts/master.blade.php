<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Job Seeker - Admin & Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
    @include('company.layouts.head-css')
</head>

@section('body')
    @include('company.layouts.body')
@show
<!-- Begin page -->
<div id="layout-wrapper">
    @include('company.layouts.topbar')
    @include('company.layouts.sidebar')
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        @include('company.layouts.footer')
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
@include('company.layouts.right-sidebar')
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
@include('company.layouts.vendor-scripts')
</body>

</html>
