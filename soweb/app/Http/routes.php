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
Route::get('admin','FrontController@admin',['middleware' => 'auth']);

Route::resource('usuario','UsuarioController',['middleware' => 'auth']);
Route::resource('asesor','AsesorController');
Route::resource('log','LoginController');
Route::get('logout','LoginController@logout');

