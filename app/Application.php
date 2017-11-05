<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Application extends BaseModel
{

    protected $hidden = ['expert_id', 'opening_id'];

    protected $fillable = ['expert_id', 'opening_id'];



    //		-- Relationships --

    public function expert() {
    	return $this->belongsTo('App\User', 'expert_id');
    }

    public function opening() {
    	return $this->belongsTo('App\Opening');
    }

    public function answers() {
    	return $this->hasMany('App\Answer');
    }



    //		-- Accessors --



    //		-- Mutators --



    //		-- CRUD --

    public static function loadSingle($id) {
    	$app = static::with('answers.question.test')->where('id', $id)->first();
    	$app->answers->groupBy(function ($answer) {
    		return $answer->group->test->queue;
    	});
    	return JSONResponse(true, 200, 'Loaded', $app);
    }

    public static function baseCreate($req) {
        $app = new static;
        $app->opening_id = $req->opening_id;
        $app->expert_id = Auth::user()->id;
        $app->save();
        $response['testNum'] = $app->opening->tests()->count();
        $response['nextTest'] = $app->opening->tests()->first();
        $response['nextTest']->questionCount();
        $response['nextTest']->makeHidden('questions');
        return JSONResponse(true, 200, 'Created', $response);
    }

}
