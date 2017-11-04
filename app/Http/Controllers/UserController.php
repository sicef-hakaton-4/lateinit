<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\ExpertDescription;

use App\CompanyDescription;

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
		$data = $req->only(['type', 'name', 'email', 'password']);
		$user = User::create($data);
		if ($user->type == 2) {
			$descData = $req->only(['description', 'founded', 'employees', 'headquarters']);
			$descData['company_id'] = $user->id;
			$desc = CompanyDescription::create($descData);
		}
		$response['displayData'] = $user->displayData();
		$response['token'] = $user->token();
		return JSONResponse(true, 200, 'You are registered.', $user->displayData());
	}

}
