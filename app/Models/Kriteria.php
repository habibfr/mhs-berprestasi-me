<?php

namespace App\Models;

use App\Models\Mahasiswa\Nilai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'kriteria_id', 'id');
    }

    public function klasifikasi_karya_tulis()
    {
        return $this->hasMany(KlasifikasiKaryaTulis::class, 'klasifikasi_karya_tulis_id', 'id');
    }
}
