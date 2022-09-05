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

Route::get('/qr/verify/{qr_code}','BuyersController@verify_qr_code');

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
    Route::post('/buyer/save','BuyersController@save');
    Route::post('/buyer/remove','BuyersController@remove');
    Route::post('/buyer/find','BuyersController@find');
    Route::post('/buyer/updates','BuyersController@updates');
    Route::get('/buyers/qr_correlative','BuyersController@get_qr_correlative');
    Route::resource('/buyer','BuyersController');

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