<?php

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

// Calendário
Route::get('calendario', 'AgendaController@index')->name('calendar')->middleware();
Route::get('calendario/mes/{mes}', 'AgendaController@mes')->name('mes');
// View Atividade
Route::get('calendario/dia', 'AgendaController@entrar')->name('entrar');
Route::get('calendario/escolher/{data}', 'AgendaController@checar_atividade')->name('checar');
// Adicionar Tarefa
Route::get('calendario/tarefa', 'AgendaController@tarefa')->name('tarefa');
Route::post('calendario/add', 'AgendaController@salvar')->name('salvar');
// Feita
Route::get('calendario/fazer/{id}.{status}', 'AgendaController@fazer')->name('fazer');
// Deletar
Route::get('calendario/deletar/{id}', 'AgendaController@deletar')->name('deletar');

// Feriados
Route::get('/feriados', function() {return view('feriados.feriados');} );
Route::post('/feriados/add/', 'DataController@add_data')->name('add_data');
Route::get('feriados/view', 'DataController@exibir')->name('exibir_feriados');

// Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('calendario/perfil', 'PerfilController@redirect')->name('perfil');

/* -------------------------------------Rotas Chat----------------------------------------- */
Route::get('/assistente', 'AssistentController@index_pergunta')->name('assistente');
Route::post('/assistente/resposta', 'AssistentController@pesquisa')->name('pesquisa');

Route::get('/test', function() {
    return view('assistente.test');
});