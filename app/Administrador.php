<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administrador extends Authenticatable
{
    
    use Notifiable;

    protected $fillable = [
        'codigoAdministrador',
        'cpfAdministrador',
        'nomeAdministrador',
        'user',
        'password',
        'statusAdministrador', 
    ];
}
