<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        $data = Nilai::all();

        return view('content.nilai.index', compact('data'));
    }

    public function getNilaiByMhsId($id_mhs){
        $nilaiMahasiswa = Nilai::join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                            ->select('nilais.*', 'mahasiswas.nim', 'mahasiswas.nama')
                            ->where('mahasiswas.id', $id_mhs)
                            ->get();

        return response()->json($nilaiMahasiswa);
    }


    public function updateNilai(Request $request, $id){
        $request->validate([
            'ipk' => 'required|numeric',
            'sskm' => 'required|numeric',
            'toefl' => 'required|numeric',
            'karya_tulis' => 'required|numeric', 

        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $nilai = Nilai::find($id);

        if (!$nilai) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        // Perbarui data mahasiswa
        $nilai->ipk = $request->input('ipk');
        $nilai->sskm = $request->input('sskm');
        $nilai->toefl = $request->input('toefl');
        $nilai->karya_tulis = $request->input('karya_tulis');

        $nilai->save();

        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui']);
    }
}
