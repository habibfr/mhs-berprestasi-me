<?php

namespace Database\Seeders;

use App\Models\KlasifikasiKaryaTulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KlasifikasiKaryaTulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kriteria_id' => 4,
                'klasifikasi' => "Tidak Punya",
                'nilai' => 0.2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_id' => 4,
                'klasifikasi' => "Nasional",
                'nilai' => 0.5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria_id' => 4,
                'klasifikasi' => "Internasional",
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        KlasifikasiKaryaTulis::insert($data);
    }
}
