<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ url('dashboard/admin') }}">
                        <i data-feather="home"></i>
                        <span class="badge rounded-pill bg-soft-success text-success float-end">9+</span>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>
                <li class="menu-title" data-key="t-apps">Public</li>
                <li>
                    <a href="{{ url('dashboard/user') }}">
                        <i data-feather="user"></i>
                        <span data-key="t-chat">User</span>
                    </a>
                </li>
                <li>
                    <a href="apps-chat">
                        <i data-feather="mail"></i>
                        <span data-key="t-chat">Lamaran</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="map-pin"></i>
                        <span data-key="t-contacts">Alamat</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('dashboard/province') }}" data-key="t-user-grid">@lang('Province')</a>
                        </li>
                        <li><a href="{{ url('dashboard/city') }}" data-key="t-user-list">@lang('City')</a></li>
                        <li><a href="{{ url('dashboard/district') }}" data-key="t-profile">@lang('Disctrict')</a></li>
                        <li><a href="{{ url('dashboard/village') }}" data-key="t-user-list">@lang('Village')</a>
                        </li>
                    </ul>
                </li>
                <li><a href="{{ url('dashboard/lowongan') }}"> <i data-feather="archive"></i><span>Lowongan</span></a>
                </li>
                <li class="menu-title" data-key="t-apps">User</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-buildings"></i>
                        <span data-key="t-email">Company</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('dashboard/jam-kerja') }}"> <i data-feather="clock"></i><span>Jam
                                    Kerja</span></a></li>
                        <li>
                            <a href="{{ url('dashboard/industry') }}">
                                <i data-feather="grid"></i>
                                <span data-key="t-calendar">Industry Job</span>
                            </a>
                        </li>
                        <li><a href="{{ url('dashboard/hari-kerja') }}"> <i data-feather="calendar"></i><span>Hari
                                    Kerja</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i class="bx bx-user"></i>
                        <span data-key="t-email">Employee</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('dashboard/category') }}"> <i data-feather="list"></i><span>Job
                                    Kategori</span></a></li>
                        <li><a href="{{ url('dashboard/jenjang-pendidikan') }}"> <i
                                    data-feather="bar-chart-2"></i><span>Jenjang Pendidikan</span></a></li>
                        <li><a href="{{ url('dashboard/jurusan-pendidikan') }}"> <i
                                    data-feather="globe"></i><span>Jurusan Pendidikan</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="apps-chat">
                        <i data-feather="trello"></i>
                        <span data-key="t-tasks">Pendidikan</span>
                    </a>
                </li>
                <li class="menu-title" data-key="t-pages">Pages</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="layers"></i>
                        <span data-key="t-authentication">Biodata Perusahaan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login" data-key="t-login">@lang('translation.Login')</a></li>
                        <li><a href="auth-register" data-key="t-register">@lang('translation.Register')</a></li>
                        <li><a href="auth-recoverpw" data-key="t-recover-password">@lang('translation.Recover_Password')</a></li>
                        <li><a href="auth-lock-screen" data-key="t-lock-screen">@lang('translation.Lock_Screen')</a></li>
                        <li><a href="auth-logout" data-key="t-logout">@lang('translation.Logout')</a></li>
                        <li><a href="auth-confirm-mail" data-key="t-confirm-mail">@lang('translation.Confirm_Mail')</a></li>
                        <li><a href="auth-email-verification" data-key="t-email-verification">@lang('translation.Email_verification')</a>
                        </li>
                        <li><a href="auth-two-step-verification"
                                data-key="t-two-step-verification">@lang('translation.Two_step_verification')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Biodata Pelamar</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter" key="t-starter-page">@lang('translation.Starter_Page')</a></li>
                        <li><a href="pages-maintenance" key="t-maintenance">@lang('translation.Maintenance')</a></li>
                        <li><a href="pages-comingsoon" key="t-coming-soon">@lang('translation.Coming_Soon')</a></li>
                        <li><a href="pages-timeline" key="t-timeline">@lang('translation.Timeline')</a></li>
                        <li><a href="pages-faqs" key="t-faqs">@lang('translation.FAQs')</a></li>
                        <li><a href="pages-pricing" key="t-pricing">@lang('translation.Pricing')</a></li>
                        <li><a href="pages-404" key="t-error-404">@lang('translation.Error_404')</a></li>
                        <li><a href="pages-500" key="t-error-500">@lang('translation.Error_500')</a></li>
                    </ul>
                </li>

                <li>
                    <a href="layouts-horizontal">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Horizontal</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
