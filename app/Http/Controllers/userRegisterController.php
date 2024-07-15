<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class userRegisterController extends Controller
{
    public function register(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        // Validate incoming registration request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'prodi' => ['required', 'string'],
            'nim_nip' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // Determine status (Dosen/Staff or Mahasiswa) based on nim_nip length
        $nim_nip = $request->input('nim_nip');
        if (strlen($nim_nip) === 8) {
            $status = 'Dosen/Staff';
        } else if (strlen($nim_nip) === 10) {
            $status = 'Mahasiswa';
        } else {
            // Handle invalid nim_nip length
            return redirect()->back()->withErrors(['NIM/NIP harus memiliki panjang 8 (untuk Dosen/Staff) atau 10 (untuk Mahasiswa).'])->withInput();
        }

        // Determine fakultas based on prodi
        $prodi = $request->input('prodi');
        $fakultas = '';

        switch ($prodi) {
            case 'Teknik Telekomunikasi':
            case 'Teknik Elektro':
            case 'Teknik Komputer':
                $fakultas = 'Fakultas Teknik Elektro';
                break;

            case 'Teknik Industri':
            case 'Sistem Informasi':
            case 'Teknik Logistik':
                $fakultas = 'Fakultas Rekayasa Industri';
                break;

            case 'Teknik Informatika':
            case 'Teknologi Informasi':
            case 'Sains Data':
            case 'Rekayasa Perangkat Lunak':
                $fakultas = 'Fakultas Informatika';
                break;

            case 'Bisnis Digital':
                $fakultas = 'Fakultas Ekonomi dan Bisnis';
                break;

            default:
                throw new \Exception('Program Studi tidak valid');
        }

        // Create new user after validation succeeds
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->prodi = $prodi;
        $user->nim_nip = $nim_nip;
        $user->no_telp = $request->input('telepon');
        $user->status = $status;
        $user->fakultas = $fakultas;
        $user->is_admin = 0;
        $user->password = Hash::make($request->input('password'));
        Alert::success('Berhasil buat akun', 'Silahkan login!');
        // Check if user creation is successful
        $user->save();

        return redirect()->route('Login')->with('success', 'Aset berhasil disimpan.');
    }
}
