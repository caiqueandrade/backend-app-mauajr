<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Tarefas
Route::get('/tarefas', 'TarefaController@findAll');
Route::get('/tarefas/{id}', 'TarefaController@findById');
Route::post('/tarefas', 'TarefaController@create');

// Núcleos e Departamentos
Route::get('/nucleosDepartamentos', 'NucleoDepartamentoController@findAll');

// Projetos
Route::get('/projetos', 'ProjetoController@findAll');

// Clientes
Route::get('/clientes', 'ClienteController@findAll');