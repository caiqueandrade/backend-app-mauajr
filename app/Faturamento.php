<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faturamento extends Model
{
    public function projeto()
    {
        return $this->belongsTo('App\Projeto');
    }
}
