<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'detail_peminjaman';
    public $timestamps = false;
    protected $fillable = [
        'id_peminjaman', // Tambahkan ini
        'id_aset',
        'jumlah',
        'status'
    ];
    public function peminjaman_aset()
    {
        return $this->belongsTo(Peminjaman_aset::class, 'id_peminjaman');
    }
    public function aset()
    {
        return $this->belongsTo(aset::class, 'id_aset');
    }

}
