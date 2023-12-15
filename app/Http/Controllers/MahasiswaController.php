<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa\Nilai;
use App\Models\Mahasisawa\Mahasiswa;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index(){

        $data = Mahasiswa::all();

        // dd($data);

        
        return view('content.mahasiswa.index', compact('data'));
    }


    function importData(Request $request){
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('uploaded_file');

        try{
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range( 2, $row_limit );
            // $column_range = range( 'H', $column_limit );
            $startcount = 2;
            // $data = array();

            $jumlahBaris = Mahasiswa::count()+1;


            foreach ($row_range as $row) {
                Mahasiswa::updateOrCreate(
                    ['nim' => $sheet->getCell('B' . $row)->getValue()],
                    [
                        'nama' => $sheet->getCell('C' . $row)->getValue(),
                        'jurusan' => $sheet->getCell('D' . $row)->getValue(),
                        'email' => $sheet->getCell('E' . $row)->getValue(),
                        'alamat' => $sheet->getCell('F' . $row)->getValue(),
                        'no_hp' => $sheet->getCell('G' . $row)->getValue(),
                    ]
                );
            }
    

            foreach ($row_range as $row) {
                $mahasiswa = Mahasiswa::where('nim', $sheet->getCell('B' . $row)->getValue())->first();
            
                Nilai::updateOrCreate(
                    ['mahasiswa_id' => $mahasiswa->id],
                    [
                        'IPK' => $sheet->getCell('H' . $row)->getValue(),
                        'SSKM' => $sheet->getCell('I' . $row)->getValue(),
                        'TOEFL' => $sheet->getCell('J' . $row)->getValue(),
                        'karya_tulis' => $sheet->getCell('K' . $row)->getValue(),
                    ]
                );
            }
            
            // Insert into Nilai table
            // Nilai::updateOrCreate($dataNilai);
            
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                // Tangani kesalahan unik di sini
                session()->flash('error', 'Data Mahasiswa sudah digunakan diimport');
                return redirect()->back();
            } else {
                // Tangani kesalahan lainnya
                session()->flash('error', 'Terjadi kesalahan pada server');
                return redirect()->back();
            }
        
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }


    public function filter(Request $request){

        if ($request->jurusan == 0 && $request->angkatan == null) {

            $data = Mahasiswa::all();

            return view('content.mahasiswa.index', compact('data'))->with('kosong', "Data jangan kosong");

        }else{
            $this->validate($request, [
                'jurusan' => 'nullable|numeric|max:3',
                'angkatan'=>'nullable|numeric|min:2015|max:2023',
            ]);
        }

        

        

        $dataJurusan = array('S1 Sistem Informasi', 'S1 Desain Komunikasi Visual', 'S1 Teknik Komputer');

        if($request->jurusan != 0 ){
            $jurusan = $dataJurusan[($request->jurusan) - 1];
        }

        $angkatan = substr($request->angkatan, 2, 3);
        

        if($request->jurusan == 0){
            $data = Mahasiswa::where('nim', 'like', $angkatan . '%')
                        ->get();
            return view('content.mahasiswa.index', compact('data'));
        }

        if($request->angkatan == null){
            $data = Mahasiswa::where('jurusan','like', $jurusan)
                        ->get();
            return view('content.mahasiswa.index', compact('data'));
        }

        $data = Mahasiswa::where('jurusan','like', $jurusan)
                        ->where('nim', 'like', $angkatan . '%')
                        ->get();
        return view('content.mahasiswa.index', compact('data'));
    
    }


    public function getMahasiswaById($id){
        $data = Mahasiswa::find($id);
        // $nilaiMahasiswa = Nilai::join('mahasiswas', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
        //                     ->select('nilais.*', 'mahasiswas.*')
        //                     ->where('mahasiswas.id', $id)
        //                     ->get();

        return response()->json($data);
    }


    // MahasiswaController.php

    public function updateMahasiswa(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|string|max:15',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jurusan' => 'required|string', 
            'alamat' => 'nullable|string', 
            'no_hp' => 'nullable|string',
        ]);

        // Ambil data mahasiswa dari database berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        // Perbarui data mahasiswa
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->email = $request->input('email');
        $mahasiswa->jurusan = $request->input('jurusan');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->no_hp = $request->input('no_hp');

        $mahasiswa->save();
    

        return response()->json(['message' => 'Data mahasiswa berhasil diperbarui']);
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $nilai = Nilai::where('mahasiswa_id', $id)->first();


        if ($mahasiswa) {
            $mahasiswa->delete();
            $nilai->delete();

            // You can return a response if needed
            return response()->json(['message' => 'Mahasiswa deleted successfully']);
        } else {
            // Return a response indicating that the Mahasiswa was not found
            return response()->json(['error' => 'Mahasiswa not found'], 404);
        }
    }

    
}
