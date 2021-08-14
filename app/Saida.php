<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    protected $fillable = [
        'codigoSaida',
        'valorSaida',
        'descricaoSaida',
        'dataSaida',
    ];
}
