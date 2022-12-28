<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | JobSeeker - Dashboard Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('img/logo.png') }}">
    @include('members.layouts.head-css')
</head>

@section('body')
    @include('members.layouts.body')
@show

<!-- Begin page -->
<div id="layout-wrapper">

    <body data-layout="horizontal">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="margin-top: 0px; padding-top: 25px;">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('members.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('members.layouts.right-sidebar')
<!-- END Right Sidebar -->

@include('members.layouts.vendor-scripts')
</body>

</html>
