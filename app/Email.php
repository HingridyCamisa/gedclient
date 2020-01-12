<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'emails_send';

    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;
    
}
