<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    public function run()
    {
        DB::table('areas')->insert([
            ['nome' => 'DANÇA', 'evento_id' => 1],
            ['nome' => 'AUDITÓRIO', 'evento_id' => 1],
            ['nome' => 'SALÃO DE FESTAS (AREIA)', 'evento_id' => 1],
        ]);
    }
}