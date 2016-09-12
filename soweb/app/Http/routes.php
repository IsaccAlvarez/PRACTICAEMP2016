<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','FrontController@index');
Route::get('admin','FrontController@admin');


Route::resource('usuario','UsuarioController');


Route::resource('asesor','AsesorController');

Route::resource('contacto','ContactoController');

Route::resource('solicitud','SolicitudesController');

Route::resource('log','LoginController');
Route::get('logout','LoginController@logout');
Route::resource('cambio','CambioClaveController');
Route::get('password','CambioClaveController@password');
Route::post('updatePassword','CambioClaveController@updatePassword');
