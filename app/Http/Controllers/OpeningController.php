<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opening;

class OpeningController extends Controller
{
    
	public function applications($openingId) {
		$opening = Opening::with('applications')->where('id', $openingId)->first();
		return JSONResponse(true, 200, 'Loaded', $opening);
	}

}
