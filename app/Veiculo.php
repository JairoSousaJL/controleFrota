<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $fillable = [
        'statusVeiculo',
        'codigoVeiculo',
        'crvVeiculo',
        'renavanVeiculo',
        'placaVeiculo',
        'chassiVeiculo',
        'marcaVeiculo',
        'modeloVeiculo',
        'anoFabVeiculo',
        'anoModVeiculo',
        'corVeiculo',
        'observacaoVeiculo',
    ];

    public function venda(){
        return $this->hasOne(Venda::class, 'veiculo_id');
        //caso for apontar para outro campo que não seja a chave primaria
        //return $this->hasOne(Venda::class, 'veiculo_id', 'outro_campo);
    }
}