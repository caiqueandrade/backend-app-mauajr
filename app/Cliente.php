<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function projetos()
    {
        return $this->hasMany('App\Projeto');
    }
}
