        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">1 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> Permintaan Diterima
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{Auth::user()->name}}</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> Pengaturan
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('admin.logout') }}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="nav-link">
                <img src="{{ asset('src/images/logo.png') }}" alt="AdminLTE Logo" width="100%" height="auto"
                    class="brand-image " style="opacity: .8">
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('Admin') }}"
                                class="nav-link {{ request()->routeIs('Admin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Dashboard
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-danger">Data Master</li>
                        <li class="nav-item">
                            <a href="{{ route('Admin.KelolaUser') }}"
                                class="nav-link {{ request()->routeIs('Admin.KelolaUser') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Kelola User
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        <li class="nav-item">
                            <a href="{{ route('Admin.KelolaAset') }}"
                                class="nav-link {{ request()->routeIs('Admin.KelolaAset') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-box"></i>
                                <p>
                                    Kelola Aset
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-danger">Transaksi</li>
                        <li class="nav-item">
                            <a href="{{ route('Admin.KelolaPeminjaman') }}"
                                class="nav-link {{ request()->routeIs('Admin.KelolaPeminjaman') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-inbox"></i>
                                <p>
                                    Kelola Peminjaman
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        <li class="nav-header text-danger">Lainnya</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
