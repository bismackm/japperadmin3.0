<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','HomeController@home');
Route::get('/home','HomeController@home');

Route::match(array('GET','POST'),'/login','LoginController@login');
Route::match(array('GET','POST'),'/recuperar-cuenta-admin','LoginController@recuperar');

Route::group(array('before'=>'session_user'),function()
	{
	Route::match(array('GET','POST'),'/admin/perfil','AdminController@perfil');
	Route::resource('/admin','AdminController');

	Route::resource('/usuario','UsuarioController');
	});

Route::get('/salir',function(){
	//Salir para el superadmin
	Session::flush();	
	return Redirect::to('/');
});

App::missing(function($exception){return Response::View('404');});
?>