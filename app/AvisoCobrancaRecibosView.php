<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoCobrancaRecibosView extends Model
{
    
    protected $table = 'avisocobrancarecibo_view';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;


     public function cliente_detale()
    {
        return $this->belongsTo('App\Cliente','cliente_token_id','token_id');
    } 
}
