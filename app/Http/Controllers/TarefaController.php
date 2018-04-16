<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefaController extends Controller
{
    public function findAll() 
    {
        return Tarefa::all()->toJson();
    }

    public function findById($id) 
    {
        return Tarefa::where('id', $id)->get()->toJson();
    }

    public function create(Request $request)
    {
        \DB::transaction(function() use($request)
        {
            $tarefa = new Tarefa;

            $tarefa->titulo = $request->input('titulo');
            $tarefa->descricao = $request->input('descricao');
            $tarefa->data_inicio = $request->input('data_inicio');
            $tarefa->status = $request->input('status');

            $tarefa->save();
        });
    }
}
