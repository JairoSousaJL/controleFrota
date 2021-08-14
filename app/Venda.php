<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $fillable = [
        'codigoVenda',
        'veiculo_id',
        'cliente_id',
        'valorVenda',
        'dataVenda',
        'observacaoVenda',
    ];
}
