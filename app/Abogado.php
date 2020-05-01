<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abogado extends Model
{

    protected $table= 'abogados';

    protected $fillable = [
        'apellido',
        'nombre',
        'domicilio',
        'telefono',
        'email',
        'matricula',
    ];
}
