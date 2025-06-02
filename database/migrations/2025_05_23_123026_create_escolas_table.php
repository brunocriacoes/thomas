<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('escolas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('url_logo')->nullable();
            $table->string('url_arte')->nullable();
            $table->string('cnpj')->unique();
            $table->string('telefone')->nullable();
            $table->string('email')->nullable();
            $table->decimal('faturamento', 15, 2)->nullable();
            $table->enum('tipo_escola', ['Infantil', 'Futebol', 'Futvoley', 'Jiu-Jitsu', 'Natação']);
            $table->string('url_site')->nullable();
            $table->string('url_google_map')->nullable();
            $table->string('url_instagran')->nullable();
            $table->boolean('status')->default(true);
            $table->string('cep', 9)->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado', 2)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('escolas');
    }
};
