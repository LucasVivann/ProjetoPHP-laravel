<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('caixas', function (Blueprint $table) {
            $table->id();
            $table->string('data');
            $table->string('Historico');
            $table->string('valor');
            $table->string('debito_credito');
            $table->integer('conta_ID')->unique();
            $table->string('data_vcto');
            $table->string('data_baixa');
            $table->string('juros');
            $table->string('multa');
            $table->string('acrecimos');
            $table->string('descontos');
            $table->timestamps();
        });
    

    }
    public function down(): void
    {
        Schema::dropIfExists('caixas');
    }
};

