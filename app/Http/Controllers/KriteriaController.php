<?php

namespace App\Http\Controllers;

use App\Models\KlasifikasiKaryaTulis;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\Mahasiswa\Nilai;

class KriteriaController extends Controller
{
    public function index(){
        $data = Kriteria::all();
        // dd($data);
        return view('content.kriteria.index', compact('data'));
    }

    public function getKriteriaById($id){
        $data = Kriteria::find($id);
        return response()->json($data);
    }

    public function tambahKriteria(Request $request){
        $request->validate([
            'kriteria' => 'required|string|max:50',
            'atribut' => 'required|string|max:50',
            'bobot' => 'required|integer',
            'periode' => 'required|integer',
        ]);

        

        $kriteria = new Kriteria();

        $kriteria->kriteria = $request['kriteria'];
        $kriteria->atribut = $request['atribut'];
        $kriteria->bobot = $request['bobot'];
        $kriteria->periode = $request['periode'];

        $kriteria->save();
        return response()->json(['message' => 'Data Kriteria berhasil Ditambah']);
    }

    public function updateKriteria(Request $request, $id){

        $request->validate([
            'kriteria' => 'required|string|max:50',
            'atribut' => 'required|string|max:50',
            'bobot' => 'required|numeric',
            'periode' => 'required|integer',
        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $kriteria = Kriteria::find($id);

        if (!$kriteria) {
            return response()->json(['message' => 'Kriteria not found'], 404);
        }

        // Perbarui data mahasiswa
        $kriteria->kriteria = $request->input('kriteria');
        $kriteria->atribut = $request->input('atribut');
        $kriteria->bobot = $request->input('bobot');
        $kriteria->periode = $request->input('periode');
        

        $kriteria->save();
    

        return response()->json(['message' => 'Data Kriteria berhasil diperbarui']);
    }
    

    public function destroy($id){
        $kriteria = Kriteria::find($id);
        $nilai = Nilai::where('kriteria_id', $id);
        $klasifikasi = KlasifikasiKaryaTulis::where('kriteria_id', $id);


        if ($kriteria) {
            $kriteria->delete();
            $nilai->delete();
            $klasifikasi->delete();

            // You can return a response if needed
            return response()->json(['message' => 'kriteria deleted successfully']);
        } else {
            // Return a response indicating that the kriteria was not found
            return response()->json(['error' => 'kriteria not found'], 404);
        }
    }

    

}
