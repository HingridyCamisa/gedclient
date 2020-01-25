<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recibos extends Model
{
    
    protected $table = 'recibos';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;


}
