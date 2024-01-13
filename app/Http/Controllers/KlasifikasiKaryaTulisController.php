<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiKaryaTulis;
use Illuminate\Http\Request;

class KlasifikasiKaryaTulisController extends Controller
{
    public function klasifikasi_karya_tulis(){
        $data = KlasifikasiKaryaTulis::all();

        // dd($data);
    
        return view('content.kriteria.klasifikasi_karya_tulis', compact('data'));
    }
}
