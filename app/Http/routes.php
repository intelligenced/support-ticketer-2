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


/*
Route::get('/', function () {
    return view('main');
});*/


Route::bind('user',function($user){
	return App\Users::where('id',$user)->first();


});

Route::bind('types',function($rtypes){
	return App\Types::where('type_id',$rtypes)->first();
});


Route::get('/users','usersController@index');
get('/users/{user}','usersController@edit');
get('/types/delete/{type}','usersController@types_delete');


get('/','mainController@index');

Route::post('/send',array(
	'uses'=> 'smsController@index',
	'as' => '/send'

	));


Route::post('/users/add',array(
	'uses'=> 'usersController@store',
	'as' => '/users/add'

	));

Route::post('/users/update',array(
	'uses'=> 'usersController@update',
	'as' => '/users/update'

	));

Route::post('/users/delete',array(
	'uses'=> 'usersController@delete',
	'as' => '/users/delete'

	));

Route::post('/type/add',array(
	'uses'=> 'usersController@typestore',
	'as' => '/type/add'

	));
Route::get('/types',array(
	'uses'=> 'usersController@types_home',
	'as' => '/types'

	));
