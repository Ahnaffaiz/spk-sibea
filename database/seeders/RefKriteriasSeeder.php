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
            ['Status Ayah (STA)', 'STA'],
            ['Status Ibu (STI)', 'STI'],
            ['Status Rumah (SR)', 'SR1'],
            ['Pendidikan Ayah (SPA)', 'SPA'],
            ['Pendidikan Ibu (SPI)', 'SPI'],
            ['Pekerjaan Ayah (SKA)', 'SKA'],
            ['Pekerjaan Ibu (SKI)', 'SKI'],
            ['Tanggungan', 'T01'],
            ['Penghasilan Ayah', 'PA1'],
            ['Penghasilan Ibu', 'PI1'],
            ['Penghasilan', 'P01'],
            ['Skor Jiwa', 'SJ1'],
            ['Sipsmart', 'S01']
        );

        foreach ($kriteria as $item) {
            DB::table('ref_kriterias')->insert([
                'kode' => $item[1],
                'nama' => $item[0],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
