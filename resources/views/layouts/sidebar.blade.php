        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img src="{{asset('img/polinema.png')}}" alt="" width="50">
                </div>
                <div class="sidebar-brand-text mx-3">Repository</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::segment(1) === 'home' ? 'active' : null }} ">
                <a class=" nav-link" href="{{ route('home')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class=" nav-link" href="{{ route('lp.home')}}">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Halaman Utama</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <li class="nav-item {{ Request::segment(1) === 'profile' ? 'active' : null }} ">
                <a class=" nav-link" href="{{ route('profile.index')}}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Profile</span></a>
            </li>

            <li class="nav-item {{ Request::segment(1) === 'tipe' ? 'active' : null }} ">
                <a class=" nav-link" href="{{ route('tipe.index')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Jenis Dokumen</span></a>
            </li>

            <li class="nav-item {{ Request::segment(1) === 'repository' ? 'active' : null }} ">
                <a class=" nav-link" href="{{ route('repository.index')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data Repository</span></a>
            </li>
            @if (Auth::user()->role == "adm")
            <li class="nav-item {{ Request::segment(1) === 'faq' ? 'active' : null }} ">
                <a class=" nav-link" href="{{ route('faq.index')}}">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Data FAQ</span></a>
            </li>
            @endif

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
