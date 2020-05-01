<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediacion extends Model
{

    protected $table= 'mediaciones';

    protected $fillable = [
        'número',
        'estado',
        'tipo',
        'observaciones',
    ];
}
