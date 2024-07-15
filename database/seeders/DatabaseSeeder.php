<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\KategoriSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            Lokasi::class,
            UserSeeder::class,
            PeminjamanSeeder::class,
            KategoriSeeder::class,
            AsetSeeder::class,
            Detail_PeminjamanSeeder::class,

        ]);
    }
}
