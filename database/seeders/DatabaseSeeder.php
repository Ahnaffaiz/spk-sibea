<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RefKriteriasSeeder::class);
        $this->call(RefNilaiKriteriasSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AhpRandomIndexSeeder::class);
    }
}
