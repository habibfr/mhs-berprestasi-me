<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\Mahasisawa\Mahasiswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KaryaTulis extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id', 'id');
    }

    public function klasifikasi_karya_tulis()
    {
        return $this->belongsTo(KlasifikasiKaryaTulis::class, 'klasifikasi_karya_tulis_id', 'id');
    }


}
