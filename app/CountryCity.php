<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryCity extends Model
{
    protected $table = 'uvw_country_states';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

}

