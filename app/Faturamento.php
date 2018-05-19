<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faturamento extends Model
{
    public function faturamento()
    {
        return $this->belongsTo('App\Projeto');
    }
}
