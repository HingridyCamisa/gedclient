<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;
}

