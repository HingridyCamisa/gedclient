<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultor extends Model
{
    protected $fillable = ['nome_consultor','email_consultor','telefone_consultor','data_nascimento'];
}
