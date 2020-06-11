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

Route::get('/endereco', 'EnderecoController@index')->name('endereco');
Route::get('/endereco/novo', 'EnderecoController@create')->name('endereco.novo');
Route::get('/endereco/editar/{id}', 'EnderecoController@edit')->name('endereco.editar');
Route::post('/endereco/{id}', 'EnderecoController@update');
Route::post('/endereco', 'EnderecoController@store');

Route::get('/cursos', 'FormacaoController@index')->name('cursos');
Route::get('/curso/novo', 'FormacaoController@create')->name('curso.novo');
Route::get('/curso/editar/{id}', 'FormacaoController@edit')->name('curso.editar');
Route::get('/curso/{id}', 'FormacaoController@show')->name('curso');
Route::post('/curso/{id}', 'FormacaoController@update');
Route::post('/curso', 'FormacaoController@store');
Route::get('/curso/excluir/{id}', 'FormacaoController@destroy')->name('curso.excluir');

Route::get('/experiencias', 'ExperienciaController@index')->name('experiencias');
Route::get('/experiencia/novo', 'ExperienciaController@create')->name('experiencia.novo');
Route::get('/experiencia/editar/{id}', 'ExperienciaController@edit')->name('experiencia.editar');
Route::post('/experiencia/{id}', 'ExperienciaController@update');
Route::post('/experiencia', 'ExperienciaController@store');
Route::get('/experiencia/excluir/{id}', 'ExperienciaController@destroy')->name('experiencia.excluir');

Route::get('/idiomas', 'IdiomaController@index')->name('idiomas');
Route::get('/idioma/novo', 'IdiomaController@create')->name('idioma.novo');
Route::get('/idioma/editar/{id}', 'IdiomaController@edit')->name('idioma.editar');
Route::get('/idioma/{id}', 'IdiomaController@show')->name('idioma');
Route::post('/idioma/{id}', 'IdiomaController@update');
Route::post('/idioma', 'IdiomaController@store');
Route::get('/idioma/excluir/{id}', 'IdiomaController@destroy')->name('idioma.excluir');


Route::get('/curriculos', 'CurriculosController@index')->name('curriculos');

Route::get('/curriculo/vagas', 'VagaController@index')->name('curriculo.vagas');
