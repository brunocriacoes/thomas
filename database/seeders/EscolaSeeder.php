<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscolaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('escolas')->insert([
            'nome' => 'Bek - Buritis Espaço Kids',
            'url_logo' => null,
            'url_arte' => null,
            'cnpj' => '12.345.678/0001-99',
            'telefone' => '(31) 99999-9999',
            'email' => 'contato@bekburitis.com.br',
            'faturamento' => null,
            'tipo_escola' => 'Infantil',
            'url_site' => 'https://bekburitis.com.br',
            'url_google_map' => 'https://maps.google.com/?q=Bek+Buritis+Espaço+Kids',
            'url_instagran' => 'https://instagram.com/bekburitis',
            'status' => true,
            'cep' => '30575-000',
            'endereco' => 'Rua das Crianças',
            'numero' => '123',
            'bairro' => 'Buritis',
            'cidade' => 'Belo Horizonte',
            'estado' => 'MG',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
