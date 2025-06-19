<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventoSeeder extends Seeder
{
    public function run()
    {
        DB::table('eventos')->insert([
            'escola_id' => 1,
            'nome' => 'Festa Junina',
            'descricao' => 'Uma tradicional festa junina com comidas típicas, quadrilha e muita diversão!',
            'data_inicio' => '2024-06-15',
            'data_final' => '2024-06-15',
            'horario_inicio' => '18:00:00',
            'horario_final' => '23:00:00',
            'telefone' => '(11) 99999-9999',
            'url_foto_evento' => 'https://exemplo.com/foto_festa_junina.jpg',
            'url_foto_evento_mesa' => 'https://exemplo.com/foto_mesa_festa_junina.jpg',
            'link_google_map' => 'https://maps.google.com/?q=escola+festa+junina',
            'link_caralogo' => 'https://exemplo.com/logo_festa_junina.png',
            'scrip_js' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}