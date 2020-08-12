<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/servicos/listar', 'ServicoController@listar')->name('servico.listar');

Route::get('/generos/listar/{servico_id}', 'GeneroController@listar_por_servico')->name('genero.listar.servico');

Route::get('/categorias/listar', 'CategoriaController@listar')->name('categoria.listar');
Route::get('/categorias/listar/{servico_id}', 'CategoriaController@listar_por_servico')->name('categoria.listar.servico');

Route::post('/conteudo/store', 'ConteudoController@store')->name('conteudo.store');
Route::get('/conteudos/listar', 'ConteudoController@listar')->name('conteudo.listar');

Route::get('/funcionarios/listar', 'FuncionarioController@listar')->name('funcionario.listar');

Route::get('/clientes/listar', 'ClienteController@listar')->name('cliente.listar');

Route::get('/grupos/listar', 'GrupoController@listar')->name('grupo.listar');

Route::get('/permissoess/listar/{grupo_id}', 'PermissaoController@listar_por_grupo')->name('permissao.listar.grupo');