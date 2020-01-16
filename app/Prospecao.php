<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospecao extends Model
{
    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

        public function cliente()
    {
        return $this->belongsTo('App\Cliente','client_id','id');
    }
        public function consultor()
    {
        return $this->belongsTo('App\Consultor','nome_consultor','id');
    }
}
