<!doctype html>
<html lang="en" class="h-100">
{{-- class="h-100" --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>JOB SEKKER - Portal Mencari Pekerjaan</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" crossorigin="anonymous">
    <link href="/css/fontawesome.min.css" rel="stylesheet">

</head>

{{-- h-100 --}}

<body class="d-flex flex-column h-100">

    @include('layouts.header')

    <!-- Begin page content -->
    <main class="flex-shrink-0">

        @yield('container')

    </main>

    <footer class="footer mt-auto py-3 bg-lightph">
        <div class="container">
            <span class="text-muted">2022 &copy; Job Seeker .</span>
        </div>
    </footer>
    <script src="/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('aos/aos.js') }}"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="{{ asset('js/style.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>


</html>
