<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::updateOrCreate([
            'name' => 'Lisa',
            'email' => 'admin@gmail.com',
            'password' => encrypt('password'),
            'is_admin' => 1
        ]);
    }
}
