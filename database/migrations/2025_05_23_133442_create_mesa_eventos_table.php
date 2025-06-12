<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mesas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('evento_id');
            $table->string('url_foto')->nullable();
            $table->integer('quantidade_cadeiras')->default(0);
            $table->enum('localizacao', ['2°Andar', 'Térreo'])->nullable();
            $table->decimal('preco', 10, 2)->default(0.00);
            $table->enum('area', ['coberta', 'descoberta'])->nullable();
            $table->string('numero_mesa');
            $table->timestamps();

            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mesas');
    }
};
