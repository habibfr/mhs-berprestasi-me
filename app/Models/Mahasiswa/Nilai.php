<?php

namespace App\Models\Mahasiswa;

use App\Models\Mahasisawa\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;


    protected $guarded = ['id'];
    // protected $fillable = [
    //     'nim',
    //     'IPK',
    //     'SSKM',
    //     'TOEFL',
    // ];


    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
}
