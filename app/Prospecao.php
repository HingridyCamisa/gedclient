<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecao extends Model
{
    protected $fillable = ['nome_cliente', 'nome_consultor','endereco_cliente','contacto_cliente','email_cliente','data_inicio','data_prevista_fim','tipo_prospecao','origem_prospecao','valor_estipulado_carteira','detalhes_prospecao','estado'];
}
