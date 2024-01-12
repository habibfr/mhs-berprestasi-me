<?php

namespace App\Http\Controllers;

use App\Models\KaryaTulis;
use Illuminate\Http\Request;

class KaryaTulisController extends Controller
{
    public function nilai_karya_tulis(){

        $data = KaryaTulis::all();

        return view('content.nilai.nilai_karya_tulis', compact('data'));
    }
}
