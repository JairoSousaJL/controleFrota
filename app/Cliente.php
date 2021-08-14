<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    

    protected $fillable = [
        'codigoCliente',
        'cpfCliente',
        'rgCliente',
        'nomeCliente',
        'telefoneCliente',
        'celularCliente',
        'emailCliente',
        'estadoCliente',
        'cidadeCliente',
        'bairroCliente',
        'logradouroCliente',
        'numeroCliente',
        'observacaoCliente',
    ];

    public function venda(){
        return $this->hasOne(Venda::class, 'cliente_id');
    }
}
