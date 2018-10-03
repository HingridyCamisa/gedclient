<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcidenteTrabalho extends Model
{
    protected $fillable = ['nome_empresa','localizacao_empresa','contacto_empresa','email_empresa','volume_salarial_anual'];
}
