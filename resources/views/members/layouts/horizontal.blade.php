<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="" style="margin-right: 0px; width: 40px;">
                <a href="/" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24"> <span
                            class="logo-txt"></span>
                    </span>
                </a>

                <a href="/" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24"> <span
                            class="logo-txt"></span>
                    </span>
                </a>
            </div>
            <div class="navbar-brand">
                <span class="logo-txt text-white logo-lg">Dashboard</span>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            {{-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i
                            class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form> --}}
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                    aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                    id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
                            </div>
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-3.jpg') }}"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">It will seem like simplified English.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your order is placed</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <img src="{{ URL::asset('assets/images/users/avatar-6.jpg') }}"
                                    class="me-3 rounded-circle avatar-sm" alt="user-pic">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">As a skeptical Cambridge friend of mine occidental.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours
                                                ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="@if (Auth::user()->profile != '') {{ asset(Auth::user()->profile) }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->first_name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/dashboard/profile/{{ Auth::user()->username }}/edit"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
                    <a class="dropdown-item" href="/dashboard/password/{{ Auth::user()->username }}/edit"><i
                            class="mdi mdi-account-cog font-size-16 align-middle me-1"></i>
                        @lang('Change Password')</a>
                    <div class="dropdown-divider"></div>
                    <form id="logout-form" action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item "><i class="bx bx-power-off font-size-16 align-middle me-1"></i>
                            <span key="t-logout">@lang('Logout')</span></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</header>

<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ asset('dashboard/member') }} "
                            id="topnav-dashboard" role="button">
                            <i data-feather="box"></i><span data-key="t-dashboard">@lang('Lamaran')</span>
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages"
                            role="button">
                            <i data-feather="briefcase"></i><span data-key="t-apps">@lang('Cari Lowongan Kerja')</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-pages">

                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                    id="topnav-ecommerce" role="button">
                                    <span data-key="t-ecommerce">@lang('Berdasarkan Kota')</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">

                                    <a href="ecommerce-products " class="dropdown-item"
                                        data-key="t-products">@lang('Padang')</a>
                                    <a href="ecommerce-product-detail " class="dropdown-item"
                                        data-key="t-product-detail">@lang('Jakarta')</a>
                                    <a href="ecommerce-orders " class="dropdown-item"
                                        data-key="t-orders">@lang('Bandung')</a>
                                    <a href="ecommerce-customers " class="dropdown-item"
                                        data-key="t-customers">@lang('Lampung')</a>
                                    <a href="ecommerce-cart " class="dropdown-item"
                                        data-key="t-cart">@lang('Surabaya')</a>
                                    <a href="ecommerce-checkout " class="dropdown-item"
                                        data-key="t-checkout">@lang('Jawa Barat')</a>
                                    <a href="ecommerce-shops " class="dropdown-item"
                                        data-key="t-shops">@lang('Medan')</a>
                                    <a href="ecommerce-add-product " class="dropdown-item"
                                        data-key="t-add-product">@lang('Yogyakarta')</a>
                                </div>
                            </div>


                            <a href="apps-calendar " class="dropdown-item"
                                data-key="t-calendar">@lang('Semua Lowongan')</a>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email"
                                    role="button">
                                    <span data-key="t-email">@lang('Berdasarkan Industri')</span>
                                    <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="apps-email-inbox " class="dropdown-item"
                                        data-key="t-inbox">@lang('Perdagangan Umum')</a>
                                    <a href="apps-email-read " class="dropdown-item"
                                        data-key="t-read-email">@lang('Ritel')</a>
                                    <a href="apps-email-read " class="dropdown-item"
                                        data-key="t-read-email">@lang('Farmasi')</a>
                                    <a href="apps-email-read " class="dropdown-item"
                                        data-key="t-read-email">@lang('Telekomunikasi')</a>
                                    <a href="apps-email-read " class="dropdown-item"
                                        data-key="t-read-email">@lang('Media')</a>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
