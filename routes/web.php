<?php

use App\Mail\userRegisteredMail;
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
Route::get('/laboratorios','ViewController@adminLabs')->name('view.labs');
Route::get('/categorias','ViewController@adminCategories')->name('view.category');
Route::get('/usuarios','ViewController@adminUsers')->name('view.users');
Route::get('/email', function(){

        return new userRegisteredMail();
});
