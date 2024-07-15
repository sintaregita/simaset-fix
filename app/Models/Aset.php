<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Aset extends Model
{
    protected $table = 'aset';
    public $timestamps = false;
    use HasFactory;
    public function kategori_aset()
    {
        return $this->belongsTo(Kategori_aset::class, 'kategori_id');
    }
    public function lokasi_aset()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }
}
