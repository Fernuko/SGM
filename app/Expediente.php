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


    public function actor()
    {
        return $this->belongsTo('App\Persona','actor_id');
    }

    public function demandado()
    {
        return $this->belongsTo('App\Persona','demandado_id');
    }

    public function abogado_actor()
    {
        return $this->belongsTo('App\Abogado','abogado_actor_id');
    }

    public function abogado_demandado()
    {
        return $this->belongsTo('App\Abogado','abogado_demandado_id');
    }
    public function juzgado()
    {
        return $this->belongsTo('App\Juzgado');
    }

    public function mediacion()
    {
        return $this->hasOne('App\Mediacion');
    }





}
