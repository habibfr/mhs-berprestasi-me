<?php

namespace Database\Seeders;

use App\Models\KaryaTulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryaTulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'mahasiswa_id' => 1, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'klasifikasi_karya_tulis_id' => 1,
                'jumlah' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'klasifikasi_karya_tulis_id' => 2,
                'jumlah' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'klasifikasi_karya_tulis_id' => 3,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'klasifikasi_karya_tulis_id' => 2,
                'jumlah' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];


        KaryaTulis::insert($data);
    }
}
