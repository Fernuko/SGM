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
        'fechas',
    ];
    public function expediente()
    {
        return $this->hasOne('App\Expediente');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function tipoCierre()
    {
        return $this->belongsTo('App\TipoCierre');
    }





}
