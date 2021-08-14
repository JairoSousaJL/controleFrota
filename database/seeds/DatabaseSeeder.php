<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administradors')->insert([
            'codigoAdministrador' => '1673',
            'nomeAdministrador' => 'JAIRO',
            'cpfAdministrador' => '08081048618',
            'user' => '08081048618',
            'password' => Hash::make('12345678'),
            'statusAdministrador' => true,
        ]);
    }
}
