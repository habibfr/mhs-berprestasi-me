<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiKaryaTulis extends Model
{
    use HasFactory;


    protected $guarder = ['id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }
    public function karya_tulis()
    {
        return $this->hasMany(KaryaTulis::class, 'klasifikasi_karya_tulis', 'id');
    }
}
