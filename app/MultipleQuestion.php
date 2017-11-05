<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestion extends BaseModel
{
    protected $fillable = ['question', 'test_id', 'answer', 'options'];

    protected $appends = ['options'];

    protected $hidden = ['test_id', 'option1', 'option2', 'option3'];



    //		-- Relationships --

    public function test() {
    	return $this->belongsTo('App\Test');
    }

    public function answers() {
        return $this->morphMany('App\Answer', 'question_type');
    }



    //		-- Accessors --

    public function getOptionsAttribute() {
    	for ($i = 1; $i < 4; $i++) {
    		$options[] = ['option' => $this->{"option$i"}, 'correct' => 0];
    	}
    	$options[] = ['option' => $this->answer, 'correct'=> 1];
    	return collect($options)->shuffle();
    }



    //      -- Mutators --

    public function setOptionsAttribute($value) {
        foreach ($value as $index => $option) {
            $this->attributes['option'.($index + 1)] = $option;
        }
    }
}
