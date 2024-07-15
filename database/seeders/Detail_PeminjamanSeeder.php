<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Detail_PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_peminjaman')->insert([
            ['id_peminjaman' => 1, 'id_aset' => 1, 'jumlah' => 2, 'status' => 'Dipinjam'],
            ['id_peminjaman' => 1, 'id_aset' => 1, 'jumlah' => 3, 'status' => 'Dipinjam'],
        ]);
    }
}
