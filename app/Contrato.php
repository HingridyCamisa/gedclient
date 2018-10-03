<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = ['nome_segurado','nome_seguradora','tipo_seguro','numero_apolice','numero_recibo','periodicidade_pagamento','data_inicio','data_proximo_pagamento','dias_cobertos','dias_proximo_pagamento','capital_seguro','premio_total','premio_simples','taxa_corretagem','comissao','item_segurado','situacao','consultor','detalhes_item_segurado','tipo_cliente','data_nascimento','genero','email_pessoa_contacto','pessoa_contacto','contacto_pessoa_contacto','ramo_negocio','endereco'];
}
