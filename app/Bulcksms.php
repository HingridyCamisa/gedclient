<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulcksms extends Model
{
    
    protected $table = 'bulcksms';

    protected $fillable = [
        'pnumber','dname','subject',
    ];
}
