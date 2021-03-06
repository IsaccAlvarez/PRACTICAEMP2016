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
Route::get('listaPendientes','FrontController@listP');

Route::resource('usuario','UsuarioController');
Route::resource('listUser','UsuarioController@listUser');

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
Route::get('/comentarioDeContacto/{idContacto}/{page?}','ComentarioContactoController@getList');
//comentarios de solicitud
Route::resource('comentarioSolicitud','ComentarioSolicitudController');
Route::get('/comentarioDeSolicitud/{idSolicitud}/{page?}','ComentarioSolicitudController@getListSolicitud');
//informes
Route::resource('informe','InformeController');
Route::get('lista','InformeController@listaTabla');
Route::get('/listaPendiente/{anio}/{mes}','InformeController@pendientesEntreFecha');
Route::post('/cobrado','InformeController@cobradoAlMes');
Route::get('/rendimientoGeneral/{anio}/{mes}','InformeController@generalAlMes');

//
Route::resource('log','LoginController');
Route::get('logout','LoginController@logout');
Route::resource('cambiarClave','CambioClaveController');
