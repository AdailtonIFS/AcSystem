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

Route::get('/', 'HomeController@index' )->name('home');
Route::get('/home', 'HomeController@index' )->name('home');

Route::resource('laboratorios', 'LabsController')->names('labs')->parameters(['laboratorios'=>'labs']);
Route::resource('usuarios', 'UserController')->names('user')->parameters(['usuarios'=>'user']);
Route::resource('categorias', 'CategoryController')->names('category')->parameters(['categorias'=>'category']);