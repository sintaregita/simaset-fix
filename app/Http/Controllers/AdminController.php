<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Models\Kategori_aset;
use App\Models\Peminjaman_aset;
use App\Models\Detail_Peminjaman;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); // Middleware untuk memastikan pengguna terotentikasi

        // Menambahkan middleware kustom untuk memeriksa apakah pengguna adalah admin
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            // Memeriksa apakah pengguna ada dan bukan admin (is_admin === 0)
            if ($user && $user->is_admin === 0) {
                return redirect()->route('User')->with('error', 'Unauthorized Access');
            }

            return $next($request);
        });
    }
    // VIEW
    public function Index()
    {
        $pageTitle = 'Admin';
        $jumlahAset = Aset::count();
        $jumlahPinjamBarang = Detail_Peminjaman::whereHas('aset', function ($query) {
            $query->where('kode_aset', 'like', 'BR%');
        })->count();
        $jumlahPinjamRuang = Detail_Peminjaman::whereHas('aset', function ($query) {
            $query->where('kode_aset', 'like', 'RG%');
        })->count();
        $jumlahPersetujuan = Detail_Peminjaman::count();
        return view('Admin.index', compact('pageTitle', 'jumlahAset', 'jumlahPinjamBarang', 'jumlahPinjamRuang', 'jumlahPersetujuan'));
    }
    public function Kelola_user()
    {
        $pageTitle = 'Admin - Kelola User';
        $users = User::all();
        $totalUser = User::count();
        $totalMahasiswa = User::where('status', 'Mahasiswa')->count();
        $totalLain = User::where('status', 'not like', 'Mahasiswa')->count();
        return view('Admin.KelolaUser', compact('pageTitle', 'users', 'totalUser', 'totalMahasiswa', 'totalLain'));
    }
    public function Kelola_aset()
    {
        $pageTitle = 'Admin - Kelola Aset';
        $Kategoris = Kategori_aset::all();
        $Asets = Aset::all();

        $Lokasis = Lokasi::all();
        return view('Admin.KelolaAset', compact('Kategoris', 'Lokasis', 'Asets'));
    }

    public function Kelola_Peminjaman()
    {
        $pageTitle = 'Admin - Kelola Peminjaman';
        $histories = Detail_Peminjaman::all();
        return view('Admin.KelolaPeminjaman', compact('histories'));
    }
    public function storeUser(Request $request)
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
            'no_telp' => ['required', 'string'],
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
            case 'Unit':
                $fakultas = 'Unit';
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
        $user->no_telp = $request->input('no_telp');
        $user->status = $status;
        $user->fakultas = $fakultas;
        $user->is_admin = $request->input('is_admin');
        $user->password = Hash::make($nim_nip);
        Alert::success('Berhasil buat akun', 'Silahkan login!');
        // Check if user creation is successful
        $user->save();
        // Redirect ke halaman home
        return redirect()->route('Admin.KelolaUser')->with('success', 'User berhasil disimpan.');
    }
    public function storeAset(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_aset' => 'required|string',
            'nama_barang' => 'required|string',
            'kategori' => 'required',
            'jumlah' => 'required|integer',
            'lokasi' => 'required',
            'kondisi' => 'required|string',
            'gambar_ruangan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => ':Attribute harus diisi.',
            'image' => 'File harus berupa gambar dengan format jpeg, png, jpg, atau gif.',
            'mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'max' => 'Ukuran file gambar tidak boleh lebih dari :max kilobita.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Upload gambar
        if ($request->hasFile('gambar_ruangan')) {
            $image = $request->file('gambar_ruangan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/images'), $imageName);

            // Simpan data aset ke database
            $asset = new Aset();
            $asset->kode_aset = $request->kode_aset;
            $asset->nama_aset = $request->nama_barang;
            $asset->kategori_id = $request->kategori;
            $asset->jumlah = $request->jumlah;
            $asset->lokasi_id = $request->lokasi;
            $asset->kondisi = $request->kondisi;
            $asset->image = 'upload/images/' . $imageName; // Simpan path relatif ke gambar
            $asset->ketersedian = 'Tersedia';
            $asset->save();
            Alert::success('Data Berhasil Ditambahkan!', 'Data ditambahkan.');
            // Redirect ke halaman home
            return redirect()->route('Admin.KelolaAset')->with('success', 'Aset berhasil disimpan.');
        }

        // Penanganan jika tidak ada file gambar yang dikirim
        return redirect()->back()->withErrors(['gambar_ruangan' => 'File gambar harus diunggah'])->withInput();
    }

    public function updateUser(Request $request, $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];
        // Validate incoming registration request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'prodi' => ['required', 'string'],
            'nim_nip' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'string'],
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
            case 'Unit':
                $fakultas = 'Unit';
                break;

            default:
                throw new \Exception('Program Studi tidak valid');
        }

        $user = User::find($id);
        $pass = $request->input('password');

        if (!$user) {
            return redirect()->back()->withErrors(['message' => 'Aset tidak ditemukan'])->withInput();
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->prodi = $prodi;
        $user->nim_nip = $nim_nip;
        $user->no_telp = $request->input('no_telp');
        $user->status = $request->input('status');
        $user->fakultas = $fakultas;
        $user->is_admin = $request->input('is_admin');
        if ($pass === null) {
            $user->password = Hash::make($pass);
        }
        // Check if user creation is successful
        $user->save();
        Alert::success('Update Berhasil Ditambahkan!', 'Data diupdate.');
        // Redirect ke halaman kelola aset dengan pesan sukses
        return redirect()->route('Admin.KelolaUser')->with('success', 'User berhasil diperbarui.');
    }
    public function updateAset(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode_aset' => 'required|string',
            'nama_barang' => 'required|string',
            'kategori' => 'required',
            'jumlah' => 'required|integer',
            'lokasi' => 'required',
            'kondisi' => 'required|string',
            'gambar_ruangan' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'required' => ':Attribute harus diisi.',
            'image' => 'File harus berupa gambar dengan format jpeg, png, jpg, atau gif.',
            'mimes' => 'Format file harus jpeg, png, jpg, atau gif.',
            'max' => 'Ukuran file gambar tidak boleh lebih dari :max kilobita.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $asset = Aset::find($id);

        if (!$asset) {
            return redirect()->back()->withErrors(['message' => 'Aset tidak ditemukan'])->withInput();
        }

        $asset->kode_aset = $request->kode_aset;
        $asset->nama_aset = $request->nama_barang;
        $asset->kategori_id = $request->kategori;
        $asset->jumlah = $request->jumlah;
        $asset->lokasi_id = $request->lokasi;
        $asset->kondisi = $request->kondisi;

        if ($request->hasFile('gambar_ruangan')) {
            // Jika ada gambar baru diunggah, hapus gambar lama (opsional)
            // unlink(public_path($asset->image));

            // Upload gambar baru
            $image = $request->file('gambar_ruangan');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('upload/images'), $imageName);
            $asset->image = 'upload/images/' . $imageName;
        }

        $asset->save();
        Alert::success('Update Berhasil Ditambahkan!', 'Data diupdate.');
        // Redirect ke halaman kelola aset dengan pesan sukses
        return redirect()->route('Admin.KelolaAset')->with('success', 'Aset berhasil diperbarui.');
    }

    function Setujui_Peminjaman($id)
    {
        $approved = Detail_Peminjaman::find($id);
        $approved->status = 'S';

        $stokminus = Aset::find($approved->id_aset);
        $stokminus->jumlah = $stokminus->jumlah - $approved->jumlah;
        $stokminus->save();
        $approved->save();
        if (!$approved) {
            return redirect()->to('/Admin/KelolaPeminjaman')->withErrors(['message' => 'Peminjaman tidak ditemukan']);
        }
        return redirect()->to('/Admin/KelolaPeminjaman')->with('success', 'Peminjaman telah disetujui');
    }

    function Tolak_Peminjaman($id)
    {
        $approved = Detail_Peminjaman::find($id);
        $approved->status = 'T';
        $approved->save();

        if (!$approved) {
            return redirect()->to('/Admin/KelolaPeminjaman')->withErrors(['message' => 'Peminjaman tidak ditemukan']);
        }
        return redirect()->to('/Admin/KelolaPeminjaman')->with('success', 'Peminjaman telah ditolak');
    }

    function Ambil_Peminjaman($id)
    {
        $approved = Detail_Peminjaman::find($id);
        $approved->status = 'P';
        $approved->save();

        if (!$approved) {
            return redirect()->to('/Admin/KelolaPeminjaman')->withErrors(['message' => 'Peminjaman tidak ditemukan']);
        }
        return redirect()->to('/Admin/KelolaPeminjaman')->with('success', 'Peminjaman telah diambil');
    }

    function Selesaikan_Peminjaman($id)
    {
        $approved = Detail_Peminjaman::find($id);
        $approved->status = 'K';

        $stokminus = Aset::find($approved->id_aset);
        $stokminus->jumlah = $stokminus->jumlah + $approved->jumlah;
        $stokminus->save();
        $approved->save();

        if (!$approved) {
            return redirect()->to('/Admin/KelolaPeminjaman')->withErrors(['message' => 'Peminjaman tidak ditemukan']);
        }
        return redirect()->to('/Admin/KelolaPeminjaman')->with('success', 'Peminjaman telah selesai');
    }

    function Rollback_Peminjaman($id)
    {
        $approved = Detail_Peminjaman::find($id);
        $approved->status = 'V';

        $stokminus = Aset::find($approved->id_aset);
        $stokminus->jumlah = $stokminus->jumlah + $approved->jumlah;
        $stokminus->save();
        $approved->save();
        if (!$approved) {
            return redirect()->to('/Admin/KelolaPeminjaman')->withErrors(['message' => 'Peminjaman tidak ditemukan']);
        }
        return redirect()->to('/Admin/KelolaPeminjaman')->with('success', 'Peminjaman telah disetujui');
    }

    public function destroyUser($id)
    {
        // Find the asset by ID
        $user = User::find($id);
        confirmDelete('Apakah anda menghapus data ini?');
        $user->delete();

        return redirect()->route('Admin.KelolaUser');
    }
    public function destroyAset($id)
    {
        // Find the asset by ID
        $aset = Aset::find($id);
        confirmDelete('Apakah anda ingin aset ini?');
        $aset->delete();

        return redirect()->route('Admin.KelolaAset');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Lakukan proses logout
        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
    public function get_code_asset(Request $request)
    {
        $jenis = $request->jenis_aset;
        if ($jenis == "BR") {
            $code = Aset::where("kode_aset", "like", "%$jenis%")->latest('id')->first();
            if (!$code) {
                $kode = 'BR001';
            }
        }
        if ($jenis == "RG") {
            $code = Aset::where("kode_aset", "like", "%$jenis%")->latest('id')->first();
            if (!$code) {
                $kode = 'RG001';
            }
        }
        if (!isset($code)) {
            switch ($jenis) {
                case 'BR':
                    $kode = "BR001";
                    break;

                case 'RG':
                    $kode = "RG001";
                    break;

                default:
                    return response()->json(['error' => 'kode tidak ditemukan'], 500);
                    
            }
            return response()->json(['kode_aset' => $kode], 200);
        } else {

            $kode = $code->kode_aset; //BR002
            $kode = substr($kode, -3); //002
            $kode = intval($kode) + 1; //3
            $kode = $jenis . sprintf('%03d', $kode); //BR003
            return response()->json(['kode_aset' => $kode], 200);
        }
    }
}
