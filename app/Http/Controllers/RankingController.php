<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Mahasisawa\Mahasiswa;
use App\Models\Mahasiswa\Nilai;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function index(){
        return;
    }

    public function prosesHitung(){
        // Mengambil Data Mahasiswa/alternatif
        $data_alternatif = array();
        $mahasiswas = Mahasiswa::all();
      
        for ($i=0; $i < count($mahasiswas); $i++) { 
            # code...
            $data_alternatif [$mahasiswas[$i]->id] = $mahasiswas[$i]->nama;
        }


        // dd($data_alternatif);
        // Mengambil Data Kriteria dan Bobot
        $data_kriteria = array();
        $kriterias = Kriteria::all();

        $data_nilai = array();
        $nilais = Nilai::all();

        for ($i=0; $i < count($kriterias); $i++) { 
            # code...
            $data_kriteria[$kriterias[$i]->id] = array($kriterias[$i]->kriteria, $kriterias[$i]->atribut, $kriterias[$i]->bobot);
            $bobot[$kriterias[$i]->id] = $kriterias[$i]->bobot;            
        }
        
        $X = array();
        $min_j = array();
        $max_j = array();

        foreach ($nilais as $key => $nilai) {
            foreach ($data_kriteria as $kriteria_id => $kriteria_data) {
                $X[$nilai['mahasiswa_id']][$kriteria_id] = $nilai->{$kriteria_data[0]};
            }
        }

    

        // return $preferensi;

        $this->sawCalculation($data_alternatif, $data_kriteria, $X);
        
      
        // dd($result);

        // for ($i = 1; $i <= count($X) + 1; $i++) {
        //     // Inisialisasi nilai terendah untuk kunci saat ini
        //     $minValue = PHP_FLOAT_MAX; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

        //     // Loop melalui setiap subarray
        //     foreach ($X as $subarray) {
        //         // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
        //         if (isset($subarray[$i]) && $subarray[$i] < $minValue) {
        //             $minValue = $subarray[$i];
        //         }
        //     }
        //     // Simpan nilai terendah untuk kunci saat ini di array $minValues
        //     $minValues[$i] = $minValue;
        // }

        // for ($i = 1; $i <= count($X) + 1; $i++) {
        //     // Inisialisasi nilai terendah untuk kunci saat ini
        //     $maxValue = PHP_FLOAT_MIN; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

        //     // Loop melalui setiap subarray
        //     foreach ($X as $subarray) {
        //         // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
        //         if (isset($subarray[$i]) && $subarray[$i] > $maxValue) {
        //             $maxValue = $subarray[$i];
        //         }
                
        //     }
        //     // Simpan nilai terendah untuk kunci saat ini di array $minValues
        //     $maxValues[$i] = $maxValue;
        // }

        // Menentukan Matriks Normalisasi (R)
        
        return view('content.peringkat.index', compact('data_alternatif'));
 
    }


    public function sawCalculation(array $alternatives, array $criteria, array $scores)
    {
        $total_weights = array_sum(array_column($criteria, 2));
        
        $normalized_scores = [];

        $maxValues = array();
        $minValues = array();


        for ($i = 1; $i <= count($scores) + 1; $i++) {
            // Inisialisasi nilai terendah untuk kunci saat ini
            $minValue = PHP_FLOAT_MAX; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

            // Loop melalui setiap subarray
            foreach ($scores as $subarray) {
                // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
                if (isset($subarray[$i]) && $subarray[$i] < $minValue) {
                    $minValue = $subarray[$i];
                }
            }
            // Simpan nilai terendah untuk kunci saat ini di array $minValues
            $minValues[$i] = $minValue;
        }

         for ($i = 1; $i <= count($scores) + 1; $i++) {
            // Inisialisasi nilai terendah untuk kunci saat ini
            $maxValue = PHP_FLOAT_MIN; // Menggunakan nilai maksimum dari tipe float sebagai inisialisasi

            // Loop melalui setiap subarray
            foreach ($scores as $subarray) {
                // Periksa dan perbarui nilai terendah jika nilai saat ini lebih kecil
                if (isset($subarray[$i]) && $subarray[$i] > $maxValue) {
                    $maxValue = $subarray[$i];
                }
                
            }
            // Simpan nilai terendah untuk kunci saat ini di array $minValues
            $maxValues[$i] = $maxValue;
        }
        
        // return $max;
        
        foreach ($scores as $alt_id => $alt_scores) {
            


            // foreach ($alt_scores as $crit_id => $score) {

            //     $max_score = $maxValues[$crit_id];           
            //     $normalized_scores[$alt_id][$crit_id] = $score / $max_score;
            // }


            foreach ($alt_scores as $crit_id => $score) {
                if ($criteria[$crit_id][1] == 'benefit') {
    
                    $max_score = $maxValues[$crit_id]; 
                    $normalized_scores[$alt_id][$crit_id] = $score / $max_score;
    
                } else if ($criteria[$crit_id][1] == 'cost') {
    
                    $min_score = $minValues[$crit_id];
                    $normalized_scores[$alt_id][$crit_id] = $min_score / $score;
                }
            }
        }
        
        $weighted_scores = [];
        
        foreach ($normalized_scores as $alt_id => $alt_normalized) {
          
            $weighted_score = 0;
          
            foreach ($alt_normalized as $crit_id => $norm_score) {
                // dd($criteria[$crit_id][2]);
              $weight = $criteria[$crit_id][2] / $total_weights;
              $weighted_score += $norm_score * $weight; 
              
            }
            
            $weighted_scores[$alt_id] = $weighted_score;
        }
      
        $results = [];
        
        arsort($weighted_scores);
        
        foreach ($weighted_scores as $alt_id => $weighted_score) {

            // dd($alt_id . $weighted_score);
            // $record = Ranking::where('mahasiswa_id', $alt_id)->first();

            Ranking::updateOrCreate(
                [
                    'mahasiswa_id' => $alt_id,
                ],
                [

                    'skor' => $weighted_score 
                ]
            );
            
            // $results[] = [
            //     'alternatif' => $alternatives[$alt_id],
            //     'nilai' => $weighted_score 
            // ];

                // $results->save();
        }
        
        return;
    }

}
