<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = [
        'codigoEntrada',
        'valorEntrada',
        'descricaoEntrada',
        'dataEntrada',
    ];
}
