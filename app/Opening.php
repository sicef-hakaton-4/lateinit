<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

use App\Test;

class Opening extends BaseModel
{
    protected $fillable = ['company_id', 'position', 'description', 'requirements', 'level', 'deadline', 'min_rate', 'technologies'];

    protected $hidden = ['company_id'];

    public static $listData = ['id', 'position', 'deadline', 'technologies', 'requirements', 'company_id'];

    public static $listRel = ['company'];



    //		-- Relationships --

    public function company() {
        return $this->belongsTo('App\User', 'company_id')->select('id', 'name');
    }

    public function applications() {
        return $this->hasMany('App\Application');
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

    public function setTechnologiesAttribute($value) {
        $techs = implode('&&', $value);
        $this->attributes['technologies'] = $techs;
    }

    public function setRequirementsAttribute($value) {
        $techs = implode('&&', $value);
        $this->attributes['requirements'] = $techs;
    }


    //		-- Custom methods --



    //      -- CRUD --

    public static function baseCreate($req) {
        $open = new static;
        $open->fill($req->only(static::fillableList()));
        $open->company_id = Auth::user()->id;
        $open->save();
        foreach ($open->tests as $index => $test) {
            $tst = new Test;
            $tst->fill($req->only(Test::fillableList()));
            $tst->opening_id = $open->id;
            $tst->queue = $index;
            $tst->save();
            $tst->addQuestions($test['questions']);
        }
        return JSONResponse(true, 200, 'Opening created.');
    }

}
