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

//Route::get('/', function () {
//    return view('principal');
//});
Route::get('/', 'VagaController@indexPrincipal');

Auth::routes();
Route::get('/get-instituicoes/{id}','FormacaoController@getInstituicoes');
Route::get('/get-cidades','HomeController@getiCidadesvazias');
Route::get('/get-cidades/{estado}','HomeController@getiCidades');
Route::get('/get-cpfexistepertence/{id}','CurriculoController@cpf_existe_pertence_user');
Route::get('/get-cpfexisteNpertenceuser/{cpf}','CurriculoController@cpf_existe_nao_pertence_user');
Route::get('/get-pegarcpf/{cpf}','CurriculoController@pegat_curriculo_cpf');
Route::get('/get-cidadesmodal/{id}','CurriculosController@getCidadesModal');





Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::group(['prefix'=>'admins'], function(){
	Route::get('/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admins.showResetForm');
	Route::get('/resetemail/{user_type}', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admins.showResetEmailForm');
	Route::post('/reset', 'Auth\ResetPasswordController@reset')->name('admins.password.update');
});

Route::get('/curriculo', 'CurriculoController@index')->name('curriculo.dados');
Route::get('/curriculo/dados', 'CurriculoController@create')->name('curriculo.novo');
Route::get('/curriculo/editar/{id}', 'CurriculoController@edit')->name('curriculo.editar');
Route::post('/curriculo/{id}', 'CurriculoController@update');
Route::post('/curriculo', 'CurriculoController@store');
Route::get('/getidcurriculo/{id}', 'CurriculoController@idcurriculo');


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

Route::get('/habilidades', 'HabilidadeController@index')->name('habilidades');
Route::get('/habilidade/novo', 'HabilidadeController@create')->name('habilidade.novo');
Route::get('/habilidade/editar/{id}', 'HabilidadeController@edit')->name('habilidade.editar');
Route::get('/habilidade/{id}', 'HabilidadeController@show')->name('habilidade');
Route::post('/habilidade/{id}', 'HabilidadeController@update');
Route::post('/habilidade', 'HabilidadeController@store');
Route::get('/habilidade/excluir/{id}', 'HabilidadeController@destroy')->name('habilidade.excluir');

Route::get('/redessociais', 'RedesocialController@index')->name('redessociais');
Route::get('/redesocial/novo', 'RedesocialController@create')->name('redesocial.novo');
Route::get('/redesocial/editar/{id}', 'RedesocialController@edit')->name('redesocial.editar');
Route::get('/redesocial/{id}', 'RedesocialController@show')->name('redesocial');
Route::post('/redesocial/{id}', 'RedesocialController@update');
Route::post('/redesocial', 'RedesocialController@store');
Route::get('/redesocial/excluir/{id}', 'RedesocialController@destroy')->name('redesocial.excluir');

Route::get('/emailsuporte', 'EmailsuporteController@index')->name('contatosuporte');
Route::post('/emailsuporte/enviar', 'EmailsuporteController@enviar')->name('enviaremail');

Route::get('/vagas', 'VagaController@index')->name('vagas');
Route::get('/minhasvagas', 'VagaController@minhasvagas')->name('minhasvagas');
Route::get('/vaga/{id}', 'VagaController@show');
Route::get('/vaga/principal/{id}', 'VagaController@showPrincipal');
Route::get('/vaga/candidatar/{id}', 'VagaController@candidatar');


Route::get('/exibirCurriculo/{id}', 'CurriculoController@show')->name('exibirCurriculo');
Route::get('/imprimirCurriculo/{id}','CurriculoController@gerarPdf')->name('imprimirCurriculo');


/*--------------------------------------------------------------------------------------
Rotas do admin
--------------------------------------------------------------------------------------*/

Route::get('/novavaga', 'VagasController@create')->name('vaga.novo');
Route::post('/salvarvaga', 'VagasController@store')->name('vaga.salvar');
Route::get('/editarvaga/{id}', 'VagasController@edit')->name('vaga.editar');
Route::post('/vaga/{id}', 'VagasController@update');
Route::post('/editarObs', 'VagasController@updateObservacao');
Route::get('/detalhes/{id}', 'VagasController@show');
Route::get('/excluirvaga/{id}', 'VagasController@destroy')->name('vaga.excluir');
Route::get('/listar', 'VagasController@index')->name('listar');
Route::get('/encerrar/{id}', 'VagasController@encerrarVaga');
Route::get('/copiarvaga/{id}', 'VagasController@copiarVaga');
Route::get('/classificar/{id}/{v}/{c}', 'VagasController@classificar');

Route::get('/buscarcurriculo','CurriculosController@buscar');
Route::get('/buscarcurriculo/visualizar/{id}', 'CurriculosController@show');
Route::post('/editarObs/{id}', 'CurriculosController@updateObservacao');




Route::get('/curriculo/vagas', 'VagaController@index')->name('curriculo.vagas');
//Route::get('/gerarpdf/{id?}','PdfController@Gerarpdf')->name('Curriculo.Impressao');
Route::get('/gerarpdf/{id}','CurriculosController@gerarPdf')->name('Curriculo.Impressao');
