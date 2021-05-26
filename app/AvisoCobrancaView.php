<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
