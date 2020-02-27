<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SituacaoSeguradora extends Model
{
    
    protected $table = 'situacaoseguradora';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;



}
