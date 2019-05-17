<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messagebulcksms extends Model
{
    
    protected $table = 'messagebulcksms';

    protected $fillable = [
        'title','subject',
    ];
}
