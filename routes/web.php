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
Route::post('calendario', 'AgendaController@mes')->name('mes');
// View Atividade
Route::get('calendario/atividade', function() {return redirect('calendario');} );
Route::post('calendario/atividade', 'AgendaController@checar_atividade')->name('checar');
// Adicionar Tarefa
Route::get('calendario/tarefa', function() {return redirect('calendario');} );
Route::post('calendario/tarefa', 'AgendaController@dia')->name('dia');
Route::post('calendario/add', 'AgendaController@salvar')->name('salvar');
// View Dados
Route::get('calendario/dados', 'AgendaController@dados')->name('dados');
// Feita
Route::get('calendario/feita', function() {return redirect('calendario');} );
Route::post('calendario/feita', 'AgendaController@fazer')->name('fazer');
// Deletar
Route::get('calendario/delete', function() {return redirect('calendario');} );
Route::post('calendario/delete', 'AgendaController@deletar')->name('deletar');

// Feriados
Route::get('/feriados', function() {return view('agenda.feriados');} );
Route::post('/feriados/add/', 'DataController@add_data')->name('add_data');

// Auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('calendario/perfil', 'PerfilController@redirect')->name('perfil');

/* -------------------------------------Rotas Chat----------------------------------------- */
Route::get('/assistente', 'AssistentController@index_pergunta')->name('assistente');