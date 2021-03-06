<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class Application extends BaseModel
{

    protected $hidden = ['expert_id', 'opening_id', 'interview'];

    protected $fillable = ['expert_id', 'opening_id'];

    protected $appends = ['ints'];



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

    public function interview() {
        return $this->hasOne('App\Interview');
    }



    //		-- Accessors --

    public function getIntsAttribute() {
        if (is_null($this->interview)) {
            $this->attributes['ints'] = null;
            return null;
        }
        $ints['ints'] = $this->interview->appointment;
        $ints['hr'] = 1;
        return $ints;
        

    }



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
        $response['applicaton_id'] = $app->id;
        $response['testNum'] = $app->opening->tests()->count();
        $response['nextTest'] = $app->opening->tests()->first();
        if (!is_null($response['nextTest'])) {
            $response['nextTest']->questionCount();
            $response['nextTest']->makeHidden('questions');
        }
        return JSONResponse(true, 200, 'Created', $response);
    }

    public function hire() {
        $this->hired = 1;
        $this->hired_at = Carbon::now()->toDateTimeString();
        $this->save();
    }

}
