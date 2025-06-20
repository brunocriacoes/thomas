<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlunoSeeder extends Seeder
{
    public function run()
    {
        DB::table('alunos')->insert([
            [
                'nome' => 'Ana Silva',
                'genero' => 'feminino',
                'data_de_nascimento' => '2010-05-12',
                'cep' => '12345-678',
                'rua' => 'Rua das Flores',
                'numero' => '100',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'nacionalidade' => 'Brasileira',
                'cpf' => '123.456.789-00',
                'rg' => 'MG-12.345.678',
                'plano_de_saude' => 'Unimed',
                'quem_pode_buscar' => null,
                'alergias' => 'Nenhuma',
                'foto' => null,
                'observacao' => 'Aluno destaque',
                'escola_id' => 1,
                'status' => 'ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Bruno Souza',
                'genero' => 'masculino',
                'data_de_nascimento' => '2011-08-23',
                'cep' => '23456-789',
                'rua' => 'Avenida Central',
                'numero' => '200',
                'cidade' => 'Rio de Janeiro',
                'estado' => 'RJ',
                'nacionalidade' => 'Brasileiro',
                'cpf' => '987.654.321-00',
                'rg' => 'RJ-98.765.432',
                'plano_de_saude' => null,
                'quem_pode_buscar' => null,
                'alergias' => 'Lactose',
                'foto' => null,
                'observacao' => null,
                'escola_id' => 1,
                'status' => 'ativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Carlos Pereira',
                'genero' => 'outro',
                'data_de_nascimento' => '2009-12-01',
                'cep' => '34567-890',
                'rua' => 'Travessa da Paz',
                'numero' => '300A',
                'cidade' => 'Belo Horizonte',
                'estado' => 'MG',
                'nacionalidade' => null,
                'cpf' => '321.654.987-00',
                'rg' => null,
                'plano_de_saude' => 'Amil',
                'quem_pode_buscar' => null,
                'alergias' => null,
                'foto' => null,
                'observacao' => 'Necessita atenção especial',
                'escola_id' => 1,
                'status' => 'inativo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
