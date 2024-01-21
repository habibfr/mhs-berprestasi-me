<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiKaryaTulis;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KlasifikasiKaryaTulisController extends Controller
{
    public function klasifikasi_karya_tulis(){
        $data = KlasifikasiKaryaTulis::all();

        // dd($data);
    
        return view('content.kriteria.klasifikasi_karya_tulis', compact('data'));
    }

    public function getKlasifikasiById($id){
        // $data = KlasifikasiKaryaTulis::find($id);
        // $kriteria = Kriteria::where('kriteria', $data['kriteria_id'])->first();
        $data = KlasifikasiKaryaTulis::join('kriterias', 'klasifikasi_karya_tulis.kriteria_id', '=', 'kriterias.id')
                            ->select('klasifikasi_karya_tulis.id', 'klasifikasi_karya_tulis.nilai', 'klasifikasi_karya_tulis.klasifikasi', 'kriterias.kriteria', 'kriterias.periode')
                            ->where('klasifikasi_karya_tulis.id', $id)
                            ->get();

        return response()->json($data);
    }

    public function updateKlasifikasi(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|numeric',
        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $klasifikasi = KlasifikasiKaryaTulis::find($id);

        if (!$klasifikasi) {
            return response()->json(['message' => 'Klasifikasi not found'], 404);
        }

        // Perbarui data mahasiswa
        $klasifikasi->nilai = $request->input('nilai');
        $klasifikasi->save();


        return response()->json(['message' => 'Data Klasifikasi berhasil diperbarui']);
    }
}
