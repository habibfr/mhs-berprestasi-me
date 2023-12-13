<?php

namespace Database\Seeders;

use App\Models\Ranking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RangkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataRangking = [
            [
            
                'skor'=> 0,
                'mahasiswa_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            
                'skor'=> 0,
                'mahasiswa_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            
                'skor'=> 0,
                'mahasiswa_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ];

        // Insert data dummy ke dalam tabel 'mahasiswa'
        Ranking::insert($dataRangking);
    }
}
