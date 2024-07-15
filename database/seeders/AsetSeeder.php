<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aset')->insert([
            [
                'kode_aset' => 'BR_01',
                'nama_aset' => 'Meja Staff',
                'image' => '/img/meja.png',
                'kondisi' => 'Baik',
                'jumlah' => 2,
                'lokasi_id' => 1,
                'kategori_id' => 1,
                'ketersedian'=> 'Tersedia',
            ]
        ]);
    }
}
