<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Test;

class Opening extends BaseModel
{
    protected $fillable = ['company_id', 'position', 'description', 'requirements', 'level', 'deadline', 'minimal_rate', 'technologies'];

    protected $hidden = ['company_id'];

    public static $listData = ['id', 'position', 'deadline', 'technologies', 'requirements', 'company_id'];

    public static $listRel = ['company'];



    //		-- Relationships --

    public function company() {
        return $this->belongsTo('App\User', 'company_id')->select('id', 'name');
    }



    //		-- Accessors -- 

    public function getRequirementsAttribute($value) {
    	$values = explode('&&', $value);
    	return $values;
    }

    public function getTechnologiesAttribute($value) {
    	$values = explode('&&', $value);
    	return $values;	
    }

    public function getDeadlineAttribute($value) {
        $format = config('formats.humanDate');
        return $this->dateFromDB($value)->format($format);
    }



    //		-- Mutators --



    //		-- Custom methods --



    //      -- CRUD --

    public static function baseCreate($req) {
        $open = new static;
        $open->fill($req->only(static::fillable()));
        $open->save();
        foreach ($open->tests as $test) {
            $tst = new Test;
            $tst->fill($req->only(Test::fillable()));
            $tst->opening_id = $open->id;
            $tst->save();
            $tst->addQuestions($)
        }
    }

}
