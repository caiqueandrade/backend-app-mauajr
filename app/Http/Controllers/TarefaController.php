<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefaController extends Controller
{
    public function findAll() 
    {
        return response(Tarefa::all()->toJson(), 200);
    }

    public function findById($id) 
    {
        return response(Tarefa::where('id', $id)->get()->toJson(), 200);
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

        return response('Criado.', 201);
    }

    public function update(Request $request, $id)
    {
        \DB::transaction(function() use($request, $id)
        {
            $tarefa = Tarefa::find($id);

            $tarefa->titulo = $request->input('titulo');
            $tarefa->descricao = $request->input('descricao');
            $tarefa->data_inicio = $request->input('data_inicio');
            $tarefa->status = $request->input('status');

            $tarefa->save();
        });

        return response('Atualizado.', 200);
    }

    public function remove($id)
    {
        \DB::transaction(function() use($id){
            $tarefa = Tarefa::find($id);
            $tarefa->delete();
        });
        return response('Removido.', 200);
    }
}
