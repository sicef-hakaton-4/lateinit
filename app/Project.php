<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Project extends BaseModel
{
    protected $fillable = ['owner_id', 'owner', 'name', 'description', 'client', 'technologies', 'position', 'started', 'ended'];

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



    //      -- CRUD -- 

    public static function baseCreate($req) {
        $pro = new static;
        $pro->owner_id = Auth::user()->id;
        $pro->owner = (Auth::user()->type == 'expert') ? 0 : 1;
        $pro->save();
        return JSONResponse(true, 200, 'Project added.');
    }
}
