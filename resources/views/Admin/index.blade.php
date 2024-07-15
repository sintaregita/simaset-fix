@extends('Admin.Layouts.app')
@section('content')
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
                    <b>Selamat Datang, <span class="text-danger">{{Auth::user()->name}}</span>!</b>
                    <p>Kelola Aset dan Pengajuan Peminjaman dengan nyaman</p>
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white rounded shadow">
                            <div class="inner p-3 ">
                                <a type="button" class="btn btn-sm btn-light" href=""><i class="ion ion-ios-box"
                                        style="font-size: 50px; color:#9D2A17;"></i></a>
                                <div>
                                    <p>Ketersediaan Aset</p>
                                </div>
                                <div>
                                    <h3>{{ $jumlahAset }}</h3>
                                </div>
                                <div>
                                    <p>Total Ketersediaan Aset</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white rounded shadow">
                            <div class="inner p-3 ">
                                <a type="button" class="btn btn-sm btn-light" href=""><i
                                        class="ion ion-ios-calendar" style="font-size: 50px; color:#9D2A17;"></i></a>
                                <div>
                                    <p>Riwayat Peminjaman Barang</p>
                                </div>
                                <div>
                                    <h3>{{$jumlahPinjamBarang}}</h3>
                                </div>
                                <div>
                                    <p>Total Riwayat Pinjam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white rounded shadow">
                            <div class="inner p-3 ">
                                <a type="button" class="btn btn-sm btn-light" href=""><i
                                        class="ion ion-android-checkbox-outline"
                                        style="font-size: 50px; color:#9D2A17;"></i></a>
                                <div>
                                    <p>Riwayat Peminjaman Ruangan</p>
                                </div>
                                <div>
                                    <h3>{{$jumlahPinjamRuang}}</h3>
                                </div>
                                <div>
                                    <p>Total Riwayat Pinjam</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-white rounded shadow">
                            <div class="inner p-3 ">
                                <a type="button" class="btn btn-sm btn-light" href=""><i
                                        class="ion ion-android-cancel" style="font-size: 50px; color:#9D2A17;"></i></a>
                                <div>
                                    <p>Permintaan Persetujuan</p>
                                </div>
                                <div>
                                    <h3>{{$jumlahPersetujuan}}</h3>
                                </div>
                                <div>
                                    <p>Total Permintaan Persetujuan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
                    <h4 class="font-weight-bold">Statistik Peminjaman Aset</h4>
                    <div>
                        <canvas id="myChart" height="400"></canvas>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2024 <a href="https://adminlte.io">SIMASET</a>.</strong>
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

    <script>
        $(function() {
            // Get context with jQuery - using jQuery's .get() method.
            var ctx = $('#myChart').get(0).getContext('2d');

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                            label: 'Digital Goods',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [20, 30, 40, 50, 80]
                        },
                        {
                            label: 'Electronics',
                            backgroundColor: 'rgba(210, 214, 222, 1)',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            pointRadius: false,
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: [20, 30, 40, 50, 80]
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: false
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false,
                            }
                        }]
                    }
                }
            });
        });
    </script>
@endsection
