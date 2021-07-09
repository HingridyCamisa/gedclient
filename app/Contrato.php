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
        $expirationDate = Carbon::today()->subDays(30)->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        return $query->whereBetween('data_proximo_pagamento', [$expirationDate,$today])->where('status',1);
    }
        public function scopeExpirarEsteMes($query)
    {
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        return $query->where("prospecaos.status",1)
                    ->whereBetween('data_proximo_pagamento',[$start,$end]);
    }
}
