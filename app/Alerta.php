<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alerta extends Model
{
    protected $fillable = [
        'descricao','id_empresas','prioridade','username'
    ];
}
