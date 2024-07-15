@extends('Admin.Layouts.app')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active">Kelola User</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Small boxes (Stat box) -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">
                                {{$totalUser}}
                            </span>
                            <span class="info-box-text">Total Pengguna</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-number">
                                {{$totalMahasiswa}}
                            </span>
                            <span class="info-box-text">Mahasiswa</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-number">
                                {{$totalLain}}
                            </span>
                            <span class="info-box-text">Lainnya</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
                <div class="row my-2">
                    <div class="col-10">
                        <h4 class="font-weight-bold">Daftar User</h4>
                    </div>
                    <div class="col-2">
                        <button type="button" data-toggle="modal" data-target="#modal-create" class="btn btn-danger btn-block">+ User</button>
                    </div>
                </div>
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>NIM/NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Prodi</th>
                            <th>Fakultas</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->nim_nip}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->no_telp}}</td>
                            <td>{{$user->prodi}}</td>
                            <td>{{$user->fakultas}}</td>
                            <td>{{$user->status}}</td>
                            <td>
                                <button class="btn btn-sm btn-primary me-5" data-toggle="modal" data-target="#edit-modal-{{ $user->id }}"><i class="fas fa-edit"></i>
                                </button>
                                {{-- MODAL EDIT --}}
                                <div class="modal fade" id="edit-modal-{{ $user->id }}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content text-light" style="background-color: #9D2A17;">
                                            <div class="modal-header">
                                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container bg-white rounded mt-5 p-3">
                                                    <div class="text-center p-1 rounded" style="background-color: #9D2A17;border-radius: 90px;">
                                                        <h4 class="font-weight-bold" style="color: #FFFFFF;">
                                                            Edit User
                                                        </h4>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-lg-12">
                                                            <form method="POST" action="{{ route('Admin.updateUser', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="kode_user" class="form-label">Nama User</label>
                                                                        <input type="text" class="form-control" value="{{ $user->name }}" id="name" name="name">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="kode_user" class="form-label">NIP/NIM User</label>
                                                                        <input type="text" class="form-control" value="{{ $user->nim_nip }}" id="nim_nip" name="nim_nip">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="nama_barang" class="form-label">Email User</label>
                                                                        <input type="email" value="{{ $user->email }}" class="form-control" id="email" name="email">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="kode_user" class="form-label">Telfon User</label>
                                                                        <input type="text" class="form-control" value="{{ $user->no_telp }}" id="no_telp" name="no_telp">
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="kode_user" class="form-label">Jabatan User</label>
                                                                        <select class="custom-select" id="status" name="status" autofocus>
                                                                            <option value="">Pilih Jabatan</option>
                                                                            @foreach ( arrJabatan() as $i=>$value)
                                                                            <option value="{{$value}}" {{ ( strtolower($user->status) === strtolower($value) ) ? "selected":"" }}>{{$value}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="prodi" class="col-form-label">Unit</label>
                                                                        <select class="custom-select" id="prodi" name="prodi" autofocus>
                                                                            <option value="">Pilih Unit</option>
                                                                            @foreach ( arrFakultas() as $i=>$value)
                                                                            <optgroup label="{{$value['FAKULTAS']}}">
                                                                                @foreach ( $value['PRODI'] as $val )
                                                                                <option value="{{$val}}" {{(strtolower($user->prodi) == strtolower($val))? "selected":""}}>{{$val}}</option>
                                                                                @endforeach
                                                                            </optgroup>
                                                                            @endforeach
                                                                            <optgroup label="Lainnya">
                                                                                <option value="Unit" {{(strtolower($user->prodi) == 'unit')? "selected":""}}>Unit</option>
                                                                            </optgroup>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label for="" class="col-form-label">Hak akses </label>
                                                                        <select class="custom-select" name="is_admin" id="is_admin">
                                                                            <option>Pilih Hak akses</option>
                                                                            <option value="1" {{$user->is_admin === 1 ? "selected":''}}>Admin</option>
                                                                            <option value="0" {{$user->is_admin === 0 ? "selected":''}}>Pengguna</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="row mt-2"></div>
                                                                        <label for="kode_user" class="form-label">Password <small>kosongi jika tidak ingin mengubah</small></label>
                                                                        <input type="password" class="form-control" id="password" name="password">
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary btn-block border-0" style="background-color: #9D2A17;">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('Admin.deleteUser', ['id' => $user->id]) }}" id="deleteForm-{{$user->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{$user->id}}" onclick="hapusThis(this)"><i class="fas fa-user-times"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>

                </table>

                </table>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-light" style="background-color: #9D2A17;">
            <div class="modal-header">
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container bg-white rounded mt-5 p-3">
                    <div class="text-center p-1 rounded" style="background-color: #9D2A17;border-radius: 90px;">
                        <h4 class="font-weight-bold" style="color: #FFFFFF;"> Tambah User
                        </h4>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('Admin.storeUser') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kode_user" class="form-label">Nama User</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kode_user" class="form-label">NIP/NIM User</label>
                                        <input type="text" class="form-control" id="nim_nip" name="nim_nip">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="nama_barang" class="form-label">Email User</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kode_user" class="form-label">Telfon User</label>
                                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kode_user" class="form-label">Jabatan User</label>
                                        <select class="custom-select" id="status" name="status" autofocus>
                                            <option value="" selected>Pilih Jabatan</option>
                                            @foreach ( arrJabatan() as $i=>$value)
                                            <option value="{{$value}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="prodi" class="col-form-label">Unit</label>
                                        <select class="custom-select" id="prodi" name="prodi" autofocus>
                                            <option value="" selected>Pilih Unit</option>
                                            @foreach ( arrFakultas() as $i=>$value)
                                            <optgroup label="{{$value['FAKULTAS']}}">
                                                @foreach ( $value['PRODI'] as $val )
                                                <option value="{{$val}}">{{$val}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endforeach
                                            <optgroup label="Lainnya">
                                                <option value="Unit">Unit</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="col-form-label">Hak akses</label>
                                        <select class="custom-select" name="is_admin" id="is_admin">
                                            <option>Pilih Hak akses</option>
                                            <option value="1">Admin</option>
                                            <option value="0">Pengguna</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block border-0" style="background-color: #9D2A17;">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal  -->
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
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('dist/js/demo.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function hapusThis(param) {
        Swal.fire({
            title: "Apakah anda yakin menghapus item ini?",
            text: "Aset ini akan terhapus selamanya!",
            icon: "error",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form using AJAX when confirmed
                var id = $(param).attr("data-id");
                const deleteForm = document.getElementById('deleteForm-' + id);
                deleteForm.submit(); // Submit the form
            }
        });
    }
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
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@endsection