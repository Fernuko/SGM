<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mediacion extends Model
{

    protected $table= 'mediaciones';

    protected $fillable = [
        'numero',
        'estado',
        'tipo_cierre_id',
        'observaciones',
        'fecha',
        'expediente_id',
    ];
    public function expediente()
    {
        return $this->belongsTo('App\Expediente');
    }

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function tipoCierre()
    {
        return $this->belongsTo('App\TipoCierre');
    }

    public function honorario()
    {
        return $this->hasOne('App\Honorario');
    }





}
