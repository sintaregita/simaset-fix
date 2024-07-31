<!DOCTYPE html>
<html lang="en">

<head>
    @vite('resources/js/app.js')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIMASET | Katalog</title>

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
    <!-- CSS Internal -->
    <link rel="stylesheet" href="{{ asset('src/css/katalog.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <style>
        .no-spinners {
            -moz-appearance: textfield;
        }

        .no-spinners::-webkit-outer-spin-button,
        .no-spinners::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>


<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('src/images/logo.png') }}" alt="AdminLTELogo" height="60" width="300">
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
                <img src="{{ asset('src/images/logo.png') }}" alt="AdminLTE Logo" width="100%" height="auto" class="brand-image " style="opacity: .8">
            </a>

            <!-- Sidebar -->
            <div class="sidebar ">

                <!-- Sidebar Menu -->
                <nav class="mt-3">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                        <li class="nav-item">
                            <a href="{{ route('User') }}" class="nav-link ">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
                        <li class="nav-header text-danger">Peminjaman</li>
                        <li class="nav-item">
                            <a href="katalog.html" class="nav-link active">
                                <i class="nav-icon fas fa-truck-loading"></i>
                                <p>
                                    Pinjam Aset
                                    <!-- <span class="badge badge-info right">2</span> -->
                                </p>
                            </a>
                        </li>
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Peminjaman Aset</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
                                <li class="breadcrumb-item active">Pinjam Aset</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row ">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="input-group input-group">
                                    <span class="input-group-text" id="basic-addon1"> <i class="fa fa-search"></i></span>
                                    <input type="search" class="form-control form-control-lg " placeholder="Cari Aset">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group-lg mb-3">
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>All</option>
                                    <option value="1">Barang</option>
                                    <option value="2">Ruang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <a href="#" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#modal-xl">
                                <i class="fas fa-shopping-bag"></i>
                                {{-- <span id="jumlah-keranjang" class="badge badge-warning navbar-badge">0</span> --}}
                                <span id="jumlah-keranjang" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
                                    0
                                </span>
                            </a>

                        </div>
                    </div>
                    @if(session('errors'))
                    <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
                        @foreach ($errors->all() as $error)
                        {{ $error }}<br />
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <!-- Small boxes (Stat box) -->
                    <div class="row mt-4">
                        @foreach ($asets as $aset)
                        <div class="col-lg-3 col-6 p-3">
                            <!-- small box -->
                            <div class="small-box bg-white rounded shadow p-3">
                                <p>{{ $aset->nama_aset }}</p>
                                <div class=" text-center">
                                    <img src="{{ asset($aset->image) }}" alt="Aset Icon" class="img-fluid mx-auto d-block mb-3" style="width: 100%; height: 200px; object-fit: cover;">
                                    <div class="d-flex justify-content-between mt-2">
                                        <div>
                                            <h4 id="stok-{{$aset->id}}">Stok: {{ $aset->jumlah }}</h4>
                                        </div>
                                        <div>
                                            @if($aset->jumlah == 0)
                                            <p class="bg-danger px-2 rounded" id="aval-{{ $aset->id }}">Tidak Tersedia</p>
                                            @else
                                            <p class="bg-success px-2 rounded" id="aval-{{ $aset->id }}">Tersedia</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        @if ($aset->jumlah > 0)
                                        <button class="btn text-white btn-block border-0 tambahkan-ke-keranjang" id="button-tambah-{{ $aset->id }}" data-product-id="{{ $aset->id }}" data-product-name="{{ $aset->nama_aset }}" data-product-qty="1" data-product-stok="{{ $aset->jumlah }}">
                                            Tambahkan ke Keranjang
                                        </button>
                                        @else
                                        <button class="btn text-danger btn-block border-0 font-weight-bold">
                                            Barang Habis!
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- Modal -->
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content text-light" style="background-color: #9D2A17;">
                    <div class="modal-header">
                        <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container bg-white rounded mt-5 p-3">
                            <div class="text-center p-3 rounded" style="background-color: #ffbaba;">
                                <h4 class="font-weight-bold" style="color: #9D2A17;">Silakan isi formulir di bawah ini
                                    dengan lengkap
                                </h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-5 overflow-auto border" style="max-height: 800px;">
                                    <ul class="list-group cart-list">

                                        <!-- Tambahkan item keranjang sesuai kebutuhan -->
                                    </ul>
                                </div>
                                <div class="col-lg-7">
                                    <form id="transaksiForm" action="{{ route('store.transaksi') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" required>
                                            </div>
                                            <div class="col-6">
                                                <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                                                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali" required>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="tujuan_pinjam" class="form-label">Tujuan Pinjam</label>
                                            <textarea type="text" class="form-control" id="tujuan_pinjam" name="tujuan_pinjam" cols="30" rows="10" required></textarea>
                                        </div>
                                        <input type="hidden" id="keranjang-data" name="keranjang_data">
                                        <button type="submit" class="btn btn-primary btn-block border-0" style="background-color: #9D2A17;">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div> -->
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="https://adminlte.io">SIM Aset</a>.</strong>
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
    <!-- DataTables  & Plugins -->
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
    <script src="{{ asset('src/script/katalog/cart.js') }}"></script>
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