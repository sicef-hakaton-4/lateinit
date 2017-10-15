<?php

use Illuminate\Http\Request;

Route::post('put/{model}', 'BaseController@create'); // CREATE

Route::get('get/{model}', 'BaseController@readAll'); // READ LIST

Route::get('get/{model}/{id}', 'BaseController@readSingle'); // READ SINGLE

Route::get('patch/{model}/initialize/{id}', 'BaseController@initializePatch'); // LOAD DATA FOR UPDATE FORM

Route::post('patch/{model}/{id}', 'BaseController@update'); // UPDATE

Route::get('delete/{model}/{id}', 'BaseController@delete'); // DELETE


Route::get('test', 'BaseController@test');