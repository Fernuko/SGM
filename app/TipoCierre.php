<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCierre extends Model
{
    protected $table = 'tipo_cierres';

    protected $fillable = ['tipo_cierre'];
}
