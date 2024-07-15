<?php

function printStatus($char)
{
    switch ($char) {
        case 'V':
            $return = '<p class="text text-secondary">Proses Verifikasi</p>';
            break;
        case 'S':
            $return = '<p class="text text-success">Telah Disetujui</p>';
            break;
        case 'T':
            $return = '<p class="text text-danger">Ditolak</p>';
            break;
        case 'P':
            $return = '<p class="text text-info">Sedang Dipinjam</p>';
            break;
        case 'K':
            $return = '<p class="text text-primary">Telah Dikembalikan</p>';
            break;
        default:
            $return = '<p class="text text-warning"><i>Status salah</i></p>';
            break;
    }
    return $return;
}

function tglIndo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

function makeCapital($string)
{
    return ucwords(trans($string));
}

function arrFakultas()
{
    $arr =
        [
            [
                'FAKULTAS' => 'FAKULTAS TEKNIK ELEKTRO',
                'PRODI' =>
                [
                    'Teknik Telekomunikasi',
                    'Teknik Elektro',
                    'Teknik Komputer'
                ]
            ],
            [
                'FAKULTAS' => 'FAKULTAS TEKNIK ELEKTRO',
                'PRODI' =>
                [
                    'Teknik Industri',
                    'Sistem Informasi',
                    'Teknik Logistik'
                ]
            ],
            [
                'FAKULTAS' => 'FAKULTAS TEKNIK ELEKTRO',
                'PRODI' =>
                [
                    'Teknik Informatika',
                    'Teknologi Informasi',
                    'Sains Data',
                    'Rekayasa Perangkat Lunak',
                ]
            ],
            [
                'FAKULTAS' => 'FAKULTAS TEKNIK ELEKTRO',
                'PRODI' =>
                [
                    'Bisnis Digital',
                ]
            ]
        ];
    return $arr;
}
function arrJabatan()
{
    $arr =
        [
            'Mahasiswa',
            'Staff',
            'Dosen/Staff'
        ];
    return $arr;
}
