<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManejoForma extends Model
{
    protected $table = 'manejo_formas';

    protected $fillable = ['manejo_forma'];

    public function manejoDeFondo()
    {
        return $this->hasOne('App\ManejoDeFondo');
    }


}
