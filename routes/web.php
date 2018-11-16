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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix' => 'configuracion'], function(){
	// Rutas para el modulo de usuarios
	Route::resource('users', 'UserController',['except' => 'show']);
	// Rutas para el modulo de tipos
	Route::resource('tipos', 'TipoController',['except' => 'show']);
	Route::get('/tipos/{tipo}/darbaja', 'TipoController@darBaja')->name('tipos.darbaja');
	Route::get('/tipos/{tipo}/daralta', 'TipoController@darAlta')->name('tipos.daralta');

	// Rutas para el modulo de recintos
	Route::resource('recintos', 'RecintoController',['except' => 'show']);

	// Rutas para importar Recintos atraves del un archivo excel
	Route::get('recintos/importar', 'RecintoController@importar')->name('recintos.importar');
	Route::post('recintos/importar', 'RecintoController@storeimportar')->name('recintos.storeimportar');

	// Rutas para el modulo de mesas
	Route::resource('mesas', 'MesaController',['except' => 'show']);
	Route::get('/mesas/{mesa}/darbaja', 'MesaController@darBaja')->name('mesas.darbaja');
	Route::get('/mesas/{mesa}/daralta', 'MesaController@darAlta')->name('mesas.daralta');

	// Rutas para generar Mesas de Recintos automaticamente
	Route::get('mesas/generar', 'MesaController@generar')->name('mesas.generar');
	Route::post('mesas/generar', 'MesaController@storegenerar')->name('mesas.storegenerar');

	// Rutas para importar Mesas de Recintos atraves del un archivo excel
	Route::get('mesas/importar', 'MesaController@importar')->name('mesas.importar');
	Route::post('mesas/importar', 'MesaController@storeimportar')->name('mesas.storeimportar');

	// Rutas para el modulo de candidatos
	Route::resource('candidatos', 'CandidatoController',['except' => 'show']);

	Route::get('/candidatos/{candidato}/darbaja', 'CandidatoController@darBaja')->name('candidatos.darbaja');
	Route::get('/candidatos/{candidato}/daralta', 'CandidatoController@darAlta')->name('candidatos.daralta');
});

// Rutas para el modulo de registro de votos
Route::get('registros', 'RegistroController@index')->name('registros.index');
Route::get('registros/{recinto}/mesas', 'RegistroController@mesas')->name('registros.mesas');
Route::get('registros/{mesa}/tipos', 'RegistroController@tipos')->name('registros.tipos');
Route::get('registros/{mesa}/{tipo}/votos', 'RegistroController@votos')->name('registros.votos');
Route::post('registros/{mesa}/votos', 'RegistroController@storevotos')->name('registros.storevotos');

// Rutas para los resultados de los votos
Route::get('resultados', 'ResultadoController@index')->name('resultados.index');
Route::get('resultados/candidatos', 'ResultadoController@candidatos')->name('resultados.candidatos');

// Ruta del perfil y cambio de password del usuario
Route::get('/perfil','UserController@perfil')->name('users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword');

// Rutas api's
Route::get('users/apiUsers','UserController@apiUsers')->name('users.apiUsers');
Route::get('tipos/apiTipos','TipoController@apiTipos')->name('tipos.apiTipos');
Route::get('recintos/apiRecintos','RecintoController@apiRecintos')->name('recintos.apiRecintos');
Route::get('mesas/apiMesas','MesaController@apiMesas')->name('mesas.apiMesas');