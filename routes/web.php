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

Route::get('/', function () {
    return view('principal');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/curriculo', 'CurriculoController@index')->name('curriculo.dados');
Route::get('/curriculo/dados', 'CurriculoController@create')->name('curriculo.novo');
Route::get('/curriculo/editar/{id}', 'CurriculoController@edit')->name('curriculo.editar');
Route::post('/curriculo/{id}', 'CurriculoController@update');
Route::post('/curriculo', 'CurriculoController@store');

Route::get('/curriculos', 'CurriculosController@index')->name('curriculos');

Route::get('/curriculo/vagas', 'VagaController@index')->name('curriculo.vagas');
