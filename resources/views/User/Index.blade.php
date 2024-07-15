<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/js/app.js')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMASET | Dashboard User</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="src/images/logo.png" alt="AdminLTELogo" height="60" width="300">
        </div>

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
                        <a href="{{ route('logoutuser') }}" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <div class="dropdown-divider"></div>
                        <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> -->
                    </div>
                </li>
                <!-- <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-danger elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="nav-link">
                <img src="src/images/logo.png" alt="AdminLTE Logo" width="100%" height="auto" class="brand-image " style="opacity: .8">
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">

                <!-- SidebarSearch Form -->

                <!-- Sidebar Menu -->
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-danger">Peminjaman</li>
                        <li class="nav-item">
                            <a href="{{ route('Katalog') }}" class="nav-link">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Pinjam Asset
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-danger">Lainnya</li>
                        <li class="nav-item">
                            <a href="{{ route('logoutuser') }}" class="nav-link">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
                        <b>Selamat Datang, <span class="text-danger">{{$userName}}</span>!</b>
                        <p>Ayo mulai peminjaman aset dengan mudah dan nyaman</p>
                    </div>
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white rounded shadow">
                                <div class="inner p-3 ">
                                    <i class="ion ion-ios-box" style="font-size: 60px; color:#9D2A17;"></i>
                                    <div>
                                        <p>Cek Ketersediaan Aset</p>
                                    </div>
                                    <div>
                                        <h3>{{ $jumlahAset }}</h3>
                                    </div>
                                    <div>
                                        <p>Total Aset Tersedia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white rounded shadow">
                                <div class="inner p-3 ">
                                    <i class="ion ion-ios-calendar" style="font-size: 60px; color:#9D2A17;"></i>
                                    <div>
                                        <p>Riwayat Peminjaman</p>
                                    </div>
                                    <div>
                                        <h3>{{$allPeminjaman}}</h3>
                                    </div>
                                    <div>
                                        <p>Total Riwayat Peminjaman Anda</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white rounded shadow">
                                <div class="inner p-3 ">
                                    <i class="ion ion-android-checkbox-outline" style="font-size: 60px; color:#9D2A17;"></i>
                                    <div>
                                        <p>Peminjaman Disetujui</p>
                                    </div>
                                    <div>
                                        <h3>{{$peminjamanSetuju}}</h3>
                                    </div>
                                    <div>
                                        <p>Total Aset Tersedia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-white rounded shadow">
                                <div class="inner p-3 ">
                                    <i class="ion ion-android-cancel" style="font-size: 60px; color:#9D2A17;"></i>
                                    <div>
                                        <p>Peminjaman Ditolak</p>
                                    </div>
                                    <div>
                                        <h3>{{$peminjamanTolak}}</h3>
                                    </div>
                                    <div>
                                        <p>Total Peminjaman Ditolak</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->

                    </div>
                    <!-- /.row -->
                    <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
                        <h4 class="font-weight-bold">Data Peminjaman Aset</h4>

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Aset</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detail_peminjaman as $detail)
                                <tr>
                                    <td>{{$detail->aset->kode_aset}}</td>
                                    <td>{{$detail->aset->nama_aset}}</td>
                                    <td>{{$detail->aset->kategori_aset->nama_kategori}}</td>
                                    <td>{{tglIndo( $detail->peminjaman_aset->tanggal_pinjam )}}</td>
                                    <td>{{tglIndo( $detail->peminjaman_aset->tanggal_kembali )}}</td>
                                    <td>{{$detail->aset->jumlah}}</td>
                                    <td>
                                        {!! printStatus( $detail->status ) !!}
                                    </td>
                                    <td>
                                        @if ($detail->status !== 'T' && $detail->status !== 'V')
                                        <a type="button" class="btn btn-xs btn-success" href="{{route('invoice.cetak', $detail->peminjaman_aset->kode_transaksi)}}" target="_blank">
                                            <i class="fas fa-print"></i>
                                        </a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://adminlte.io">SIM ASSET</a>.</strong>
            All rights reserved.
            <!-- <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div> -->
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>