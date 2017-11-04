<?php

use Illuminate\Http\Request;

Route::group(['middleware' => 'jwt.auth'], function () {




	//		-- Openings --

	Route::get('opening/applications/{openingId}', 'OpeningController@applications');

	Route::get('my/openings', 'OpeningController@myOpenings');



	//		-- My info --

	Route::get('my/account', 'UserController@myAccount');


});



//		-- Basic CRUD --

Route::post('put/{model}', 'BaseController@create'); // CREATE

Route::get('get/{model}', 'BaseController@readAll'); // READ LIST

Route::get('get/{model}/{id}', 'BaseController@readSingle'); // READ SINGLE

Route::get('patch/{model}/initialize/{id}', 'BaseController@initializePatch'); // LOAD DATA FOR UPDATE FORM

Route::post('patch/{model}/{id}', 'BaseController@update'); // UPDATE

Route::get('delete/{model}/{id}', 'BaseController@delete'); // DELETE






//		-- Authentication --

Route::post('login', 'UserController@login');

Route::post('register', 'UserController@register');



//		-- Unauthenticated --

Route::get('expert/get', 'ExpertController@publicExperts');





Route::get('test', 'BaseController@test');