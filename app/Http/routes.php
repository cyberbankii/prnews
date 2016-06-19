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



Route::auth();

Route::group(['middleware' => 'web'], function() {
	Route::get('/', 'PRNewsesController@index');
});

Route::group(['middleware' => 'admin'], function() {
	Route::get('admin/', 'AdminPRNewsesController@index');
	Route::get('admin/create', 'AdminPRNewsesController@create');
	Route::post('admin', 'AdminPRNewsesController@store');
	Route::get('admin/{id}/edit', 'AdminPRNewsesController@edit');
	Route::put('admin/{id}','AdminPRNewsesController@update');
	Route::delete('admin/{id}', 'AdminPRNewsesController@destroy');

	Route::get('admin/users', 'AdminUsersController@index');
	Route::get('admin/users/{id}/edit', 'AdminUsersController@edit');
	Route::put('admin/users/{id}', 'AdminUsersController@update');
	Route::delete('admin/users/{id}', 'AdminUsersController@destroy');

	Route::get('admin/groups', 'AdminGroupsController@index');
	Route::get('admin/groups/create', 'AdminGroupsController@create');
	Route::post('admin/groups', 'AdminGroupsController@store');
	Route::get('admin/groups/{id}/edit', 'AdminGroupsController@edit');
	Route::put('admin/groups/{id}', 'AdminGroupsController@update');
	Route::delete('admin/groups/{id}', 'AdminGroupsController@destroy');
});
