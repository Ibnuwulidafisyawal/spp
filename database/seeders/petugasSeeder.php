<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class petugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('petugas')->insert([
            'username' => 'admin',
            'password' => bcrypt('12121212'),
            'nama_petugas' => 'admin saja',
            'level_user' => 'admin',
        ]);
    }
}
