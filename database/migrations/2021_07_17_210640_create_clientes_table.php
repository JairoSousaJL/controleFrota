<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('codigoCliente')->unique();
            $table->string('cpfCliente')->unique()->nullable();
            $table->string('rgCliente')->nullable();
            $table->string('nomeCliente');
            $table->string('telefoneCliente')->nullable();
            $table->string('celularCliente')->nullable();
            $table->string('emailCliente')->nullable();
            $table->string('estadoCliente')->nullable();
            $table->string('cidadeCliente')->nullable();
            $table->string('bairroCliente');
            $table->string('logradouroCliente');
            $table->string('numeroCliente')->nullable();
            $table->string('observacaoCliente')->nullable();
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
        Schema::dropIfExists('clientes');
    }
}
