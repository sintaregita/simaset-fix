<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi_aset';
    use HasFactory;
    public function aset()
    {
        return $this->hasMany(Aset::class, 'lokasi_id');
    }

}
