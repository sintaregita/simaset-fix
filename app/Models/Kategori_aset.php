<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_aset extends Model
{
    protected $table = 'kategori_aset';
    use HasFactory;
    public function aset()
    {
        return $this->hasMany(Aset::class, 'kategori_id');
    }
}
