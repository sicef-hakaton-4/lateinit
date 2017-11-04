<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleQuestion extends Model
{
    protected $fillable = ['question', 'test_id', 'answer', 'options'];

    protected $appends = ['options'];

    protected $hidden = 'test_id';



    //		-- Relationships --

    public function test() {
    	return $this->belongsTo('App\Test');
    }



    //		-- Accessors --

    public function getOptionsAttribute() {
    	for ($i = 1; $i < 4; $i++) {
    		$options[] = ['option' => $this->{"option$i"}, 'correct' => 0];
    	}
    	$options[] = ['option' => $this->answer, 'correct'=> 1];
    	return collect($options)->shuffle();
    }
}
