<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-primary elevation-6">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assets/img/unkhair.png') }}" alt="Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text text-dark">Lab Komputer FT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/img/unknown.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @auth
                    <a href="#" class="d-block text-dark">{{ Auth::user()->name }}</a>
                @endauth
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                {{-- DASHBOARD --}}
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">INTERFACE</li>
                {{-- Kelola data --}}
                <li class="nav-item">
                    <a href="{{ url('/dashboard/dosen') }}" class="nav-link {{ Request::is('/dashboard/dosen') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Dosen
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/dashboard/matakuliah') }}" class="nav-link {{ Request::is('/dashboard/matakuliah') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Mata Kuliah
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::is('/dashboard/jadwal') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Jadwal
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/kelola') }}" class="nav-link {{ Request::is('/dashboard/kelola') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard/informasi') }}" class="nav-link {{ Request::is('/dashboard/informasi') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informasi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- User --}}
                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="{{ url('/dashboard/profil-user') }}" class="nav-link {{ Request::is('/dashboard/profil-user') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-address-card"></i>
                        <p>
                            Profil User
                        </p>
                    </a>
                </li>
                <li class="nav-item w-100">
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="nav-link" href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Logout</p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
