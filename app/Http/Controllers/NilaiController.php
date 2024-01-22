<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasisawa\Mahasiswa;
use App\Models\Mahasiswa\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(){
        $all_data = Nilai::all();
        $mahasiswa= Mahasiswa::all();
        // dd($all_data);
        
        // dd($data);
        $data = [];
        foreach ($all_data as $item) {
            $mahasiswaId = $item['mahasiswa_id'];
            $kriteriaId = $item['kriteria_id'];
            $nilai = $item['nilai'];
        
            // Jika mahasiswa_id belum ada dalam hasil pengelompokan, tambahkan array baru
            if (!isset($data[$mahasiswaId])) {
                $data[$mahasiswaId] = [
                    'id' => $mahasiswaId,
                    'mahasiswa_id' => $mahasiswaId,
                    'nilai' => [],
                ];
            }
        
            // Tambahkan nilai ke dalam array pengelompokan
            $data[$mahasiswaId]['nilai'][] = [
                'kriteria_id' => $kriteriaId,
                'kriteria' => Kriteria::find($kriteriaId)->kriteria,
                'nilai' => $nilai,
            ];

        }

        // Menghubungkan dengan data mahasiswa dari tabel 'mahasiswa'
        foreach ($data as &$group) {
            // Mengganti 'mahasiswa_data' dengan data mahasiswa dari tabel 'mahasiswa'
            $group['mahasiswa_data'] = $this->getMahasiswaData($group['mahasiswa_id']);
        }

        // Hapus referensi agar tidak terjadi modifikasi pada data asli
        unset($group);

        // dd($data);

        return view('content.nilai.index', compact('data'));
    }

    // Fungsi untuk mendapatkan data mahasiswa dari tabel 'mahasiswa'
    function getMahasiswaData($mahasiswaId)
    {
        // Gantilah ini dengan logika pengambilan data mahasiswa dari tabel 'mahasiswa'
        // Contoh sederhana, sebaiknya gunakan Eloquent atau Query Builder untuk mengambil data dari database
        $mahasiswas = Mahasiswa::find($mahasiswaId);
        
        $mahasiswaData = [
            'id' => $mahasiswas->id,
            'nama' => $mahasiswas->nama, // Ganti dengan data sebenarnya
            'nim' => $mahasiswas->nim, // Ganti dengan data sebenarnya
        ];

        return $mahasiswaData;
    }

    public function getNilaiByMhsId($id_mhs){
        $nilaiMahasiswa = Nilai::join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                            ->select('nilais.*', 'mahasiswas.nim', 'mahasiswas.nama')
                            ->where('mahasiswas.id', $id_mhs)
                            ->get();

        return response()->json($nilaiMahasiswa);
    }


    public function updateNilai(Request $request, $id){

        // dd($request);

        $request->validate([
            'mahasiswa_id' => 'required|numeric',
            'nilai' => 'array|required',
        ]);

        foreach ($request['nilai'] as $nilaiData) {
            $nilai = $nilaiData['nilai'];
            if(!isset($nilai)){
                return response()->json(['message' => 'Data tidak lengkap...'], 500);
            }
        }

        foreach ($request['nilai'] as $nilaiData) {
            $kriteriaId = $nilaiData['kriteria_id'];
            $nilai = $nilaiData['nilai'];
            
            Nilai::updateOrCreate(
              ['mahasiswa_id' => $request['mahasiswa_id'], 'kriteria_id' => $kriteriaId],
              ['nilai' => $nilai]
            );
        }

        // Ambil data mahasiswa dari database berdasarkan ID
        // $nilai = Nilai::find($id);

        // if (!$nilai) {
        //     return response()->json(['message' => 'Mahasiswa not found'], 404);
        // }

        // // Perbarui data mahasiswa
        // $nilai->ipk = $request->input('ipk');
        // $nilai->sskm = $request->input('sskm');
        // $nilai->toefl = $request->input('toefl');
        // $nilai->karya_tulis = $request->input('karya_tulis');

        // $nilai->save();

        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui']);
    }


}
