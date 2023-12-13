<?php

namespace App\Models\Mahasisawa;

use App\Models\Mahasiswa\Nilai;
use App\Models\Ranking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'mahasiswa_id', 'id');
    }
    public function ranking()
    {
        return $this->hasOne(Ranking::class, 'mahasiswa_id', 'id');
    }



}
