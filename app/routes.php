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

Route::get('/', array(

	'as' => 'home',
	'uses' => 'SiteController@index'

));


/*Unauthenticated group*/

Route::group(array("before" => "guest"), function() {

	/*CSRF protection group*/
	Route::group(array("before" => "csrf"), function() {

		Route::post("/login", array(
			'as' => 'login-post',
			'uses' => 'AccountController@postLogin'
		));

		/*Register*/
		Route::post("/register", array(
			'as' => 'register-post',
			'uses' => 'AccountController@postRegister'
		));

	});

	/*Login*/
	Route::get("/login", array(
		'as' => 'login',
		'uses' => 'AccountController@getLogin'
	));

	/*Register*/
	Route::get("/register", array(
		'as' => 'register',
		'uses' => 'AccountController@getRegister'
	));

	/*Activate*/
	Route::get("/activate/{code}", array(
		'as' => 'activate',
		'uses' => 'AccountController@activate'
	));

});

/*Authenticated group*/

Route::group(array("before"=>"auth"), function() {

	/*CSRF protection*/
	Route::group(array("before" => "csrf"), function() {
		/*	Add schedule*/
		Route::post("/addSchedule", array(
			'as' => 'addSchedule',
			'uses' => 'ScheduleController@addSchedule'
		));

	});

	/*Logout*/
	Route::get("/logout", array(
		'as' => 'logout',
		'uses' => 'AccountController@logout'
	));

	/*Admin*/
	Route::get("/a/{admin}", array(
		'as' => 'admin',
		'uses' => 'admin@index'
	));

	/*create Schedular*/
		Route::get("/createschedule", array(
		'as' => 'createschedule',
		'uses' => 'ScheduleController@createSchedule'
	));


		

});