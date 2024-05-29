<nav class="sidebar-nav scroll-sidebar" data-simplebar="">
    <ul id="sidebarnav">
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route(Auth()->user()->role) }}" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
            </a>
        </li>
        @if (Auth()->user()->role == 'admin')
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('pengumuman.admin') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-table"></i>
                </span>
                <span class="hide-menu">Pengumuman</span>
            </a>
        </li>
        @endif
        @if (Auth()->user()->role == 'admin' || Auth()->user()->role == 'petugas')
        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">SISWA</span>
        </li>
        <li class="sidebar-item">
            <a href="{{ route('siswapage') }}" class="sidebar-link" aria-expanded="false">
                <span>
                    <i class="ti ti-user fs-6"></i>
                </span>
                <span class="hide-menu">Siswa</span>
            </a>
        </li>
        @endif
        @if (Auth()->user()->role == 'admin')

        <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Profile Sekolah</span>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('profile.sekolah') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-user fs-6"></i>
                </span>
                <span class="hide-menu">Profile Sekolah</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('profile.seo') }}" aria-expanded="false">
                <span>
                    <i class="ti ti-search fs-6"></i>
                </span>
                <span class="hide-menu">Seo</span>
            </a>
        </li>
        @endif

        

    </ul>
</nav>