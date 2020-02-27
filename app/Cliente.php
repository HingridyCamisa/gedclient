<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;

     public function client_country_city()
    {
        return $this->belongsTo('App\CountryCity','cliente_state_id','id');
    }

         public function clientCountryCity()
    {
        return $this->belongsTo('App\CountryCity','cliente_state_id','id');
    }


    public function pessoa_country_city()
    {
        return $this->belongsTo('App\CountryCity','pessoa_contacto_state_id','id');
    }
}

