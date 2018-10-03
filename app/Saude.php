<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saude extends Model
{
    protected $fillable = ['grupo_saude','plano_saude','numero_membro','modo_pagamento','tipo_membro','data_nascimento','idade','premio_mensal','numero_dependentes'];
}
