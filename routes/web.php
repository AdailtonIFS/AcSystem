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
Route::get('/', 'ViewController@showLogin')->name('login');
Route::post('/login/todo', 'Auth\LoginController@Login')->name('login.todo');


Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
Route::group(['middleware' => 'auth', 'prefix' => 'usuarios'], function () {
    // Busca os usuários.
    Route::get('/', 'UsersController@index')->name('users.index');
    // Busca a view para cadastrar um usuário.
    Route::get('/cadastrar', 'UsersController@create')->name('users.create');
    // Cadastra um usuário
    Route::post('/', 'UsersController@store')->name('users.store');
    // Busca um usuário especifico
    Route::get('/{user}', 'UsersController@show')->name('users.show');
    // Busca a view para editar um usuário.
    Route::get('/{user}/editar', 'UsersController@edit')->name('users.edit');
    // Edita um usuário.
    Route::put('/{user}', 'UsersController@update')->name('users.update');
    // Delete um usuário
    Route::get('/{user}/excluir', 'UsersController@delete')->name('users.delete');
    // Busca a view para deletar um usuário.
    Route::delete('/{user}', 'UsersController@destroy')->name('users.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'categorias'], function () {
    // Busca as categorias.
    Route::get('/', 'CategoriesController@index')->name('categories.index');
    // Busca a view para cadastrar uma categoria.
    Route::get('/cadastrar', 'CategoriesController@create')->name('categories.create');
    // Cadastra um categoria
    Route::post('/', 'CategoriesController@store')->name('categories.store');
    // Busca um categoria especifico
    Route::get('/{category}', 'CategoriesController@show')->name('categories.show');
    // Busca a view para editar um categoria.
    Route::get('/{category}/editar', 'CategoriesController@edit')->name('categories.edit');
    // Edita um categoria.
    Route::put('/{category}', 'CategoriesController@update')->name('categories.update');
    // Busca a view para deletar um categoria.
    Route::get('/{category}/excluir', 'CategoriesController@delete')->name('categories.delete');
    // Deleta uma categoria.
    Route::delete('/{category}', 'CategoriesController@destroy')->name('categories.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'ocorrencias'], function () {
    // Busca as ocorrências.
    Route::get('/', 'OccurrencesController@index')->name('occurrences.index');
    // Busca a view para cadastrar um ocorrência.
    Route::get('/cadastrar', 'OccurrencesController@create')->name('occurrences.create');
    // Cadastra uma ocorrência
    Route::post('/', 'OccurrencesController@store')->name('occurrences.store');
    // Busca uma ocorrência especifico
    Route::get('/{occurrence}', 'OccurrencesController@show')->name('occurrences.show');
    // Busca a view para editar uma ocorrência.
    Route::get('/editar/{occurrence}', 'OccurrencesController@edit')->name('occurrences.edit');
    // Edita uma ocorrência.
    Route::put('/{occurrence}', 'OccurrencesController@update')->name('occurrences.update');
    // Retorna a view de para deletar uma ocorrência
    Route::get('/deletar/{occurrence}', 'OccurrencesController@delete')->name('occurrences.delete');
    // Deleta uma ocorrência.
    Route::delete('/{occurrence}', 'OccurrencesController@destroy')->name('occurrences.destroy');

});
Route::group(['middleware' => 'auth', 'prefix' => 'relatorios'], function () {
    Route::get('/', 'RelatorioController@index')->name('relatorio.index');
    Route::post('/', 'RelatorioController@store')->name('relatorio.store');
    Route::get('/{relatorio}', 'RelatorioController@show')->name('relatorio.show');
});


Route::group(['middleware' => 'auth', 'prefix' => 'laboratorios'], function () {
    // Busca os laboratórios.
    Route::get('/', 'LabsController@index')->name('labs.index');
    // Busca a view para cadastrar um laboratório.
    Route::get('/cadastrar', 'LabsController@create')->name('labs.create');
    // Cadastra um laboratório
    Route::post('/', 'LabsController@store')->name('labs.store');
    // Busca um laboratório especifico
    Route::get('/{labs}', 'LabsController@show')->name('labs.show');
    // Busca a view para editar um laboratório.
    Route::get('/{labs}/editar', 'LabsController@edit')->name('labs.edit');
    // Edita um laboratório.
    Route::put('/{labs}', 'LabsController@update')->name('labs.update');
    // Busca a view que delete um laboratório
    Route::get('/{labs}/excluir', 'LabsController@delete')->name('labs.delete');
    // Delete um laboratório
    Route::delete('/{labs}', 'LabsController@destroy')->name('labs.destroy');
});

Route::group(['middleware' => 'auth', 'prefix' => 'horarios'], function () {
    // Busca os horários.
    Route::get('/', 'SchedulesController@index')->name('schedules.index');
    Route::get('/cadastrar', 'SchedulesController@create')->name('schedules.create');
    Route::post('/', 'SchedulesController@store')->name('schedules.store');
    Route::get('/{schedule}', 'SchedulesController@edit')->name('schedules.edit');
    Route::put('/{schedule}', 'SchedulesController@update')->name('schedules.update');

});
