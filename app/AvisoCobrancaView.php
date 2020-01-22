<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoCobrancaView extends Model
{
    
    protected $table = 'avisocobranca_view';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;


}
