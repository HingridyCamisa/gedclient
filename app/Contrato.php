<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;
    
}
