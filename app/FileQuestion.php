<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileQuestion extends BaseModel
{
    protected $hidden = ['test_id'];

    protected $fillable = ['test_id', 'task'];



    //		-- Relationships --

    public function answers() {
    	return $this->morphMany('App\Answer', 'question_type');
    }

    public function test() {
    	return $this->belongsTo('App\Test');
    }
}
