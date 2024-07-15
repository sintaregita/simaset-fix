<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_Peminjaman;
use App\Models\Peminjaman_aset;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    public function cetakInvoice($id){
        $pageTitle = 'Cetak Invoice';

        $detail_peminjaman = Detail_Peminjaman::whereHas('peminjaman_aset', function ($query) use ($id) {
            $query->where('kode_transaksi', $id);
        })->where('status', '!=', 'T')->where('status', '!=', 'V')->get();
        $peminjaman_aset = Peminjaman_aset::whereHas('user', function ($query) use ($id) {
            $query->where('kode_transaksi', $id);
        })->get();

        $detail = $detail_peminjaman ?? null;
        $peminjaman = $peminjaman_aset ?? null;
        
        return view('Invoice.invoice', compact('peminjaman','detail'));
    }
}