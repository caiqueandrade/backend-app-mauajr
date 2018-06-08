<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function findAll()
    {
        // return response(Cliente::all()->toJson(), 200);
        return response(Cliente::with('projeto')->get()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(Cliente::where('id', $id)->get()->toJson(), 200);
    }

    public function create(Request $request)
    {
        try
        {
            \DB::transaction(function() use($request)
            {
                $cliente = new Cliente;
    
                $cliente->nome = $request->input('nome');
                $cliente->cnpj = $request->input('cnpj');
    
                $cliente->save();
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
        try
        {
            \DB::transaction(function() use($request, $id)
            {
                $cliente = Cliente::find($id);

                $cliente->nome = $request->input('nome');
                $cliente->cnpj = $request->input('cnpj');

                $cliente->save();
            });
        }
        catch (\Illuminate\Database\QueryException $exception)
        {
            return response()->json([
                'success' => 'false',
                'message' => $exception->errorInfo[2]
             ], 400);
        }

        return response('Atualizado.', 200);
    }

    public function remove($id)
    {
        try
        {
            \DB::transaction(function() use($id)
            {
                $cliente = Cliente::find($id);
    
                $cliente->delete();
            });
        }
        catch (\Illuminate\Database\QueryException $exception)
        {
            return response()->json([
                'success' => 'false',
                'message' => $exception->errorInfo[2]
             ], 400);
        }
        return response('Removido.', 200);
    }
}
