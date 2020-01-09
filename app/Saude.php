<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saude extends Model
{
    protected $fillable = ['nome_segurado','data_nascimento','idade','ano_nascimento','contacto','email','tipo_segurado','pessoa_contacto','email_pessoa_contacto','contacto_pessoa_contacto','seguradora','plano','nome_grupo','tipo_membro','numero_membro','data_inicio_cobertura','data_fim_cobertura','periodicidade_pagamento','premio_mensal','taxa_corretagem','comissao','situacao'];
}
