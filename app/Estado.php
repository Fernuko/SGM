<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';

    protected $fillable = ['estado'];

    public function mediacion()
    {
        return $this->hasOne('App\Mediacion');
    }


}
