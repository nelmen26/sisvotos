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
	// Rutas para el modulo de recintos
	Route::resource('recintos', 'RecintoController',['except' => 'show']);

	// Rutas para importar Recintos atraves del un archivo excel
	Route::get('recintos/importar', 'RecintoController@importar')->name('recintos.importar');
	Route::post('recintos/importar', 'RecintoController@storeimportar')->name('recintos.storeimportar');

	// Rutas para el modulo de mesas
	Route::resource('mesas', 'MesaController',['except' => 'show']);
	// Rutas para generar Mesas de Recintos automaticamente
	Route::get('mesas/generar', 'MesaController@generar')->name('mesas.generar');
	Route::post('mesas/generar', 'MesaController@storegenerar')->name('mesas.storegenerar');
	// Rutas para importar Mesas de Recintos atraves del un archivo excel
	Route::get('mesas/importar', 'MesaController@importar')->name('mesas.importar');
	Route::post('mesas/importar', 'MesaController@storeimportar')->name('mesas.storeimportar');

	// Rutas para el modulo de candidatos
	Route::resource('candidatos', 'CandidatoController',['except' => 'show']);
});

Route::get('registros', 'RegistroController@index')->name('registros.index');
Route::get('registros/{recinto}/mesas', 'RegistroController@mesas')->name('registros.mesas');
Route::get('registros/{mesa}/votos', 'RegistroController@votos')->name('registros.votos');
Route::post('registros/{mesa}/votos', 'RegistroController@storevotos')->name('registros.storevotos');

Route::get('/perfil','UserController@perfil')->name('users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword');

// Rutas api's
Route::get('users/apiUsers','UserController@apiUsers')->name('users.apiUsers');
Route::get('tipos/apiTipos','TipoController@apiTipos')->name('tipos.apiTipos');
Route::get('recintos/apiRecintos','RecintoController@apiRecintos')->name('recintos.apiRecintos');
Route::get('mesas/apiMesas','MesaController@apiMesas')->name('mesas.apiMesas');