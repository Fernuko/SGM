<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{

    protected $table= 'expedientes';

    protected $fillable = [
        'caratula',
        'número de expediente',
    ];
}
