<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman_aset extends Model
{
    protected $table = 'Peminjaman_aset';
    protected $fillable = [
        'kode_transaksi',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tujuan_pinjam',
        'status',
        'id_user'
    ];

    use HasFactory;
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function detailPeminjaman()
    {
        return $this->hasMany(Detail_Peminjaman::class, 'id_peminjaman');
    }
}
