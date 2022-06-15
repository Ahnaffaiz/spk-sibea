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
            ['Status Ayah', 'sta'],
            ['Status Ibu', 'sti'],
            ['Pendidikan Ayah', 'spa'],
            ['Pendidikan Ibu', 'spi'],
            ['Pekerjaan Ayah', 'ska'],
            ['Pekerjaan Ibu', 'ski'],
            ['Penghasilan Ayah', 'sha'],
            ['Penghasilan Ibu', 'shi'],
            ['Penghasilan', 'sho'],
            ['Status Rumah', 'skr'],
            ['Tanggungan', 'sjt'],
            ['Skor Jiwa', 'skj'],
        );

        foreach ($kriteria as $item) {
            DB::table('ref_kriterias')->insert([
                'kode' => strtolower($item[1]),
                'nama' => strtolower($item[0]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
