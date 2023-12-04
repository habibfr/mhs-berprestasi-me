<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa\Nilai;
use App\Models\Mahasisawa\Mahasiswa;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;

class MahasiswaController extends Controller
{
    public function index(){

        $data = Mahasiswa::all();

        
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
            $column_range = range( 'H', $column_limit );
            $startcount = 2;
            $data = array();

            $jumlahBaris = Mahasiswa::count()+1;



            foreach ( $row_range as $row ) {
                $dataMahasiswa[] = [
                    // 'CustomerName' =>$sheet->getCell( 'A' . $row )->getValue(),
                    'nim' => $sheet->getCell( 'B' . $row )->getValue(),
                    'nama' => $sheet->getCell( 'C' . $row )->getValue(),
                    'jurusan' => $sheet->getCell( 'D' . $row )->getValue(),
                    'email' => $sheet->getCell( 'E' . $row )->getValue(),
                ];


                $dataNilai[] = [
                    // 'CustomerName' =>$sheet->getCell( 'A' . $row )->getValue(),
                    // 'nim' => $sheet->getCell( 'B' . $row )->getValue(),
                
                    'mahasiswa_id' => $jumlahBaris++,
                    'IPK' =>$sheet->getCell( 'F' . $row )->getValue(),
                    'SSKM' =>$sheet->getCell( 'G' . $row )->getValue(),
                    'TOEFL' =>$sheet->getCell( 'H' . $row )->getValue(),
                ];
                $startcount++;
            }

            Mahasiswa::insert($dataMahasiswa);
            Nilai::insert($dataNilai);
            
        } catch (Exception $e) {
            $error_code = $e->getMessage();
            return back()->withErrors('There was a problem uploading the data!' . $error_code);
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }
}
