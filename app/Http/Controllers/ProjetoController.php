<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projeto;

class ProjetoController extends Controller
{
    public function findAll()
    {
        return response(Projeto::with('faturamento')->get()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(Projeto::where('id', $id)->get()->toJson(), 200); // where or find?
    }

    public function create(Request $request)
    {
        try
        {
            $cliente = \App\Cliente::where('id', $request->input('cliente_id'))->first();

            if ($cliente === null)
            {
                return response()->json([
                    'success' => 'false',
                    'message' => 'ID do Cliente não encontrado.'
                 ], 400);
            }

            $faturamento = \App\Faturamento::where('id', $request->input('faturamento_id'))->first();

            if ($faturamento === null)
            {
                return response()->json([
                    'success' => 'false',
                    'message' => 'ID do Faturamento não encontrado.'
                 ], 400);
            }

            \DB::transaction(function() use($request, $cliente)
            {
                $projeto = new Projeto;
        
                $projeto->nome = $request->input('nome');
                $projeto->descricao = $request->input('descricao');
                $projeto->data_inicio = $request->input('data_inicio');
                $projeto->status = $request->input('status');
    
                $projeto->cliente()->associate($cliente);

                $projeto->faturamento()->associate($faturamento);
                $projeto->save();
            });
        }
        catch (\Illuminate\Database\QueryException $exception)
        {
            return response()->json([
                'success' => 'false',
                'message' => $exception->errorInfo[2]
             ], 400);
        }
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
