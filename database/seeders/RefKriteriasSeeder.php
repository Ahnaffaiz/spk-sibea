<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefKriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = array(
            ['Status Ayah', 'sta', 0],
            ['Status Ibu', 'sti', 0],
            ['Pendidikan Ayah', 'spa', 0],
            ['Pendidikan Ibu', 'spi', 0],
            ['Pekerjaan Ayah', 'ska', 0],
            ['Pekerjaan Ibu', 'ski', 0],
            ['Penghasilan Ayah', 'sha', 0],
            ['Penghasilan Ibu', 'shi', 0],
            ['Penghasilan', 'sho', 0],
            ['Status Rumah', 'skr', 0],
            ['Tanggungan', 'sjt', 1],
            ['Skor Jiwa', 'skj', 0],
        );

        foreach ($kriteria as $item) {
            DB::table('ref_kriterias')->insert([
                'kode' => strtolower($item[1]),
                'nama' => strtolower($item[0]),
                'is_benefit' => strtolower($item[2]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
