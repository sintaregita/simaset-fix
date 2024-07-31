@extends('Admin.Layouts.app')
@section('content')
<!-- Navbar -->
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
                        <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
                        <li class="breadcrumb-item active">Kelola Peminjaman</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <!-- ./col -->
                <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
                    <!-- /.row -->
                    <div class="container-fluid mb-3 bg-white p-3 shadow rounded" style="overflow:scroll">
                        <h4 class="font-weight-bold">Riwayat Peminjaman</h4>
                        @if(session('success'))
                        <div class="alert alert-info alert-dismissible fade show my-4" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Kode Peminjaman</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Aset</th>
                                    <th>Jumlah</th>
                                    <th>Kategori Aset</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($histories as $history)
                                <tr>
                                    <td>{{$history->peminjaman_aset->kode_transaksi}}</td>
                                    <td>{{$history->peminjaman_aset->user->name}}</td>
                                    <td>{{$history->aset->nama_aset}}</td>
                                    <td>{{$history->jumlah}}</td>
                                    <td>{{$history->aset->kategori_aset->nama_kategori}}</td>
                                    <td>{{tglIndo( $history->peminjaman_aset->tanggal_pinjam )}}</td>
                                    <td>{{tglIndo( $history->peminjaman_aset->tanggal_kembali )}}</td>
                                    <td>{!!printStatus($history->status)!!}</td>
                                    <td>
                                        <div class="row" style="gap:5px">
                                            @if ($history->status == 'V')
                                            <a type="button" class="btn btn-xs btn-success" href="/Admin/SetujuiPeminjaman/{{$history->id}}">
                                                <i class="fas fa-thumbs-up"></i>
                                            </a>
                                            <a type="button" class="btn btn-xs btn-danger" href="/Admin/TolakPeminjaman/{{$history->id}}">
                                                <i class="fas fa-thumbs-down"></i>
                                            </a>
                                            @elseif($history->status == 'S')
                                            <a type="button" class="btn btn-xs btn-primary" href="/Admin/AmbilPeminjaman/{{$history->id}}">
                                                <i class="fas fa-archive"></i>
                                            </a>
                                            <a type="button" class="btn btn-xs btn-info" href="/Admin/RollbackPeminjaman/{{$history->id}}">
                                                <i class="fas fa-undo"></i>
                                            </a>
                                            @elseif($history->status == 'T')
                                            <a type="button" class="btn btn-xs btn-info" href="/Admin/RollbackPeminjaman/{{$history->id}}">
                                                <i class="fas fa-undo"></i>
                                            </a>
                                            @elseif($history->status == 'P')
                                            <a type="button" class="btn btn-xs btn-info" href="/Admin/SelesaikanPeminjaman/{{$history->id}}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                {{-- <tr>
                                            <td>USR-01</td>
                                            <td>BR-101612024</td>
                                            <td>Sinta Regita Putri</td>
                                            <td>Handly Talkie</td>
                                            <td>4</td>
                                            <td>Barang</td>
                                            <td>15/01/24</td>
                                            <td>16/01/24</td>
                                            <td>Disetujui</td>
                                            <td>
                                                <a type="button" class="btn btn-sm btn-primary" href=""><i
                                                        class="fas fa-edit"></i>

                                            </td>
                                        </tr> --}}
                            </tbody>
                        </table>
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
            "aaSorting": [],
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print", "colvis"]
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
@endsection