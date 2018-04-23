<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NucleoDepartamento;

class NucleoDepartamentoController extends Controller
{
    public function findAll()
    {
        return response(NucleoDepartamento::all()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(NucleoDepartamento::where('id', $id)->get()->toJson(), 200);
    }
}
