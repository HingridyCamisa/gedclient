<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    //
    protected $table = 'comment';
    protected $guarded =array();

    public $primaryKey = 'id';

    public $timestamps=true;



}
