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
                'kriteria_id' => 1,
                'nilai' => 3.50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 2,
                'nilai' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 3,
                'nilai' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 1, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'nilai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 1,
                'nilai' => 3.30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 2,
                'nilai' => 250,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 3,
                'nilai' => 450,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 2, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'nilai' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 1,
                'nilai' => 3.80,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 2,
                'nilai' => 190,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 3,
                'nilai' => 550,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mahasiswa_id' => 3, // Sesuaikan dengan ID mahasiswa dari seeder MahasiswaSeeder
                'kriteria_id' => 4,
                'nilai' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data dummy ke dalam tabel 'nilai'
        Nilai::insert($nilaiData);
    }
}
