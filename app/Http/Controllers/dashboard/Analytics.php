<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Kriteria;
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

    // dd($all_datas);
    // dd($data);

    return view('content.dashboard.dashboards-analytics', compact('data'));
  }


 

    
  function transformArray($data)
  {
      $result = [
          'total_mhs' => $this->countMahasiswa($data),
          'total_kriteria' => count(Kriteria::all()), // Asumsi bahwa setiap array dalam $data memiliki struktur yang sama
          'mahasiswa_terbaik' => $this->getMaxSkorMahasiswa($data)['nama'] ?? 'Belum Ada',
          'asal_mahasiswa' => $this->countByJurusan($data),
          'mahasiswas' => $this->mahasiswaBySkor($data)
      ];

      // dd($result);

      return $result;
  }

  function countMahasiswa($data){
    $mahasiswas = [];

    foreach ($data as $mahasiswa) {
      $id = $mahasiswa['mahasiswa_id'];
      
      if (!isset($mahasiswas[$id])) {
          $mahasiswas[$id] = 0;
      }
      
      $mahasiswas[$id]++; 
    }
  
    return count($mahasiswas);
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
    $jurusans = [];

    foreach ($data as $mahasiswa) {   
      $id = $mahasiswa['mahasiswa_id'];
      $jurusan = $mahasiswa['jurusan'];  
      
      if (!isset($jurusans[$jurusan])) {
        $jurusans[$jurusan] = [];
      }

      if (!in_array($id, $jurusans[$jurusan])) { 
        $jurusans[$jurusan][] = $id;
      }  
    }

    $result = [];

    foreach ($jurusans as $jurusan => $ids) {
      $total = count($ids);
      
      $result[] = [
        'jurusan' => $jurusan,
        'total_mahasiswa' => $total
      ];
    }

    return $result;
  }

  function mahasiswaBySkor($data){
    $mahasiswas = [];

    foreach ($data as $mahasiswa) {
      $id = $mahasiswa['mahasiswa_id'];
      $skor = $mahasiswa['skor'];
      
      if (!isset($mahasiswas[$id])) {
        $mahasiswas[$id] = [
          'nama' => $mahasiswa['nama'],
          'skor' => $skor  
        ];
      } else {
        if ($skor > $mahasiswas[$id]['skor']) {
          $mahasiswas[$id]['skor'] = $skor;  
        }
      }
    }
    
    usort($mahasiswas, function($a, $b) {
      return $b['skor'] <=> $a['skor'];
    });
    
    $result = array_values($mahasiswas);
    
    if (count($result) > 5) {
      $result = array_slice($result, 0, 5);
    }

    // dd($result);
    return $result;
  }

  // Penggunaan fungsi transformArray
  // $resultArray = transformArray($data);


  public function kriteriaDashboard(){
    $kriterias = Kriteria::all();


    $data = array();
    foreach ($kriterias as $value) {
      $kriteria['id'] = $value->id;
      $kriteria['kriteria'] = $value->kriteria;
      $kriteria['bobot'] = $value->bobot;

      array_push($data, $kriteria);
    }

    return response()->json($data);
  }
}
