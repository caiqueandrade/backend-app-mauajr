<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function findAll()
    {
        return response(Cliente::with('projetos')->get()->toJson(), 200);
    }

    public function findByID($id)
    {
        return response(Cliente::where('id', $id)->get()->toJson(), 200);
    }

    public function create(Request $request)
    {
        \DB::transaction(function() use($request)
        {
            $cliente = new Cliente;

            $cliente->nome = $request->input('nome');
            $cliente->cnpj = $request->input('cnpj');

            $cliente->save();
        });

        return response('Criado.', 201);
    }

    public function update(Request $request, $id)
    {
        \DB::transaction(function() use($request, $id)
        {
            $cliente = Cliente::find($id);

            $cliente->nome = $request->input('nome');
            $cliente->cnpj = $request->input('cnpj');

            $cliente->save();
        });

        return response('Atualizado.', 200);
    }

    public function remove($id)
    {
        \DB::transaction(function() use($id)
        {
            $cliente = Cliente::find($id);

            $cliente->delete();
        });

        return response('Removido.', 200);
    }
}
