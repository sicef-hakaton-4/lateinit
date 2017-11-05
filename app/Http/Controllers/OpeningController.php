<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Opening;

use App\Interview;

use Illuminate\Support\Facades\Auth;

class OpeningController extends Controller
{
    
	public function applications($openingId) {
		$opening = Opening::with('applications.expert')->where('id', $openingId)->first();
		return JSONResponse(true, 200, 'Loaded', $opening);
	}

	public function myOpenings() {
		if (Auth::user()->type == 'expert') {
			$openings = Auth::user()->applications()->with('opening')->get();
		}
		else {
			$openings = Auth::user()->openings;
		}
		$data['openings'] = $openings;
		return JSONResponse(true, 200, 'Loaded', $data);
	}

	public function loadAll() {
		return Opening::loadAll();
	}

	public function loadSingle($id) {
		return Opening::loadSingle($id);
	}

	public function elevatedView($id) {
		$opening = Opening::with('applications.expert.description', 'applications.answers')->where('id', $id)->first();
		$opening->applications->transform(function ($app) {
			$app->answers->load('question.test');
			$tests = $app->answers->groupBy(function ($answer) {
				$test = 'Test' . $answer->question->test->queue;
				return $test;
			});
			$app->tests = $tests;
			$app->makeHidden('answers');
			return $app;
		});
		return JSONResponse(true, 200, 'Loaded', $opening);
	}

	public function scheduleInterview(Request $req) {
		$int = Interview::schedule($req->date, $req->application_id);
		return JSONResponse(true, 200, 'Interview scheduled.');
	}

}
