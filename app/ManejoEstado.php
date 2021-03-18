<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManejoEstado extends Model
{
    protected $table = 'manejo_estados';

    protected $fillable = ['manejo_estado'];

    public function manejoDeFondo()
    {
        return $this->hasOne('App\ManejoDeFondo');
    }


}
