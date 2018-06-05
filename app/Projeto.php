<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function faturamento()
    {
        return $this->hasOne('App\Faturamento');
    }

    public function users()
    {
        return $this->hasMany('');
    }
}
