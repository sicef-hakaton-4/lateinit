<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
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

    public function loadSingle($id) {
    	$app = static::with('answers.question.test')->where('id', $id)->first();
    	$app->answers->groupBy(function ($answer) {
    		return $answer->group->test->queue;
    	});
    	return JSONResponse(true, 200, 'Loaded', $app);
    }

}
