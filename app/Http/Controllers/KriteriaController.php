<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

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

    public function updateKriteria(Request $request, $id){

        $request->validate([
            'atribut' => 'required|string|max:50',
            'bobot' => 'required|integer',
        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $kriteria = Kriteria::find($id);

        if (!$kriteria) {
            return response()->json(['message' => 'Kriteria not found'], 404);
        }

        // Perbarui data mahasiswa
        $kriteria->atribut = $request->input('atribut');
        $kriteria->bobot = $request->input('bobot');
        

        $kriteria->save();
    

        return response()->json(['message' => 'Data Kriteria berhasil diperbarui']);
    }
}
