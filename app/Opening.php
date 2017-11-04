<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opening extends BaseModel
{
    protected $fillable = [];

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
}
