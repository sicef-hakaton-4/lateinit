<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\MultipleQuestion;

use App\FileQuestion;

use App\CodeQuestion;

class Answer extends BaseModel
{

    protected $fillable = ['question_id', 'question_type', 'application_id', 'answer'];

    protected $hidden = ['question_id', 'question_type', 'application_id'];



    //		-- Relationships --

    public function application() {
    	return $this->belongsTo('App\Application');
    }

    public function question() {
    	return $this->morphedBy('App\Question', 'question_type');
    }



    //		-- CRUD -- 

    public static function baseCreate($req) {
    	$ans = new static;
        switch ($req->question_type) {
            case 'multiple':
                $q = MultipleQuestion::find($req->question_id);
                break;
            case 'code':
                $q = CodeQuestion::find($req->question_id);
                break;
            case 'file':
                $q = FileQuestion::find($req->question_id);
                break;
        }
        $ans->fill($req->only(static::fillableList()));
        $ans->save();
        $nextQuestion = $q->test->nextQuestion($q->id);
        $response['nextQuestion'] = $nextQuestion;
        if (is_null($nextQuestion)) {
            $response['end'] = 1;
        }
        return JSONResponse(true, 200, 'Saved', $response);
    }

}
