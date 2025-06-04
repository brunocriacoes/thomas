<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensalidadesTable extends Migration
{

    public function up(): void
    {
        Schema::create('mensalidades', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('escola_id');

            $table->decimal('valor', 10, 2);

            $table->text('observacao')->nullable();

            $table->unsignedTinyInteger('dia_pagamento');

            $table->timestamps();

            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mensalidades');
    }
}
