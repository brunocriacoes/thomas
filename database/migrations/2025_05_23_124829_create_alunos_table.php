<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{

    public function up(): void
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->enum('genero', ['masculino', 'feminino', 'outro']);
            $table->date('data_de_nascimento');

            $table->string('cep', 9);
            $table->string('rua');
            $table->string('numero', 10);
            $table->string('cidade');
            $table->string('estado', 2);
            $table->string('nacionalidade')->nullable();

            $table->string('cpf', 14)->unique();
            $table->string('rg', 20)->nullable();

            $table->string('plano_de_saude')->nullable();

            $table->unsignedBigInteger('quem_pode_buscar')->nullable();
            $table->foreign('quem_pode_buscar')->references('id')->on('users')->nullOnDelete();

            $table->text('alergias')->nullable();
            $table->string('foto')->nullable();
            $table->text('observacao')->nullable();

            $table->unsignedBigInteger('escola_id')->nullable();
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('set null');

            $table->enum('status', ['ativo', 'inativo'])->default('ativo');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
