<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedaliSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('medalis')->insert([
            'Indonesia' => '{{$indonesiaemas}}',
            'Malaysia' => '{{$malaysiaemas}}',
            'Singapura' => '{{$singapuraemas}}',
            'Thailand' => '{{$thailandemas}}',
        ]);
    }
}
