<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

    public function cliente()
    {
        return $this->belongsTo('App\Cliente','client_id','id');
    }    
    public function consultorx()
    {
        return $this->belongsTo('App\Consultor','consultor','id');
    }
    public function seguradora()
    {
        return $this->belongsTo('App\Seguradora','nome_seguradora','id');
    }
    
}
