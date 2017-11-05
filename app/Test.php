<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends BaseModel
{
    protected $fillable = ['opening_id', 'queue', 'type', 'min_rate', 'minutes', 'seconds', 'time'];

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



    //      -- Accessors --



    //      -- Mutators --

    public function setMinutesAttribute($value) {
        $seconds = (int) $value * 60;
        if (!isset($this->attributes['time'])) {
            $this->attributes['time'] = 0;
        }
        $this->attributes['time'] += $seconds;
    }

    public function setSecondsAttribute($value) {
        if (!isset($this->attributes['time'])) {
            $this->attributes['time'] = 0;
        }
        $this->attributes['time'] += $value;
    }



    //      -- Custom methods --

    public function addQuestions($questions) {
        foreach ($questions as $question) {
            switch ($question['type']) {
                case 'code':
                    $quest = new CodeQuestion;
                    break;
                case 'file':
                    $quest = new FileQuestion;
                    break;
                case 'multiple':
                    $quest = new MultipleQuestion;
                    break;
            }
            unset($question['type']);
            $quest->fill($question);
            $quest->test_id = $this->id;
            $quest->save();
        }
    }

}
