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
		

	});

	/*Logout*/
	Route::get("/logout", array(
		'as' => 'logout',
		'uses' => 'AccountController@logout'
	));

	

});

Route::group(array("before"=>"admin"), function() {

	/*CSRF Protection*/
	Route::group(array("before" => "csrf"), function() {

		Route::post("/a/change-profile-pic", array(
			'as' => 'change-admin-profile-picture',
			'uses' => 'admin@postProfilePic'
		));

		Route::post("/a/change-username", array(
			'as' => 'change-admin-username',
			'uses' => 'admin@postAdminUsername'
		));

		Route::post("/a/change-email", array(
			'as' => 'change-admin-email',
			'uses' => 'admin@postAdminEmail'
		));

		Route::post("/a/change-name", array(
			'as' => 'change-admin-name',
			'uses' => 'admin@postAdminName'
		));

		Route::post("/a/change-password", array(
			'as' => 'change-admin-password',
			'uses' => 'admin@postAdminPassword'
		));

		/*Add New Owner view*/
		Route::post("/a/new-owner-post", array(
			'as' => 'create-new-owner-post',
			'uses' => 'admin@postNewOwner'
		));

		/* Add New Arena */
		Route::post("/a/add-new-arena", array(
			'as' => 'add-new-arena-post',
			'uses' => 'admin@postAddNewArena'
		));

		/*Delete Owner*/
		Route::post("/a/delete-owner", array(
			'as' => 'delete-owner',
			'uses' => 'admin@deleteOwner'
		));

		/*Restore Owner*/
		Route::post("/a/restore-owner", array(
			'as' => 'restore-owner',
			'uses' => 'admin@restoreOwner'
		));

		/*Disable Owner*/
		Route::post("/a/disable-owner", array(
			'as' => 'disable-owner',
			'uses' => 'admin@disableOwner'
		));

		/*Enable Owner*/
		Route::post("/a/enable-owner", array(
			'as' => 'enable-owner',
			'uses' => 'admin@enableOwner'
		));

		/*Remove Owner*/
		Route::post("/a/remove-owner", array(
			'as' => 'remove-owner',
			'uses' => 'admin@removeOwner'
		));

	});

	/* Check duplicate username & email while creating owners. */
	Route::get("/a/check-duplicate-owners", array(
		'as' => 'check-duplicate-owners',
		'uses' => 'admin@checkOwners'
	));

	Route::post("/a/check-duplicate-arenas", array(
		'as' => 'check-duplicate-arenas',
		'uses' => 'admin@checkArenas'
	));

	/* Dashboard */
	Route::get("/a/dashboard", array(
		'as' => 'admin-dashboard',
		'uses' => 'admin@index'
	));

	/* Available Owners */
	Route::get("/a/owners", array(
		'as' => 'owners',
		'uses' => 'admin@getOwners'
	));

	/*Add New Owner view*/
	Route::get("/a/new-owner", array(
		'as' => 'create-new-owner',
		'uses' => 'admin@getNewOwner'
	));

	/*Owner Profile*/
	Route::get("/a/owner/{owner}", array(
		'as' => 'admin-owner-profile',
		'uses' => 'admin@getOwnerProfile'
	));

	Route::get("/a/arenas", array(
		'as' => 'admin-arenas',
		'uses' => 'admin@getArenas'
	));

	Route::get("/a/add-new-arena", array(
		'as' => 'add-new-arena',
		'uses' => 'admin@getAddNewArena'
	));

	/*Admin Profile. Put this route at the end of this group (important!!!!!!) */
	Route::get("/a/{admin}", array(
		'as' => 'admin-profile',
		'uses' => 'admin@profile'
	));
	
});

Route::group(array("before"=>"owner"), function() {
	/*CSRF protection*/

	Route::group(array("before" => "csrf"), function() {
		/*	Add schedule*/
		Route::post("/o/addSchedule", array(
			'as' => 'addSchedule',
			'uses' => 'ScheduleController@addSchedule'
		));
			
		Route::post("/postupdatePrice", array(
			'as' => 'postupdatePrice',
			'uses' => 'ScheduleController@postupdatePrice'
		));
			/*	Book Schedular*/
		Route::post("/prebookschedule/{id}", array(
			'as' => 'prebookschedule',
			'uses' => 'ScheduleController@prebookschedule'
		));	
		/*	Post Book Schedular*/
			Route::post("/postbookschedule", array(
			'as' => 'postbookschedule',
			'uses' => 'ScheduleController@postbookschedule'
		));	
	});
		Route::get("/prebookschedule/{id}", array(
			'as' => 'prebookschedule',
			'uses' => 'ScheduleController@prebookschedule'
		));	
			
	/*
	Next date Show*/
			Route::get("/nextdate", array(
		'as' => 'nextdate',
		'uses' => 'ScheduleController@nextdate'
	));	
			/*
	Prev date Show*/
			Route::get("/prevdate", array(
		'as' => 'prevdate',
		'uses' => 'ScheduleController@prevdate'
	));	


	/*Search via Username*/
		Route::post("/searchuser", array(
		'as' => 'searchuser',
		'uses' => 'ScheduleController@searchuser'
	));	


	/*create Schedular*/
		Route::get("/o/createschedule", array(
		'as' => 'createschedule',
		'uses' => 'ScheduleController@createSchedule'
	));	
			Route::get("/updatePrice", array(
		'as' => 'updatePrice',
		'uses' => 'ScheduleController@updatePrice'
	));	
	/*		update price*/
	
			Route::get("/showSchedule", array(
		'as' => 'showSchedule',
		'uses' => 'ScheduleController@showSchedule'
	));	
		Route::get("/booknow/{id}", array(
		'as' => 'booknow',
		'uses' => 'ScheduleController@bookSchedule'
	));	
		

	// owner dashboard
	Route::get("/o/dashboard", array(
		'as' => 'owner-dashboard',
		'uses' => 'owner@index'
	));

	// Owner Profile (Keep it at last !!important...............)
	Route::get("o/{owner}", array(
		'as' => 'owner-profile',
		'uses' => 'owner@getProfile'
	));

});