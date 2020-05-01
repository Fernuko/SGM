<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juzgado extends Model
{
    protected $table= 'juzgados';

    protected $fillable = [
        'nombre',
        'telefono',
    ];
}
