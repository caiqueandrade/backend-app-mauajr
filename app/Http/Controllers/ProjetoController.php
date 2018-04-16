<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;

class ProjetoController extends Controller
{
    public function findAll(){
        return Projeto::all()->toJson();
    }
}
