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

/* -------------------------------------Rotas Testes ----------------------------------- */
Route::get('/', function() {
    return view('welcome');
})->name('index');

/* -------------------------------------Rotas Login---------------------------------------- */

Route::get('/login', 'LoginController@index_login')->name('index_login');
Route::get('/calendario/cadastro', 'LoginController@create')->name('create');
Route::post('/calendario/cadastro/add', 'LoginController@login_create')->name('adicionar_user');
Route::post('/login/consultar','LoginController@login_consul')->name('consultar_user');
Route::get('/calendario/login/editar/{$id}','LoginController@editar_user')->name('editar');
Route::put('/calendario/login/update/','loginController@update')->name('update');

/* -------------------------------------Rotas Calendario----------------------------------- */

Route::get('calendario', 'AgendaController@index')->name('calendar')->middleware();
Route::post('calendario', 'AgendaController@mes')->name('mes'); //Fiz alterações
Route::post('calendario/atividade', 'AgendaController@checar_atividade')->name('checar');
Route::post('calendario/dia', 'AgendaController@dia')->name('dia');
Route::get('calendario/dados', 'AgendaController@dados')->name('dados');
Route::post('calendario/add', 'AgendaController@salvar')->name('salvar');

Route::get('calendario/atividade/{id}', 'AgendaController@deletar')->name('deletar');
Route::get('calendario/atividade/{id}/{valor}', 'AgendaController@feita')->name('feita');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('calendario/perfil', 'PerfilController@redirect')->name('perfil');

/* -------------------------------------Rotas Chat----------------------------------------- */

Route::get('/chat', 'ChatController@index')->name('chat_index');