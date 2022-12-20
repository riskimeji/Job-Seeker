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
                    <a href="{{ url('dashboard/lamaran') }}">
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
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="archive"></i>
                        <span data-key="t-contacts">Lowongan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('dashboard/lowongan') }}"><span>Lowongan</span></a>
                        </li>
                        <li><a href="{{ url('dashboard/category') }}"><span>Job
                                    Kategori</span></a></li>
                        <li><a href="{{ url('dashboard/jenjang-karir') }}"> <span>
                                    Jenjang Karir</span></a></li>
                        <li><a href="{{ url('dashboard/minimal-pengalaman') }}"> <span>
                                    Minimal Pengalaman</span></a></li>

                    </ul>
                </li>
                {{-- <li><a href="{{ url('dashboard/lowongan') }}"> <i data-feather="archive"></i><span>Lowongan</span></a>
                </li> --}}
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
                        <li><a href="{{ url('dashboard/jenjang-pendidikan') }}"> <i
                                    data-feather="bar-chart-2"></i><span>Jenjang Pendidikan</span></a></li>
                        <li><a href="{{ url('dashboard/jurusan-pendidikan') }}"> <i
                                    data-feather="globe"></i><span>Jurusan
                                    Pendidikan</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
