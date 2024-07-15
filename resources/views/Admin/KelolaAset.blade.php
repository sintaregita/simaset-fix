@extends('Admin.Layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Aset</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item active">Kelola Aset</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- /.row -->
        <div class="container-fluid mb-3 bg-white p-3 shadow rounded">
            <div class="row my-2">
                <div class="col-10">
                    <h4 class="font-weight-bold mb-3">Daftar Aset</h4>
                    </div>
                    <div class="col-2">
                    <button type="button" data-toggle="modal" data-target="#modal-lg" class="btn btn-danger btn-block">+ Tambah</button>
                    </div>
                </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Kode Aset</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Lokasi</th>
                        <th>Kondisi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Asets as $aset)
                    <tr>
                        <td>{{ $aset->kode_aset }} </td>
                        <td>{{ $aset->nama_aset }} </td>
                        <td>{{ $aset->kategori_aset->nama_kategori }} </td>
                        <td>{{ $aset->jumlah }} </td>
                        <td>{{ $aset->lokasi_aset->name }} </td>
                        <td>{{ $aset->kondisi }} </td>
                        <td>{{ $aset->ketersedian }} </td>
                        <td class="d-flex">
                            <button class="btn btn-sm btn-primary me-5" data-toggle="modal" data-target="#edit-modal-{{ $aset->id }}"><i class="fas fa-edit"></i>
                            </button>
                            {{-- MODAL EDIT --}}
                            <div class="modal fade" id="edit-modal-{{ $aset->id }}">
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
                                                        Edit Aset
                                                    </h4>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <form method="POST" action="{{ route('Admin.updateAset', ['id' => $aset->id]) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row mb-3">
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kode_aset" class="form-label">Kode
                                                                        Aset</label>
                                                                    <input type="text" class="form-control" value="{{ $aset->kode_aset }}" id="kode_aset" name="kode_aset">
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="nama_barang" class="form-label">Nama
                                                                        Barang</label>
                                                                    <input type="text" value="{{ $aset->nama_aset }}" class="form-control" id="nama_barang" name="nama_barang">
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kategori" class="form-label">Kategori</label>
                                                                    <select class="form-control" id="kategori" name="kategori">
                                                                        @foreach ($Kategoris as $kategori)
                                                                        <option value="{{ $kategori->id }}">
                                                                            {{ $kategori->nama_kategori }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                                    <input type="number" value="{{ $aset->jumlah }}" class="form-control" id="jumlah" name="jumlah">
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="lokasi" class="form-label">Lokasi</label>
                                                                    <select class="form-control" id="lokasi" name="lokasi">
                                                                        @foreach ($Lokasis as $lokasi)
                                                                        <option value="{{ $lokasi->id }}">
                                                                            {{ $lokasi->name }}
                                                                        </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kondisi" class="form-label">Kondisi</label>
                                                                    <input type="text" value="{{ $aset->kondisi }}" class="form-control" id="kondisi" name="kondisi">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row mt-2"></div>
                                                                <label for="gambar_ruangan" class="form-label">Gambar
                                                                    Barang</label>
                                                                <input type="file" class="form-control" id="gambar_ruangan" name="gambar_ruangan">
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
                            {{-- MODAL VIEW --}}
                            <button type="submit" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#view-modal-{{ $aset->id }}">
                                <i class="fas fa-eye"></i>
                            </button>
                            <div class="modal fade" id="view-modal-{{ $aset->id }}">
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
                                                        {{ $aset->nama_aset }} - Aset
                                                    </h4>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-lg-12">
                                                        <form method="POST" action="{{ route('Admin.storeAset') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row mb-3">
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kode_aset" class="form-label">Kode
                                                                        Aset</label>
                                                                    <p>{{ $aset->kode_aset }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="nama_barang" class="form-label">Nama
                                                                        Barang</label>
                                                                    <p>{{ $aset->nama_aset }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kategori" class="form-label">Kategori</label>
                                                                    <p>{{ $aset->kategori_aset->nama_kategori }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="jumlah" class="form-label">Jumlah</label>
                                                                    <p>{{ $aset->jumlah }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="lokasi" class="form-label">Lokasi</label>
                                                                    <p>
                                                                        {{ $aset->lokasi_aset->name }}
                                                                    </p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="row mt-2"></div>
                                                                    <label for="kondisi" class="form-label">Kondisi</label>
                                                                    <p>{{ $aset->kondisi }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <div class="row mt-2"></div>
                                                                <label for="gambar_ruangan" class="form-label">Gambar
                                                                    Barang</label> <br>
                                                                <img src="{{ asset($aset->image) }}" width="200" alt="{{ $aset->image }}">

                                                                <p>{{ $aset->image }}

                                                                </p>
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

                            <form action="{{ route('Admin.deleteAset', ['id' => $aset->id]) }}" id="deleteForm-{{$aset->id}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{$aset->id}}" onclick="hapusThis(this)"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
</div>
</div>
</div><!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="modal-lg">
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
                        <h4 class="font-weight-bold" style="color: #FFFFFF;"> Tambah Aset
                        </h4>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('Admin.storeAset') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12">
                                        <div class="row mt-2"></div>
                                        <label for="kode_aset" class="form-label">Jenis Aset</label>
                                        <select class="form-control" id="jenis_aset" name="jenis_aset">
                                            <option value="-">Pilih Aset</option>
                                            <option value="BR">Barang</option>
                                            <option value="RG">Ruangan</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kode_aset" class="form-label">Kode Aset</label>
                                        <input type="text" class="form-control" id="kode_aset_tambah" name="kode_aset" readonly>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="nama_barang" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori" style="pointer-events: none;">
                                            <option value="-">--pilih kategori--</option>
                                            @foreach ($Kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">
                                                {{ $kategori->nama_kategori }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="jumlah" class="form-label">Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <select class="form-control" id="lokasi" name="lokasi">
                                            @foreach ($Lokasis as $lokasi)
                                            <option value="{{ $lokasi->id }}">
                                                {{ $lokasi->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <div class="row mt-2"></div>
                                        <label for="kondisi" class="form-label">Kondisi</label>
                                        <input type="text" class="form-control" id="kondisi" name="kondisi">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row mt-2"></div>
                                    <label for="gambar_ruangan" class="form-label">Gambar Barang</label>
                                    <input type="file" class="form-control" id="gambar_ruangan" name="gambar_ruangan">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
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
    $(document).on('change', '#jenis_aset', function() {
        var jenis = $('#jenis_aset').val();
        var text = $('#jenis_aset option:selected').text();

        $("#kategori option").filter(function() {
            //may want to use $.trim in here
            return $.trim($(this).text()) == text;
        }).prop('selected', true);
        axios.post("/get-code-asset", {
                jenis_aset: jenis
            }, {
                headers: {
                    'Content-Type': 'application/json',
                }
                // other configuration there
            })
            .then(function(response) {
                console.log(response.data)
                var ka = response.data.kode_aset;
                $('#kode_aset_tambah').val(ka);
            })
            .catch(function(error) {
                alert('oops');
                console.log(error);
            });
    })
</script>
@endsection