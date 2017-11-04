<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
	public function login(Request $req) {
		$creds = $req->only(['email', 'password']);
		if (!Auth::attempt($creds)) {
			return JSONResponse(false, 401, 'Invalid credentials');
		}
		$response['displayData'] = Auth::user()->displayData();
		$response['token'] = Auth::user()->token();
		return JSONResponse(true, 200, 'Logged in', $response);
	}

	public function register(Request $req) {

	}

}
