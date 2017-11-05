<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpertDescription extends BaseModel
{
    protected $table = 'expert_descriptions';

    protected $hidden = ['expert_id'];

    protected $fillable = ['expert_id', 'technologies', 'position', 'public'];


    //		-- Relationships --



    //		-- Accessors --

    public function getTechnologiesAttribute($value) {
    	return explode('&&', $value);
    }



    //		-- Mutators --

    public function setTechnologiesAttribute($value) {
    	$techs = implode('&&', $value);
    	$this->attributes['technologies'] = $techs;
    }
}
