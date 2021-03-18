<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManejoCuota extends Model
{
    protected $table = 'manejo_cuotas';

    protected $fillable = ['manejo_cuota'];

    public function manejoDeFondo()
    {
        return $this->hasOne('App\Mediacion');
    }



}
