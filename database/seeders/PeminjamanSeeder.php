<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman_aset')->insert([
            [
                'kode_transaksi' => 'TRS0002',
                'id_user' => 2,

                'tujuan_pinjam' => 'Sebagai pinjam',
                'tanggal_pinjam' => Carbon::now()->format('Y-m-d'),
                'tanggal_kembali' => Carbon::now()->addDays(5)->format('Y-m-d')
            ]
        ]);
    }
}
