<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;

use App\ExpertDescription;

use App\CompanyDescription;

use Carbon\Carbon;

class UserController extends Controller
{
    
	public function login(Request $req) {
		$creds = $req->only(['email', 'password']);
		if (!Auth::attempt($creds)) {
			return JSONResponse(false, 401, 'Invalid credentials');
		}
		$response['displayData'] = Auth::user()->displayData();
		$response['token'] = Auth::user()->token();
		$hiredAt = Carbon::now()->subMonth()->toDateString();
		$app = Auth::user()->applications()->where('hired', 1)->whereDate('hired_at', $hiredAt)->first();
		if (is_null($app)) {
			$response['pera'] = 0;
		}
		else {
			$response['pera'] = 1;
			$response['hiredAt'] = $app->opening->company;
			$response['application_id'] = $app->id;
		}
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
		return JSONResponse(true, 200, 'You are registered.', $response);
	}

	public function myACcount() {
		$myId = Auth::user()->id;
		return User::loadSingle($myId);
	}

	public function editAccount(Request $req) {
		$userId = Auth::user()->id;
		return User::baseUpdate($userId, $req);
	}

}
