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

    public function expedientes()
    {
        return $this->belongsTo('App\Expediente');
    }

    public function getApYNom()
    {
        return $this->apellido.", ".$this->nombre." - mat: ".$this->matricula;
    }
}
