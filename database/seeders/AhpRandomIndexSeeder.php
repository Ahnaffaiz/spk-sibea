<?php

namespace Database\Seeders;

use App\Models\Ahp\AhpRandomIndex;
use Illuminate\Database\Seeder;

class AhpRandomIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random_indeks = [
            1 => 0.00,
            2 => 0.00,
            3 => 0.58,
            4 => 1.90,
            5 => 1.12,
            6 => 1.24,
            7 => 1.32,
            8 => 1.41,
            9 => 1.45,
            10 => 1.49,
            11 => 1.51,
            12 => 1.48,
            13 => 1.56,
            14 => 1.57,
            15 => 1.58
        ];

        foreach ($random_indeks as $key => $value) {
            AhpRandomIndex::create([
                'ukuran_matriks' => $key,
                'random_indek' => $value
            ]);
        }
    }
}
