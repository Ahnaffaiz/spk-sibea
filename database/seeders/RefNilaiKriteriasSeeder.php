<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefNilaiKriteriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skors = array(
            ['STA','Masih Tinggal 1 keluarga','3'], //
            ['STA','Cerai','6'],
            ['STA','Meninggal','10'],
            ['STI','Masih Tinggal 1 keluarga','3'],
            ['STI','Cerai','6'],
            ['STI','Meninggal','10'],
            ['SR1','Rumah Sendiri','2'],
            ['SR1','menumpang','4'],                 // Tidak ada di api
            ['SR1','menumpang tanpa izin','6'],      // Tidak ada di api
            ['SR1','sewa tahunan','8'],              // Tidak ada di api
            ['SR1','sewa bulanan','10'],             // Tidak ada di api
            ['SR1','tidak memiliki','4'],            // Tidak ada di api
            ['SPA','tidak sekolah','10'],           // Tidak ada di api
            ['SPA','Tamat SD','9'],
            ['SPA','Tamat SMP','8'],
            ['SPA','Tamat SMTA','7'],
            ['SPA','D1/Sederajat','6'],
            ['SPA','D2/Sederajat','5'],
            ['SPA','D3/Sederajat','4'],
            ['SPA','Sarjana (S1)','2'],
            ['SPA','Pasca Sarjana (S2)','0'],
            ['SPI','tidak sekolah','10'],           // Tidak ada di api
            ['SPI','Tamat SD','9'],
            ['SPI','Tamat SMP','8'],
            ['SPI','Tamat SMTA','7'],
            ['SPI','D1/Sederajat','6'],             // Tidak ada di api
            ['SPI','D2/Sederajat','5'],             // Tidak ada di api
            ['SPI','D3/Sederajat','4'],             // Tidak ada di api
            ['SPI','Sarjana (S1)','2'],
            ['SPI','Pasca Sarjana (S2)','0'],
            ['SKA','tidak bekerja','10'],
            ['SKA','Lain-lain','8.3'],                // Tidak ada di api
            ['SKA','Petani/Nelayan','6.64'],
            ['SKA','Wirausaha','4.98'],             // Tidak ada di api
            ['SKA','Pegawai Swasta bukan Guru/Dosen','3.32'],        //ini di pecah dari Pegawai Swasta
            ['SKA','Guru/Dosen Swasta','3.32'],                      //ini di pecah dari Pegawai Swasta
            ['SKA','Pegawai Negri bukan Guru/Dosen','1.66'],         //ini di pecah dari PNS
            ['SKA','Guru/Dosen Negeri','1.66'],                      //ini di pecah dari PNS
            ['SKA','ABRI/TNI','1.66'],
            ['SKI','tidak bekerja','10'],
            ['SKI','Lain-lain','8.3'],
            ['SKI','Petani','6.64'],
            ['SKI','Wirausaha','4.98'],
            ['SKI','Pegawai Swasta bukan Guru/Dosen','3.32'],        //ini di pecah dari Pegawai Swasta
            ['SKI','Guru/Dosen Swasta','3.32'],                      //ini di pecah dari Pegawai Swasta
            ['SKI','Pegawai Negri bukan Guru/Dosen','1.66'],         //ini di pecah dari PNS
            ['SKI','Guru/Dosen Negeri','1.66'],                      //ini di pecah dari PNS
            ['SKI','ABRI/TNI','1.66'],
            ['T01','1','1'],
            ['T01','2','2'],
            ['T01','3','3'],
            ['T01','4','4'],
            ['T01','5','5'],
            ['T01','6','6'],
            ['T01','7','7'],
            ['T01','8','8'],
            ['T01','9','9'],
            ['T01','0','1'],
            ['PA1','250001-500000','18'],
            ['PA1','500001-750000','17'],
            ['PA1','750001-1000000','16'],
            ['PA1','1000001-1250000','15'],
            ['PA1','1250001-1500000','14'],
            ['PA1','1500001-1750000','13'],
            ['PA1','1750001-2000000','12'],
            ['PA1','2000001-2250000','11'],
            ['PA1','2250001-2500000','10'],
            ['PA1','2500001-2750000','9'],
            ['PA1','2750001-3000000','8'],
            ['PA1','3000001-3250000','7'],
            ['PA1','3250001-3500000','6'],
            ['PA1','3500001-3750000','5'],
            ['PA1','3750001-4000000','4'],
            ['PA1','4000001-4250000','3'],
            ['PA1','4250001-4500000','2'],
            ['PA1','4500001-4750000','1'],
            ['PA1','4750001-5000000','0'],
            ['PA1','<250000','19'],
            ['PA1','Tidak Berpenghasilan','20'],
            ['PI1','250001-500000','18'],
            ['PI1','500001-750000','17'],
            ['PI1','750001-1000000','16'],
            ['PI1','1000001-1250000','15'],
            ['PI1','1250001-1500000','14'],
            ['PI1','1500001-1750000','13'],
            ['PI1','1750001-2000000','12'],
            ['PI1','2000001-2250000','11'],
            ['PI1','2250001-2500000','10'],
            ['PI1','2500001-2750000','9'],
            ['PI1','2750001-3000000','8'],
            ['PI1','3000001-3250000','7'],
            ['PI1','3250001-3500000','6'],
            ['PI1','3500001-3750000','5'],
            ['PI1','3750001-4000000','4'],
            ['PI1','4000001-4250000','3'],
            ['PI1','4250001-4500000','2'],
            ['PI1','4500001-4750000','1'],
            ['PI1','4750001-5000000','0'],
            ['PI1','<250000','19'],
            ['PI1','Tidak Berpenghasilan','20'],
            ['P01','250001-500000','18'],
            ['P01','500001-750000','17'],
            ['P01','750001-1000000','16'],
            ['P01','1000001-1250000','15'],
            ['P01','1250001-1500000','14'],
            ['P01','1500001-1750000','13'],
            ['P01','1750001-2000000','12'],
            ['P01','2000001-2250000','11'],
            ['P01','2250001-2500000','10'],
            ['P01','2500001-2750000','9'],
            ['P01','2750001-3000000','8'],
            ['P01','3000001-3250000','7'],
            ['P01','3250001-3500000','6'],
            ['P01','3500001-3750000','5'],
            ['P01','3750001-4000000','4'],
            ['P01','4000001-4250000','3'],
            ['P01','4250001-4500000','2'],
            ['P01','4500001-4750000','1'],
            ['P01','4750001-5000000','0'],
            ['P01','<250000','19'],
            ['P01','Tidak Berpenghasilan','20'],
            ['SJ1','0','10'],
            ['SJ1','150000','9'],
            ['SJ1','300000','8'],
            ['SJ1','450000','7'],
            ['SJ1','600000','6'],
            ['SJ1','750000','5'],
            ['SJ1','900000','4'],
            ['SJ1','1050000','3'],
            ['SJ1','1200000','2'],
            ['SJ1','1350000','1'],
            ['SJ1','1500000','0'],
        );

        foreach ($skors as $item) {
            $kriteria = DB::table('ref_kriterias')->select('id','kode')->where('kode', $item[0])->first();
            DB::table('ref_nilai_kriterias')->insert([
                'ref_kriterias_id' => $kriteria->id,
                'nama' => $item[1],
                'nilai' => $item[2],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
