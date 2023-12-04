<?php

namespace Database\Seeders;

use App\Models\Mahasiswa\Nilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $nilaiData = [
            [
                'mahasiswa_id' => 1, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'IPK' => 3.25,
                'SSKM' => 250,
                'TOEFL' => 550,
                'karya_tulis' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa lainnya
                'IPK' => 3.50,
                'SSKM' => 200,
                'TOEFL' => 600,
                'karya_tulis' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa lainnya
                'IPK' => 3.90,
                'SSKM' => 150,
                'TOEFL' => 500,
                'karya_tulis' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data dummy ke dalam tabel 'nilai'
        Nilai::insert($nilaiData);
    }
}
