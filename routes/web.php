<?php

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

Route::get('/', 'HomeController@landingPage');
Route::get('/home', 'HomeController@landingPage');

Route::get('/cadastro', 'Auth\RegisterController@criarTelaCadastro');
Route::get('/login', 'Auth\RegisterController@telaLogin')->name('login');
Route::post('/login', 'Auth\LoginController@realizarLogin');


Route::post('/cadastrar', 'Auth\RegisterController@criarUsuario');
Route::get('/logout', 'Auth\LoginController@realizerLogout');

Route::post('/reenviar-senha', 'Auth\LoginController@reenviarSenha');
Route::get('/reenviar-senha', 'Auth\LoginController@reenviarSenhaForm');

Route::post('/atualizar', 'UserController@atualizarDados');
Route::get('/atualizar', 'UserController@atualizarDadosForm');

Route::get('/topfilmes', 'FilmesController@listarFilmes')->middleware('auth');
Route::post('/cadastrar-filme', 'FilmesController@cadastrarFilme')->middleware('auth');
Route::get('/votar/{id}', 'FilmesController@votarFilme')->middleware('auth');
Route::get('/deletar/{id}', 'FilmesController@deletarFilme')->middleware('auth');
