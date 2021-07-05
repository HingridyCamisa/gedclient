<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AvisoCobrancaView extends Model
{
    
    protected $table = 'avisocobranca_view';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

     public function cliente_detale()
    {
        return $this->belongsTo('App\Cliente','cliente_token_id','token_id');
    } 
    public function scopeExpirar($query)
    {
        $expirationDate = Carbon::today()->subDays(30)->format('Y-m-d');
        $today = Carbon::today()->format('Y-m-d');
       //return $query->where('aviso_data_inicial', '>=', $expirationDate)->where('status',1);
        return $query->whereBetween('aviso_data_inicial', [$expirationDate,$today])->where('status',1);
    }
}
