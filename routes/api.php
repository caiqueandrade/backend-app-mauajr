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

// Usuários
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('usuarios', 'UsuarioController@findAll');
// Route::get('usuario/{id}', 'UsuarioController@findByID');
// Route::post('usuarios', 'UsuarioController@create');
// Route::put('usuarios/{id}', 'UsuarioController@update');
// Route::delete('usuarios/{id}', 'UsuarioController@remove');

// Projetos
Route::get('/projetos', 'ProjetoController@findAll');
Route::get('/projetos/{id}', 'ProjetoController@findByID');
Route::post('/projetos', 'ProjetoController@create');
Route::put('/projetos/{id}', 'ProjetoController@update');
Route::delete('/projetos/{id}', 'ProjetoController@remove');

// Tarefas
Route::get('/tarefas', 'TarefaController@findAll');
Route::get('/tarefas/{id}', 'TarefaController@findById');
Route::post('/tarefas', 'TarefaController@create');
Route::put('/tarefas/{id}', 'TarefaController@update');
Route::delete('/tarefas/{id}', 'TarefaController@remove');

// Clientes
Route::get('/clientes', 'ClienteController@findAll');
Route::get('/clientes/{id}', 'ClienteController@findByID');
Route::post('/clientes', 'ClienteController@create');
Route::put('/clientes/{id}', 'ClienteController@update');
Route::delete('/clientes/{id}', 'ClienteController@remove');

// Núcleos e Departamentos
Route::get('/nucleosDepartamentos', 'NucleoDepartamentoController@findAll');
Route::get('/nucleosDepartamentos/{id}', 'NucleoDepartamentoController@findByID');

// Faturamentos
Route::get('/faturamentos', 'FaturamentoController@findAll');
Route::get('/faturamentos/{id}', 'FaturamentoController@findByID');
Route::post('/faturamentos', 'FaturamentoController@create');

