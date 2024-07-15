<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'nim_nip' => 12345678,
            'no_telp' => '0855555555',
            'status' => 'Dosen/Staff',
            'prodi' => 'Sistem Informasi',
            'fakultas' => 'FRI',
            'is_admin' => true, // Set sebagai admin (boolean true)
        ]);

        // Insert regular user
        DB::table('users')->insert([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('user'),
            'nim_nip' => 1234567890,
            'no_telp' => '08955485421',
            'status' => 'Mahasiswa',
            'prodi' => 'Sistem Informasi',
            'fakultas' => 'FRI',
            'is_admin' => false, // Tidak admin (boolean false)
        ]);
    }
}
