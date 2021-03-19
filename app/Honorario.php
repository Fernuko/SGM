<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honorario extends Model
{
    protected $table = 'honorarios';

    protected $fillable = [
        'mediacion_id',
        'beneficio_actor',
        'beneficio_demandado',
        'fecha_pago_actor',
        'fecha_pago_demandado',
        'monto_actor',
        'monto_demandado',
    ];

    protected $cast = [
        'beneficio_actor' => 'boolean',
        'beneficio_demandado' => 'boolean',
    ];



    public function mediacion()
    {
        return $this->belongsTo('App\Mediacion');
    }




}
