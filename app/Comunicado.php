<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $fillable = [
        'codigoComunicado',
        'nomeComprador',
        'nomeVendedor',
        'placaVeiculo',
        'modeloVeiculo',
        'dataRecibo',
        'dataEnvio',
    ];
}
