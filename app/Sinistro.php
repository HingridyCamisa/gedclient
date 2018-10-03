<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sinistro extends Model
{
    protected $fillable = ['sinistro','seguradora','numero_apolice','nome_segurado','data_sinistro','data_participacao_almond','data_participacao_seguradora','situacao','data_pagamento','numero_dias','valor_sinistro','valor_pago_seguradora','franquia','valor_franquia','detalhes','consultor'];
}
