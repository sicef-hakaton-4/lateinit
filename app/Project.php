<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends BaseModel
{
    protected $fillable = ['owner_id', 'owner'];

    protected $hidden = [];



    //		-- Relationships --



    //		-- Accessors -- 

    public function getTechnologiesAttribute($value) {
    	$techs = explode('&&', $value);
    	return $techs;
    }



    //		-- Mutators --

    public function setTechnologiesAttribute($value) {
    	$techs = implode('&&', $value);
    	$this->attributes['technologies'] = $techs;
    }



    //		-- Custom methods --
}
