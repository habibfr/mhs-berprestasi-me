<?php

namespace App\Http\Controllers;

use App\Models\KaryaTulis;
use Illuminate\Http\Request;

class KaryaTulisController extends Controller
{
    public function nilai_karya_tulis(){

        $data = KaryaTulis::all();

        // dd($data);
        return view('content.nilai.nilai_karya_tulis', compact('data'));
    }


    public function getNilaiKaryaTulisById($id){
        // $data = KaryaTulis::find($id);
        $data = KaryaTulis::join('mahasiswas', 'karya_tulis.mahasiswa_id', '=', 'mahasiswas.id')
                            ->join('kriterias', 'kriterias.id', '=', 'karya_tulis.kriteria_id')
                            ->join('klasifikasi_karya_tulis', 'klasifikasi_karya_tulis.id', '=', 'karya_tulis.klasifikasi_karya_tulis_id')

                            ->select('karya_tulis.id', 'mahasiswas.nama', 'kriterias.kriteria', 'kriterias.periode', 'klasifikasi_karya_tulis.klasifikasi', 'karya_tulis.jumlah')
                            ->where('karya_tulis.id', $id)
                            ->get();

        return response()->json($data);
    }

    public function updateNilaiKaryaTulis(Request $request, $id){

        // dd($request);

        $request->validate([
            'jumlah' => 'required|numeric',
        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $kt = KaryaTulis::find($id);

        if (!$kt) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        // Perbarui data mahasiswa
        $kt->jumlah = $request->input('jumlah');
        $kt->save();

        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui']);
    }


    public function destroy($id)
    {
        $kt = KaryaTulis::findOrFail($id);

        $kt->delete();

        return response()->json(['message' => 'Karya tulis deleted']); 
    }
}
