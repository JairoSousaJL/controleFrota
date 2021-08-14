<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunicadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comunicados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoComunicado')->nullable();
            $table->string('nomeComprador')->nullable();
            $table->string('nomeVendedor')->nullable();
            $table->string('placaVeiculo');
            $table->string('modeloVeiculo')->nullable();
            $table->date('dataRecibo');
            $table->date('dataEnvio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comunicados');
    }
}
