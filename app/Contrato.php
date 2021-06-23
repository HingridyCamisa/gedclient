<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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
    
    public function ramo()
    {
        return $this->belongsTo('App\Ramo','tipo_ramo','id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

        public function scopeExpirar($query)
    {
        $expirationDate = Carbon::today()->subDays(30);
        return $query->where('data_proximo_pagamento', '>=', $expirationDate)->where('status',1);
    }
    
}
