<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OlimpiadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('olimpiade')->insert([
            'nama' => 'Rio Alerta',
            'jenis_kelamin' => 'Laki-laki',
            'olimpiade' => 'Bulutangkis',
            'negara' => 'Indonesia',
        ]);
    }
}
