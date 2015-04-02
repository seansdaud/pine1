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
	// getLatestMap
		Route::get("/getCurrent", array(
			'as' => 'getCurrenthome',
			'uses' => 'SiteController@getCurrent'
		));	
Route::get("/arenas", array(
	'as' => 'arenas',
	'uses' => 'SiteController@arenas'
));

Route::get("/about", array(
	'as' => 'about',
	'uses' => 'SiteController@about'
));

Route::get("/contact", array(
	'as' => 'contact',
	'uses' => 'SiteController@contact'
));

Route::group(array("before" => "csrf"), function() {

	Route::post("/c/change-profile-pic", array(
		'as' => 'change-admin-profile-picture',
		'uses' => 'admin@postProfilePic'
	));

	Route::post("/c/change-username", array(
		'as' => 'change-admin-username',
		'uses' => 'admin@postAdminUsername'
	));

	Route::post("/c/change-email", array(
		'as' => 'change-admin-email',
		'uses' => 'admin@postAdminEmail'
	));

	Route::post("/c/change-name", array(
		'as' => 'change-admin-name',
		'uses' => 'admin@postAdminName'
	));

	Route::post("/c/change-password", array(
		'as' => 'change-admin-password',
		'uses' => 'admin@postAdminPassword'
	));

});


/*Unauthenticated group*/

Route::group(array("before" => "guest"), function() {

	/*CSRF protection group*/
	Route::group(array("before" => "csrf"), function() {

		/*Register*/
		Route::post("/register", array(
			'as' => 'register-post',
			'uses' => 'AccountController@postRegister'
		));

		/*Login*/
		Route::post("/login", array(
			"as" => "login-post",
			"uses" => 'AccountController@postLogin'
		));
	

		/*Check Duplicate Users*/
		Route::post("/check-duplicate-users", array(
			"as" => "check-duplicate-users",
			"uses" => "AccountController@checkUsers"
		));

	});
	
		

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
		Route::post("/update-profile-post", array(
			'as' => 'update-profile-post',
			'uses' => 'UserController@profileUpdated'
		));	

	});

	/*Logout*/
	Route::get("/logout", array(
		'as' => 'logout',
		'uses' => 'AccountController@logout'
	));
	Route::get("/update-profile", array(
			'as' => 'change-profile',
			'uses' => 'UserController@changeProfile'
		));

});

Route::group(array("before"=>"admin"), function() {

	/*CSRF Protection*/
	Route::group(array("before" => "csrf"), function() {

		/*Add New Owner view*/
		Route::post("/a/new-owner-post", array(
			'as' => 'create-new-owner-post',
			'uses' => 'admin@postNewOwner'
		));

		/* Check duplicate username & email while creating owners. */
		Route::post("/a/check-duplicate-owners", array(
			'as' => 'check-duplicate-owners',
			'uses' => 'admin@checkOwners'
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
		/*create_instant_user*/
			Route::post("/o/create_instant_user", array(
			'as' => 'create_instant_user',
			'uses' => 'ScheduleController@UserCreate'
		));
		/*	Add schedule*/
		Route::post("/o/addSchedule", array(
			'as' => 'addSchedule',
			'uses' => 'ScheduleController@addSchedule'
		));
			
		Route::post("/o/postupdatePrice", array(
			'as' => 'postupdatePrice',
			'uses' => 'ScheduleController@postupdatePrice'
		));
			/*	Book Schedular*/
		Route::post("/o/prebookschedule/{id}", array(
			'as' => 'prebookschedule',
			'uses' => 'ScheduleController@prebookschedule'
		));	
		/*	Post Book Schedular*/
			Route::post("/o/postbookschedule", array(
			'as' => 'postbookschedule',
			'uses' => 'ScheduleController@postbookschedule'
		));
				/*	Edit Schedular*/
			Route::post("/o/addscheduledown", array(
			'as' => 'addscheduledown',
			'uses' => 'ScheduleController@addscheduledown'
		));	
			Route::post("/o/addscheduleup", array(
			'as' => 'addscheduleup',
			'uses' => 'ScheduleController@addscheduleup'
		));	
				Route::post("/o/delscheduledown", array(
			'as' => 'delscheduledown',
			'uses' => 'ScheduleController@delscheduledown'
		));	
				Route::post("/o/deleteallschedule", array(
			'as' => 'deleteallschedule',
			'uses' => 'ScheduleController@deleteallschedule'
		));	

		/* Post Events */
		Route::post("/o/events", array(
			'as' => "owner-events-post",
			'uses' => "EventsController@postOwnerEvents"
		));

		Route::post("/o/edit-event", array(
			'as' => 'owner-event-edit-post',
			'uses' => 'EventsController@editOwnerEventPost'
		));

		Route::post("/o/addingArena", array(
			'as' => 'add-arena-post',
			'uses' => 'Owner@addingArena'
		));	

	});
/*	Locator*/

Route::get("/o/marker-update", array(
			'as' => 'marker-update',
			'uses' => 'owner@markerUpdate'
		));	
Route::post("/o/createMaps", array(
			'as' => 'createMaps',
			'uses' => 'owner@createMaps'
		));	
				Route::get("/o/getCurrent", array(
			'as' => 'getCurrent',
			'uses' => 'ScheduleController@getCurrent'
		));	
						Route::get("/o/locator", array(
			'as' => 'locator',
			'uses' => 'ScheduleController@locator'
		));	
	/*	view Log*/
				Route::get("/o/viewLog", array(
			'as' => 'viewLog',
			'uses' => 'ScheduleController@viewLog'
		));	
				Route::post("/o/getLog", array(
			'as' => 'getLog',
			'uses' => 'ScheduleController@getLog'
		));	
							Route::get("/o/getLog", array(
			'as' => 'getLog',
			'uses' => 'ScheduleController@viewLog'
		));	
	/*	Pre Book Schedular*/
		Route::get("/o/prebookschedule/{id}", array(
			'as' => 'prebookschedule',
			'uses' => 'ScheduleController@prebookschedule'
		));	
	/*
	Next date Show*/
			Route::get("/o/nextdate", array(
		'as' => 'nextdate',
		'uses' => 'ScheduleController@nextdate'
	));	
			/*
	Prev date Show*/
			Route::get("/o/prevdate", array(
		'as' => 'prevdate',
		'uses' => 'ScheduleController@prevdate'
	));	


	/*Search via Username*/
		Route::post("/o/searchuser", array(
		'as' => 'searchuser',
		'uses' => 'ScheduleController@searchuser'
	));	
		/*Search via name*/
		Route::post("/o/searchuservianame", array(
		'as' => 'searchuservianame',
		'uses' => 'ScheduleController@search_uservianame'
	));	


	/*create Schedular*/
		Route::get("/o/createschedule", array(
		'as' => 'createschedule',
		'uses' => 'ScheduleController@createSchedule'
	));	
			Route::get("/o/updatePrice", array(
		'as' => 'updatePrice',
		'uses' => 'ScheduleController@updatePrice'
	));	
	/*		update price*/
	
			Route::get("/o/showSchedule", array(
		'as' => 'showSchedule',
		'uses' => 'ScheduleController@showSchedule'
	));	
		Route::get("/o/booknow/{id}", array(
		'as' => 'booknow',
		'uses' => 'ScheduleController@bookSchedule'
	));	

	/* Get Events */
	Route::get("/o/events", array(
		'as' => "owner-events",
		'uses' => "EventsController@getOwnerEvents"
	));

	Route::get("/o/new-event", array(
		'as' => 'owner-event-new',
		'uses' => 'EventsController@createNewEvent'
	));

	Route::get("/o/edit-event/{id}", array(
		'as' => 'owner-event-edit',
		'uses' => 'EventsController@editOwnerEvent'
	));
		
	//add arena	
		Route::get("/o/add-arena-info", array(
		'as' => 'add-arena-info',
		'uses' => 'Owner@addArena'
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

/*User Profile (Keep this route at the end (V.V. important))*/
Route::get("/{username}", array(
	'as' => 'user-profile',
	'uses' => 'UserController@getProfile'
));
