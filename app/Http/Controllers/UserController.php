<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Detail_Peminjaman;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Peminjaman_aset;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth'); // Middleware untuk memastikan pengguna terotentikasi

        // Menambahkan middleware kustom untuk memeriksa apakah pengguna adalah admin
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            // Memeriksa apakah pengguna ada dan bukan admin (is_admin === 0)
            if ($user && $user->is_admin === 1) {
                return redirect()->route('Admin')->with('error', 'Unauthorized Access');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $userId = Auth::id();
        $userName = Auth::user()->name;
        $jumlahAset = Aset::count();
        $detail_peminjaman = Detail_Peminjaman::whereHas('peminjaman_aset', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->get();
        $allPeminjaman = Detail_Peminjaman::whereHas('peminjaman_aset', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->count();
        $peminjamanSetuju = Detail_Peminjaman::whereHas('peminjaman_aset', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->whereNot('status', 'V')->whereNot('status', 'T')->count();
        $peminjamanTolak = Detail_Peminjaman::whereHas('peminjaman_aset', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->where('status', 'T')->count();
        return view('User.Index', compact('jumlahAset', 'detail_peminjaman','userName','allPeminjaman', 'peminjamanSetuju', 'peminjamanTolak'));
    }

    public function katalog()
    {
        $asets = Aset::all();
        return view('User.katalog', compact('asets'));
    }
    public function storeTransaksi(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'date' => 'Isi :attribute dengan tanggal',
            'after_or_equal' => 'Isi :attribute dengan tanggal setelah tanggal pinjam'
        ];
        $validator = Validator::make($request->all(), [
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date', 'after_or_equal:tanggal_pinjam'],
            'tujuan_pinjam' => ['required', 'string', 'min:3'],
            'keranjang_data' => ['required', 'string', 'max:255'],
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Generate kode transaksi secara otomatis
        $kode_transaksi = 'A' . Str::upper(Str::random(6)); // Misalnya kode transaksi berformat 'A' diikuti dengan 6 karakter acak
        $user = Auth::user();

        // Buat entitas Peminjaman_aset dengan menggunakan kode transaksi yang dihasilkan
        $transaksi = Peminjaman_aset::create([
            'kode_transaksi' => $kode_transaksi,
            'tanggal_pinjam' => $request->input('tanggal_pinjam'),
            'tanggal_kembali' => $request->input('tanggal_kembali'),
            'tujuan_pinjam' => $request->input('tujuan_pinjam'),

            'id_user' => $user->id
        ]);

        // Check apakah entitas berhasil dibuat
        if ($transaksi) {
            // Ambil data keranjang
            $keranjangData = json_decode($request->input('keranjang_data'), true);
            // Simpan setiap item di keranjang ke database
            foreach ($keranjangData as $item) {
                Detail_Peminjaman::create([
                    'id_peminjaman' => $transaksi->id,
                    'id_aset' => $item['id'],
                    'jumlah' => $item['qty'],
                    'status' => 'V'
                ]);
            }

            Alert::success('Permintaan Transaksi sudah dikirim!', 'Transaksi dikirim.');
            // Redirect jika berhasil
            return redirect()->route('Katalog')->with('success', 'Aset berhasil diperbarui.');
        } else {
            // Redirect dengan pesan error jika gagal
            return redirect()->back()->withErrors(['Failed to create transaction.'])->withInput();
        }
    }

    public function logoutuser(Request $request)
    {
        Auth::logout(); // Lakukan proses logout
        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}
