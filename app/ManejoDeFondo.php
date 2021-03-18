<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManejoDeFondo extends Model
{

    protected $table= 'manejo_de_fondos';

    protected $fillable = [
        'monto',
        'fechas',
    ];

    public function manejoEstado()
    {
        return $this->belongsTo('App\ManejoEstado');
    }

    public function manejoForma()
    {
        return $this->belongsTo('App\ManejoForma');
    }
    public function manejoCuota()
    {
        return $this->belongsTo('App\ManejoCuota');
    }

    public function mediacion()
    {
        return $this->hasOne('App\Mediacion');
    }
    public function actor()
    {
        return $this->hasOne('App\Persona');
    }


}
