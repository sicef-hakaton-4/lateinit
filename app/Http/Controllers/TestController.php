<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Test;

class TestController extends Controller
{
    
	public function startTest($testId) {
		$test = Test::find($testId);
		$question = $test->firstQuestion();
		return JSONResponse(true, 200, 'Loaded', $question);
	}

}
