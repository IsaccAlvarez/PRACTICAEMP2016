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
Route::resource('listUser','UsuarioController@listUser');
//email
Route::resource('mail','MailController');
//asesores
Route::resource('asesor','AsesorController');
Route::get('listall','AsesorController@listall');
//contactos
Route::resource('contacto','ContactoController');

Route::get('listAll','ContactoController@listAll');

//solicitudes
Route::resource('solicitud','SolicitudesController');
Route::get('listSolit','SolicitudesController@listSolitud');
Route::get('/autocompleteC',array('as'=>'autocompleteC','uses'=>'SolicitudesController@autocompleteC'));
Route::get('/autocompleteA',array('as'=>'autocompleteA','uses'=>'SolicitudesController@autocompleteA'));

//
//comentarios de contacto
Route::resource('comentario','ComentarioContactoController');
Route::get('/coment/{idContacto}','ComentarioContactoController@getList');
//
Route::resource('log','LoginController');
Route::get('logout','LoginController@logout');
Route::resource('cambio','CambioClaveController');
Route::get('password','CambioClaveController@password');
Route::post('updatePassword','CambioClaveController@updatePassword');
