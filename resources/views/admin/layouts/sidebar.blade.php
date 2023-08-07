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
                    <a href="{{ url('/dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">INTERFACE</li>
                {{-- Kelola data --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Kelola data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/kelola-peralatan') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Peralatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kelola-jadwal') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kelola-grup') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Grup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- info data --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Info data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/informasi-peralatan') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Peralatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/informasi-jadwal') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Jadwal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/informasi-grup') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Info Grup</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">USERS</li>
                {{-- User --}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            User
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Users</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                    </ul>
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
