<?php

use Illuminate\Http\Request;

//		-- Unauthenticated --

Route::get('get/user/{id}', 'ExpertController@getSingle');

Route::get('expert/get', 'ExpertController@publicExperts');

Route::get('get/opening', 'OpeningController@loadAll');

Route::get('get/opening/{id}', 'OpeningController@loadSingle');


Route::group(['middleware' => 'jwt.auth'], function () {



	//		-- Basic CRUD --

	Route::post('put/{model}', 'BaseController@create'); // CREATE

	Route::get('get/{model}', 'BaseController@readAll'); // READ LIST

	Route::get('get/{model}/{id}', 'BaseController@readSingle'); // READ SINGLE

	Route::get('patch/{model}/initialize/{id}', 'BaseController@initializePatch'); // LOAD DATA FOR UPDATE FORM

	Route::post('patch/{model}/{id}', 'BaseController@update'); // UPDATE

	Route::get('delete/{model}/{id}', 'BaseController@delete'); // DELETE



	//		-- Openings --

	Route::get('opening/applications/{openingId}', 'OpeningController@applications');

	Route::get('my/openings', 'OpeningController@myOpenings');

	Route::get('get/opening/elevated/{openingId}', 'OpeningController@elevatedView');

	Route::get('application/hire/{appId}', 'OpeningController@hire');



	//		-- My info --

	Route::get('my/account', 'UserController@myAccount');

	Route::post('my/account/patch', 'UserController@editAccount');



	//		-- Interviews --

	Route::post('interview/schedule', 'OpeningController@scheduleInterview');



	//		-- Testing -- 

	Route::get('test/start/{testId}', 'TestController@startTest');

});










//		-- Authentication --

Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');





Route::get('test', 'BaseController@test');