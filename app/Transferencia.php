<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencia extends Model
{
    protected $fillable = [
        'codigoTransferencia',
        'nomePropAtual',
        'cpfPropAtual',
        'enderecoPropAtual',
        'telefonePropAtual',
        'nomePropAntigo',
        'enderecoPropAntigo',
        'dataRecibo',
        'dataDespachante',
        'placaVeiculo',
        'renavamVeiculo',
        'modeloVeiculo',
        'valorVeiculo', 
    ];
}
