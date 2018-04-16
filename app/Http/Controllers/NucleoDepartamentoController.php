<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NucleoDepartamento;

class NucleoDepartamentoController extends Controller
{
    public function findAll(){
        return NucleoDepartamento::all()->toJson();
    }
}
