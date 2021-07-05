<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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

    
        public function scopeExpirar($query)
    {
        $expirationDate = Carbon::today()->subDays(30)->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
        return $query->whereBetween('data_prevista_fim', [$expirationDate,$today])->where('status',1);
    }
}
