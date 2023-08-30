<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Sa',
            'email' => 'sa@gmail.com',
            'password' => Hash::make('sa'),
            'is_admin' => 1
        ]);
    }
}
