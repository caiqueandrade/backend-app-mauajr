<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;

class ProjetoController extends Controller
{
    public function findAll()
    {
        return response(Projeto::all()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(Projeto::where('id', $id)->get()->toJson(), 200); // where or find?
    }

    public function create(Request $request)
    {
        \DB::transaction(function() use($request)
        {
            $projeto = new Projeto;
    
            $projeto->nome = $request->input('nome');
            $projeto->descricao = $request->input('descricao');
            $projeto->data_inicio = $request->input('data_inicio');
            $projeto->status = $request->input('status');
    
            $projeto->save();
        });
        return response('Criado.', 201);
    }

    public function update(Request $request, $id)
    {
        \DB::transaction(function() use($request, $id)
        {
            $projeto = Projeto::find($id); 

            $projeto->nome = $request->input('nome');
            $projeto->descricao = $request->input('descricao');
            $projeto->data_inicio = $request->input('data_inicio');
            $projeto->status = $request->input('status');
    
            $projeto->save();
        });

        return response('Atualizado.', 200);
    }

    public function remove($id)
    {
        \DB::transaction(function() use($id){
            $projeto = Projeto::find($id);
            $projeto->delete();
        });
        return response('Ok.', 200);
    }
}
