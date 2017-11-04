<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends BaseModel
{

    protected $fillable = ['question_id', 'question_type', 'application_id', 'answer'];

    protected $hidden = ['question_id', 'question_type', 'application_id'];



    //		-- Relationships --

    public function application() {
    	return $this->belongsTo('App\Application');
    }

    public function question() {
    	return $this->morphedBy('App\Question', 'question_type');
    }

}
