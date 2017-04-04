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

Route::get('/', 'IndexController@index');
Route::get('/historia/nueva', 'HistoryController@nueva');
Route::post('/historia/crear', 'HistoryController@crear');
Route::get('/historia/{id}', 'HistoryController@modificar');
Route::post('/historia/modificar/{id}', 'HistoryController@actualizar');
Route::get('/historia/eliminar/{id}', 'HistoryController@eliminar');
Route::post('/comentario/crear', 'ComentarioController@crear');

Route::get('/perfil', 'PerfilUsuarioController@index');
Route::get('/perfil/editar', 'PerfilUsuarioController@editar');
Route::post('/perfil/actualizar', 'PerfilUsuarioController@actualizar');

/* test routes */
Route::get('/prueba', 'IndexController@prueba');
Route::get('/vue', 'VueController@vue');
/*------------*/
Auth::routes();



Route::any('foo', function(){
	return "Hola Mundo";
});