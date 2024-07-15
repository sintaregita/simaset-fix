<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <style>
            .watermark {
                position: fixed;
                top: 40%;
                left: 30%;
                opacity: 1;
                z-index: 99;
                color: white;
            }
            @media print{
                @page{
                    size: auto;
                    margin: 0mm;
                }
            }
        </style>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card rounded">
                        <div class="card-body p-0 rounded">
                            <div class="row ">
                                <div class="col-md-6">
                                    <img src="{{URL::asset('assets/Approved.png')}}" style="width: 200px;">
                                </div>

                                <div class="col-md-6 text-center">
                                    <p class="font-weight-bold mb-1 text-danger">Kode Peminjaman: {{$peminjaman[0]->kode_transaksi}}</p>
                                    <p class="text-muted">Due to: {{ tglIndo($peminjaman[0]->tanggal_kembali) }}</p>
                                </div>
                            </div>
                            <div class="watermark">
                                <img src="{{URL::asset('assets/watermark.png')}}" alt="">
                            </div>


                            <div class="row pb-5 p-5">
                                <div class="col-md-12">
                                    <h5 class="font-weight-bold text-center mb-5">Data Peminjam</h5>
                                    <p class="mb-3">Pengajuan peminjaman telah disetujui oleh admin logistik dan
                                        manajemen aset
                                        dengan rincian sebagai berikut:</p>
                                    <table>
                                        <tr>
                                            <td class="font-weight-bold pr-3">Nama </td>
                                            <td>: {{ makeCapital($peminjaman[0]->user->name) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold pr-3">NIM/NIP </td>
                                            <td>: {{ makeCapital($peminjaman[0]->user->nim_nip) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold pr-3">Prodi </td>
                                            <td>: {{ makeCapital($peminjaman[0]->user->prodi) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold pr-3">Fakultas </td>
                                            <td>: {{ makeCapital($peminjaman[0]->user->fakultas) }}</td>
                                        </tr>
                                    </table>
                                </div>


                                <div class="row w-100 mt-5">
                                    <div class="col-md-12">
                                        <table class="table" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th class="border-0 text-uppercase small font-weight-bold">No</th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Kategori
                                                    </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Tanggal
                                                        Pinjam
                                                    </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Tanggal
                                                        Kembali
                                                    </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Kode Aset
                                                    </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Nama</th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Jumlah
                                                    </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">Tujuan
                                                        Pinjam
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detail as $data)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $data->aset->kategori_aset->nama_kategori }}</td>
                                                    <td>{{ tglIndo($data->peminjaman_aset->tanggal_pinjam) }}</td>
                                                    <td>{{ tglIndo($data->peminjaman_aset->tanggal_kembali) }}</td>
                                                    <td>{{ $data->aset->kode_aset }}</td>
                                                    <td>{{ $data->aset->nama_aset }}</td>
                                                    <td>{{ $data->jumlah }} Buah</td>
                                                    <td>{{ makeCapital($peminjaman[0]->tujuan_pinjam) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<footer>
    <script>
        window.print();
    </script>
</footer>
</body>

</html>