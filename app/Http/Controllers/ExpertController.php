<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class ExpertController extends Controller
{

    public function publicExperts() {
    	$experts = User::getExperts()->where('public', 1)->with('description')->select('id', 'name')->get();
    	return JSONResponse(true, 200, 'Loaded', $experts);
    }

    public function getSingle($id) {
    	return User::loadSingle($id);
    }

}
