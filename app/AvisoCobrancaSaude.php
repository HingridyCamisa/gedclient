<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoCobrancaSaude extends Model
{
    
    protected $table = 'avisocobranca';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

     public function cliente()
    {
        return $this->belongsTo('App\Cliente','cliente_token_id','token_id');
    }     
    public function Contrato()
    {
        return $this->belongsTo('App\Saude','contrato_token_id','token_id');
    }  
}
