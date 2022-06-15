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
            ['sta','Masih Tinggal 1 keluarga',NULL,'3'], //
            ['sta','Cerai',NULL,'6'],
            ['sta','Meninggal',NULL,'10'],
            ['sti','Masih Tinggal 1 keluarga',NULL,'3'],
            ['sti','Cerai',NULL,'6'],
            ['sti','Meninggal',NULL,'10'],
            
            ['spa','tidak sekolah',NULL,'10'],           // Tidak ada di api
            ['spa','Tamat SD',NULL,'9'],
            ['spa','Tamat SMP',NULL,'8'],
            ['spa','Tamat SMTA',NULL,'7'],
            ['spa','D1/Sederajat',NULL,'6'],
            ['spa','D2/Sederajat',NULL,'5'],
            ['spa','D3/Sederajat',NULL,'4'],
            ['spa','Sarjana (S1)',NULL,'2'],
            ['spa','Pasca Sarjana (S2)',NULL,'0'],

            ['spi','tidak sekolah',NULL,'10'],           // Tidak ada di api
            ['spi','Tamat SD',NULL,'9'],
            ['spi','Tamat SMP',NULL,'8'],
            ['spi','Tamat SMTA',NULL,'7'],
            ['spi','D1/Sederajat',NULL,'6'],             // Tidak ada di api
            ['spi','D2/Sederajat',NULL,'5'],             // Tidak ada di api
            ['spi','D3/Sederajat',NULL,'4'],             // Tidak ada di api
            ['spi','Sarjana (S1)',NULL,'2'],
            ['spi','Pasca Sarjana (S2)',NULL,'0'],

            ['ska','tidak bekerja',NULL,'10'],
            ['ska','Lain-lain',NULL,'8.3'],                // Tidak ada di api
            ['ska','Petani/Nelayan',NULL,'6.64'],
            ['ska','Wirausaha',NULL,'4.98'],             // Tidak ada di api
            ['ska','Pegawai Swasta bukan Guru/Dosen',NULL,'3.32'],        //ini di pecah dari Pegawai Swasta
            ['ska','Guru/Dosen Swasta',NULL,'3.32'],                      //ini di pecah dari Pegawai Swasta
            ['ska','Pegawai Negri bukan Guru/Dosen',NULL,'1.66'],         //ini di pecah dari PNS
            ['ska','Guru/Dosen Negeri',NULL,'1.66'],                      //ini di pecah dari PNS
            ['ska','ABRI/TNI',NULL,'1.66'],

            ['ski','tidak bekerja',NULL,'10'],
            ['ski','Lain-lain',NULL,'8.3'],
            ['ski','Petani',NULL,'6.64'],
            ['ski','Wirausaha',NULL,'4.98'],
            ['ski','Pegawai Swasta bukan Guru/Dosen',NULL,'3.32'],        //ini di pecah dari Pegawai Swasta
            ['ski','Guru/Dosen Swasta',NULL,'3.32'],                      //ini di pecah dari Pegawai Swasta
            ['ski','Pegawai Negri bukan Guru/Dosen',NULL,'1.66'],         //ini di pecah dari PNS
            ['ski','Guru/Dosen Negeri',NULL,'1.66'],                      //ini di pecah dari PNS
            ['ski','ABRI/TNI',NULL,'1.66'],

            ['sha','250001','500000','18'],
            ['sha','500001','750000','17'],
            ['sha','750001','1000000','16'],
            ['sha','1000001','1250000','15'],
            ['sha','1250001','1500000','14'],
            ['sha','1500001','1750000','13'],
            ['sha','1750001','2000000','12'],
            ['sha','2000001','2250000','11'],
            ['sha','2250001','2500000','10'],
            ['sha','2500001','2750000','9'],
            ['sha','2750001','3000000','8'],
            ['sha','3000001','3250000','7'],
            ['sha','3250001','3500000','6'],
            ['sha','3500001','3750000','5'],
            ['sha','3750001','4000000','4'],
            ['sha','4000001','4250000','3'],
            ['sha','4250001','4500000','2'],
            ['sha','4500001','4750000','1'],
            ['sha','4750001','5000000','0'],
            ['sha','0','<250000','19'],
            ['sha','-1','0','20'],

            ['shi','250001','500000','18'],
            ['shi','500001','750000','17'],
            ['shi','750001','1000000','16'],
            ['shi','1000001','1250000','15'],
            ['shi','1250001','1500000','14'],
            ['shi','1500001','1750000','13'],
            ['shi','1750001','2000000','12'],
            ['shi','2000001','2250000','11'],
            ['shi','2250001','2500000','10'],
            ['shi','2500001','2750000','9'],
            ['shi','2750001','3000000','8'],
            ['shi','3000001','3250000','7'],
            ['shi','3250001','3500000','6'],
            ['shi','3500001','3750000','5'],
            ['shi','3750001','4000000','4'],
            ['shi','4000001','4250000','3'],
            ['shi','4250001','4500000','2'],
            ['shi','4500001','4750000','1'],
            ['shi','4750001','5000000','0'],
            ['shi','0','<250000','19'],
            ['shi','-1','0','20'],

            ['sho','250001','500000','18'],
            ['sho','500001','750000','17'],
            ['sho','750001','1000000','16'],
            ['sho','1000001','1250000','15'],
            ['sho','1250001','1500000','14'],
            ['sho','1500001','1750000','13'],
            ['sho','1750001','2000000','12'],
            ['sho','2000001','2250000','11'],
            ['sho','2250001','2500000','10'],
            ['sho','2500001','2750000','9'],
            ['sho','2750001','3000000','8'],
            ['sho','3000001','3250000','7'],
            ['sho','3250001','3500000','6'],
            ['sho','3500001','3750000','5'],
            ['sho','3750001','4000000','4'],
            ['sho','4000001','4250000','3'],
            ['sho','4250001','4500000','2'],
            ['sho','4500001','4750000','1'],
            ['sho','4750001','5000000','0'],
            ['sho','0','<250000','19'],
            ['sho','-1','0','20'],

            ['skr','Rumah Sendiri',NULL,'2'],
            ['skr','menumpang',NULL,'4'],               
            ['skr','menumpang tanpa izin',NULL,'6'],    
            ['skr','sewa tahunan',NULL,'8'],            
            ['skr','sewa bulanan',NULL,'10'],           
            ['skr','tidak memiliki',NULL,'4'], 

            ['sjt','1',NULL,'1'],
            ['sjt','2',NULL,'2'],
            ['sjt','3',NULL,'3'],
            ['sjt','4',NULL,'4'],
            ['sjt','5',NULL,'5'],
            ['sjt','6',NULL,'6'],
            ['sjt','7',NULL,'7'],
            ['sjt','8',NULL,'8'],
            ['sjt','9',NULL,'9'],
            ['sjt','0',NULL,'1'],
                       
            ['skj','0',NULL,'10'],
            ['skj','150000',NULL,'9'],
            ['skj','300000',NULL,'8'],
            ['skj','450000',NULL,'7'],
            ['skj','600000',NULL,'6'],
            ['skj','750000',NULL,'5'],
            ['skj','900000',NULL,'4'],
            ['skj','1050000',NULL,'3'],
            ['skj','1200000',NULL,'2'],
            ['skj','1350000',NULL,'1'],
            ['skj','1500000',NULL,'0'],
        );

        foreach ($skors as $item) {
            $kriteria = DB::table('ref_kriterias')->select('id','kode')->where('kode', $item[0])->first();
            DB::table('ref_nilai_kriterias')->insert([
                'ref_kriterias_id' => $kriteria->id,
                'nama_awal' => strtolower($item[1]),
                'nama_akhir' => strtolower($item[2]),
                'nilai' => $item[3],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
