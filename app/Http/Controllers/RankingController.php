<?php

namespace App\Http\Controllers;

use App\Models\KaryaTulis;
use App\Models\KlasifikasiKaryaTulis;
use App\Models\Kriteria;
use App\Models\Mahasisawa\Mahasiswa;
use App\Models\Mahasiswa\Nilai;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(){

        $data = Ranking::orderBy('skor', 'desc')->get();
        
        $kt = KaryaTulis::all();
        $klas = KlasifikasiKaryaTulis::all();
        
        $datas = $this->hitungNilaiAkhir($kt, $klas);

        // dd($datas);
        return view("content.ranking.index", compact('data'));
    }



    function hitungSAW($data_mahasiswa, $data_kriteria, $data_nilai) {

        // normalisasi matriks keputusan
        $matriks_keputusan = [];
        foreach ($data_nilai as $nilai) {
            $kriteria = $this->cariKriteria($nilai['kriteria_id'], $data_kriteria);
            // dd($kriteria['atribut']);
            if (!is_null($kriteria)) { 
                // lanjutkan akses offset array $kriteria
                if ($kriteria['atribut'] == 'benefit') {
                    $matriks_keputusan[$nilai['mahasiswa_id']][$nilai['kriteria_id']] = $nilai['nilai'] / $this->maxNilaiKriteria($nilai['kriteria_id'], $data_nilai); 
                } else {
                    $matriks_keputusan[$nilai['mahasiswa_id']][$nilai['kriteria_id']] = $this->minNilaiKriteria($nilai['kriteria_id'], $data_nilai) / $nilai['nilai'];
                }
            }
        }

        // dd($matriks_keputusan);

        // normalisasi bobot
        $bobot_normalized = [];
        // total bobot
        $collection = collect($data_kriteria); 
        $total_bobot = $collection->sum('bobot');

        // dd($total_bobot);

        foreach ($data_kriteria as $kriteria) {
            $bobot_normalized[$kriteria['id']] = $kriteria['bobot'] / $total_bobot;
        }

        // hitung skor
        $skor = [];
        foreach ($matriks_keputusan as $id_mhs => $kriteria) {
            $skor[$id_mhs] = 0;
            foreach ($kriteria as $id_kriteria => $nilai) {
                if (!is_null($bobot_normalized[$id_kriteria])) {
                    // akses offset $bobot_normalized
                    $bobot = $bobot_normalized[$id_kriteria];
                    
                    $skor[$id_mhs] += $nilai * $bobot;
                }
            }  
        }


        arsort($skor);
        // dd($skor['1']);

        $ranking = [];

        // tentukan peringkat
        $peringkat = 1;  
        foreach ($skor as $id_mhs => $nilai) {
            $ranking[$id_mhs] = $peringkat++; 
            Ranking::updateOrCreate(
                [
                    'mahasiswa_id' => $id_mhs,
                ],
                [
                    'skor' => $skor[$id_mhs] 
                ]
            ); 
        }


        // kembalikan 
        // return [
        //     'skor' => $skor,
        //     'peringkat' => $ranking
        // ];
    
    }

    // cari kriteria dari data kriteria
    function cariKriteria($id, $data_kriteria) {
        foreach ($data_kriteria as $kriteria) {
            if ($kriteria['id'] == $id) {
                return $kriteria;
            }
        }
    }

    // cari nilai max kriteria tertentu
    function maxNilaiKriteria($id_kriteria, $data_nilai) {
        $max = 0;
        foreach ($data_nilai as $nilai) {
            if ($nilai['kriteria_id'] == $id_kriteria && $nilai['nilai'] > $max) {
                $max = $nilai['nilai'];
            }
        }
        return $max;
    }

    // cari nilai min kriteria tertentu  
    function minNilaiKriteria($id_kriteria, $data_nilai) {
        $min = 99;
        foreach ($data_nilai as $nilai) {
            if ($nilai['kriteria_id'] == $id_kriteria && $nilai['nilai'] < $min) {
                $min = $nilai['nilai']; 
            }
        }
        return $min;
    }

    public function prosesHitung(){
        // Mengambil Data Mahasiswa/alternatif
        $data_alternatif = array();
        $mahasiswas = Mahasiswa::all();

        $data_kriteria = array();
        $kriterias = Kriteria::where('periode', 2021)->get();

        $data_nilai = array();
        $nilais = Nilai::all();

        // dd($kriterias);

        $this->hitungSAW($mahasiswas, $kriterias, $nilais);

        return back()->withSuccess('Great! Perhitungan berhasil.');
    }

    
    // nilai karya_tulis
    public function hitungNilaiAkhir($collection_nilai_by_kriteria, $collection_klasifikasi_kriteria)
    {
        // $collection_nilai_by_kriteria = collect(KaryaTulis::all());
        // $collection_klasifikasi_kriteria = collect(KlasifikasiKaryaTulis::all());


        $nilai_mahasiswa = [];

        // dd($collection_nilai_by_kriteria);
        
        foreach ($collection_nilai_by_kriteria as $nilai) {

            // dd($nilai);
            $klasifikasi = $collection_klasifikasi_kriteria->where('kriteria_id', $nilai['kriteria_id'])
                                                   ->where('id', $nilai['klasifikasi_karya_tulis_id'])
                                                   ->first();
                                                   
            // dd($klasifikasi);

            $nilai['jumlah'] = $nilai['jumlah'] + 1;

            $nilai_akhir = $nilai['jumlah'] * $klasifikasi['nilai'];
            // dd($nilai_akhir);
            

            
            $key = $nilai['mahasiswa_id'] . '_' . $nilai['kriteria_id'];
            
            if (!isset($nilai_mahasiswa[$key])) {
                $nilai_mahasiswa[$key] = 0;
            }
            
            $nilai_mahasiswa[$key] += $nilai_akhir;
        }
        
        $collection_nilai_mahasiswa_baru = [];
        
        foreach ($nilai_mahasiswa as $key => $nilai) {
            [$mahasiswa_id, $kriteria_id] = explode('_', $key);
            
            // $collection_nilai_mahasiswa_baru[] = [
                //     'mahasiswa_id' => $mahasiswa_id,
                //     'kriteria_id' => $kriteria_id, 
                //     'nilai' => $nilai
                // ];
                $mhs_nilai = Nilai::firstOrNew([
                    'mahasiswa_id' => $mahasiswa_id, 
                    'kriteria_id' => $kriteria_id]);
                    
                $mhs_nilai->nilai = $nilai;
                $mhs_nilai->save();
        }
            //             [
            //                 'mahasiswa_id' => $alt_id,
            //             ],
            //             [
        
            //                 'skor' => $weighted_score 
            //             ]
            //         );
        
        // Query untuk menimpa data collection_nilai_mahasiswa di database
        
        return $collection_nilai_mahasiswa_baru; 
    }

    // public function prosesHitung(){
    //     // Mengambil Data Mahasiswa/alternatif
    //     $data_alternatif = array();
    //     $mahasiswas = Mahasiswa::all();

    //     $data_kriteria = array();
    //     $kriterias = Kriteria::all();

    //     $data_nilai = array();
    //     $nilais = Nilai::all();

    //     $data = $this->hitungSAW($data_alternatif, $data_kriteria, $data_nilai);

    //     dd($data);
      
    //     for ($i=0; $i < count($mahasiswas); $i++) { 
    //         # code...
    //         $data_alternatif [$mahasiswas[$i]->id] = $mahasiswas[$i]->nama;
    //     }

    

    //     // dd($data_alternatif);
    //     // Mengambil Data Kriteria dan Bobot
       

    //     for ($i=0; $i < count($kriterias); $i++) { 
    //         # code...
    //         $data_kriteria[$kriterias[$i]->id] = array($kriterias[$i]->kriteria, $kriterias[$i]->atribut, $kriterias[$i]->bobot, $kriterias[$i]->periode);
    //         $bobot[$kriterias[$i]->id] = $kriterias[$i]->bobot;            
    //     }
        
    //     $X = array();
    //     $min_j = array();
    //     $max_j = array();

    //     foreach ($nilais as $key => $nilai) {
    //         foreach ($data_kriteria as $kriteria_id => $kriteria_data) {
    //             $X[$nilai['mahasiswa_id']][$kriteria_id] = $nilai->{$kriteria_data[0]};
    //         }
    //     }

    //     dd($X);

    

    //     // return $preferensi;

    //     try {
    //         //code...
    //         $this->sawCalculation($data_alternatif, $data_kriteria, $X);

    //         // dd($data_alternatif);
    //     } catch (\Throwable $th) {
    //         session()->flash('error', 'Terjadi kesalahan pada server');
    //             return redirect()->back();
    //     }
        
      
    //     // dd($result);

    //     // for ($i = 1; $i <= count($X) + 1; $i++) {
    //     //     // Inisialisasi nilai terendah untuk kunci saat ini
    //     //     $minValue = PHP_FLOAT_MAX; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

    //     //     // Loop melalui setiap subarray
    //     //     foreach ($X as $subarray) {
    //     //         // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
    //     //         if (isset($subarray[$i]) && $subarray[$i] < $minValue) {
    //     //             $minValue = $subarray[$i];
    //     //         }
    //     //     }
    //     //     // Simpan nilai terendah untuk kunci saat ini di array $minValues
    //     //     $minValues[$i] = $minValue;
    //     // }

    //     // for ($i = 1; $i <= count($X) + 1; $i++) {
    //     //     // Inisialisasi nilai terendah untuk kunci saat ini
    //     //     $maxValue = PHP_FLOAT_MIN; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

    //     //     // Loop melalui setiap subarray
    //     //     foreach ($X as $subarray) {
    //     //         // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
    //     //         if (isset($subarray[$i]) && $subarray[$i] > $maxValue) {
    //     //             $maxValue = $subarray[$i];
    //     //         }
                
    //     //     }
    //     //     // Simpan nilai terendah untuk kunci saat ini di array $minValues
    //     //     $maxValues[$i] = $maxValue;
    //     // }

    //     // Menentukan Matriks Normalisasi (R)
        
    //     return back()->withSuccess('Great! Perhitungan berhasil.');
 
    // }


    // public function sawCalculation(array $alternatives, array $criteria, array $scores)
    // {
    //     $total_weights = array_sum(array_column($criteria, 2));
        
    //     $normalized_scores = [];

    //     $maxValues = array();
    //     $minValues = array();


    //     for ($i = 1; $i <= count($scores) + 1; $i++) {
    //         // Inisialisasi nilai terendah untuk kunci saat ini
    //         $minValue = PHP_FLOAT_MAX; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

    //         // Loop melalui setiap subarray
    //         foreach ($scores as $subarray) {
    //             // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
    //             if (isset($subarray[$i]) && $subarray[$i] < $minValue) {
    //                 $minValue = $subarray[$i];
    //             }
    //         }
    //         // Simpan nilai terendah untuk kunci saat ini di array $minValues
    //         $minValues[$i] = $minValue;
    //     }

    //      for ($i = 1; $i <= count($scores) + 1; $i++) {
    //         // Inisialisasi nilai terendah untuk kunci saat ini
    //         $maxValue = PHP_FLOAT_MIN; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

    //         // Loop melalui setiap subarray
    //         foreach ($scores as $subarray) {
    //             // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
    //             if (isset($subarray[$i]) && $subarray[$i] > $maxValue) {
    //                 $maxValue = $subarray[$i];
    //             }
                
    //         }
    //         // Simpan nilai terendah untuk kunci saat ini di array $minValues
    //         $maxValues[$i] = $maxValue;
    //     }
        
    //     // return $max;
        
    //     foreach ($scores as $alt_id => $alt_scores) {
            


    //         // foreach ($alt_scores as $crit_id => $score) {

    //         //     $max_score = $maxValues[$crit_id];           
    //         //     $normalized_scores[$alt_id][$crit_id] = $score / $max_score;
    //         // }


    //         foreach ($alt_scores as $crit_id => $score) {
    //             if ($criteria[$crit_id][1] == 'benefit') {
    
    //                 $max_score = $maxValues[$crit_id]; 
    //                 $normalized_scores[$alt_id][$crit_id] = $score / $max_score;
    
    //             } else if ($criteria[$crit_id][1] == 'cost') {
    
    //                 $min_score = $minValues[$crit_id];
    //                 $normalized_scores[$alt_id][$crit_id] = $min_score / $score;
    //             }
    //         }
    //     }
        
    //     $weighted_scores = [];
        
    //     foreach ($normalized_scores as $alt_id => $alt_normalized) {
          
    //         $weighted_score = 0;
          
    //         foreach ($alt_normalized as $crit_id => $norm_score) {
    //             // dd($criteria[$crit_id][2]);
    //           $weight = $criteria[$crit_id][2] / $total_weights;
    //           $weighted_score += $norm_score * $weight; 
              
    //         }
            
    //         $weighted_scores[$alt_id] = $weighted_score;
    //     }
      
    //     $results = [];
        
    //     arsort($weighted_scores);
        
    //     foreach ($weighted_scores as $alt_id => $weighted_score) {

    //         // dd($alt_id . $weighted_score);
    //         // $record = Ranking::where('mahasiswa_id', $alt_id)->first();

    //         Ranking::updateOrCreate(
    //             [
    //                 'mahasiswa_id' => $alt_id,
    //             ],
    //             [

    //                 'skor' => $weighted_score 
    //             ]
    //         );
            
    //         // $results[] = [
    //         //     'alternatif' => $alternatives[$alt_id],
    //         //     'nilai' => $weighted_score 
    //         // ];

    //             // $results->save();
    //     }
        
    //     return;
    // }

}
