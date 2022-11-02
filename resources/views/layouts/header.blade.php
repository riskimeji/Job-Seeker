<header>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md fixed-top " style="z-index: 10;">
        <div class="container-fluid">
            <img class="navbar-brand ms-2" src="../img/logo.png" width="50" height="50">
            <span class="navbar-brand mb-0 h1 fw-bold " style="color: white" family>JOB SEEKER</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }} me-3"
                            href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }} me-3" aria-current="page"
                            href="{{ url('about') }}">About</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link {{ Request::is('berita') ? 'active' : '' }} me-3"
                            href="{{ url('berita') }}">Services</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }} me-3"
                            href="{{ url('contact') }}">Contact</a>
                    </li>
                    @auth
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle me-3" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item" href="{{ url('signin/employee') }}">Employee</a>
                                </li>
                                <li><a class="dropdown-item" href="{{ url('signin/company') }}">Company</a>
                                </li>
                            </ul>
                        </li>
                    @endauth

                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="post" style="margin: 0px;">
                                @csrf
                                <button class="btn btn-light text-black" style="width: 100px; border-radius:50px;"
                                    type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn btn-light text-black" style="width: 100px; border-radius:50px;"
                                aria-current="page" href="/signup">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="navbar navbar-expand-md fixed-top" style="margin-top: 66px; background-color: #FFC056; z-index:9;">
        <div class="container-fluid justify-content-start">
            <span class="navbar-brand mb-0 h1 fw-bold ms-4" id="titlecarilowongan" style="color: BLACK" famil>CARI
                LOWONGAN KERJA</span>
            <div class="w-100" id="navbarCollapse1">
                <ul class="navbar-nav me-auto mb-md-0">

                    <form class="d-flex m-0 w-100">
                        <input class="form-control me-2 ms-3" type="search" style="width: 50%;  border-radius: 0; "
                            placeholder="Cari Berdasarkan Nama Jabatan" aria-label="Search">
                        <input class="form-control me-1 " style="width: 30%; border-radius: 0;" type="search"
                            placeholder="Location" aria-label="Search">
                        <button class="btn btn-primary me-5" style="margin-right: 50px; width:15%;  border-radius: 0;"
                            type="submit"><i class="fa fa-search me-3"></i>Cari</button>
                    </form>
            </div>
        </div>
    </div>
</header>
