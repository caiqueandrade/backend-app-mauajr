<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function projeto()
    {
        return $this->hasMany('App\Projeto');
    }
}
