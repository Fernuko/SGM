<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table= 'personas';

    protected $fillable = [
        'apellido',
        'nombre',
        'dni',
        'domicilio',
        'telefono',
    ];

    public function expedientes()
    {
        $this->belongsTo('App\Expediente');
    }

    public function getApyNom()
    {
        return $this->apellido.", ".$this->nombre;
    }

}
