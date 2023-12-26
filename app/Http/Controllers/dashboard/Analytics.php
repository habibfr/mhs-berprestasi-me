<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Mahasiswa\Nilai;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Mahasisawa\Mahasiswa;

class Analytics extends Controller
{
  // public function index()
  // {
  //   return view('content.dashboard.dashboard');
  // }
  public function index()
  {
    $all_datas  = Mahasiswa::join('nilais', 'nilais.mahasiswa_id', '=', 'mahasiswas.id')
                        ->join('rankings', 'rankings.mahasiswa_id', '=', 'mahasiswas.id')
                        ->select('nilais.*', 'mahasiswas.*', 'rankings.*')
                        ->orderBy('rankings.skor', 'desc')
                        ->get();

    $data = $this->transformArray($all_datas);

    // dd($data);
    


    return view('content.dashboard.dashboards-analytics', compact('data'));
  }


  
function transformArray($data)
{
    $result = [
        'total_mhs' => count($data),
        'total_kriteria' => 4, // Asumsi bahwa setiap array dalam $data memiliki struktur yang sama
        'mahasiswa_terbaik' => $this->getMaxSkorMahasiswa($data)['nama'],
        'asal_mahasiswa' => $this->countByJurusan($data),
        'mahasiswas' => $this->mahasiswaBySkor($data)
    ];

    return $result;
}

function getMaxSkorMahasiswa($data)
{
    $maxSkor = 0;
    $mahasiswaTerbaik = [];

    foreach ($data as $mahasiswa) {
        if ($mahasiswa['skor'] > $maxSkor) {
            $maxSkor = $mahasiswa['skor'];
            $mahasiswaTerbaik = $mahasiswa;
        }
    }

    return $mahasiswaTerbaik;
}

function countByJurusan($data)
{
    $jurusanCount = [];

    foreach ($data as $mahasiswa) {
        $jurusan = $mahasiswa['jurusan'];

        if (isset($jurusanCount[$jurusan])) {
            $jurusanCount[$jurusan]++;
        } else {
            $jurusanCount[$jurusan] = 1;
        }
    }

    return $jurusanCount;
}

function mahasiswaBySkor($data){
  $mahasiswas = [];
  $i = 1;

  foreach ($data as $mahasiswa) {
    if($i <= 5){
      $mahasiswas[$mahasiswa->nama] = $mahasiswa->skor;
    }
    $i++;
  }

return $mahasiswas;
}

// Penggunaan fungsi transformArray
// $resultArray = transformArray($data);
}
