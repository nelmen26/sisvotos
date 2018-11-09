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
});

Route::get('/perfil','UserController@perfil')->name('users.perfil');
Route::put('users/{user}/password','UserController@updatepassword')->name('users.updatepassword');

// Rutas api's
Route::get('users/apiUsers','UserController@apiUsers')->name('users.apiUsers');
Route::get('tipos/apiTipos','TipoController@apiTipos')->name('tipos.apiTipos');
Route::get('recintos/apiRecintos','RecintoController@apiRecintos')->name('recintos.apiRecintos');