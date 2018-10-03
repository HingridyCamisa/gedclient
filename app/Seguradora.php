<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguradora extends Model
{
    protected $fillable = ['nome_seguradora','endereco_seguradora','contacto_seguradora','email_seguradora','tipo_seguro'];
}
