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
            ['sta','Hidup',NULL,'3'], //
            ['sta','Cerai',NULL,'6'],
            ['sta','Meninggal',NULL,'10'],
            ['sti','Hidup',NULL,'3'],
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
            ['spa','Pasca Sarjana (S2)',NULL,'1'],

            ['spi','tidak sekolah',NULL,'10'],           // Tidak ada di api
            ['spi','Tamat SD',NULL,'9'],
            ['spi','Tamat SMP',NULL,'8'],
            ['spi','Tamat SMTA',NULL,'7'],
            ['spi','D1/Sederajat',NULL,'6'],             // Tidak ada di api
            ['spi','D2/Sederajat',NULL,'5'],             // Tidak ada di api
            ['spi','D3/Sederajat',NULL,'4'],             // Tidak ada di api
            ['spi','Sarjana (S1)',NULL,'2'],
            ['spi','Pasca Sarjana (S2)',NULL,'1'],

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
            ['ski','Petani/Nelayan',NULL,'6.64'],
            ['ski','Wirausaha',NULL,'4.98'],
            ['ski','Pegawai Swasta bukan Guru/Dosen',NULL,'3.32'],        //ini di pecah dari Pegawai Swasta
            ['ski','Guru/Dosen Swasta',NULL,'3.32'],                      //ini di pecah dari Pegawai Swasta
            ['ski','Pegawai Negri bukan Guru/Dosen',NULL,'1.66'],         //ini di pecah dari PNS
            ['ski','Guru/Dosen Negeri',NULL,'1.66'],                      //ini di pecah dari PNS
            ['ski','ABRI/TNI',NULL,'1.66'],

            ['sha','250000','500000','18'],
            ['sha','500000','750000','17'],
            ['sha','750000','1000000','16'],
            ['sha','1000000','1250000','15'],
            ['sha','1250000','1500000','14'],
            ['sha','1500000','1750000','13'],
            ['sha','1750000','2000000','12'],
            ['sha','2000000','2250000','11'],
            ['sha','2250000','2500000','10'],
            ['sha','2500000','2750000','9'],
            ['sha','2750000','3000000','8'],
            ['sha','3000000','3250000','7'],
            ['sha','3250000','3500000','6'],
            ['sha','3500000','3750000','5'],
            ['sha','3750000','4000000','4'],
            ['sha','4000000','4250000','3'],
            ['sha','4250000','4500000','2'],
            ['sha','4500000','4750000','1'],
            ['sha','4750000',NULL,'1'],
            ['sha','0','<250000','19'],

            ['shi','250000','500000','18'],
            ['shi','500000','750000','17'],
            ['shi','750000','1000000','16'],
            ['shi','1000000','1250000','15'],
            ['shi','1250000','1500000','14'],
            ['shi','1500000','1750000','13'],
            ['shi','1750000','2000000','12'],
            ['shi','2000000','2250000','11'],
            ['shi','2250000','2500000','10'],
            ['shi','2500000','2750000','9'],
            ['shi','2750000','3000000','8'],
            ['shi','3000000','3250000','7'],
            ['shi','3250000','3500000','6'],
            ['shi','3500000','3750000','5'],
            ['shi','3750000','4000000','4'],
            ['shi','4000000','4250000','3'],
            ['shi','4250000','4500000','2'],
            ['shi','4500000','4750000','1'],
            ['shi','4750000',NULL,'1'],
            ['shi','0','<250000','19'],

            ['sho','250000','500000','18'],
            ['sho','500000','750000','17'],
            ['sho','750000','1000000','16'],
            ['sho','1000000','1250000','15'],
            ['sho','1250000','1500000','14'],
            ['sho','1500000','1750000','13'],
            ['sho','1750000','2000000','12'],
            ['sho','2000000','2250000','11'],
            ['sho','2250000','2500000','10'],
            ['sho','2500000','2750000','9'],
            ['sho','2750000','3000000','8'],
            ['sho','3000000','3250000','7'],
            ['sho','3250000','3500000','6'],
            ['sho','3500000','3750000','5'],
            ['sho','3750000','4000000','4'],
            ['sho','4000000','4250000','3'],
            ['sho','4250000','4500000','2'],
            ['sho','4500000','4750000','1'],
            ['sho','4750000',NULL,'1'],
            ['sho','0','<250000','19'],

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
                       
            ['skj','0','150000','10'],
            ['skj','150000','300000','9'],
            ['skj','300000','450000','8'],
            ['skj','450000','600000','7'],
            ['skj','600000','750000','6'],
            ['skj','750000','900000','5'],
            ['skj','900000','1050000','4'],
            ['skj','1050000','1200000','3'],
            ['skj','1200000','1350000','2'],
            ['skj','1350000',1500000,'1'],
            ['skj','1500000',NULL,'1'],
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
