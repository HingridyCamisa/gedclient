<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
        
    protected $table = 'ramos';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

}
