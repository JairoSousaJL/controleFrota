<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigoTransferencia');
            $table->string('nomePropAtual')->nullable();
            $table->string('cpfPropAtual')->nullable();
            $table->string('enderecoPropAtual')->nullable();
            $table->string('telefonePropAtual')->nullable();
            $table->string('nomePropAntigo')->nullable();
            $table->string('enderecoPropAntigo')->nullable();
            $table->date('dataRecibo')->nullable();
            $table->date('dataDespachante');
            $table->string('placaVeiculo');
            $table->string('renavamVeiculo')->nullable();
            $table->string('modeloVeiculo')->nullable();
            $table->float('valorVeiculo')->nullable();
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
        Schema::dropIfExists('transferencias');
    }
}
