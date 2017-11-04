<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opening;

use Illuminate\Support\Facades\Auth;

class OpeningController extends Controller
{
    
	public function applications($openingId) {
		$opening = Opening::with('applications.expert')->where('id', $openingId)->first();
		return JSONResponse(true, 200, 'Loaded', $opening);
	}

	public function myOpenings() {
		if (Auth::user()->type == 'expert') {
			$openings = Auth::user()->applications();
		}
		else {
			$openings = Auth::user()->openings();
		}
		$data['openings'] = $openings;
		return JSONResponse(true, 200, 'Loaded', $data);
	}

}
