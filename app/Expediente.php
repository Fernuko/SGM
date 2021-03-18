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
        return $this->hasOne('App\Persona', 'id','actor_id');
    }

    public function demandado()
    {
        return $this->hasOne('App\Persona','id','demandado_id');
    }

    public function abogado_actor()
    {
        return $this->hasMany('App\Abogado','id','abogado_actor_id');
    }

    public function abogado_demandado()
    {
        return $this->hasMany('App\Abogado','id','abogado_demandado_id');
    }
    public function juzgado()
    {
        return $this->hasOne('App\Juzgado');
    }

    public function mediacion()
    {
        return $this->belongsTo('App\Mediacion');
    }





}
