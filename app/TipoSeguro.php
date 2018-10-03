<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSeguro extends Model
{
    protected $fillable = ['seguradora_id','ramo'.'taxa_corretagem'];
}
