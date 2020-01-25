<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AvisoCobrancaRecibosView extends Model
{
    
    protected $table = 'avisocobrancarecibo_view';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;


}
