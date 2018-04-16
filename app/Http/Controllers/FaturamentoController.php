<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faturamento;

class FaturamentoController extends Controller
{
    public function findAll(){
        return Faturamento::all()->toJson();
    }
}
