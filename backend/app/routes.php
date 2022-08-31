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

Route::match(
    array('GET','POST'),
    '/administration',
    'LoginController@login'
);

Route::match(
	array('GET','POST'),
	'/recuperar-cuenta-admin',
	'LoginController@recuperar'
);

Route::group(array('before'=>'user'),function() {
    /**/
    Route::match(
        array('GET','POST'),
        '/usuario/profile',
        'UsersController@profile'
    );
    Route::match(
        array('GET','POST'),
        '/usuario/password',
        'UsersController@password'
    );
	Route::resource('/usuario','UsersController');

    /**/
    Route::post('/album/save','AlbumController@save');
    Route::post('/album/remove','AlbumController@remove');
    Route::post('/album/find','AlbumController@find');
    Route::post('/album/updates','AlbumController@updates');
    Route::resource('/album','AlbumController');

    /**/
    Route::get('/album/{alb_id}/songs','SongController@index');
    Route::post('/album/{alb_id}/songs','SongController@store');
    Route::post('/album/{alb_id}/song/remove','SongController@remove');
    Route::post('/album/{alb_id}/song/find','SongController@find');
    Route::post('/album/{alb_id}/song/updates','SongController@updates');

    /**/

    /**/
    Route::match(
        array('GET','POST'),
        '/admin/templates',
        'AdminController@templates'
    );

    Route::resource('/admin','AdminController');

	});

Route::get('/salir',function(){
	//Salir para el superadmin
	Session::flush();	
	return Redirect::to('/');
});

App::missing(function($exception){return Response::View('404');});
?>