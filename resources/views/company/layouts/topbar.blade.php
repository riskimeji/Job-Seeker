<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ asset('/') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24"> <span
                            class="logo-txt">Job Seeker</span>
                    </span>
                </a>

                <a href="{{ asset('/') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ URL::asset('img/logo.png') }}" alt="" height="24"> <span
                            class="logo-txt">Job Seeker </span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <button class="btn btn-primary" type="button"><i
                            class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form>
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
            {{-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div> --}}

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="@if (Auth::user()->profile != null) {{ Auth::user()->profile }} @else {{ URL::asset('assets/images/users/avatar-1.jpg') }} @endif"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->first_name }}</span>

                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="/dashboard/company/profile/{{ Auth::user()->username }}/edit"><i
                            class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> @lang('Profile')</a>
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
