<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segurado extends Model
{
    protected $fillable = ['nome_segurado','consultor_id','seguradora_id','data_nascimento','genero_segurado','morada_seguardo','contacto_segurado'];
}
