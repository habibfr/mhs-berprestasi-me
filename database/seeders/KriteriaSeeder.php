<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataKriteria = [
            [
                'kriteria' => 'IPK',
                'atribut' => 'benefit',
                'bobot'=> 0.3,
                'periode' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria' => 'SSKM',
                'atribut' => 'benefit',
                'bobot'=> 0.25,
                'periode'=> 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria' => 'TOEFL',
                'atribut' => 'benefit',
                'bobot'=> 0.2,
                'periode' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kriteria' => 'Karya Tulis',
                'atribut' => 'benefit',
                'bobot'=> 0.25,
                'periode' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data dummy ke dalam tabel 'mahasiswa'
        Kriteria::insert($dataKriteria);
    }
}
