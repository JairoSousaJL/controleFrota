<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('veiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoVeiculo')->nullable();
            $table->string('statusVeiculo');
            $table->string('crvVeiculo')->nullable();
            $table->string('renavanVeiculo')->nullable();
            $table->string('placaVeiculo');
            $table->string('chassiVeiculo')->nullable();
            $table->string('marcaVeiculo')->nullable();
            $table->string('modeloVeiculo');
            $table->string('anoFabVeiculo')->nullable();
            $table->string('anoModVeiculo')->nullable();
            $table->string('corVeiculo')->nullable();
            $table->string('observacaoVeiculo')->nullable();
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
        Schema::dropIfExists('veiculos');
    }
}
