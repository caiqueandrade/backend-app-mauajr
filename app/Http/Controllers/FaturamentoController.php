<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faturamento;

class FaturamentoController extends Controller
{
    public function findAll()
    {
        // return response(Faturamento::all()->toJson(), 200);
        return response(Faturamento::with('projeto')->get()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(Faturamento::where('id', $id)->get()->toJson(), 200);
    }

    public function create(Request $request)
    {
        try
        {
            \DB::transaction(function() use($request)
            {
                $faturamento = new Faturamento;
    
                $faturamento->valor = $request->input('valor');
                $faturamento->data_pagamento = $request->input('data_pagamento');
    
                $faturamento->save();
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
}
