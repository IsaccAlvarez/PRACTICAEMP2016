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
Route::post('enviarLista', 'MailController@store');
Route::resource('mail','MailController');
Route::get('/autocomplete', array('as'=>'autocomplete', 'uses'=>'MailController@autocomplete'));
Route::get('index', 'MailController@index');
Route::resource('enviarContacto', 'MailController@create');
Route::resource('enviarSolicitud', 'MailController@solicitud');
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
Route::get('/comentarioDeContacto/{idContacto}','ComentarioContactoController@getList');
//comentarios de solicitud
Route::resource('comentarioSolicitud','ComentarioSolicitudController');
Route::get('/comentarioDeSolicitud/{idSolicitud}','ComentarioSolicitudController@getListSolicitud');
//informes
Route::resource('informe','InformeController');
Route::get('lista','InformeController@listaTabla');
Route::post('listaPendiente','InformeController@pendientesEntreFecha');
//
Route::resource('log','LoginController');
Route::get('logout','LoginController@logout');
Route::resource('cambio','CambioClaveController');
Route::get('cambiarClave','CambioClaveController@password');
Route::post('updatePassword','CambioClaveController@updatePassword');
