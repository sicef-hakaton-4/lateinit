<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends BaseModel
{
    protected $fillable = ['opening_id', 'queue', 'type', 'min_rate'];

    protected $hidden = ['opening_id'];



    //		-- Relationships -- 

    public function opening() {
    	return $this->belongsTo('App\Opening');
    }

    public function codeQuestions() {
    	return $this->hasMany('App\CodeQuestion');
    }

    public function multipleQuestions() {
    	return $this->hasMany('App\MultipleQuestion');
    }

    public function fileQuestions() {
    	return $this->hasMany('App\FileQuestion');
    }

    public function questions() {
    	$this->load(['codeQuestions', 'fileQuestions', 'multipleQuestions']);
    	$questions['code'] = $this->codeQuestions->transform(function ($question) {
    		$question->type = 'code';
    		return $question;
    	});
    	$questions['file'] = $this->codeQuestions->transform(function ($question) {
    		$question->type = 'file';
    		return $question;
    	});
    	$questions['multiple'] = $this->codeQuestions->transform(function ($question) {
    		$question->type = 'multiple';
    		return $question;
    	});
    	$this->questions = $questions;
    	return $questions;
    }

}
