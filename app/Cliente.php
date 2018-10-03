<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome_cliente','endereco_cliente','contacto_cliente','email_cliente','tipo_cliente','pessoa_contacto'];
}

