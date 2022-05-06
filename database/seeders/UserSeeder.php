<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
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
        $user = User::create([
            'name' => 'Juan Emmanuel',
            'Apellidos' => 'Contreras Castillo',
            'email' => 'je_cc@outlook.es',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'tipo'=> 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $user = User::create([
            'name' => 'Juan Emmanuel',
            'Apellidos' => 'Contreras Castillo',
            'email' => '177O00285@itsx.edu.mx',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('12345678'),
            'tipo'=> 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

    }
}
