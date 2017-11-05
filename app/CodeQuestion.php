<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeQuestion extends BaseModel
{
    protected $hidden = ['test_id'];

    protected $fillable = ['task'];



    //		-- Relationships --

    public function answers() {
    	return $this->morphMany('App\Answer', 'question_type');
    }

}
