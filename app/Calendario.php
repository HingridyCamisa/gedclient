<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $fillable = ['titulo','data_inicio','data_final'];
}
